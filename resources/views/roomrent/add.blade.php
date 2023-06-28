@extends("layouts.master") @section('title') ระบบห้องเช่า | เพิ่มห้องเช่า @stop
@section('content')
<div class="container">
    <h1>เพิ่มข้อมูลห้องเช่า </h1>
    <ul class="breadcrumb">
        <li><a href="{{ URL::to('roomrent') }}">หน้าแรก</a></li>
        <li class="active">เพิ่มห้องเช่า </li>
    </ul>
    {!! Form::open(array('action' => 'App\Http\Controllers\RoomrentController@insert',
    'method'=>'post', 'enctype' => 'multipart/form-data')) !!}
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
            <td>{{ Form::text('house_number', Request::old('house_number'), ['class' => 'form-control']) }}</td>
            </tr>
            <tr>
            <td>{{ Form::label('room_number', 'หมายเลขห้อง ') }}</td>
            <td>{{ Form::text('room_number', Request::old('room_number'), ['class' => 'form-control']) }}</td>
            </tr>
            <tr>
            <td>{{ Form::label('category_id', 'ประเภท ') }}</td>
            <td>{{ Form::select('category_id', $categories, Request::old('category_id'),
            ['class' => 'form-control']) }}</td>
            </tr>
            </table>
        </div>
        <div class="panel-footer">
            <a href="{{URL::to('/roomrent')}}"class="btn btn-danger">ยกเลิก</a>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
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