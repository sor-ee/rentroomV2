@extends("layouts.master")
@section('title') ระบบห้องเช่า | คำนวณค่าใช้จ่ายห้องเช่า @endsection
@section('content')
<div class="container" ng-app="app" ng-controller="ctrl">
    <h1>@{ helloMessage }</h1>
    <div class="row">
        <div class="pull-right" style="margin-top:10px">
            <input type="text" class="form-control" ng-model="query.house_number" placeholder="พิมพ์บ้านเลขที่เพื่อค้นหา">
        </div>
        <div class="col-md-3">
            <h3>ประเภท</h3>
            <div class="list-group">
                <a href="#" class="list-group-item" ng-class="{'active': category == null}" ng-click="getRoomrentList(null)">ทั้งหมด</a>
                <a href="#" class="list-group-item" ng-repeat="c in categories" ng-click="getRoomrentList(c)" ng-class="{'active': category.id == c.id}">@{c.name}</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-3" ng-repeat="r in roomrent = (roomrents|filter:query)">
                    <!-- roomrent card -->
                    <div class="panel panel-default bs-product-card">
                        <div class="panel-body">
                            <h4><a href="#">บ้านเลขที่: @{ r.house_number }</a></h4>
                            
                            <div class="form-group">
                                <div>หมายเลขห้อง: @{r.room_number}</div>
                            </div>
                            <a href="#" class="btn btn-success btn-block" ng-click="select(r)">
                            <i class="fa fa-shopping-cart"></i> เลือก</a>
                        
                        </div>
                    </div>
                    <!-- end roorent card -->
                </div>
                <div style="text-align: center">
                    <h3 ng-if="!roomrent.length">ไม่พบข้อมูลห้องเช่า </h3>
                </div>
            </div>
        </div>
        
    </div>
</div>
<script type="text/javascript">
var app = angular.module('app', []).config(function ($interpolateProvider) {
$interpolateProvider.startSymbol('@{').endSymbol('}');
});
app.controller('ctrl',function ($scope,roomrentService) {
    $scope.helloMessage = 'ยินดีต้อนรับสู่การคำนวณค่าเช่า';
    $scope.roomrents = [];
    $scope.category = {};
    $scope.getRoomrentList = function (category) {
        $scope.category = category;
        category_id = category != null ? category.id : '';
        roomrentService.getRoomrentList(category_id).then(function (res) {
            if(!res.data.ok) return;
            $scope.roomrents = res.data.roomrents;
        });
    };
    $scope.getRoomrentList(null);
    $scope.categories = [];
    $scope.getCategoryList = function () {
        roomrentService.getCategoryList().then(function (res) {
            if(!res.data.ok) return;
                $scope.categories = res.data.categories;
        });
    };
    $scope.getCategoryList();
    $scope.select = function (p) {
        window.location.href = '/calc/add/' + p.id;
    }
});
app.service('roomrentService',function($http) {
    this.getRoomrentList = function (category_id) {
        if(category_id) {
            return $http.get('/api/roomrent/' + category_id);
        }
        return $http.get('/api/roomrent');
    };
    this.getCategoryList = function () {
        return $http.get('/api/category');
    };
    
});
</script>
@endsection
