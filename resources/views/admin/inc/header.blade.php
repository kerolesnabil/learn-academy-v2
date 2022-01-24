<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" >
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('front/css')}}/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{asset('front/css')}}/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{asset('front/css')}}/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="{{asset('front/css')}}/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{asset('front/css')}}/flaticon.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{asset('front/css')}}/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{asset('front/css')}}/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{asset('front/css')}}/style.css">
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" >
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent" >
        <ul class="navbar-nav mt-auto" >
            <li class="nav-item active">
                <a class="nav-link "href="{{route('admin.cats.index')}}">Categories</a>
            </li>
        </ul>
        <ul class="navbar-nav mt-auto" >
            <li class="nav-item active">
                <a class="nav-link "href="{{route('admin.trainers.index')}}">Trainers</a>
            </li>
        </ul>
        <ul class="navbar-nav mt-auto" >
            <li class="nav-item active">
                <a class="nav-link "href="{{route('admin.courses.index')}}">Courses</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto" >
            <li class="nav-item active">
                <a class="nav-link "href="{{route('admin.logout')}}">logout</a>
            </li>
        </ul>
    </div>
</nav>
