@extends('user.layout.main')
@section('content')

<?php

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

if (auth()->user()) {
    $carts = Cart::where('user_id', Auth::user()->id)->get();
} else {
    $carts = null;
}
// $orders_details = OrderDetails::latest()->get();
?>

<section class="page-header">
    <h2>#CART</h2>
    <p>Save more with coupons $ up to 50% off!</p>
</section>

<div class="message-container">
    <div class="alert_main">
        @if(session('message'))
        <div class="alert">
            {{session('message')}}
        </div>
        @endif
    </div>
</div>

<section class="bill-detail section-m1 section-p1">
    <div class="form">
        <form action="/place-order" method="post">
            @csrf
            <h3>BILLING DETAILS</h3>
            <div class="form-col">
                <input type="text" name="name" placeholder="Full Name" required>
            </div>
            <div class="form-col">
                <input type="text" id="address" name="address" placeholder="Delivery address" required>
            </div>

            <div class="form-col">
                <input type="tel" name="phone" placeholder="Phone No." required>
            </div>

            <div class="form-col">
                <input type="text" name="email" placeholder="Email (option)">
            </div>
            <div class="form-col">
                <textarea id="order_note" name="note" placeholder="Enter some order notes here" cols="30" rows="10"></textarea>
            </div>
            <div class="form-col">
                <h2>Payment Method</h2>
                <div class="radio-row">
                    <div class="radio-col">
                        <input type="radio" name="payment_method" value="cod" id="radio1">
                        <label for="radio1">
                            <img src="{{asset('user/assets/photo/cash-removebg-preview.png')}}" alt="Cash on delivery">
                        </label>
                    </div>

                    <div class="radio-col">
                        <input type="radio" name="payment_method" value="khalti" id="radio1">
                        <label for="radio2">
                            <img src="{{asset('user/assets/photo/khalti.png')}}" alt="Khalti">
                        </label>
                    </div>
                </div>
            </div>
            <button type="submit" class="hero-btn">Proceed to Pay</button>
        </form>
    </div>

    <div class="bill-table">
        <div>
            <h3>Your Order</h3>
            <table>
                <thead>
                    <tr>
                        <td>Food</td>
                        <td>Total</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    ?>
                    @foreach($carts as $cart)
                    <tr>
                        <td> {{$cart->food['food_name']}}<strong>* {{$cart->quantity}}</strong></td>
                        <td> {{$cart->unit_price}}</td>
                    </tr>
                    <?php
                    $total = $total + ($cart->quantity * $cart->unit_price);
                    ?>
                    @endforeach
                </tbody>
                <tfoot>
                    <td>Total</td>
                    <td>{{$total}}</td>
                </tfoot>
            </table>
        </div>



    </div>

</section>
@endsection