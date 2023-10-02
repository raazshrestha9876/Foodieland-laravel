@extends('admin.layouts.main')
@section('content')
<div class="container w-75 my-5">
  <div class="modal-body border-class">
    <div class="header-order d-flex justify-content-between">
      <span>item</span>
      <span>Quantity</span>
      <span>Unit Price</span>
      <span>Total</span>
    </div>
    @foreach($order->order_details as $item)
    <div class="item d-flex justify-content-between">
      <span>{{$item->food['food_name']}}</span>
      <span>{{$item->quantity}}</span>
      <span>{{$item->unit_price}}</span>
      <span>{{$item->quantity * $item->unit_price}}</span>
    </div>
    @endforeach
  </div>
  <div class="back-container">
    <form action="/change-order-details/{{$order->id}}" method="post">
      @csrf
      <div class="form-group">
        <label for="">Payment Status</label>
        <select name="payment_status" id="">
          <option value="unpaid">Unpaid</option>
          <option value="paid">Paid</option>
        </select>
      </div>
      <div class="form-group">
        <label for="">Order Status</label>
        <select name="order_status" id="">
          <option value="pending">Pending</option>
          <option value="delivering">Delivering</option>
          <option value="delivered">Delivered</option>
        </select>
      </div>
      <div class="form-group">
        <label for="">Update Delivery Time</label>
        <select name="delivery_time" id="">
          <option value="30min">30min</option>
          <option value="40min">40min</option>
          <option value="50min">50min</option>
          <option value="1hr">1 Hour</option>
        </select>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary my-2 mx-2" data-bs-dismiss="modal">Close</button>
        <input type="submit" value="submit" class="btn btn-primary my-2 mx-2">
      </div>
    </form>
  </div>
</div>
@endsection