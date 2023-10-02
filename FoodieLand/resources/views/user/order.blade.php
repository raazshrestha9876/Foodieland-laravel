@extends('user.layout.main')
@section('content')

<?php


use App\Models\Order;
use App\Models\OrderDetails;

$orders = Order::latest()->get();
$order_details = OrderDetails::latest()->get();
?>
<div class="message-container">
    <div class="alert_main">
        @if(session('message'))
        <div class="alert">
            {{session('message')}}
        </div>
        @endif
    </div>
</div>

<section class="cart section-p1 section-m1">
    <h3 style="margin-bottom:40px">My Order History</h3>
    <table width="100%">
        <thead>
            <tr>
                <td>ORDER ID</td>
                <td>ORDER CODE</td>
                <td>ITEM</td>
                <td>DELIVERY TIME</td>
                <td>ORDER STATUS</td>
                <td>ACTION</td>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->order_code}}</td>
                <td>
                    @foreach($order->order_details as $item)
                    <span>{{$item->food['food_name']}}</span>
                    @endforeach
                </td>
                <td>{{$order->delivery_time}}</td>
                <td>{{$order->order_status}}</td>
                <td>
                    @if($order->order_status == 'delivering' || $order->order_status == 'delivered')
                    <p style="font-size:12px">Unable to Cancel</p>
                    <!-- <button class="hero-btn"><a href="/cancel-order/{{$order->id}}" style="color:#fff; text-decoration:none">Cannot Cancel</a></button> -->
                    @else
                    <button type="submit" class="hero-btn"><a href="/cancel-order/{{$order->id}}" style="color:#fff; text-decoration:none">Cancel</a></button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>

@endsection