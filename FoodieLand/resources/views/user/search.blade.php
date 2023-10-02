@extends('user.layout.main')
@section('content')



<section class="page-header">
    <h2>STAY FOOD</h2>
    <p>Save more with coupons $ up to 50% off!</p>
</section>

<section class="food-item section-m1">
    <div class="pro-container">
        <h2 style="width: 100%">Search for results:  {{$searchTerm}}</h2>
        @if(count($foods) <= 0)
        <h4 style="color:red">No found found: {{$searchTerm}}</h4>
        @else
        @foreach($foods as $food)
        <div class="pro">
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
        @endif
    </div>
</section>
@endsection