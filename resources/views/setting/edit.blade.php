@extends("layouts.master")
@section('title') ระบบห้องเช่า | แก้ไขข้อมูล @stop
@section('content')
{!! Form::model($setting, array('action' => 'App\Http\Controllers\SettingController@update','method' => 'post', 'enctype' => 'multipart/form-data')) !!}
<input type="hidden" name="id" value="{{ $setting->id }}">
<div class="panel-body">
    <table>
        <tr>
            <td>{{ Form::label('electricity_price', 'ราคาไฟฟ้าต่อหน่วย ') }}</td>
            <td>{{ Form::text('electricity_price', $setting->electricity_price, ['class' => 'form-control']) }} </td>
        </tr>
        <tr>
            <td>{{ Form::label('water_price', 'ราคาน้ำต่อหน่วย ') }}</td>
            <td>{{ Form::text('water_price', $setting->water_price, ['class' => 'form-control']) }}</td>
        </tr>
    </table>
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
@endsection

