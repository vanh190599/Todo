@extends('frontend\layout')
@section('content')

    <!-- end san pham moi -->
    <div class="features_items" >
        <!--features_items-->
        <h2 class="title text-center" style="margin-top: 2px; color: orangered">
            @if(isset($category_name))
                {{ $category_name }}
            @elseif(isset($brand_name))
                {{ $brand_name }}
            @elseif(isset($message_search))
                {{ $message_search }}
            @elseif(isset($message_filter))
                {{ $message_filter }}
            @else
                Sản phẩm mới nhất
            @endif
        </h2>

        <div class="" style="color: red; font-size: 17px; padding-bottom: 10px">
            <i> @if(isset($error)){{ $error }} @endif </i>
        </div>

        <style>
            .test:hover{
                background: #fcfcfc;
            }
        </style>

        @if(!empty($sale_product))
        @foreach($sale_product as $rows)
            <div class="col-lg-4 col-md-6 col-sm-6 ">
                <div class="product-image-wrapper a">
                    <div class="single-products test">
                        <div class="text-center">
                            <a href="{{url('chi-tiet-san-pham/'.$rows->product_id)}}">
                                <img class="product-hover img_product" src="{{'upload/product/'.$rows->product_image}}" alt="" />
                                <div class="anh_sale">
                                    <div class="phantram">
                                        <?php $phantram = (($rows->product_price - $rows->product_sale_price)/$rows->product_price)*100 ?>
                                        <b> -{{ round($phantram)}}% </b>
                                    </div>
                                </div>
                            </a>
                            <div class="text-danger" style="margin-top: 6px;">Mã SP: {{$rows->product_id}}</div>
                            <a class="limit-1" href="{{url('chi-tiet-san-pham/'.$rows->product_id)}}">
                                <div class="limit-1" style="height: 45px; font-size: 16px; text-transform: uppercase;">{{$rows->product_name}}</div>
                            </a>
                            <div style="height: 40px;">
                                <p style="color: #f40606; font-size: 17px;"><b> {{number_format($rows->product_sale_price, 0,",",".")}} đ</b></p>
                                <p class="product_price">{{number_format($rows->product_price, 0,",",".")}} đ</p>
                            </div>

                            <div style="color: #666666; height: 25px; margin-top: 6px;">
                                <p style="line-height: 12px;"></p>
                            </div>
                            <a href="{{url('chi-tiet-san-pham/'.$rows->product_id)}}" class="btn btn-default add-to-cart">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @endif

    </div>
    <!-- end san pham moi -->

    <!-- sp ban chay nhat -->
    <div class="features_items" >
        <!--features_items-->
        <h2 class="title text-center" style="margin-top: 2px; color: orangered">
            sản phẩm bán chạy
        </h2>

        <div class="" style="color: red; font-size: 17px; padding-bottom: 10px">
            <i> @if(isset($error)){{ $error }} @endif </i>
        </div>

        @if(!empty($product_top_sale))
        @foreach($product_top_sale as $rows)
            <div class="col-lg-4 col-md-6 col-sm-6 ">
                <div class="product-image-wrapper a">
                    <div class="single-products test">
                        <div class="text-center">
                            <a href="{{url('chi-tiet-san-pham/'.$rows->product_id)}}">
                                <img class="product-hover img_product" src="{{'upload/product/'.$rows->product_image}}" alt="" />
                                <div class="anh_sale">
                                    <div class="phantram">
                                        <?php $phantram = (($rows->product_price - $rows->product_sale_price)/$rows->product_price)*100 ?>
                                        <b> -{{ round($phantram)}}% </b>
                                    </div>
                                </div>
                            </a>
                            <div class="text-danger" style="margin-top: 6px;">Mã SP: {{$rows->product_id}}</div>
                            <a  href="{{url('chi-tiet-san-pham/'.$rows->product_id)}}">
                                <div style="height: 45px; font-size: 16px; text-transform: uppercase;">{{$rows->product_name}}</div>
                            </a>
                            <div style="height: 40px;">
                                <p style="color: #f40606; font-size: 17px;"><b> {{number_format($rows->product_sale_price, 0,",",".")}} đ</b></p>
                                <p class="product_price">{{number_format($rows->product_price, 0,",",".")}} đ</p>
                            </div>

                            <div style="color: #666666; height: 25px; margin-top: 6px;">
                                <p style="line-height: 12px;"></p>
                            </div>
                            <a href="{{url('chi-tiet-san-pham/'.$rows->product_id)}}" class="btn btn-default add-to-cart">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @endif

        <div class="text-center">
        </div>
    </div>
    <!-- end sp chay -->

    <!--/San pham khuyen mai-->
    @include('frontend.product_khuyen_mai')
    <!--/San pham khuyen mai-->
@endsection

@section('slide')
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
                        <p class="text-center title-lastest" style="background: #FE980F; font-size: 15px">TIN MỚI NHẤT</p>
                        <ul>
                            @foreach($news as $rows)
                                <li style="display: flex; padding-bottom: 5px">
                                    <a href="{{ url('news-detail/'.$rows->news_id) }}">
                                        <img src="upload/news/{{$rows->news_image}}" style="width: 80px; height: 60px;" alt="">
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
@endsection
