<!DOCTYPE html>
<html>
<head>
    <head>
        <!-- basic -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- mobile metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <!-- site metas -->
        <title>Eflyer</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/gif">
    
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    
    <!-- FancyBox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
     </head>
</head>
<body>
     <!-- banner bg main start -->
     <div class="banner_bg_main">
        <!-- header top section start -->
        <div class="container">
           <div class="header_section_top">
              <div class="row">
                 <div class="col-sm-12">
                    <div class="custom_menu">
                       <ul>
                          <li><a href="#">Best Sellers</a></li>
                          <li><a href="#">Gift Ideas</a></li>
                          <li><a href="#">New Releases</a></li>
                          <li><a href="#">Today's Deals</a></li>
                          <li><a href="#">Customer Service</a></li>
                       </ul>
                    </div>
                 </div>
              </div>
           </div>
        </div>
        <!-- header top section start -->
        <!-- logo section start -->
        <div class="logo_section">
           <div class="container">
              <div class="row">
                 <div class="col-sm-12">
                    <div class="logo"><a href="{{ asset('home.index') }}"><img src="images/logo.png"></a></div>
                 </div>
              </div>
           </div>
        </div>
        <!-- logo section end -->
        <!-- header section start -->
        <div class="header_section">
           <div class="container">
              <div class="containt_main">
                 <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <a href="index.html">Home</a>
                    <a href="fashion.html">Fashion</a>
                    <a href="electronic.html">Electronic</a>
                    <a href="jewellery.html">Jewellery</a>
                 </div>
                 <span class="toggle_icon" onclick="openNav()"><img src="images/toggle-icon.png"></span>
                 <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category 
                    </button>
                 </div>
                 <div class="main">
                    <!-- Another variation with a button -->
                    <div class="input-group">
                       <input type="text" class="form-control" placeholder="Search this blog">
                       <div class="input-group-append">
                          <button class="btn btn-secondary" type="button" style="background-color: #f26522; border-color:#f26522 ">
                          <i class="fa fa-search"></i>
                          </button>
                       </div>
                    </div>
                 </div>
                 <div class="header_box">
             
                    <div class="login_menu">
                       <ul>
                          <li><a href="#">
                             <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                             <span class="padding_10">Cart</span></a>
                          </li>
                          <li><a href="#">
                             <i class="fa fa-user" aria-hidden="true"></i>
                             <span class="padding_10"><a href="{{ route('login') }}">Login</a></span></a>
                          </li>
                          <li><a href="#">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span class="padding_10"><a href="{{ route('register') }}">Register</a></span></a>
                         </li>
                       </ul>
                    </div>
                 </div>
              </div>
           </div>
        </div>
        <!-- header section end -->
        <!-- banner section start -->
   

    <section>
        <h2>Sản phẩm mới nhất</h2>
        <div class="slide-container">
            @foreach ($figure as $figures)
                <div class="slide">
                    <img src="{{ $figure->image }}" alt="{{ $figure->name }}">
                    <h3>{{ $figure->name }}</h3>
                    <p>{{ $figure->description }}</p>
                    <p>{{ $figure->price }}</p>
                </div>
            @endforeach
        </div>
    </section>

     

   <!-- footer section start -->
   <div class="footer_section layout_padding">
    <div class="container">
       <div class="footer_logo"><a href="index.html"><img src="images/footer-logo.png"></a></div>
       <div class="input_bt">
          <input type="text" class="mail_bt" placeholder="Your Email" name="Your Email">
          <span class="subscribe_bt" id="basic-addon2"><a href="#">Subscribe</a></span>
       </div>
       <div class="footer_menu">
          <ul>
             <li><a href="#">Best Sellers</a></li>
             <li><a href="#">Gift Ideas</a></li>
             <li><a href="#">New Releases</a></li>
             <li><a href="#">Today's Deals</a></li>
             <li><a href="#">Customer Service</a></li>
          </ul>
       </div>
       <div class="location_main">Help Line  Number : <a href="#">+1 1800 1200 1200</a></div>
    </div>
 </div>
 <!-- footer section end -->
</body>
</html>
