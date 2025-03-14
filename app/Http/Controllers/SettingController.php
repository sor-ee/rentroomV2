<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class SettingController extends Controller
{
    public function index() {
        $setting = Setting::all();
        return view('setting/index', compact('setting'));
    }
    public function edit($id = null) {
        $setting = Setting::find($id);
        return view('setting/edit')->with('setting', $setting);
        
    }
    public function update(Request $request) {
        $rules = array(
            'electricity_price' => 'required|numeric',
            'water_price' => 'required|numeric',
        );
        $messages = array(
            'required' => 'กรุณากรอกข้อมูล :attribute ให้ครบถ้วน','numeric' => 'กรุณากรอกข้อมูล
            :attribute ให้เป็นตัวเลข',
        );
        $id = $request->id;
        $temp = array(
            'electricity_price' => $request->electricity_price,
            'water_price' => $request->water_price,
        );
        $validator = Validator::make($temp,$rules,$messages);
        if ($validator->fails()) {
            return redirect('setting/edit/'.$id)
            ->withErrors($validator)
            ->withInput();
        }
        $setting = Setting::find($id);
        $setting->electricity_price = $request->electricity_price;
        $setting->water_price = $request->water_price;
        $setting->save();
        return redirect('roomrent')
        ->with('ok', true)
        ->with('msg','บันทึกข้อมูลเรียบร้อยแล้ว');
    }
}
