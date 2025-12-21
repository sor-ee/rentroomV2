<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="uft8">
<style>
    body {
        font-family: "Garuda",sans-serif;
    }
</style>
<body>
    <table width="100%">
    <tr><td colspan="2" align="center"><h3>บิลค่าเช่าห้อง</h3><h4>(Room Rental Bill)</h4></td></tr>
    <tr>
        <td align="right"><strong>เลขที่:</strong></td><td>{{ $po_no }}</td>
        {{-- <tr><td><strong>วันที่:</strong></td><td>{{ $po_date }}</td></tr> --}}
    </tr>
    
    <tr><td colspan="2" align="center"><strong>บ้านเลขที่: </strong> {{ $roomrent->house_number }} </td></tr>
    <tr><td colspan="2" align="center"><strong>หมายเลขห้อง:</strong>  {{ $roomrent->room_number }} </td></tr>
    <tr><td colspan="2" align="left"><strong>ชื่อผู้เช่า: </strong> {{ $roomrent->tanent_name }} </td></tr>
     <?php 
        //use Illuminate\Support\Carbon;
        //use Phattarachai\Thaidate\ThaidateServiceProvider;

        //$dates = Carbon::parse( $roomrent->date )->thaidate('l j F Y');
    ?>
    {{-- <tr><td colspan="2" align="left"><strong>วันที่จดบันทึก: </strong> {{ $dates }} </td></tr> --}}
    <tr><td colspan="2" align="left"><strong>วันที่จดบันทึก: </strong> {{ $roomrent->date }} </td></tr>
    <tr><td colspan="2" align="left"><strong>หมายเลขไฟ: </strong> {{ $roomrent->fire_number }} <strong>หมายเลขน้ำ: </strong> {{ $roomrent->water_number }}</td></tr>
    <tr><td colspan="2" align="left"><strong>ค่าห้อง: </strong> {{ number_format($roomrent->room_fee,0) }} บาท <strong>ค่าน้ำ: </strong> {{ number_format($roomrent->water_fee) }} บาท</td></tr>
    <tr><td colspan="2" align="left"><strong>ค่าขยะ: </strong> {{ number_format($roomrent->waste_cost) }} บาท <strong>ค่าไฟ: </strong> {{ number_format($roomrent->electricity_fee) }} บาท</td></tr>
    {{-- <tr>
    <td colspan="2">
        <table border="1" width="100%" cellspacing="0" cellpadding="0">
            <tr>
                <th>บ้านเลขที่ </th>
                <th>หมายเลขห้อง </th>
                <th>ชื่อผู้เช่า</th>
                <th>วันที่</th>
                <th>หมายเลขไฟ</th>
                <th>หมายเลขน้ำ </th>
                <th>ค่าห้อง </th>
                <th>ค่าน้ำ</th>
                <th>ค่าขยะ</th>
                <th>ค่าไฟ</th>
            </tr>

            <tr>
                <td align="center">{{ $roomrent->house_number }}</td>
                <td align="center">{{ $roomrent->room_number }}</td>
                <td align="center">{{ $roomrent->tanent_name }}</td>
                <td align="center">{{ $roomrent->date }}</td>
                <td align="center">{{ $roomrent->fire_number }}</td>
                <td align="center">{{ $roomrent->water_number }}</td>
                <td align="center">{{ number_format($roomrent->room_fee) }}</td>
                <td align="center">{{ number_format($roomrent->water_fee) }}</td>
                <td align="center">{{ number_format($roomrent->waste_cost) }}</td>
                <td align="center">{{ number_format($roomrent->electricity_fee) }}</td>
            </tr>
        </table>
    </td>
    </tr> --}}

    <tr> 
        <td>
            <h4>หมายเหตุ</h4>
            <ul>
                <li>ชําระเงินโดยโอนเข้าบัญชีธนาคาร <br><br>
                    <h2><font color=red>

                    @php
                        // ลบช่องว่างหน้า-หลังออกเพื่อความแม่นยำในการเช็ค
                        $houseNo = trim($roomrent->house_number);
                    @endphp

                    @if($houseNo == '43/3')
                        {{-- กรณีบ้านเลขที่ 43/3 --}}
                        ธนาคารออมสิน <br>
                        เลขที่บัญชี: 020443785819 <br> 
                        ชื่อบัญชี: นางชาลี ทวีปะ
                        
                    @elseif($houseNo == '35 หมู่5' || $houseNo == '35 หมู่ 5')
                        {{-- กรณีบ้านเลขที่ 35 หมู่5 (ดักจับทั้งแบบมีเว้นวรรคและไม่มี) --}}
                        ธนาคารไทยพาณิชย์ <br>
                        เลขที่บัญชี: 3722527865 <br> 
                        ชื่อบัญชี: นายสุวิทย์  นิยมมาก

                    @elseif($houseNo == '5 หมู่6' || $houseNo == '5 หมู่ 6')
                        {{-- กรณีบ้านเลขที่ 5 หมู่6 --}}
                        ธนาคารกรุงไทย <br>
                        เลขที่บัญชี: 9817950247 <br> 
                        ชื่อบัญชี: นางสาวสุจิรา นิยมมาก
                    
                    @else
                        {{-- กรณีไม่ตรงกับเงื่อนไขใดเลย (เผื่อไว้ หรือให้แสดงค่า Default) --}}
                        กรุณาติดต่อผู้ดูแลหอพักเพื่อขอเลขที่บัญชี
                    @endif
                    {{-- ธนาคารออมสิน <br> 
                    เลขที่บัญชี: 020443785819 <br> 
                    ชื่อบัญชี: นางชาลี ทวีปะ</font></li></h2><br> --}}
                    </font></h2></li><br>
                <li>กรุณาชําระเงินตั้งแต่วันที่ 1 - 30 ของเดือน </li><br>
                <li>หากชำระเงินหลังวันที่ 5 ของเดือนถัดไปขออนุญาตปรับวันละ 30 บาท</li><br>
                <li>ชําระเงินแล้วส่งหลักฐานการชำระเงินมาที่ไลน์กลุ่มห้องเช่ายายหล่อ </li>

            </ul>
        </td>
        <td align ="right"><strong>จํานวนเงินรวมทั้งสิ้น</strong> <h1>{{ number_format($roomrent->total,0) }} บาท</h1></td>
    </tr>{{--43/3 --}}
    {{--<tr> 
        <td>
            <h4>หมายเหตุ</h4>
            <ul>
                <li>ชําระเงินโดยโอนเข้าบัญชีธนาคาร <br><br>
                    <h2><font color=red>
                    ธนาคารกรุงไทย <br>
                    เลขที่บัญชี: 9817950247 <br> 
                    ชื่อบัญชี: นางสาวสุจิรา นิยมมาก</font></li></h2><br> 
                <li>กรุณาชําระเงินตั้งแต่วันที่ 1 - 30 ของเดือน </li><br>
                <li>หากชำระเงินหลังวันที่ 5 ของเดือนถัดไปขออนุญาตปรับวันละ 30 บาท</li><br>
                <li>ชําระเงินแล้วส่งหลักฐานการชำระเงินมาที่ไลน์กลุ่มห้องเช่ายายหล่อ </li>
                
            </ul>
        </td>
        <td align ="right"><strong>จํานวนเงินรวมทั้งสิ้น</strong> <h1>{{ number_format($roomrent->total,0) }} บาท</h1></td>
    </tr>  {{--5 หมู่ 6 --}}
    
    {{-- <tr>
        <td>
            <h4>หมายเหตุ</h4>
            <ul>
                <li>ชําระเงินโดยโอนเข้าบัญชีธนาคาร <br><br>
                    <h2><font color=red>
                    ธนาคารไทยพาณิชย์ <br>
                    เลขที่บัญชี: 3722527865 <br> 
                    ชื่อบัญชี: นายสุวิทย์  นิยมมาก</font></li></h2><br> 
                <li>กรุณาชําระเงินตั้งแต่วันที่ 1 - 30 ของเดือน </li><br>
                <li>หากชำระเงินหลังวันที่ 5 ของเดือนถัดไปขออนุญาตปรับวันละ 30 บาท</li><br>
                <li>ชําระเงินแล้วส่งหลักฐานการชำระเงินมาที่ไลน์กลุ่มห้องเช่ายายหล่อ </li>
                
            </ul>
        </td>
        <td align ="right"><strong>จํานวนเงินรวมทั้งสิ้น</strong> <h1>{{ number_format($roomrent->total,0) }} บาท</h1></td>
    </tr> {{-- 35 หมู่ 5 --}}
    @if(session('msg'))
        @if(session('ok'))
        <script>toastr.success("{{ session('msg') }}")</script>
        @else
        <script>toastr.error("{{ session('msg') }}")</script>
        @endif
    @endif 
</table>
</body>
</html>
'roomrent','po_no','po_date'