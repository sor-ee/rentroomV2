@extends("layouts.master")
@section('content')
<div class="container">
<h1>สรุป</h1>

<div class="breadcrumb">
<li><a href="{{ URL::to('roomrent') }}"><i class="fa fa-home"></i> หน้าแรก</a></li>
<li><a href="{{ URL::to('roomrent/calc/'.$roomrent->id) }}">คำนวณห้องเช่า</a></li>
<li class="active">สรุป</li>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel-body">
            {!! Form::model($roomrent, array('action' => 'App\Http\Controllers\RoomrentController@updateconclude','method' => 'post', 'enctype' => 'multipart/form-data')) !!}
            <input type="hidden" name="id" value="{{ $roomrent->id }}">
            <table>
                <tr>
                    <td>{{ Form::label('house_number', 'บ้านเลขที่ ') }}</td>
                    <td>{{ Form::text('house_number', $roomrent->house_number, ['class' => 'form-control','readonly' => 'true']) }} </td>
                </tr>
                <tr>
                    <td>{{ Form::label('room_number', 'หมายเลขห้อง ') }}</td>
                    <td>{{ Form::text('room_number', $roomrent->room_number, ['class' => 'form-control','readonly' => 'true']) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('tanent_name', 'ชื่อผู้เช่า ') }}</td>
                    <td>{{ Form::text('tanent_name', $roomrent->tanent_name, ['class' => 'form-control','readonly' => 'true']) }}</td>
                </tr>
                <tr>
                    <?php 
                    use Illuminate\Support\Carbon;
                    use Phattarachai\Thaidate\ThaidateServiceProvider;

                    $dates = Carbon::parse( $roomrent->date )->thaidate('l j F Y');
                    ?>
                    <td>{{ Form::label('date', 'วันที่ ') }}</td>
                    <td>{{ Form::text('date', $dates, ['class' => 'form-control','readonly' => 'true']) }} </td>
                </tr>
                <tr>
                    <td>{{ Form::label('old_fire_number', 'หมายเลขไฟเก่า ') }}</td>
                    <td>{{Form::text('old_fire_number', $roomrent->old_fire_number, ['class' => 'form-control','readonly' => 'true']) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('old_water_number', 'หมายเลขน้ำเก่า ') }}</td>
                    <td>{{ Form::text('old_water_number', $roomrent->old_water_number, ['class' => 'form-control','readonly' => 'true']) }}</td>
                </tr>
                <tr>
                <tr>
                    <td>{{ Form::label('fire_number', 'หมายเลขไฟ ') }}</td>
                    <td>{{Form::text('fire_number', $roomrent->fire_number, ['class' => 'form-control','readonly' => 'true']) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('water_number', 'หมายเลขน้ำ ') }}</td>
                    <td>{{ Form::text('water_number', $roomrent->water_number, ['class' => 'form-control','readonly' => 'true']) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('room_fee', 'ค่าห้อง ') }}</td>
                    <td>{{ Form::text('room_fee', $roomrent->room_fee, ['class' => 'form-control','readonly' => 'true']) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('waste_cost', 'ค่าขยะ ') }}</td>
                    <td>{{ Form::text('waste_cost', $roomrent->waste_cost, ['class' => 'form-control','readonly' => 'true']) }}</td>
                </tr>
                <?php $sum_electricity_fee = 0 ?>
                <?php 
                    if ($roomrent->fire_number < $roomrent->old_fire_number)  {
                        $sum_electricity_fee +=  ((10000 - $roomrent->old_fire_number) + $roomrent->fire_number) * $setting->electricity_price;
                    }elseif ($roomrent->fire_number >= $roomrent->old_fire_number) {
                        $sum_electricity_fee += ($roomrent->fire_number - $roomrent->old_fire_number) * $setting->electricity_price;
                    }
                ?>
                <?php $sum_water_fee = 0 ?>
                <?php 
                    if ($roomrent->water_number < $roomrent->old_water_number)  {
                        $sum_water_fee =  ((1000 - $roomrent->old_water_number) + $roomrent->water_number) * $setting->water_price;
                    }elseif ($roomrent->water_number >= $roomrent->old_water_number) {
                        $sum_water_fee = ($roomrent->water_number - $roomrent->old_water_number) * $setting->water_price;
                    }
                ?>
                <?php $sum = 0 ?>
                <?php $sum = $roomrent->room_fee + $roomrent->waste_cost + $sum_electricity_fee + $sum_water_fee?>
                <tr>
                    <td>{{ Form::label('electricity_fee', 'ค่าไฟ ') }}</td>
                    <td>{{Form::text('electricity_fee', $sum_electricity_fee, ['class' => 'form-control','readonly' => 'true']) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('water_fee', 'ค่าน้ำ ') }}</td>
                    <td>{{ Form::text('water_fee', $sum_water_fee, ['class' => 'form-control','readonly' => 'true']) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('total', 'รวม ') }}</td>
                    <td>{{ Form::text('total', $sum, ['class' => 'form-control','readonly' => 'true']) }}</td>
                </tr>
                
            </table>
        </div>
            <tfoot>
            <tr>
                <a href="{{ URL::to('roomrent/calc/'.$roomrent->id) }}" class="btn btn-default">ย้อนกลับ </a>
                <div class="pull-right">
                <a href="{{ URL::to('roomrent') }}" class="btn btn-success">กลับสู่หน้าหลัก </a>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> พิมพ์บิล</button>
                {{-- <button type="submit" class="btn btn-primary"> พิมพ์บิล</button> --}}
                {{-- <a type="submit" id="print_bill" href="" class="btn btn-primary"><i class="fa fa-save"></i> พิมพ์บิล</a> --}}
            </tr>
            </tfoot>
            {!! Form::close() !!}
        </table>
    
    </div>
</div>

@if($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif
</div>
</div>
{{-- <script> 
    setTimeout(() => {

        document.querySelector('#print_bill').addEventListener('click', () => {
            window.open (
            "{{ URL::to('roomrent/complete/'.$roomrent->id) }}", 
            "_blank"
        );

        });

    }, 5000);
</script>--}}
@stop