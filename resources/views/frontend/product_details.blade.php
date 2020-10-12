@extends('frontend.layout_4')
@section('content')
<div class="col-sm-12 padding-right">
    <div class=""><!--product-details-->
        <div class="col-lg-6 col-md-5 col-sm-5 m-0 p-0" style="margin: 0; padding: 0" >
            <div class="view-product">
                <!-- Phan tram giam -->
                @if( isset($data->product_sale_price) && $data->product_sale_price > 0)
                    <?php $phantram = (($data->product_price - $data->product_sale_price)/$data->product_price)*100  ?>
                    <div class="sale-img-detail" style="width: 60px; height: 60px; ">
                        <div class="phantram-detail">-{{ round($phantram)}}%</div>
                    </div>
                    @endif
                <img  src="{{asset('upload/product/'.$data->product_image)}}" style="height: 100%; width: 100%;"  class="img-thumbnail product-detail-img" alt="123">
            </div>

        </div>
        <div class="col-lg-6 col-md-7 col-sm-7">
            <div class="product-information" style=""><!--/product-information-->
                @if( isset($data->product_sale_price) && $data->product_sale_price > 0 )
                    @else
                    <img src="eshoper/images/product-details/new.jpg" class="newarrival" alt="" />
                    @endif
                <p style="margin-top: -40px; font-size: 30px; color: #333333" class="product_name">
                    {{ isset($data->product_name)?$data->product_name:"" }}
                </p>
                <p>Mã sản phẩm: {{ isset($data->product_id)?$data->product_id:"" }}</p>

                <!-- gia ban -->
                <div style=" background: #f0f0f0; margin: 5px 0px 5px 0px ;padding: 9px; border-radius: 10px">
                    <!-- Khuyen mai -->
                    @if( isset($data->product_sale_price) && $data->product_sale_price > 0 )
                        <div style=" color: #666">
                            Giá bán:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span style="font-size: 20px;margin: 0px; padding: 0px; text-decoration: line-through">
{{--                                {{isset($data->product_price)?$data->product_price:""}} ₫--}}
                                {{ isset($data->product_price)?number_format($data->product_price,0,",",".").' ₫' :"" }}
                            </span>
                        </div>
                        <div style="color:#222222;">
                            <span style="margin: 0px; padding: 0px; font-weight: bold">Giá khuyến mãi:</span>
                            <span style="margin: 0px; padding: 0px;font-size: 22px; font-weight: bold; color: red">
                                {{ isset($data->product_sale_price)?number_format($data->product_sale_price,0,",",".").' ₫' :"" }}
                            </span>
                            <span style="color: #333333; margin: 0px; padding: 0px;">[Giá đã có VAT]</span>
                        </div>
                        @else
                        <div style="color:#222222;">
                            <span style="margin: 0px; padding: 0px; font-weight: bold">Giá bán:</span>
                            <span style="margin: 0px; padding: 0px;font-size: 22px; font-weight: bold; color: red">
                                {{ isset($data->product_price)?number_format($data->product_price,0,",",".").' ₫' :"" }}
                            </span>
                            <span style="color: #333333; margin: 0px; padding: 0px;">[Giá đã có VAT]</span>
                        </div>
                    @endif
                </div>


                <p style="color: #222222"><b>Danh mục:</b> {{isset($data->category_name)?$data->category_name:""}}</p>
                <p style="color: #222222"><b>Hãng    :</b> {{isset($data->brand_name)?$data->brand_name:""}}</p>
                @if(isset($data->product_bao_hanh)) <p style="color: #222222">
{{--                    <p style="color: #222222"><b>Bảo hành: </b>Chính hãng {{$data->product_bao_hanh}}--}}
                </p> @endif

                <p style="color: #222222"><b>kho hàng:</b>  @if(isset($data->product_so_luong) && $data->product_so_luong>0 )Còn hàng @else Hết hàng @endif </p>
{{--                <a href=""><img src="eshoper/images/product-details/share.png" class="share img-responsive"  alt="" /></a>--}}

                <span>
					  <form action="{{url('cart')}}" method="POST">
                          {{ csrf_field() }}
                          <label>Số lượng:</label>
                          <input type="hidden" name="product_id" value="{{ isset($data->product_id)?$data->product_id:'' }}">
                          <input type="number" value="{{isset($so_luong)?$so_luong:1}}" name="so_luong" />
                          <button type="submit" class="btn btn-fefault cart">
                              <i class="fa fa-shopping-cart"></i>
                              Thêm vào giỏ hàng
                          </button>
                      </form>
                </span>
                <div class="clear: both;"></div>
                <div class="uu_dai" style="padding-left: 20px">
                    <img src="eshoper/images/uu-dai.png" style="height: 25px; margin-top: -21px; margin-left: 28px; ">
                     {!! isset($data->product_uu_dai)?$data->product_uu_dai:"" !!}
                </div>

            </div><!--/product-information-->
        </div>
    </div><!--/product-details-->

    <div class="category-tab shop-details-tab"><!--category-tab-->
        <div class="col-sm-12" >
            <ul class="nav nav-tabs " style="background: #365899;">
                <li class="active"><a href="#details" data-toggle="tab" style="color: white">Mô tả chi tiết sản phẩm</a></li>
                <li><a href="#san-pham-lien-quan" data-toggle="tab" style="color: white">Sản phẩm liên quan</a></li>
                <li><a href="#reviews" data-toggle="tab" style="color: white">Gửi đánh giá</a></li>

            </ul>
        </div>

        <div class="tab-content">
            <div class="tab-pane fade active in" id="details" >
                {!! isset($data->product_desc)?$data->product_desc:"" !!}

            </div>

            <div class="tab-pane fade  in" id="reviews" >
                <div class="col-sm-12">
                    <ul>
                        <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                        <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                        <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <p><b>Write Your Review</b></p>

                    <form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
                        <textarea name="" ></textarea>
                        <b>Rating: </b> <img src="eshoper/images/product-details/rating.png" alt="" />
                        <button type="button" class="btn btn-default pull-right">
                            Submit
                        </button>
                    </form>
                </div>
            </div>

            <div class="tab-pane fade" id="san-pham-lien-quan" >
                @foreach($san_pham_lien_quan as $rows)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="product-image-wrapper a">
                            <div class="single-products ">
                                <div class=" text-center ">
                                    <a href="{{url('chi-tiet-san-pham/'.$rows->product_id)}}"  >
                                        <img class="product-hover img_product" src="{{'upload/product/'.$rows->product_image}}" style="border-radius: 10px; " alt="" />
                                        @if ($rows->product_sale_price > 0)
                                            <div class="anh_sale">
                                                <div class="phantram">
                                                    <?php $phantram = (($rows->product_price - $rows->product_sale_price)/$rows->product_price)*100  ?>
                                                    <b> -{{ round($phantram)}}% </b>
                                                </div>
{{--                                                <div class="sale-tag"></div>--}}
                                            </div>
                                        @endif
                                    </a>
                                    <div class="text-danger" style="margin-top: 3px">Mã SP: {{$rows->product_id}}</div>
                                    <div style="height: 45px;  margin-top: 5px">{{$rows->product_name}}</div>
                                    @if($rows->product_sale_price > 0)
                                        <div style="height: 60px">
                                            <p style='color: #F40606; font-size: 17px' ><b>
                                                    {{number_format($rows->product_sale_price, 0,",",".")}} đ</b>
                                            </p>
                                            <p class="product_price"> {{number_format($rows->product_price, 0,",",".")}} đ </p>
                                        </div>
                                    @else
                                        <div  style='color: #F40606; font-size: 17px; height: 60px' >
                                            <b>{{number_format($rows->product_price, 0,",",".")}} đ </b>
                                        </div>
                                    @endif

                                    <div style="color:#666666; height: 25px; margin-top: 6px">

                                    </div>

                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="text-center">
                    {{ $san_pham_lien_quan->links() }}
                </div>

            </div>
            <div>
                {{ $san_pham_lien_quan->links() }}
            </div>

        </div>
    </div><!--/category-tab-->
</div>
&nbsp
@include('frontend.product_khuyen_mai')

 @endsection
