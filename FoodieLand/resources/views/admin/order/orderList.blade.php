@extends('admin.layouts.main')
@section('content')



<div class="container my-5 ">

  <h3 class="text-center text-success p-2">VIEW ORDER ITEM</h3>
  <table id="useful">
    <thead>
      <tr>
        <th width="30%">Order Details</th>
        <th>Order Status</th>
        <th>Payment Status</th>
        <th>Order Total Amount</th>
        <th>Delivery Time</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($orders as $order)
      <tr>
        <td>
          <p>Order ID: {{$order->id}}</p>
          <p>Tracking Number:{{$order->order_code}}</p>
          <p>Customer Name: {{$order->name}}</p>
          <p>Customer Phone:{{$order->phone}}</p>
          <p>Customer address:{{$order->address}}</p>
          <p>Customer email:{{$order->email}}</p>
          <p>Customer note:{{$order->note}}</p>
          <p>Order Time: {{$order->created_at->format('H:i')}}</p>
          <p>Order Payment method: {{$order->payment_method}}</p>
          
        </td>
        <td>
          {{$order->order_status}}
        </td>
        <td>
          {{$order->payment_status}}
        </td>
        <td>
          NPR {{$order->order_total}}
        </td>
        <td>
          {{$order->delivery_time}}
        </td>
        <td>
          <button class="btn btn-primary"><a  class = "text-light" href="/view-order/{{$order->id}}">View Orders</a></button>
          <!-- <button class="btn btn-primary"><a class="text-light" href="/view-tracking/{{$order->id}}">Track Orders</a></button> -->
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection