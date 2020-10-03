<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>

    <base href="{{asset('')}}">
    <link href="{{ asset('eshoper/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="eshoper/css/style.css">
    <link href="eshoper/css/bootstrap.min.css" rel="stylesheet">
    <link href="eshoper/css/font-awesome.min.css" rel="stylesheet">
    <link href="eshoper/css/prettyPhoto.css" rel="stylesheet">
    <link href="eshoper/css/price-range.css" rel="stylesheet">
    <link href="eshoper/css/animate.css" rel="stylesheet">
    <link href="eshoper/css/main.css" rel="stylesheet">
    <link href="eshoper/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="eshoper/js/html5shiv.js"></script>
    <script src="eshoper/js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="eshoper/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="eshoper/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="eshoper/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="eshoper/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="eshoper/images/ico/apple-touch-icon-57-precomposed.png">



    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=1092111527826829&autoLogAppEvents=1"></script>


</head><!--/head-->

<body>

<header id="header"><!--header-->
    <div class="container-fluid">
        <div class="banner">
        </div>
    </div>
    <div class="header-middle" style="background: #ce0707;">
        {{--    <div class="header-middle" style="background: linear-gradient(-90deg,#eb4040 0%,#ff9c00 100%);">--}}
        <div class="container">
            <div class="row" style="border-bottom: none;">
                <div class="col-md-6 col-sm-12">
                    <div class="logo pull-left" style="width: 150px">
                        <a href="{{url('trang-chu')}}"><img src="eshoper/images/home/logo-3.png" class="logo-img" style="width: 150px; padding-top: 10px" alt="" /></a>
                        {{--                        <a href="{{url('trang-chu')}}"><img src="eshoper/images/home/logo.png" alt="" /></a>--}}
                    </div>
                </div>

                <div class="col-md-6 col-sm-12" style="margin-top: 10px" >
                    <!-- search -->
                    <form action="{{ url('tim-kiem-san-pham') }}" method="get">
                        <div class="form-group pull-right" style="display: flex">
                            <input type="text" name="key" value="{{ isset($key)?$key:"" }}" class="form-control" placeholder="Tìm kiếm tin tức"/>
                            <button  class="btn" style="color: orangered; margin-left: 5px"><span>Tìm kiếm </span><span class="glyphicon glyphicon-search"></span></button>
                        </div>
                    </form>
                    <!-- search -->
                </div>

            </div>
        </div>
    </div><!--/header-middle-->
    {{--       <div style="height: 100px"></div>--}}

    <div class="header-bottom" style="padding: 10px"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse" style="margin-top: 8px;">
                            <li><a href="{{url('trang-chu')}}" class="active">Trang chủ</a></li>
                            <li class="dropdown"><a href="#">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu" style="background: #FE980F">
                                    <li><a href="{{ url('new-product') }}">Sản phẩm mới nhất</a></li>
                                    <li><a href="{{ url('top-sale-product') }}">Sản phẩm bán chạy</a></li>
                                    <li><a href="{{ url('sale-product') }}">Sản phẩm khuyến mãi</a></li>
                                </ul>
                            </li>
                            <li><a href="{{url('trang-chu')}}"  class="text">Giới thiệu</a></li>
                            <li><a href="{{url('news')}}"  class="text">Tin tức</a></li>
                            <li><a href="{{url('trang-chu')}}"  class="text">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="shop-menu pull-right" style="margin-bottom: 5px">
                        <ul class="nav navbar-nav">
                            {{--                        <i class="fa fa-user"></i> Yêu thích</a></li>--}}
                            <li><a href="{{ url('show-login') }}"  style="background: none; color: black;"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                            <li><a href="{{ url('show-cart') }}"  style="background: none;color: black; "><i class="fa fa-shopping-cart"></i> Giỏ hàng @if(Cart::content()->count()) ( {{Cart::content()->count()}} )@endif  </a></li>
                            <li style="">
                                @if( session('customer_name') !=null )
                                    <a href="{{ url('customer-infor') }}" style="background: none; color: orangered; position: relative">
                                        <!-- Neu nhu ton tai avatar khi login = facebook thi hien avata con khong thi hien Icon user -->
                                        @if(session('customer_avatar'))
                                            <img src="{{ session('customer_avatar') }}" style="width: 46px; height: 46px; position: absolute; top: -11px; border-radius: 23px; " >
                                            <span style="margin-left: 50px"> <b>{{session('customer_name')}}</b></span>
                                        @else
                                            <i class="fa fa-user"> {{session('customer_name')}}</i>
                                        @endif
                                    </a>
                                @endif
                            </li>
                            <li>
                                @if( session('customer_name') !=null )
                                    <a href="{{ url('logout') }}" style="background: none;color: black;  " ><i class="glyphicon glyphicon-log-out"></i> Đăng xuất</a>
                                @else
                                    <a href="{{ url('show-login') }}" style="background: none;color: black; "><span class="glyphicon glyphicon-log-in"></span>
                                        Đăng nhập
                                    </a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-2">


                <div class="left-sidebar">
                    <div class="brands_products"><!--brands_products-->
                        <h2 style="color: orangered">danh mục tin</h2>
                        <div class="">
                            <ul class="list-group" style="border-bottom: 2px solid #dddddd">
                                <li class=""><a class="list-group-item text-dark"  style="color: #333333; border-bottom: none ;border-radius: 0; padding-left: 10px " href="{{url('tin-moi')}}">TIN MỚI NHẤT</a></li>
                                @foreach($news_category as $rows)
                                    <li class=""><a class="list-group-item text-dark"  style="color: #333333    ; border-bottom: none ;border-radius: 0; padding-left: 10px "
                                                    href="{{url('news-category/'.$rows->news_category_id)}}">{{ $rows->news_category_name  }} </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!--/brands_products-->


