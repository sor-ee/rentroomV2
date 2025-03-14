<?php

namespace App\Http\Controllers;

use App\Models\Roomrent;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;
use Config;
use Illuminate\Support\Facades\Validator;
use Mpdf\Mpdf;
use Mpdf\Output\Destination;

class RoomrentController extends Controller
{
    public function index() {
        $roomrents = Roomrent::all();
        return view('roomrent/index', compact('roomrents'));
    }
    public function search(Request $request) {
        $query = $request->q;
        if($query) {
            $roomrents = Roomrent::where('house_number','like','%'.$query.'%')
            ->orWhere('room_number', 'like', '%'.$query.'%')
            ->get();
        }else {
            $roomrents = Roomrent::all();
        }
        return view('roomrent/index',compact('roomrents'));
    }
    public function edit($id = null) {
        $categories = Category::pluck('name', 'id')->prepend('เลือกประเภท', '');
        if($id) {
            $roomrent = Roomrent::where('id',$id)->first();
            return view('roomrent/edit')
            ->with('roomrent',$roomrent)
            ->with('categories',$categories);
        }
        else {
            return view('roomrent/add')
            ->with('categories',$categories);
        }
        
    }
    public function update(Request $request) {
        $rules = array(
            'house_number' => 'required',
            'room_number' => 'required',
            'category_id' => 'required',
            'room_fee' => 'required|numeric',
        );
        $messages = array(
            'required' => 'กรุณากรอกข้อมูล :attribute ให้ครบถ้วน','numeric' => 'กรุณากรอกข้อมูล
            :attribute ให้เป็นตัวเลข',
        );
        $id = $request->id;
        $temp = array(
            'house_number' => $request->house_number,
            'room_number' => $request->room_number,
            'category_id' => $request-> category_id,
            'room_fee' => $request->room_fee,
        );
        $validator = Validator::make($temp,$rules,$messages);
        if ($validator->fails()) {
            return redirect('roomrent/edit/'.$id)
            ->withErrors($validator)
            ->withInput();
        }
        $roomrent = Roomrent::find($id);
        $roomrent->house_number = $request->house_number;
        $roomrent->room_number = $request->room_number;
        $roomrent->category_id = $request->category_id;
        $roomrent->room_fee = $request->room_fee;
        $roomrent->save();
        return redirect('roomrent')
        ->with('ok', true)
        ->with('msg','บันทึกข้อมูลเรียบร้อยแล้ว');
    }
    public function insert(Request $request) {
        $rules = array(
            'house_number' => 'required',
            'room_number' => 'required',
            'category_id' => 'required',
            'room_fee' => 'required',
        );
        $messages = array(
            'required' => 'กรุณากรอกข้อมูล : attribute ให้ครบถ้วน'
        );
        $id = $request->id;
        $temp = array(
            'house_number' => $request->house_number,
            'room_number' => $request->room_number,
            'category_id' => $request-> category_id,
            'room_fee' => $request->room_fee,
        );
        $validator = Validator::make($temp,$rules,$messages);
        if ($validator->fails()) {
            return redirect('roomrent/edit/'.$id)
            ->withErrors($validator)
            ->withInput();
        }
        $roomrent = new Roomrent();
        $roomrent->code = $request->house_number;
        $roomrent->name = $request->room_number;
        $roomrent->category_id = $request->category_id;
        $roomrent->room_fee = $request->room_fee;
        $roomrent->save();  
        return redirect('roomrent')
        ->with('ok', true)
        ->with('msg', 'เพิ่มข้อมูลเรียบร้อยแล้ว');
    }
    public function remove($id) {
        Roomrent::find($id)->delete();
        return redirect('roomrent')
        ->with('ok',true)
        ->with('msg','ลบข้อมูลสำเร็จแล้ว');
    }
    public function calc($id = null) {
        $roomrent = Roomrent::find($id);
        return view('roomrent/calc')->with('roomrent', $roomrent);
    }
    public function updatecalc(Request $request) {
        $rules = array(
            'house_number' => 'required',
            'room_number' => 'required',
            'date' => 'required',
            'old_fire_number'=> 'required|numeric',
            'old_water_number'=> 'required|numeric',
            'fire_number' => 'required|numeric',
            'water_number' => 'required|numeric',
            'room_fee' => 'required|numeric',
            'waste_cost' => 'required|numeric',
        );
        $messages = array(
            'required' => 'กรุณากรอกข้อมูล :attribute ให้ครบถ้วน','numeric' => 'กรุณากรอกข้อมูล
            :attribute ให้เป็นตัวเลข',
        );
        $id = $request->id;
        $temp = array(
            'house_number' => $request->house_number,
            'room_number' => $request->room_number,
            'tanent_name' => $request->tanent_name,
            'date' => $request-> date,
            'old_fire_number' => $request->old_fire_number,
            'old_water_number' => $request->old_water_number,
            'fire_number' => $request->fire_number,
            'water_number' => $request->water_number,
            'room_fee' => $request-> room_fee,
            'water_fee' => $request->water_fee,
            'waste_cost' => $request->waste_cost,
            'electricity_fee' => $request-> electricity_fee,
            'total' => $request->total,
        );
        $validator = Validator::make($temp,$rules,$messages);
        if ($validator->fails()) {
            return redirect('roomrent/calc/'.$id)
            ->withErrors($validator)
            ->withInput();
        }
        $roomrent = Roomrent::find($id);
        $roomrent->house_number = $request->house_number;
        $roomrent->room_number = $request->room_number;
        $roomrent->tanent_name = $request->tanent_name;
        $roomrent->date = $request-> date;
        $roomrent->old_fire_number = $request->old_fire_number;
        $roomrent->old_water_number = $request->old_water_number;
        $roomrent->fire_number = $request->fire_number;
        $roomrent->water_number = $request->water_number;
        $roomrent->room_fee = $request-> room_fee;
        // $roomrent->water_fee = $request->water_fee;
        $roomrent->waste_cost = $request->waste_cost;
        // $roomrent->electricity_fee = $request-> electricity_fee;
        // $roomrent->total = $request->total;
        $roomrent->save();
        return redirect('roomrent/conclude/'.$id)
        ->with('ok', true)
        ->with('msg','บันทึกข้อมูลเรียบร้อยแล้ว');
    }
    public function conclude($id = null) {
        $roomrent = Roomrent::find($id);
        $setting = Setting::find(3);
        return view('roomrent/conclude')->with('roomrent', $roomrent)->with('setting', $setting);
        // return redirect('roomrent/conclude/'.$id)
        // ->with('ok', true)
        // ->with('msg','บันทึกข้อมูลเรียบร้อยแล้ว');
    }
    public function updateconclude(Request $request) {
        $rules = array(
            'electricity_fee' => 'required|numeric',
            'water_fee' => 'required|numeric',
            'total' => 'required|numeric',
        );
        $messages = array(
            'required' => 'กรุณากรอกข้อมูล :attribute ให้ครบถ้วน','numeric' => 'กรุณากรอกข้อมูล
            :attribute ให้เป็นตัวเลข',
        );
        $id = $request->id;
        $temp = array(
            'water_fee' => $request->water_fee,
            'electricity_fee' => $request-> electricity_fee,
            'total' => $request->total,
        );
        $validator = Validator::make($temp,$rules,$messages);
        if ($validator->fails()) {
            return redirect('roomrent/conclude/'.$id)
            ->withErrors($validator)
            ->withInput();
        }
        // $id = $request->id;
        $roomrent = Roomrent::find($id);
        $roomrent->house_number = $request->house_number;
        $roomrent->room_number = $request->room_number;
        $roomrent->tanent_name = $request->tanent_name;
        $roomrent->date = $request-> date;
        $roomrent->old_fire_number = $request->fire_number;
        $roomrent->old_water_number = $request->water_number;
        $roomrent->fire_number = $request->fire_number;
        $roomrent->water_number = $request->water_number;
        $roomrent->room_fee = $request-> room_fee;
        $roomrent->water_fee = $request->water_fee;
        $roomrent->waste_cost = $request->waste_cost;
        $roomrent->electricity_fee = $request-> electricity_fee;
        $roomrent->total = $request->total;
        $roomrent->save();
        return redirect('roomrent/complete/'.$id)

        ->with('ok', true)
        ->with('msg','บันทึกข้อมูลเรียบร้อยแล้ว');
    }
    public function complete($id = null) {
        $roomrent = Roomrent::find($id);
        $po_no = 'RS'.date("Ymd").$roomrent->room_number.$roomrent->house_number;
        $po_date = date("d-m-Y");
        $html_output = view('roomrent/complete', compact('roomrent','po_no','po_date'))->render();
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->debug = true;    
        $mpdf->WriteHTML($html_output);
        $mpdf->Output($po_no.'.pdf', 'I');
        //$response = $this->response->withHeader('Content-type', 'application/pdf');
        return $response->withHeader("Content-type","application/pdf");
        // return redirect('roomrent');
        // return view('roomrent/complete', compact('roomrent','po_no','po_date'));
        }
}   
