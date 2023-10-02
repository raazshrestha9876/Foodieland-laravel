@extends('admin.layouts.main')
@section('content')

<?php

use App\Models\Food;
use App\Models\Category;
use App\Models\Order;


$foods = Food::latest()->get();
$orders = Order::latest()->get();
$categories = Category::latest()->get();


?>


<section class="dashboard">
    <h3 class="i-name">
        Dashboard
    </h3>
    <div class="values">
        <div class="val-box">
            <i class="fa fa-users"></i>
            <div>
                <h3>{{Auth::user()->count()}}</h3>
                <span>Customers</span>
            </div>
        </div>
        <div class="val-box">
            <i class="fa fa-users"></i>
            <div>
                <h3>{{$categories->count()}}</h3>
                <span>Category</span>
            </div>
        </div>
        <div class="val-box">
            <i class="fa fa-users"></i>
            <div>
                <h3>{{$foods->count()}}</h3>
                <span>Food</span>
            </div>
        </div>
        <div class="val-box">
            <i class="fa fa-users"></i>
            <div>
                <h3>{{$orders->count()}}</h3>
                <span>Total Orders</span>
            </div>
        </div>
       
    </div>
    <div class="charts">
        <div class="charts-card">
            <p class="chart-title">Top 5 foods</p>
            <div id="bar-chart"></div>
        </div>
        <div class="charts-card">
            <p class="chart-title">Sales orders</p>
            <div id="area-chart"></div>
        </div>
    </div>

</section>

@endsection