{{--                    <!--/video-->--}}
{{--                    <div class="video">--}}
{{--                        <iframe width="100%" height="180" src="https://www.youtube.com/embed/BArqMoMzsyg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}
{{--                    </div>--}}
{{--                    <!--end video-->--}}

{{--                    <!--/video-->--}}
{{--                    <div class="video">--}}
{{--                        <iframe width="100%" height="180" src="https://www.youtube.com/embed/5CSVoxc9QuI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></iframe>--}}
{{--                    </div>--}}
{{--                    <!--end video-->--}}

{{--                    <div class="price-range"><!--price-range-->--}}
{{--                        <h2>Price Range</h2>--}}
{{--                        <div class="well text-center">--}}
{{--                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />--}}
{{--                            <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>--}}
{{--                        </div>--}}
{{--                    </div><!--/price-range-->--}}

{{--                    <div class="shipping text-center"><!--shipping-->--}}
{{--                        <img src="eshoper/images/home/shipping.jpg" alt="" />--}}
{{--                    </div><!--/shipping-->--}}
                </div>
            </div>
                <!-- content-->
            @yield('content')
            <!-- content -->


        </div>
    </div>
</section>

<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>e</span>-shopper</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="eshoper/images/home/iframe1.png" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="eshoper/images/home/iframe2.png" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="eshoper/images/home/iframe3.png" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="eshoper/images/home/iframe4.png" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <img src="eshoper/images/home/map.png" alt="" />
                        <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Service</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Online Help</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Order Status</a></li>
                            <li><a href="#">Change Location</a></li>
                            <li><a href="#">FAQ’s</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Quock Shop</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">T-Shirt</a></li>
                            <li><a href="#">Mens</a></li>
                            <li><a href="#">Womens</a></li>
                            <li><a href="#">Gift Cards</a></li>
                            <li><a href="#">Shoes</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Policies</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privecy Policy</a></li>
                            <li><a href="#">Refund Policy</a></li>
                            <li><a href="#">Billing System</a></li>
                            <li><a href="#">Ticket System</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Company Information</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Store Location</a></li>
                            <li><a href="#">Affillate Program</a></li>
                            <li><a href="#">Copyright</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Get the most recent updates from <br />our site and be updated your self...</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->



<script src="eshoper/js/jquery.js"></script>
<script src="eshoper/js/bootstrap.min.js"></script>
<script src="eshoper/js/jquery.scrollUp.min.js"></script>
<script src="eshoper/js/price-range.js"></script>
<script src="eshoper/js/jquery.prettyPhoto.js"></script>
<script src="eshoper/js/main.js"></script>
</body>
</html>

