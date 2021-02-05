<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->@foreach($logo1 as $data)
    <title>{{ $data->name }}</title>
    @endforeach

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('Mvio/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('Mvio/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('Mvio/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('Mvio/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('Mvio/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('Mvio/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('Mvio/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('Mvio/css/style.css')}}" type="text/css">
    <link rel="icon" href="img/core-img/favicon.ico">


 

   
<!-- Core Style CSS -->
<link rel="stylesheet" href="{{asset('vv/css/core-style.css')}}">    
<link href="{{asset('Mvio/css/sweetalert.css')}}" rel="stylesheet">
@notifyCss
</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->@foreach($logo1 as $data)
                <a class="nav-brand" href="{{URL::to('/home')}}"><img src="public/Img/logo/{{ $data->img }}"  width="196" height="23px"></a>
                <!-- Navbar Toggler --> @endforeach 
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            @foreach($categores1 as $data1)
                            <li><a href="{{URL::to('/shop/'.$data1->slug)}}">{{ $data1->name }}</a>
                            @if( $data1->sub_categories == 'co')
                                <div class="megamenu">
                                    @foreach($categores2 as $data2)
                                    @if( $data1->id == $data2->id_category )
                                        <ul class="single-mega cn-col-5">
                                            <li class="title"><a href="{{URL::to('/shop/'.$data2->slug)}}">{{ $data2->name }}</a></li>
                                            @foreach($categores3 as $data3)
                                            @if( $data2->id == $data3->id_category )
                                                <li><a href="{{URL::to('/shop/'.$data3->slug)}}">{{ $data3->name }}</a></li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    @endif
                                    @endforeach                              
                                </div>
                            @endif
                            </li>
                            @endforeach
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="shop.html">Shop</a></li>
                                    <li><a href="single-product-details.html">Product Details</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="single-blog.html">Single Blog</a></li>
                                    <li><a href="regular-page.html">Regular Page</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </li>
                           
                           
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <div class="search-area">
                    <form action="#" method="post">
                        <input type="search" name="search" id="headerSearch" placeholder="Type for search">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                
                <!-- User Login Info -->
                <div class="user-login-info">
                    <a href="#"><img src="{{asset('vv/img/core-img/user.svg')}}" alt=""></a>
                </div>
                <!-- Favourite Area -->
                <div class="favourite-area">
                    <a href="{{URL::to('/logoutuser')}}"><img src="{{asset('vv/img/core-img/logout.png')}}" alt=""></a>
                </div>
                <!-- Cart Area -->
                <div class="cart-area">
                    <a href="#" id="essenceCartBtn"><img src="{{asset('vv/img/core-img/bag.svg')}}" alt=""> <span>3</span></a>
                </div>
            </div>

        </div>
    </header>

    @yield('MvioHome')
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row">
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area d-flex mb-30">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                        @foreach($logo1 as $data)
                <a class="nav-brand" href="index.html"><img src="public/Img/logo/{{ $data->img }}"  width="250" height="23px"></a>
                <!-- Navbar Toggler --> @endforeach 
                        </div>
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                            <ul>
                                <li><a href="shop.html">Shop</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area mb-30">
                        <ul class="footer_widget_menu">
                            <li><a href="#">Order Status</a></li>
                            <li><a href="#">Payment Options</a></li>
                            <li><a href="#">Shipping and Delivery</a></li>
                            <li><a href="#">Guides</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms of Use</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row align-items-end">
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area">
                        <div class="footer_heading mb-30">
                            <h6>Subscribe</h6>
                        </div>
                        <div class="subscribtion_form">
                            <form action="#" method="post">
                                <input type="email" name="mail" class="mail" placeholder="Your email here">
                                <button type="submit" class="submit"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area">
                        <div class="footer_social_area">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-12 text-center">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>, distributed by <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>

        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="{{asset('vv/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('vv/js/popper.min.js')}}"></script>
    <!-- Classy Nav js -->
    <script src="{{asset('vv/js/classy-nav.min.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('vv/js/active.js')}}"></script>




    
    

<script src="{{asset('Mvio/js/sweetalert.min.js')}}"></script>
    <!-- Js Plugins -->
    <script src="{{asset('Mvio/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('Mvio/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('Mvio/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('Mvio/js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('Mvio/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('Mvio/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('Mvio/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('Mvio/js/mixitup.min.js')}}"></script>
    <script src="{{asset('Mvio/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('Mvio/js/main.js')}}"></script>
    @notifyJs
    <x:notify-messages />
</body>
</body>

</html>