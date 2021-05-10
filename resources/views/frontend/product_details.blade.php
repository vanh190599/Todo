@extends('frontend.layout_4')
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

                    <div style="margin-top: 20px; display: flex; overflow-x: auto;">
                        @if(! empty($data->colors))
                            @foreach( json_decode($data->colors, true) as $key => $value)
                                <div style="margin-right: 20px" class="show-image" data-img="{{ isset($value['image']) ? $value['image'] : '' }}">
                                    <img src="{{ isset($value['image']) ? $value['image'] : '' }}" alt="" style="width: 80px; height: 80px; object-fit: cover; cursor: pointer">
                                    <div class="text-center">{{ isset($value['name']) ? $value['name'] : '' }}</div>
                                </div>
                            @endforeach
                        @endif
                    </div>

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
                                Giá gốc:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span style="font-size: 20px;margin: 0px; padding: 0px; text-decoration: line-through">
                                  {{ isset($data->product_price)?number_format($data->product_price,0,",",".").' ₫' :"" }}
                                  </span>
                            </div>
                            <div style="color:#222222;">
                                <span style="margin: 0px; padding: 0px; font-weight: bold">Khuyến mãi:</span>
                                <span style="margin: 0px; padding: 0px;font-size: 22px; font-weight: bold; color: red">
                                  &nbsp;{{ isset($data->product_sale_price)?number_format($data->product_sale_price,0,",",".").' ₫' :"" }}
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

                    <p style="color: #9e9e9e; font-size: 14px"><b>Thương hiệu: </b> <span style="color: #1a9cb7">{{isset($data->brand_name)?$data->brand_name:""}} | {{isset($data->category_name)?$data->category_name:""}} </span> </p>

                    @if($data->size)
                        <p style="color: #222222"> <b>Size:</b> {{ $data->size }}</p>
                    @endif

                    @if(! empty($data->colors))
                        <p style="color: #222222"> <b>Size:</b>
                            @foreach( json_decode($data->colors, true) as $key => $value)
                                <a href="javascript:void(0)" data-img="{{ isset($value['image']) ? $value['image'] : '' }}" class="show-image">
                                    {{ $value['name'] }} @if(sizeof(json_decode($data->colors, true))-1 != $key) - @endif
                                </a>
                            @endforeach
                        </p>
                    @endif

                    <p style="color: #222222"><b>Tình trạng:</b>  @if(isset($data->product_so_luong) && $data->product_so_luong>0 )Còn hàng @else Hết hàng @endif </p>

                    <p style="color: #222222"><b>Kho hàng:</b> {{ isset($data->product_so_luong) ? $data->product_so_luong : '' }} </p>

                    <span>
                       <form action="{{url('cart')}}" method="POST">
                          {{ csrf_field() }}
                          <label>Số lượng:</label>
                          <input type="hidden" name="product_id" value="{{ isset($data->product_id)?$data->product_id:'' }}">
                          <input type="number" value="{{isset($so_luong)?$so_luong:1}}" name="so_luong" />
                          <button type="submit" data-qty-current="{{ isset($data->product_so_luong) ? $data->product_so_luong : 0 }}" class="btn btn-fefault add-cart cart">
                            <i class="fa fa-shopping-cart "></i>Thêm vào giỏ hàng
                          </button>
                       </form>
                    </span>

                    <div class="clear: both;"></div>
                    <div class="uu_dai" style="padding-left: 20px">
                        <img src="eshoper/images/uu-dai.png" style="height: 25px; margin-top: -21px; margin-left: 28px; ">
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
                                        <a href="{{url('chi-tiet-san-pham/'.$rows->product_id)}}" >
                                            <img class="product-hover img_product" src="{{'upload/product/'.$rows->product_image}}" style="border-radius: 10px; " alt="" />
                                            @if($rows->product_sale_price > 0)
                                                <div class="anh_sale">
                                                    <div class="phantram">
                                                        <?php $phantram = (($rows->product_price - $rows->product_sale_price)/$rows->product_price)*100  ?>
                                                        <b> -{{ round($phantram)}}% </b>
                                                    </div>

                                                </div>
                                            @endif
                                        </a>
                                        <div class="text-danger" style="margin-top: 3px">Mã SP: {{$rows->product_id}}</div>
                                        <div style="height: 45px;  margin-top: 5px">{{$rows->product_name}}</div>
                                        {{--                hiển thị Form có khuyến mãi và không có khuyễn mãi--}}
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
        </div>
        <!--/category-tab-->
    </div>
    &nbsp

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">&nbsp</h4>
                </div>
                <div class="modal-body">
                    <img class="img" src="" alt="" style="width: 550px; height: 550px">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.product_khuyen_mai')
@endsection

@section('custom_js')
    <script>
        $(document).ready(function (){
            $('.add-cart').click(function (e){
                let qty = $(this).closest('form').find('input[name="so_luong"]').val()
                let qty_current = $(this).data('qty-current')

                console.log(qty)
                console.log(qty_current)
                if (qty > qty_current) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Số lượng hiện tại không đủ',
                        text: 'Vui lòng liên hệ 0843190599',
                    })
                    return false
                }

                return true
            })
        })

        $('.show-image').click(function (){
            let img = $(this).data('img')
            $('#myModal').modal('show')
            $('#myModal').find('.img').attr('src', img)
        })

    </script>
@endsection
