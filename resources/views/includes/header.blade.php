<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>E Store - eCommerce HTML Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

        <!-- Favicon -->
        <link href="{{asset('img/favicon.ico')}}" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="{{asset('lib/slick/slick.css') }}" rel="stylesheet">
        <link href="{{asset('lib/slick/slick-theme.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{asset('css/style.css') }}" rel="stylesheet">
    </head>

    <body>
        <!-- Top bar Start -->
        <div class="top-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <i class="fa fa-envelope"></i>
                        support@email.com
                    </div>
                    <div class="col-sm-6">
                        <i class="fa fa-phone-alt"></i>
                        +012-345-6789
                    </div>
                </div>
            </div>
        </div>
        <!-- Top bar End -->
        
        <!-- Nav Bar Start -->
        <div class="nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="/home" class="nav-item nav-link @php if(Request::segment(1)=='home'){echo 'active'; } @endphp">Home</a>
                            <a href="/productlist" class="nav-item nav-link @php if(Request::segment(1)=='productlist'){echo 'active'; } @endphp">Products</a>
                            <a href="/productdetail" class="nav-item nav-link @php if(Request::segment(1)=='productdetail'){echo 'active'; } @endphp">Product Detail</a>
                            <a href="/cart" class="nav-item nav-link @php if(Request::segment(1)=='cart'){echo 'active'; } @endphp">Cart</a>
                            <a href="/checkout" class="nav-item nav-link @php if(Request::segment(1)=='checkout'){echo 'active'; } @endphp">Checkout</a>
                            <a href="/myaccount" class="nav-item nav-link @php if(Request::segment(1)=='myaccount'){echo 'active'; } @endphp">My Account</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle {{request() -> is('wishlist', 'login') ? 'active' : ''}}" data-toggle="dropdown">More Pages</a>
                                <div class="dropdown-menu">
                                    <a href="/wishlist" class="dropdown-item @php if(Request::segment(1)=='wishlist'){echo 'active'; } @endphp">Wishlist</a>
                                    <a href="/login" class="dropdown-item @php if(Request::segment(1)=='login'){echo 'active'; } @endphp">Login & Register</a>
                                    <a href="contact.html" class="dropdown-item">Contact Us</a>
                                </div>
                            </div>
                        </div>
                        <div class="navbar-nav ml-auto">
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">User Account</a>
                                <div class="dropdown-menu">
                                    <a href="/login" class="dropdown-item">Login</a>
                                    <a href="#" class="dropdown-item">Register</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->   