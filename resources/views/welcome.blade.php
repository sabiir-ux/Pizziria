<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Site Metas -->
    <title>Pizzeria</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">

    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f9f9f9;
        }

        .navbar {
            align-items: center;
            background-color: rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
            display: flex;
            justify-content: space-between;
            margin: 0 auto;
            max-width: 80%;
            padding: 2.7rem 2rem;
            position: absolute;
            top: 0;
            width: 100%;
            z-index: 9999;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .navbar-img {
            width: 145px;
        }

        .navbar-img img {
            height: 100%;
            width: 100%;
        }

        .navbar-links {
            display: flex;
            gap: 2.1rem;
            list-style: none;
        }

        .navbar-links a {
            color: rgb(251, 251, 255);
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            text-decoration: none;
            transition: all .3s;
        }

        .navbar-buttons {
            align-items: center;
            display: flex;
            gap: 2.5rem;
        }

        .navbar-buttons-register {
            background-color: red;
            border-radius: 3px;
            color: #fff;
            padding: 1rem 2rem;
            transition: all .3s;
        }

        .main-banner {
            position: relative;
            height: 100vh;
            overflow: hidden;
        }

        .slider-img-full img {
            width: 100%;
            height: auto;
            max-height: 100px;
            object-fit: cover;
        }

        .slider-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #fff;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.8);
        }

        .slider-content h2 {
            font-size: 2.5rem;
        }

        .slider-content p {
            color: #ddd;
            margin: 15px 0;
        }

        #menu {
            padding: 60px 20px;
            background-color: #f9f9f9;
            text-align: center;
        }

        #menu .section-title h3 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
        }

        #menu .services-inner-box {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 15px;
            padding: 20px;
            text-align: center;
        }

        #menu .services-inner-box img {
            width: 200px;
            max-height: 200px;
            border-radius: 8px;
            margin: 0 auto 15px;
            display: block;
        }

        #menu .services-inner-box h2 {
            font-size: 1.25rem;
            color: #333;
            margin: 10px 0;
        }

        #menu .services-inner-box a {
            color: #fff;
            background-color: #333;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }

        #menu .services-inner-box a:hover {
            background-color: #FFD700;
        }

        .copyrights {
            background-color: #333;
            color: #fff;
            padding: 15px 20px;
            text-align: center;
        }
    </style>
</head>

<body>

    <header>
        <nav>
            <div class="navbar">
                <div class="navbar-img">
                    <a href="#"><img src="images/logopizza.png" alt="" /></a>
                </div>
                <ul class="navbar-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="{{ route('menu') }}">Menu</a></li>
                </ul>

                <div class="navbar-buttons">
                    <a class="navbar-buttons-register" href="{{ route('roles') }}">Sign-In</a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Home Section -->
    <section id="home" class="main-banner">
        <div class="slider">
            <div class="slider-item">
                <img src="{{ asset('images/slider-01.jpg') }}" alt="Delicious meal served at the restaurant" class="slider-img">
                <div class="slider-content container">
                    <h2 class="slider-title">La pizza, notre passion.</h2>
                </div>
            </div>
        </div>
    </section>



    <!-- Footer Section -->
    <div class="copyrights">
        <div class="container-fluid">
            <div class="footer-distributed">
                <div class="footer-left">
                    <p class="footer-company-name">All Rights Reserved. &copy; 2024</p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>