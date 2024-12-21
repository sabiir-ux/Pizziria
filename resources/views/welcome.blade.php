<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Site Metas -->
    <title>Green Special - Restaurant Responsive HTML5 OnePage Template</title>
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

/* Navbar */
nav.navbar {
    background-color: rgb(187, 126, 14);
    padding: 0.8rem 1rem;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 10;
    display: flex;
    align-items: center;
}

nav.navbar .navbar-brand {
    display: flex; /* Optional: for consistent styling */
    align-items: center; /* Vertically align the logo */
    margin-right: 20px; /* Add spacing between logo and nav items */
}

nav.navbar .navbar-nav {
    display: flex; /* Align items horizontally */
    align-items: center; /* Center nav items vertically */
    margin: 0;
    padding: 0;
    list-style: none;
}
nav.navbar .nav-item {
    margin: 0 15px;
}
nav.navbar .navbar-brand img {
    height: 40px; /* Set logo size */
    width: auto; /* Maintain aspect ratio */
}
nav.navbar .nav-link {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s ease;
}
nav.navbar .nav-link:hover,
nav.navbar .nav-link.active {
    color: #FFD700;
}

/* Preloader */
#preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.9);
    z-index: 9999;
    display: flex;
    justify-content: center;
    align-items: center;
}

#loader {
    border: 8px solid #f3f3f3;
    border-top: 8px solid #333;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Banner */
.main-banner {
    position: relative;
    height: 100vh;
    overflow: hidden;
}

.slider-img-full img {
    width: 100%;
    height: auto;
    max-height: 100px; /* Limit slider image height */
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

/* About Section */
#about {
    padding: 60px 20px;
    background-color: #fff;
}
#about .row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}

#about .message-box {
    padding: 20px;
}

#about .message-box h2 {
    font-size: 2rem;
    color: #333;
}

#about .message-box p {
    margin: 15px 0;
}

#about ul {
    list-style: disc;
    padding-left: 20px;
    margin: 15px 0;
}

#about ul li {
    margin-bottom: 10px;
}

#about .right-box-pro img {
    width: 500px; 
    max-height: 500px; 
    border-radius: 8px;
    display: block;
    margin: 0 auto;
}
@media (max-width: 768px) {
    #about .row {
        flex-direction: column;
    }

    #about .message-box,
    #about .right-box-pro {
        width: 100%;
        text-align: center;
    }

    #about .right-box-pro img {
        margin-bottom: 20px;
    }
}

/* Menu Section */
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
.sign-item {
    margin-left: 20px; /* Add some space between other nav items */
}

.sign-item .btn {
    padding: 10px 20px; /* Increase button size */
    font-size: 16px; /* Set the font size */
    border-radius: 30px; /* Rounded corners for the button */
    text-transform: uppercase; /* Make text uppercase */
    transition: background-color 0.3s ease, transform 0.3s ease; /* Smooth transition for hover effect */
}

/* Custom primary button color */
.sign-item .btn-primary {
    background-color: #4CAF50; /* Green background for the button */
    border-color: #4CAF50; /* Matching border color */
}

/* Hover effect for the button */
.sign-item .btn-primary:hover {
    background-color: #45a049; /* Darker green on hover */
    border-color: #45a049; /* Darker border color */
    transform: translateY(-3px); /* Slight lift effect */
}

/* Focus effect for accessibility */
.sign-item .btn:focus {
    outline: none; /* Remove default focus outline */
    box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.5); /* Custom blue focus ring */
}

/* Footer */
.copyrights {
    background-color: #333;
    color: #fff;
    padding: 15px 20px;
    text-align: center;
}

.copyrights a {
    color: #FFD700;
    text-decoration: none;
    margin: 0 10px;
}

.copyrights a:hover {
    text-decoration: underline;
}

/* Scroll-to-top */
#scroll-to-top {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #333;
    color: #fff;
    padding: 10px;
    border-radius: 50%;
    text-align: center;
    cursor: pointer;
    display: none;
}

#scroll-to-top:hover {
    background-color: #FFD700;
}


</style>
</head>

<body id="page-top" class="politics_version">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container-fluid">
        <!-- Navbar container uses flexbox -->
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <img class="img-fluid" src="{{ asset('images/logo.png') }}" alt="Green Special Restaurant Logo" />
        </a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link active" href="#home"><span>Home</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#about"><span>About</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#menu"><span>Menu</span></a>
            </li>
            <!-- Sign In Button -->
            <li class="sign-item">
              <a class="btn btn-primary nav-link" href="{{ route('login') }}">Sign In</a>
            </li>

        </ul>
    </div>
</nav>



    <!-- Home Section -->
    <section id="home" class="main-banner">
        <div class="slider">
            <div class="slider-item">
                <img src="{{ asset('images/slider-01.jpg') }}" alt="Delicious meal served at the restaurant" class="slider-img">
                <div class="slider-content container">
                    <h2 class="slider-title">Awesome Restaurant, Best Recipes for Dinner</h2>
                    <p class="slider-description">Welcome to Our Website</p>
                </div>
            </div>
            <div class="slider-item">
                <img src="{{ asset('images/slider-02.jpg') }}" alt="A beautiful dish for a perfect dinner" class="slider-img">
                <div class="slider-content container">
                    <h2 class="slider-title">Awesome Restaurant, Best Recipes for Dinner</h2>
                    <p class="slider-description">Welcome to Our Website</p>
                </div>
            </div>
            <div class="slider-item">
                <img src="{{ asset('images/slider-03.jpg') }}" alt="Exquisite dining experience" class="slider-img">
                <div class="slider-content container">
                    <h2 class="slider-title">Awesome Restaurant, Best Recipes for Dinner</h2>
                    <p class="slider-description">Welcome to Our Website</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <div id="about" class="section lb">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="message-box">
                        <h2>Welcome to Green Special Restaurant</h2>
                        <p>We strive to provide the best dining experience for all your needs.</p>
                        <ul>
                            <li>We provide top-notch quality with attention to detail.</li>
                            <li>Our approach focuses on efficiency and effectiveness.</li>
                            <li>Every solution is tailored to meet your specific needs.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-box-pro">
                        <img src="{{ asset('images/about_01.png') }}" alt="About Us Image" class="img-fluid img-rounded">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu Section -->
    <div id="menu" class="section lb">
        <div class="container-fluid">
            <div class="section-title text-center">
                <h3>Menu</h3>
                <p>Explore our variety of dishes tailored to satisfy your taste buds.</p>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="services-inner-box">
                        <div class="ser-icon">
                            <img src="{{ asset('images/peperoni.jpg') }}" class="img-fluid" alt="Dish Image 1" />
                        </div>
                        <h2>Pizza Peperoni</h2>
                        <a href="#">$6.00</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services-inner-box">
                        <div class="ser-icon">
                            <img src="{{ asset('images/mer.jpg') }}" class="img-fluid" alt="Dish Image 2" />
                        </div>
                        <h2>Pizza Fruits de mer</h2>
                        <a href="#">$8.00</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services-inner-box">
                        <div class="ser-icon">
                            <img src="{{ asset('images/margarita.jpg') }}" class="img-fluid" alt="Recipe 3" />
                        </div>
                        <h2>Pizza Margarita</h2>
                        <a href="#">$5.00</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <div class="copyrights">
        <div class="container-fluid">
            <div class="footer-distributed">
                <div class="footer-left">
                    <p class="footer-links">
                        <a href="#">Home</a>
                        <a href="#">About</a>
                    </p>
                    <p class="footer-company-name">All Rights Reserved. &copy; 2024</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button -->
    <a href="#page-top" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

</body>


</html>
