<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodie Land</title>
    <link rel="stylesheet" href="{{asset('user/assets/css/style.css')}}">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_api_key') }}&libraries=places"></script>
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
</head>

<body>
    <?php

    
    use App\Models\Cart;
    
    use App\Models\Wishlist;

    if (auth()->user()) {
        $carts = Cart::where('user_id', auth()->user()->id)->get();
    } else {
        $carts = null;
    }


    if (auth()->user()) {
        $wishlists = Wishlist::where('user_id', auth()->user()->id)->get();
    } else {
        $wishlists = null;
    }

    ?>
    <header>
        <section class="panel">
            <div class="phone-panel">
                <i class="fa fa-phone"></i>
                <h2>CALL:+977-9810480972</h2>
            </div>
            <div class="panel-link">
                <ul>
                    <!-- <li>
                        <i class="fa fa-phone-o" aria-hidden="true"></i>
                        <a href="">CONTACT US</a>
                    </li> -->
                    <li>
                        <i class="fa fa-user-circle-o" onclick="toggleMenu()"></i>
                        <div class="sub-menu-wrap" id="subMenu">
                            @if(Auth::check())
                            <div class="sub-menu">
                                <div class="user-info">
                                    <h4><span>Profile:</span> {{Auth::user()->name}}</h4>
                                    <p>Email: {{Auth::user()->email}}</p>
                                </div>
                                <hr>
                                <ul>
                                    @if(Auth::user())
                                    <li><a class="hero-btn" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    @else
                                    <li><a class="hero-btn" href="/login">Login</a>
                                    </li>
                                    <li class="hero-btn"><a href="/register">Sign up</a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                            @else
                            <div class="sub-menu">
                                <div class="user-info">
                                    <h4>Welcome, guest</h4>
                                </div>
                                <hr>
                                <ul>
                                    <li class="hero-btn"><a href="/register">Sign up</a>
                                    </li>
                                </ul>
                            </div>
                            @endif

                        </div>
                    </li>
            </div>
        </section>

        <section class="nav-header">
            <a href="#"><img src="{{asset('user/assets/photo/logo.png')}}" class="logo" alt=""></a>
            <form action="/search-food" method="GET">
                <div class="nav-search">
                    <select>
                        <option value="#">All</option>
                    </select>
                    <input type="text" name="search" placeholder="Search FoodieLand">
                    <div class="search-icon">
                        <button type="submit" style="border:none;width:80%;height:80%;background:#febd68"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>

            <div>
                <ul class="nav-items">
                    <li>
                        <a href="/index">Home</a>
                    </li>
                    <li>
                        <a href="/viewFoods">Dishes</a>
                    </li>
                    <li>
                        <a href="/orderList">Order</a>
                    </li>
                    <li>
                        <a href="#">About Us</a>
                    </li>
                    <li>
                        @if(Auth::user())
                        <a href="/addToCart"><i class="fa fa-shopping-bag"><span>{{$carts->count()}}</span></i></a>
                        @endif
                    </li>
                    <li>
                        @if(Auth::user())
                        <a href="/addToWishlist"><i class="fa fa-heart"><span>{{$wishlists->count()}}</span></i></a>
                        @endif
                    </li>

                </ul>
            </div>
        </section>
    </header>

    <!--main-content-->
    @yield('content')
    <!--main-content-->

    <!--testimonials-->
    <section class="testimonials section-m1">
        <h1>Customer Review</h1>
        <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae,
            temporibus.
        </p>
        <div class="testimonial-row">
            <div class="testimonial-col">
                <img src="{{asset('user/assets/photo/man.jpg')}}" />
                <div>
                    <p>Variety is another aspect that impressed me. The food system offers an extensive range of options to cater to different dietary needs and preferences. Whether you follow a vegan, gluten-free, or keto lifestyle, there is something for everyone. The thoughtfulness in crafting menus and recipes ensures that no one feels excluded or limited in their choices, making it accessible to a wide customer base.</p>
                    <h3>Christina Shrestha</h3>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <i class="fa fa-star-o"></i>
                </div>
            </div>
            <div class="testimonial-col">
                <img src="{{asset('user/assets/photo/cheerful-curly-business-girl-wearing-glasses-removebg-preview.png')}}" />
                <div>
                    <p>I recently had the opportunity to experience a truly remarkable food system that has left me in awe of its innovation, sustainability, and impact on both the environment and our overall well-being. As a customer, I feel compelled to share my enthusiasm and gratitude for this groundbreaking approach to nourishing our bodies and the planet.</p>
                    <h3>John Adhikari</h3>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
            </div>
        </div>
    </section>

    <section class="newsletter">
        <div class="newstext">
            <h4>Sign Up For Newsletters</h4>
            <p>Get E-mail updates about our latest food dishes and <span>special offers.</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your email  address">
            <button class="hero-btn">Sign Up</button>
        </div>
    </section>


    <section class="footer section-p1">
        <div class="col">
            <img src="{{asset('user/assets/photo/logo.png')}}" alt="" class="logo">
            <h4>Contact</h4>
            <p><strong>Address: </strong>Itahari, Near Bhaatbateni Sunsari</p>
            <p><strong>Phone:</strong> 025 2222 365 / 9810480972</p>
            <p><strong></strong>10:00 - 18:00, Sunday - Friday</p>
            <div class="follow">
                <h4>Follow us</h4>
                <div class="icon">
                    <i class="fa fa-facebook-f"></i>
                    <i class="fa fa-instagram"></i>
                    <i class="fa fa-twitter"></i>
                    <i class="fa fa-pinterest-p"></i>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>About</h4>
            <a href="#">About us</a>
            <a href="#">Delivery Information</a>
            <a href="">Privacy Policy</a>
            <a href="">Terms & Conditions</a>
            <a href="">Contact us</a>
        </div>
        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign In</a>
            <a href="#">View Cart</a>
            <a href="">My Wishlist</a>
            <a href="">Track My Order</a>
            <a href="">Help</a>
        </div>
        <div class="col install">
            <h4>Install App</h4>
            <p>From App Store or Google play</p>
            <div class="row">
                <img src="{{asset('user/assets/photo/khalti.png')}}" alt="" width="100px" height="100px">
                <img src="{{asset('user/assets/photo/Esewa_logo.webp-removebg-preview.png')}}" alt="" width="100px" height="100px">
            </div>
            <p>Secured Payment Gateways</p>
            <img src="" alt="">
        </div>
        <div class="copyright">
            <p>&copy 2023, Copyright Foodieland Website</p>
        </div>
    </section>
    <script src="{{asset('user/assets/js/app.js')}}"></script>
</body>

</html>