@extends("layouts.master") @section('title') ระบบห้องเช่า | คำนวณห้องเช่า @stop
@section('content')
<div class="container">
    <h1>คำนวณค่าใช้จ่ายห้องเช่า </h1>
    <ul class="breadcrumb">
        <li><a href="{{ URL::to('roomrent') }}">หน้าแรก</a></li>
        <li class="active">คำนวณห้องเช่า </li>
    </ul>
    {!! Form::model($roomrent, array('action' => 'App\Http\Controllers\RoomrentController@updatecalc','method' => 'post', 'enctype' => 'multipart/form-data')) !!}
    <input type="hidden" name="id" value="{{ $roomrent->id }}">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                <strong>ข้อมูลห้องเช่า </strong>
            </div>
        </div>
        <div class="panel-body">
            <table>
                <tr>
                    <td>{{ Form::label('house_number', 'บ้านเลขที่ ') }}</td>
                    <td>{{ Form::text('house_number', $roomrent->house_number, ['class' => 'form-control']) }} </td>
                </tr>
                <tr>
                    <td>{{ Form::label('room_number', 'หมายเลขห้อง ') }}</td>
                    <td>{{ Form::text('room_number', $roomrent->room_number, ['class' => 'form-control']) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('tanent_name', 'ชื่อผู้เช่า ') }}</td>
                    <td>{{ Form::text('tanent_name', $roomrent->tanent_name, ['class' => 'form-control']) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('date', 'วันที่ ') }}</td>
                    <td><input type="date" {{ Form::text('date',$roomrent->date , ['class' => 'form-control']) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('old_fire_number', 'หมายเลขไฟเก่า ') }}</td>
                    <td>{{Form::text('old_fire_number', $roomrent->old_fire_number, ['class' => 'form-control']) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('old_water_number', 'หมายเลขน้ำเก่า ') }}</td>
                    <td>{{ Form::text('old_water_number', $roomrent->old_water_number, ['class' => 'form-control']) }}</td>
                </tr>
                <tr>
                <tr>
                    <td>{{ Form::label('fire_number', 'หมายเลขไฟ ') }}</td>
                    <td>{{Form::text('fire_number', $roomrent->fire_number, ['class' => 'form-control']) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('water_number', 'หมายเลขน้ำ ') }}</td>
                    <td>{{ Form::text('water_number', $roomrent->water_number, ['class' => 'form-control']) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('room_fee', 'ค่าห้อง ') }}</td>
                    <td>{{ Form::text('room_fee', $roomrent->room_fee, ['class' => 'form-control']) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('waste_cost', 'ค่าขยะ ') }}</td>
                    <td>{{ Form::text('waste_cost', $roomrent->waste_cost, ['class' => 'form-control']) }}</td>
                </tr>
            </table>
        </div>
        <div class="panel-footer">
            <a href="{{URL::to('/roomrent')}}"class="btn btn-danger">ยกเลิก</a>
            {{-- <button type="reset" class="btn btn-danger">ยกเลิก</button> --}}
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
            {{-- <a href="{{URL::to('roomrent/conclude/'.$roomrent->id)}}"class="btn btn-primary">สรุป</a> --}}
        </div>
    </div>
    
    {!! Form::close() !!}
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif
    
</div>
@endsection 
