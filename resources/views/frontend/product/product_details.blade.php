@extends('frontend.layout.layout_4')
@section('content')
    <div class="col-sm-12 padding-right">
        <div class="">
            <!--product-details-->
            <div class="col-lg-6 col-md-5 col-sm-5">
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
                <div class="product-information" style="">
                    <!--/product-information-->
                    <p style="margin-top: -40px; color: #212121; font-size: 22px; font-weight: normal" class="product_name">
                        {{ isset($data->product_name)?$data->product_name:"" }}
                    </p>
                    <p>Mã sản phẩm: {{ isset($data->product_id)?$data->product_id:"" }}</p>
                    <img src="eshoper/images/product-details/rating.png" alt="" />
                    <div style=" background: #f0f0f0; margin: 5px 0px 5px 0px ;padding: 9px; border-radius: 10px">
                        @if( isset($data->product_sale_price) && $data->product_sale_price > 0 )
                            <div style=" color: #666">
                                Giá:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span style="font-size: 20px;margin: 0px; padding: 0px; text-decoration: line-through">
                  {{ isset($data->product_price)?number_format($data->product_price,0,",",".").' ₫' :"" }}
                  </span>
                            </div>
                            <div style="color:#222222;">
                                <span style="margin: 0px; padding: 0px; font-weight: bold">Khuyến mãi:</span>
                                <span style="margin: 0px; padding: 0px;font-size: 22px; font-weight: bold; color: red">
                  &nbsp;{{ isset($data->product_sale_price)?number_format($data->product_sale_price,0,",",".").' ₫' :"" }}
                  </span>
                            </div>
                        @else
                            <div style="color:#222222;">
                                <span style="margin: 0px; padding: 0px; font-weight: bold">Giá:</span>
                                <span style="margin: 0px; padding: 0px;font-size: 22px; font-weight: bold; color: red">
                  {{ isset($data->product_price)?number_format($data->product_price,0,",",".").' ₫' :"" }}
                  </span>
                                {{--                                <span style="color: #333333; margin: 0px; padding: 0px;">[Giá đã có VAT]</span>--}}
                            </div>
                        @endif
                    </div>
                    <p style="color: #9e9e9e; font-size: 14px"><b>Thương hiệu: </b> <span style="color: #1a9cb7">{{isset($data->brand_name)?$data->brand_name:""}} | {{isset($data->category_name)?$data->category_name:""}} </span> </p>
                    <p style="color: #222222"><b>Tình trạng:</b>  @if(isset($data->product_so_luong) && $data->product_so_luong>0 )Còn hàng @else Hết hàng @endif </p>
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
                    <div class="uu_dai" style="padding: 20px">
                        {!! isset($data->product_uu_dai)?$data->product_uu_dai:"" !!}
                    </div>
                </div>
                <!--/product-information-->
            </div>
        </div>
    </div>
    <!--/product-details-->
    <div class="category-tab shop-details-tab">
        <!--category-tab-->
        <div class="col-sm-12" >
            <ul class="nav nav-tabs " style="background: #365899;">
                <li class="active"><a href="#details" data-toggle="tab" style="color: white">Mô tả chi tiết sản phẩm</a></li>
                <li><a href="#san-pham-lien-quan" data-toggle="tab" style="color: white">Sản phẩm liên quan</a></li>
                <li><a href="#san-pham-lien-quan" data-toggle="tab" style="color: white">Đánh giá sản phẩm</a></li>
                <li><a href="#san-pham-lien-quan" data-toggle="tab" style="color: white">Liên hệ</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="details" >
                {!! isset($data->product_desc)?$data->product_desc:"" !!}
            </div>

            <div class="tab-pane fade" id="san-pham-lien-quan" >
                @if(!empty($san_pham_lien_quan))
                    @foreach($san_pham_lien_quan as $rows)
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
                    {{ $san_pham_lien_quan->links() }}
                </div>
            </div>
            <div>
                {{ $san_pham_lien_quan->links() }}
            </div>
        </div>
    </div>
    <!--/category-tab-->

    &nbsp
    @include('frontend.product.product_khuyen_mai')
@endsection
