@extends('backend.layout.admin_layout')
@section('main')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-shopping-cart"></span>
                Quản lý đơn hàng
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
                    <th style="width:20px;">
                        <label class="i-checks m-b-none">
                            {{--                            <input type="checkbox"><i></i>--}}
                        </label>
                    </th>
                    <th style="color: black;" >STT</th>
{{--                    <th style="color: black;" >Mã đơn hàng</th>--}}
                    <th style="color: black;" >Người Đặt</th>
                    <th style="color: black;" >Người nhận</th>
                    <th style="color: black;" >SĐT</th>
{{--                    <th style="color: black;" >Địa chỉ GH</th>--}}
{{--                    <th style="color: black;" >TT</th>--}}
                    <th style="color: black;" >Tổng tiền</th>
                    <th style="color: black;" >Trạng thái</th>
                    <th style="color: black;" >Thời gian đặt</th>
                </tr>
                </thead>
                <tbody>

                <?php $i = 1; ?>
                @foreach($data as $rows)
                    <tr>
                        <td><label class="i-checks m-b-none"><i></i></label></td>
                        <td style="color: black;">{{$i++}}</td>
{{--                        <td style="color: black;">{{ isset($rows->order_id)?$rows->order_id:'' }}</td>--}}
                        <td style="color: black;">{{ isset($rows->customer_name)?$rows->customer_name:'' }}</td>
                        <td style="color: black;">{{ isset($rows->shipping_name)?$rows->shipping_name:'' }}</td>
                        <td style="color: black;">{{ isset($rows->shipping_phone)?$rows->shipping_phone:'' }}</td>
{{--                        <td style="color: black;">{{ isset($rows->shipping_address)?$rows->shipping_address:'' }}</td>--}}
{{--                        <td style="color: black;">--}}
{{--                            @if( isset($rows->payment_menthod) && $rows->payment_menthod == 1)--}}
{{--                                ATM--}}
{{--                                @else--}}
{{--                                Tiền mặt--}}
{{--                            @endif--}}
{{--                        </td>--}}
                        <td style="color: black;">{{ isset($rows->order_total)?$rows->order_total:'' }}</td>
                        <td style="color: black;">
                            <form action="{{url('admin/update-order-status')}}" method="get">
                                <input type="hidden" name="order_id" value="{{ isset($rows->order_id)?$rows->order_id:'' }}">
                                <select name="order_status" style="padding: 3px; @if(isset($rows->order_status)  && $rows->order_status == 0 ) color:red; @else color:darkgreen @endif  ">
                                    <option value="1" @if(isset($rows->order_status)  && $rows->order_status == 1 ) selected  @endif >
                                        Đã nhận hàng
                                    </option>
                                    <option value="0" style="" @if(isset($rows->order_status)  && $rows->order_status == 0 ) selected @endif >
                                        Đang chờ xử lý
                                    </option>
                                </select>
                                <button type="submit" class="btn btn-sm  @if(isset($rows->order_status)  && $rows->order_status == 0 ) btn-danger @else btn-success @endif ">
                                    Cập nhật
                                </button>
                            </form>
                        </td>
                        <td><span class="text-ellipsis">{{ isset($rows->order_time)?$rows->order_time:'' }}</span></td>
                        <td>
                            <a href="{{url('admin/show-order-detail/'.$rows->order_id )}}" class="active"  ui-toggle-class="">
                                <i class="fa fa-pencil-square-o text-success" style="color: #1f568b"> Chi tiết</i>
                            </a>
                            &nbsp; &nbsp;
                            <a href="{{url('delete-category/'.$rows->order_id )}}">
                                <i class="fa fa-times text-danger text" onclick="return window.confirm('Are you sure?');" id="delete">Xóa</i>
                            </a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <div style="padding: 10px;" class="text-center">
            {{--            {{ $data->links() }}--}}
            {{$data->render()}}
        </div>

    </div>
    </div>

@endsection
