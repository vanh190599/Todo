@extends('backend.layout.admin_layout')
@section('main')
    <div class="text-uppercase;" style="background: #1f568b; padding: 20px; text-align: center; color: white; font-size: 25px">
        <span class="glyphicon glyphicon-shopping-cart" style="color: white"></span>
        Chi tiết đơn đặt hàng</div>
    {{-- Thông tin tài khoản người đặt    --}}
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thông tin người mua ( Account Customer)
            </div>
            <div class="w3-res-tb" ></div>
            <div class="row w3-res-tb" style="margin-top: -35px;">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <form action="{{url('search-order/')}}" method="get">
                        <div class="input-group">
                    </form>
                    </span>
                </div>
            </div>

            <div class="row w3-res-tb" style="margin-top: -35px;">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">

                    </form>
                    </span>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                <tr>
                    <th style="color:black;">Họ tên chủ TK</th>
                    <th style="color: black;" >Email</th>
                    <th style="color: black;" >Điện thoại liên hệ</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span class="text-ellipsis" style="color: black;">{{ isset($customer->customer_name)?$customer->customer_name:'' }}</span></td>
                        <td><span class="text-ellipsis" style="color: black;">{{ isset($customer->customer_email)?$customer->customer_email:'' }}</span></td>
                        <td><span class="text-ellipsis" style="color: black;">{{ isset($customer->customer_phone)?$customer->customer_phone:'' }}</span></td>

{{--                        <td style="width: 50px" >--}}
{{--                            <a href="{{url('delete-category/'.$customer->order_id )}}">--}}
{{--                                <i class="fa fa-times text-danger text" onclick="return window.confirm('Are you sure?');" id="delete">Xóa</i>--}}
{{--                            </a>--}}
{{--                        </td>--}}
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    </div>
    <br>
{{-- Thông tin SHIPPING    --}}
    <div class="table-agile-info">

        <div class="panel panel-default">
            <div class="panel-heading">
                Thông tin vận chuyển (shipping)
            </div>
            <div class="w3-res-tb" ></div>
            <div class="row w3-res-tb" style="margin-top: -35px;">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <form action="{{url('search-order/')}}" method="get">
                        <div class="input-group">
                    </form>
                    </span>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                <tr>
                    <th style="color:black;">Người nhận</th>
                    <th style="color: black;" >SDT nhận hàng</th>
                    <th style="color: black;" >Email</th>
                    <th style="color: black;" >Địa chỉ giao hàng</th>
                    <th style="color: black;" >Ghi chú</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span class="text-ellipsis" style="color: black;">{{ isset($shipping->shipping_name)?$shipping->shipping_name:'' }}</span></td>
                        <td><span class="text-ellipsis" style="color: black;">{{ isset($shipping->shipping_phone)?$shipping->shipping_phone:'' }}</span></td>
                        <td><span class="text-ellipsis" style="color: black;">{{ isset($shipping->shipping_email)?$shipping->shipping_email:'' }}</span></td>
                        <td><span class="text-ellipsis" style="color: black;">{{ isset($shipping->shipping_address)?$shipping->shipping_address:'' }}</span></td>
                        <td>
                            <textarea name="" id="" cols="40" rows="4"> {{ isset($shipping->shipping_note)?$shipping->shipping_note:'' }}</textarea>
                        </td>
{{--                        <td style="width: 50px" >--}}
{{--                            <a href="{{url('delete-category/'.$shipping->shipping_id )}}">--}}
{{--                                <i class="fa fa-times text-danger text" onclick="return window.confirm('Are you sure?');" id="delete">Xóa</i>--}}
{{--                            </a>--}}
{{--                        </td>--}}
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    </div>
{{--    Chi tiết sản phẩm--}}
    <br>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading" style="background: red" >
                Danh sách chi tiết sản phẩm mua
            </div>
            <div class="w3-res-tb" ></div>
            <div class="row w3-res-tb" style="margin-top: -35px;">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <form action="{{url('search-order/')}}" method="get">
                        <div class="input-group">
                    </form>
                    </span>
                </div>
            </div>
            <div class="row w3-res-tb" style="margin-top: -35px;">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    </form>
                    </span>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                <tr>
                    <th style="color: black;" >STT</th>
                    <th style="color: black;" >Ảnh</th>
                    <th style="color: black;" >Mã SP</th>
                    <th style="color: black;" >Tên sản phẩm</th>
                    <th style="color: black;" >Giá bán lẻ</th>
                    <th style="color: black;" >Số lượng</th>
                    <th style="color: black">Tổng giá</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($product as $rows)
                    <tr>
                        <?php $img = DB::table('tbl_product')->where('product_id','=',$rows->product_id)->value('product_image'); ?>
                        <td style="color: black;">{{$i++}}</td>
                        <td style="color: black;">
                            <img src="upload/product/{{ $img }}" style="width: 80px; height: 80px; border: 1px solid #dddddd">
                        </td>
                        <td><span class="text-ellipsis" style="color: black;">{{ isset($rows->product_id)?$rows->product_id:'' }}</span></td>
                        <td><span class="text-ellipsis" style="color: black;">{{ isset($rows->product_name)?$rows->product_name:'' }}</span></td>
                        <td><span class="text-ellipsis" style="color: black; text-align: center">{{ isset($rows->product_price)?number_format($rows->product_price,0,',','.'):'' }}</span></td>
                        <td><span class="text-ellipsis" style="color: black; text-align: center">{{ isset($rows->product_sale_qty)?$rows->product_sale_qty:'' }}</span></td>
                        <td style="color:red; font-weight: bold"> {{ isset($rows->product_price)?number_format($rows->product_price*$rows->product_sale_qty,0,',','.'):'' }} đ </td>
{{--                        <td style="width: 50px" >--}}
{{--                            <a href="{{url('delete-category/'.$rows->order_id )}}">--}}
{{--                                <i class="fa fa-times text-danger text" onclick="return window.confirm('Are you sure?');" id="delete">Xóa</i>--}}
{{--                            </a>--}}
{{--                        </td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div style="padding: 10px;" class="text-center">
            {{ $product->links() }}
        </div>
    </div>
    </div>
@endsection
