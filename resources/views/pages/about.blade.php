@extends('layouts.headlayout')
@section('content')
<style>
    .bgimg-1,
    .bgimg-2,
    .bgimg-3 {
        position: relative;
        opacity: 0.7;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;

    }

    .bgimg-1 {
        background-image: url("/storage/cover_images/about-us-bg.jpg");
        height: 100%;
    }

    .caption {
        position: absolute;
        left: 0;
        top: 50%;
        width: 100%;
        text-align: center;
        color: #000;
    }

    .caption span.border {
        background-color: #111;
        color: #fff;
        padding: 18px;
        font-size: 25px;
        letter-spacing: 10px;
    }

    h3 {
        letter-spacing: 5px;
        text-transform: uppercase;
        font: 20px "Lato", sans-serif;
        color: #111;
    }

    .mt1 {
        margin-top: 50px;
    }
</style>

<div class="bgimg-1 mt1">
    <div class="caption">
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 text-center">
                        <h1 style="color:black;" class="font-weight-light">Thank you for visiting my website.</h1>
                        <p class="lead">.....</p>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <section class="py-5">
            <div class="container">
                <h2 style="color:white;" class="font-weight-light">Page Content</h2>
                <p style="color:white;">
                    I built this website using LARAVEL (PHP Framework). Enjoy your stay!
                </p>
            </div>
        </section>
    </div>
</div>

@endsection
<footer id="footer"></footer>
@extends('layouts.footer')