<div class="container-fluid">
    <div class="banner">
    </div>
</div>

<header id="header"><!--header-->
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
                                <select name="category_id" class="form-control" style="width: 190px" >
                                    <option value="0" >Tất cả danh mục</option>
                                    @foreach($category as $rows)
                                        <option value="{{ $rows->category_id }}" @if(isset($category_selected)&&$category_selected== $rows->category_id) selected @endif >
                                            {{ $rows->category_name }}
                                        </option>
                                        @endforeach
                                </select>
                                <input type="text" name="key" value="{{ isset($key)?$key:"" }}" class="form-control" placeholder="Tìm kiếm"/>
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

<div class="container">
    <div class="row">
        <div class="text-right " style="color: orangered; padding-bottom: 10px">
            @if(session('message-login')) <span class="glyphicon glyphicon-log-in"></span>  Đăng nhập thành công, xin chào {{ session('customer_name') }}! @endif
        </div>
    </div>
</div>

<style>
    .gio-hang1:hover .gio-hang-icon{
        background: orangered !important;
        transition: 0.9s;
    }
</style>

<div style="position: fixed; right: 20px; top: 20px; z-index: 10" class="gio-hang1">
    <a href="{{ url('show-cart') }}">
        <div class="gio-hang-icon"  style="width: 70px; height: 70px; background: #546ce8; display: flex; justify-content:center; align-items: center; border-radius: 35px; position: relative; border: 1px solid white;" >
            <b style="position: absolute; color: white; padding-bottom: 35px;">{{ Cart::content()->count() }}</b>
            <span class="glyphicon glyphicon-shopping-cart" style="font-size: 30px; width: 40px; height: 45px; color:white; margin-top: 23px;
margin-left: 7px;"></span>
        </div>
    </a>
</div>

{{--<hr style="margin-top: -7px; margin-bottom: 8px">--}}
