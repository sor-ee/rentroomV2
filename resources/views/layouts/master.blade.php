<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<title>@yield("title", "ระบบห้องเช่า")</title>
<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/toastr/toastr.min.css') }}">
<script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
<script src="{{ asset('js/angular.min.js') }}"></script>
<script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>
</head>

<body>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
    <div class="navbar-header">
    <a class="navbar-brand" href="#">ระบบห้องเช่า</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
    {{-- <li><a href="{{URL::to('home')}}">หน้าแรก</a></li> --}}
    <li><a href="{{URL::to('roomrent')}}">ข้อมูลห้องเช่า</a></li>
    <li><a href="{{URL::to('setting/edit/3')}}">การตั้งค่า</a></li>   
    <li><a href="#">บิล</a></li>
    </ul>
    </div>
    </div>
    </nav> @yield("content")
    @if(session('msg'))
@if(session('ok'))
    <script>toastr.success("{{ session('msg') }}")</script>
@else
    <script>toastr.error("{{ session('msg') }}")</script>
@endif
@endif
</body>
</html>