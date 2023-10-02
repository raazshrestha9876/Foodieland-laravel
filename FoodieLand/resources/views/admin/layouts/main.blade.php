<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodie Land</title>
    <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body>
    <div class="side-menu">
        <div class="brand-name">
            <a href="#"><img src="{{asset('user/assets/photo/logo.png')}}" class="logo" alt=""></a>
            <!-- <h1>FoodieLand</h1> -->
        </div>
        <div class="nav-items">
            <ul>
                <li><img src="" alt=""><a href="/dashboard">&nbsp; DASHBOARD</a></li>
                <li><img src="" alt=""><a href="/foods">&nbsp; FOOD</a></li>
                <li><img src="" alt=""><a href="/categories">&nbsp; CATEGORY</a></li>
                <li><img src="" alt=""><a href="/orders">&nbsp; ORDER</a></li>
                <li><img src="" alt=""><a href="#">&nbsp; ABOUT US</a></li>
            </ul>
        </div>
    </div>
    <div class="admin-container">
        <div class="header">
            <div class="nav">
                <div class="search">
                    <input type="text" placeholder="Search..">
                    <button type="submit"><img src="{{asset('admin/assets/images/search (1).png')}}" alt=""></button>
                </div>
                <div class="user">
                    <img src="{{asset('admin/assets/images/search (3).png')}}" alt="">
                    <div class="img-case">
                        <img src="{{asset('admin/assets/images/search (2).png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- <header>
            <section class="panel">
                <div class="phone-panel">
                    <i class="fa fa-phone"></i>
                    <h2>CALL:+977-9810480972</h2>
                </div>
                <div class="panel-link">
                    <ul>
                        <li>
                            <i class="fa fa-phone-o" aria-hidden="true"></i>
                            <a href="">CONTACT US</a>
                        </li>
                        @if(Auth::user())
                        <li><a class="hero-btn" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT</a></li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        @else
                        <li><a class="hero-btn" href="/login">LOGIN</a>
                        <li>
                        <li class="hero-btn">
                            <i class="fa fa-user-o" aria-hidden="true"></i>
                            <a href="/register">REGISTER</a>
                        </li>
                        @endif
                    </ul>
                </div>

            </section>
            <section class="nav-header">
              
                <form action="/foods-search" method="GET">
                    <div class="nav-search">
                        <select>
                            <option value="#">All</option>
                        </select>
                        <input type="text" name="query" placeholder="Search FoodieLand">
                        <div class="search-icon">
                            <button type="submit" style="border:none;width:80%;height:80%;background:#febd68"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>

                <div>
                    <ul class="nav-items">
                        <li><a href="/dashboard">HOME</a></li>
                        <li><a href="/categories">CATEGORY</a></li>
                        <li><a href="/foods">DISHES</a></li>
                        <li><a href="/orders">ORDER</a></li>
                        <li><a href="/about">ABOUT</a></li>
                    </ul>
                </div>
            </section>
        </header> -->

        <!-- main content -->
        @yield('content')
        <!-- main content ends -->
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.41.0/apexcharts.min.js" integrity="sha512-bp/xZXR0Wn5q5TgPtz7EbgZlRrIU3tsqoROPe9sLwdY6Z+0p6XRzr7/JzqQUfTSD3rWanL6WUVW7peD4zSY/vQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('admin/assets/js/script.js')}}"></script>


</body>

</html>