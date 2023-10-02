@extends('user.layout.main')
@section('content')

<?php

use App\Models\Cart;

if (auth()->user()) {
    $carts = Cart::where('user_id', auth()->user()->id)->get();
} else {
    $carts = null;
}

?>

`@if(Auth::user())
<section class="page-header">
    <h2>#CART</h2>
    <p>Save more with coupons $ up to 50% off!</p>
</section>

<section class="cart section-p1 section-m1">

    <table width="100%">
        <thead>
            <tr>
                <td>IMAGE</td>
                <td>FOOD</td>
                <td>PRICE</td>
                <td>QUANTITY</td>
                <td>SUBTOTAL</td>
                <td>REMOVE</td>
            </tr>
        </thead>
        <tbody>
            <!-- <span class="cart_quantity">{{$carts->count()}}</span> -->
            <?php $total = 0; ?>
             @foreach($carts as $cart) 
            <tr> 
                <td><img src="{{asset($cart->food['food_image'])}}" alt=""></td>
                <td>{{$cart->food['food_name']}}</td>
                <td>{{$cart->food['food_price']}}</td>
                <td>{{$cart->quantity}}</td>
                <td>Qty: {{$cart->quantity}} X <span>Rs {{$cart->unit_price}} </td>
                <td><a href="/delete-cart/{{$cart->id}}"><i class="fa fa-times-circle" style="font-size:24px"></i></a></td>
            </tr>

            <?php 
            $total = $total + ($cart->unit_price * $cart->quantity); 
            ?>
            @endforeach
        </tbody>
    </table>
</section>


<section class="cart-add section-p1 section-m1">
    <div class="coupon">
        <h3>Apply Coupon</h3>
        <div>
            <input type="text" placeholder="Enter Your Coupon">
            <button class="hero-btn">Apply</button>
        </div>
    </div>
    <div class="subtotal">
        <h3>Cart Total</h3>
       

        <table>
            <!-- <tr>
                <td>Cart Subtotal</td>
                <td>{{$total}}</td>
            </tr> -->
            <tr>
                <td>Delivery Charge</td>
                <td>Free</td>
            </tr>
            <tr>
                <td><strong>Total</strong></td>
                <td><strong>{{$total}}</strong></td>
            </tr>
        </table>
        <button class="hero-btn"><a href="/orderCheckOut/user" style="text-decoration:none; color:#fff">Proceed to checkout</a></button>
    </div>

</section>
@endif

@endsection