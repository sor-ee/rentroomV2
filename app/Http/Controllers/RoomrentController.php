<?php

namespace App\Http\Controllers;

use App\Models\Roomrent;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;
use Config;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Mpdf\Mpdf;
use Mpdf\Output\Destination;
use Carbon\Carbon;
use Imagick;

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
        $roomrent->house_number = $request->house_number;
        $roomrent->room_number = $request->room_number;
        $roomrent->category_id = $request->category_id;
        $roomrent->room_fee = $request->room_fee;
        $roomrent->waste_cost = $request->waste_cost;
        $roomrent->old_fire_number = $request->old_fire_number;
        $roomrent->old_water_number = $request->old_water_number;
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
        // 1. ดึงข้อมูล
        $roomrent = Roomrent::find($id);
        $po_no = 'RS'.date("Ymd").$roomrent->room_number.$roomrent->house_number;
        $po_date = date("d-m-Y");

        // 2. สร้าง HTML
        $html_output = view('roomrent/complete', compact('roomrent','po_no','po_date'))->render();
        
        
        $tempPath = storage_path('app/public/temp/');
        if (!file_exists($tempPath)) {
            mkdir($tempPath, 0777, true);
        }
        // 3. เตรียม mPDF
        $mpdf = new \Mpdf\Mpdf([
            'tempDir' => $tempPath
        ]);
        $mpdf->WriteHTML($html_output);
        
        // 4. เตรียม Path (เหมือนเดิม)
        $tempPath = storage_path('app/public/temp/');
        if (!file_exists($tempPath)) mkdir($tempPath, 0777, true);

        $safeName = 'temp_' . time() . '_' . Str::random(5); 
        // แก้ Path เป็น Backslash (\) แบบ Windows
        $pdfTempPath = str_replace('/', '\\', $tempPath . $safeName . '.pdf');
        $jpgTempPath = str_replace('/', '\\', $tempPath . $safeName . '.jpg');

        // 5. Save PDF เต็มหน้าลงเครื่องชั่วคราว
        $mpdf->Output($pdfTempPath, 'F');

        // 6. เตรียมคำสั่งเรียก Ghostscript (เช็ค Path ให้ตรงกับเครื่องคุณ!)
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        // กรณีรันบนเครื่อง AppServ ของคุณ (Windows)
            $gsExe = 'C:\Program Files\gs\gs10.06.0\bin\gswin64c.exe'; 
        } else {
            // กรณีรันบน Render หรือโฮสติ้งทั่วไป (Linux)
        $gsExe = '/usr/bin/gs'; 
        } 

        if (file_exists($gsExe) && file_exists($pdfTempPath)) {
            // คำสั่งแปลงไฟล์ (ได้รูปเต็มหน้ามาก่อน)
            $command = "\"$gsExe\" -dNOPAUSE -dBATCH -sDEVICE=jpeg -r300 -sOutputFile=\"$jpgTempPath\" \"$pdfTempPath\"";
            exec($command, $output, $returnVar);

            // 7. ตรวจสอบผลลัพธ์
            if ($returnVar === 0 && file_exists($jpgTempPath)) {
                
                // =========================================================
                // ✂️ เริ่มขั้นตอนการตัดภาพ (Crop) เอาแค่ครึ่งบน ด้วย PHP GD
                // =========================================================
                try {
                    // โหลดภาพเต็มหน้าที่ได้จาก Ghostscript
                    $sourceImage = @imagecreatefromjpeg($jpgTempPath);
                    if (!$sourceImage) throw new \Exception("ไม่สามารถอ่านไฟล์รูปภาพได้");

                    // หาขนาดกว้างxสูงเดิม
                    $width = imagesx($sourceImage);
                    $height = imagesy($sourceImage);

                    // คำนวณความสูงใหม่ (เอาแค่ครึ่งเดียว)
                    $newHeight = floor($height / 2); 

                    // สร้าง Canvas ภาพเปล่าขนาดใหม่ (กว้างเท่าเดิม สูงครึ่งเดียว)
                    $croppedImage = imagecreatetruecolor($width, $newHeight);

                    // สั่ง Copy จากภาพเดิม โดยเริ่มที่มุมซ้ายบน (0,0)
                    // และเอามาแค่ความกว้างเต็ม ความสูงครึ่งเดียว
                    imagecopy($croppedImage, $sourceImage, 0, 0, 0, 0, $width, $newHeight);

                    // บันทึกภาพที่ตัดแล้ว ทับไฟล์เดิมลงไป (คุณภาพ 90)
                    imagejpeg($croppedImage, $jpgTempPath, 90);

                    // เคลียร์ Ram
                    imagedestroy($sourceImage);
                    imagedestroy($croppedImage);

                } catch (\Exception $e) {
                    // ถ้าตัดภาพไม่สำเร็จ ให้ส่งภาพเต็มไปแทน หรือ return error
                    // return "Error Cropping: " . $e->getMessage(); 
                }
                // =========================================================
                // ✂️ สิ้นสุดการตัดภาพ
                // =========================================================


                // ลบ PDF ต้นฉบับทิ้ง
                @unlink($pdfTempPath);
                
                // ส่งไฟล์รูปที่ตัดแล้วให้ User
                return response()->file($jpgTempPath)->deleteFileAfterSend(true);

            } else {
                return "เกิดข้อผิดพลาดในการแปลงไฟล์ (Code: $returnVar)";
            }
        } else {
            return "ไม่พบโปรแกรม Ghostscript หรือหาไฟล์ PDF ไม่เจอ";
        }
    }
    public function resetStatus($id) {
    $room = RoomRent::find($id);
    
    // ปรับเวลา updated_at ให้ย้อนกลับไป 1 เดือน
    // ทำให้เงื่อนไข (เดือน DB == เดือนปัจจุบัน) เป็นเท็จ ปุ่มเลือกจึงจะกลับมา
    $room->updated_at = Carbon::now()->subMonth();
    
    // สำคัญ: ปิด timestamp ชั่วคราว เพื่อไม่ให้ Laravel อัปเดตเวลากลับมาเป็นปัจจุบันตอน save
    $room->timestamps = false; 
    $room->save();

    return redirect()->back()->with('msg', 'รีเซ็ตสถานะเรียบร้อยแล้ว');
    }
}   
