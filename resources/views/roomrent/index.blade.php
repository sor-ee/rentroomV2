@extends("layouts.master")
@section('title') ระบบห้องเช่า | ห้องเช่า/บ้านเช่า @stop
@section('content')
<div class="container">
    <h1>ห้องเช่า/บ้านเช่าทั้งหมด </h1>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title"><strong>รายการ</strong></div>
        </div>
        <div class="panel-body">
            <form action="{{ URL::to('roomrent/search') }}" method="post" class="form-inline">
            {{ csrf_field() }}
            <form action="" class="form-inline">
            <input type="text" name="q" class="form-control" placeholder="พิมพ์บ้านเลขที่/หมายเลขห้อง">
            <button type="submit" class="btn btn-primary">ค้นหา</button>
            <a href="{{ URL::to('roomrent/edit') }}" class="btn btn-success pull-right">เพิ่มห้องเช่า
            </a>
            </form>
        </div>
        <table class="table table-bordered bs-table">
            <thead>
            <tr>
            <th>บ้านเลขที่</th>
            <th>หมายเลขห้อง </th>
            <th>ประเภท</th>
            <th>การทํางาน</th>
            </tr>
            </thead>

            <tbody>
            @foreach($roomrents as $p)
            <tr>
            <td>{{ $p->house_number }}</td>
            <td>{{ $p->room_number }}</td>
            <td>{{ $p->category->name }}</td>
            <td>
            <a href="{{URL::to('roomrent/calc/'.$p->id)}}" class="btn btn-success "><i class="fa fa-edit"></i> เลือก</a>
            <a href="{{URL::to('roomrent/edit/'.$p->id)}}" class="btn btn-info"><i class="fa fa-edit"></i> แก้ไข</a>
            <a href="#" class="btn btn-danger btn-delete" id-delete="{{ $p->id }}"><i class="fa fa-trash"></i> ลบ</a>
            </td>
            
            </tr> @endforeach
            </tbody>
        </table>
    </div>
    <div class="panel-footer"></div>
</div>
<script>
    $('.btn-delete').on('click', function() { if(confirm("คุณต้องการลบข้อมูลห้องเช่าหรือไม่?")) {
    var url = "{{ URL::to('roomrent/remove') }}"
    + '/' + $(this).attr('id-delete'); window.location.href = url;
    }
    });
    </script>
@endsection