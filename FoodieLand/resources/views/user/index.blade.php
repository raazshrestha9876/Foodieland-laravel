@extends('user.layout.main')
@section('content')

<?php

use App\Models\Food;
use App\Models\Category;

$foods = Food::take(8)->get();
$categories = Category::take(6)->get();
?>

<section class="hero-section">
    <h2>DISCOUNTED OFFER</h2>
    <h1>GOOD AND TASTY FOOD</h1>
    <p>Save more with coupons $ up to 50% off!</p>
    <button class="hero-btn">Order Now</button>
</section>

<section class="category-section section-m1">
    <div class="head-desc">
        <div class="desc-1">
            <h2>Categories</h2>
            <span>Inspired by your interests</span>
        </div>
        <div class="desc-2">
            <button class="hero-btn">See More<i class="fa fa-angle-right" aria-hidden="true"></i>
            </button>
        </div>

    </div>
    <div class="menu">
        @foreach($categories as $category)
        <div class="menu-col category1" onclick="window.location.href='/view-category/{{$category->slug}}'">
            <div class="menu-icon">
                <img src="{{$category->category_image}}" alt="">
            </div>
            <h4>{{$category->category_name}}</h4>
        </div>
        @endforeach

    </div>

</section>

<section class="food-item section-m1">
    <h2>Our Popular Dishes</h2>
    <div class="pro-container">

        @foreach($foods as $food)
        <div class="pro" onclick="window.location.href='/viewSingleFood/{{$food->id}}'">
            <img src="{{$food->food_image}}" alt="{{$food->food_name}}">
            <div class="desc">
                <span>{{$food->category['category_name']}}</span>
                <h4>{{$food->food_name}}</h4>
                <div class="star">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <h4>{{$food->food_price}}</h4>
            </div>
            <a href="/add-to-wishlist/{{$food->id}}"><i class="fa fa-heart wishlist"></i></a>
            <a href=""><i class="fa fa-shopping-bag cartlist"></i></a>
        </div>
        @endforeach
    </div>

</section>

<section class="foodie-banner section-m1">>
    <div class="sm-banner section-p1 ">
        <div class="banner-box">
            <h4>Crazy deals</h4>
            <h2>Buy 2 item on 20% discount</h2>
            <span>The best classic food is on offer at Foodie Land</span>
            <button class="hero-btn">Explore More</button>
        </div>
        <div class="banner-box banner-box2">
            <h4>Crazy deals</h4>
            <h2>Buy 2 item on 20% discount</h2>
            <span>The best classic food is on offer at Foodie Land</span>
            <button class="hero-btn">Explore More</button>
        </div>

    </div>
    <div class="banner-3">
        <div class="banner-box">
            <h2>Crazy deals</h2>
            <h3>Buy 2 item - 20% OFF</h3>


        </div>
        <div class="banner-box banner-box2">
            <h2>Crazy deals</h2>
            <h3>Buy 2 item - 20% OFF</h3>


        </div>
        <div class="banner-box banner-box3">
            <h2>Crazy deals</h2>
            <h3>Buy 2 item - 20% OFF</h3>

        </div>

    </div>
</section>

@endsection