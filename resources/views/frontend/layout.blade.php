<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>

    <base href="{{asset('')}}">
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
    <script src="eshoper/js/resnews_imagepond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="eshoper/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="eshoper/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="eshoper/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="eshoper/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="eshoper/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>

@include('frontend.header')
<hr style="margin-top: -7px; margin-bottom: 8px">

<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel" style="height: 385px; width: 795px; position: relative">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner" style="width: 795px">
                        <div class="item active" style="width: 895px">
                            <img src="upload/slide/p1.jpg"  style="height: 385px; margin-left: -100px; width: 795px;">
                        </div>
                        <div class="item" style="width: 895px">
                            <img src="upload/slide/p2.jpg"  style="height: 385px; margin-left: -100px; width: 795px;">
                        </div>
                        <div class="item" style="width: 895px">
                            <img src="upload/slide/p3.jpg"  style="height: 385px; margin-left: -100px; width: 795px;">
                        </div>
                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev" style="position: absolute; top: 152px; left: 2%">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next" style="position: absolute; right: 2%; top: 152px">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>

            <!-- tin tuc -->
            <div class=" col-lg-4 col-md-12 col-sm-12">
                <div class="box-right " style="margin-left: 23px; ">
                    <p class="text-center title-lastest" style="background: #ce0707; font-size: 15px">TIN MỚI NHẤT</p>
                    <ul>
                        @foreach($news as $rows)
                            <li style="display: flex; padding-bottom: 5px">
                                <a href="{{ url('news-detail/'.$rows->news_id) }}">
                                    <img src="upload/news/{{$rows->news_image}}" style="width: 80px; height: 60px; background: 1px solid gray " alt="">
                                    <div class="content-right" style="width: 200px">
                                        <a href="{{ url('news-detail/'.$rows->news_id) }}">
                                            <p class="limit">@isset($rows->news_title) {{ $rows->news_title }} @endisset</p>
                                        </a>
                                        <p style="padding-top: 1px; font-size: 10px">{{ isset($rows->created_at)?$rows->created_at:'' }}</p>
                                    </div>
                                </a>
                            </li>
                            <div style="border: 1px dashed #dddddd"></div>
                        @endforeach
                    </ul>
                    <p class="text-right" style="padding: 0; margin: 0; padding-bottom: 3px"><a href="{{ url('tin-moi') }}" class="xemthem" ><i >Xem thêm &nbsp; &nbsp; &nbsp;</i></a></p>
                </div>
            </div>
        </div>
    </div>
</section><!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <!-- chỉ trang Danh mục và Brand đc hiển thị/ Home không hiển thị -->
                @if(isset($check_show_filter))
                    <div class="brands_products"><!--brands_products-->
                        {{--                            <h2 style="color: orangered"><span class="glyphicon glyphicon-filter"></span> giá</h2>--}}
                        <div class="">
                            <ul class="list-group">
                                <li class="" style="">
                                    <form action="{{url('loc-san-pham-theo-gia/'.$category_id)}}" method="get" style="display: flex; padding: 2px">
                                        <input type="number" placeholder="Nhập giá mà bạn muốn" value="{{isset($khoang_gia)?$khoang_gia:''}}" name="khoang_gia" class="form-control">
                                        <button class="pull-right btn"><span class="glyphicon glyphicon-search ">Tìm</span></button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif

                <div class="left-sidebar">

                    <div class="brands_products"><!--products-->
                        <h2 style="color: orangered">sản phẩm</h2>
                        <div class="">
                            <ul class="list-group" style="border-bottom: 2px solid #dddddd">
                                <li class=""><a class="list-group-item text-dark"  style="color: #111111; border-bottom: none ;border-radius: 0; padding-left: 30px  " href="{{ url('new-product') }}">Sản phẩm mới</a></li>
                                <li class=""><a class="list-group-item text-dark"  style="color: #111111; border-bottom: none ;border-radius: 0; padding-left: 30px  " href="{{ url('top-sale-product') }}">Bán chạy</a></li>
                                <li class=""><a class="list-group-item text-dark"  style="color: #111111; border-bottom: none ;border-radius: 0; padding-left: 30px  " href="{{ url('sale-product') }}">Ưu đãi, khuyến mãi</a></li>
                            </ul>
                        </div>
                    </div><!--/products-->

                    <h2 style="margin-top: 2px; color: orangered">danh mục</h2>
                    <div class="" id=""><!--category-productsr-->
                        <ul class="list-group" style="border-bottom: 1px solid #dddddd;">
                            @foreach($category as $rows)
                                <li>
                                    <a class="list-group-item text-dark" style="color: #111111;border-radius: 0; border-bottom: none;padding-left: 30px; "
                                       href="{{url('danh-muc-san-pham/'.$rows->category_id)}}">
                                        {{$rows->category_name}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div><!--/category-products-->

                    <div class="brands_products"><!--brands_products-->
                        <h2 style="color: orangered">Thương hiệu</h2>
                        <div class="">
                            <ul class="list-group" style="border-bottom: 2px solid #dddddd">
                                @foreach($brand as $rows)
                                    <li class=""><a class="list-group-item text-dark"  style="color: #111111; border-bottom: none ;border-radius: 0; padding-left: 30px  "
                                                    href="{{url('thuong-hieu-san-pham/'.$rows->brand_id)}}">{{ $rows->brand_name  }} </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!--/brands_products-->


                    <!--/video-->
                    <div class="video">
                        <iframe width="100%" height="180" src="https://www.youtube.com/embed/wBkXedM8kUY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <!--end video-->

                    <!--/video-->
                    <div class="video">
                        <iframe width="100%" height="180" src="https://www.youtube.com/embed/wBkXedM8kUY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <!--end video-->


                    <div class="shipping text-center"><!--shipping-->
                        <img src="eshoper/images/home/shipping.jpg" alt="" />
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">

                <!-- content-->
            @yield('content')
            <!-- content -->

            </div>
        </div>
    </div>
</section>

<footer id="footer"><!--Footer-->




    <div class="footer-bottom">
        <div class="container">
            <div class="text-center" style="padding: 20px 0 20px 0">
                Website bán hàng quần áo
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

