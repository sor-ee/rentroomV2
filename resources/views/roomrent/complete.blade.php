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
    <tr><td colspan="2" align="center"><h3>บิลค่าเช่าห้อง</h3><h4>(Room rental bill)</h4></td></tr>
    <tr>
        <td align="right"><strong>เลขที่:</strong></td><td>{{ $po_no }}</td>
        {{-- <tr><td><strong>วันที่:</strong></td><td>{{ $po_date }}</td></tr> --}}
    </tr>
    
    <tr><td colspan="2" align="center"><strong>บ้านเลขที่: </strong> {{ $roomrent->house_number }} </td></tr>
    <tr><td colspan="2" align="center"><strong>หมายเลขห้อง:</strong>  {{ $roomrent->room_number }} </td></tr>
    <tr><td colspan="2" align="left"><strong>ชื่อผู้เช่า: </strong> {{ $roomrent->tanent_name }} </td></tr>
    <tr><td colspan="2" align="left"><strong>วันที่จดบันทึก: </strong> {{ $roomrent->date }} </td></tr>
    <tr><td colspan="2" align="left"><strong>หมายเลขไฟ: </strong> {{ $roomrent->fire_number }} <strong>หมายเลขน้ำ: </strong> {{ $roomrent->water_number }}</td></tr>
    <tr><td colspan="2" align="left"><strong>ค่าห้อง: </strong> {{ number_format($roomrent->room_fee,0) }} <strong>ค่าน้ำ: </strong> {{ number_format($roomrent->water_fee) }}</td></tr>
    <tr><td colspan="2" align="left"><strong>ค่าขยะ: </strong> {{ number_format($roomrent->waste_cost) }} <strong>ค่าไฟ: </strong> {{ number_format($roomrent->electricity_fee) }}</td></tr>
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
                <li>กรุณาชําระเงินภายใน 7 วัน หลังจากวันที่ {{ $po_date }}</li>
            </ul>
        </td>
        <td align ="right"><strong>จํานวนเงินรวมทั้งสิ้น</strong> <h1>{{ number_format($roomrent->total,0) }} บาท</h1></td>
        {{-- @if(session('msg'))
        @if(session('ok'))
        <script>toastr.success("{{ session('msg') }}")</script>
        @else
        <script>toastr.error("{{ session('msg') }}")</script>
        @endif
        @endif --}}
    </tr>
</table>
</body>
</html>
'roomrent','po_no','po_date'