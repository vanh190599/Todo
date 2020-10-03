@extends('backend.layout.admin_layout')
@section('main')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách khách hàng
            </div>
            <div class="row w3-res-tb" style="margin-top: -35px;">
                <p class="text-left" style="margin-top: 10px; margin-bottom: 3px; color:red;">&nbsp;&nbsp;&nbsp;
                    @if(session('message')!=null) {{session('message')}} @else @endif
                </p>
                <div class="col-sm-5 m-b-xs">
                </div>
                <div class="col-sm-4">
                </div>

                <div class="col-sm-3">
                    <form action="{{ url('customer/customer/search-customer') }}" method="get">
                        <div class="input-group">
                            <input type="text" name="key" class="input-sm form-control" placeholder="Search">
                            <span class="input-group-btn">
                      <button class="btn btn-sm btn-default" type="submit">Tìm kiếm</button>
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
                        </label>
                    </th>
                    <th style="color: black;" >STT</th>
                    <th style="color: black;" >Họ tên</th>
                    <th style="color: black;" >Email</th>
                    <th style="color: black;" >Điện thoại</th>
                    <th style="color: black;" >Thời gian tạo</th>
                </tr>
                </thead>
                <tbody>

                <?php $i=1; ?>
                @foreach($data as $rows)
                    <tr>
                        <td></td>
                        <td style="color: black">{{ $i++ }}</td>
                        <td style="color: black;">{{$rows->customer_name}}</td>
                        <td style="color: black;">{{$rows->customer_email}}</td>
                        <td style="color: black;">{{$rows->customer_phone}}</td>
                        <td>
                            <span class="text-ellipsis">{{$rows->created_at}}</span>
                        </td>

                        <td>
                            <a href="{{url('admin/delete-customer/'.$rows->customer_id )}}">
                                <i class="fa fa-times text-danger text" onclick="return window.confirm('Are you sure?');" id="delete">Xóa</i>
                            </a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div style="padding: 10px;" class="text-center">
            {{$data->render()}}
        </div>

        <footer class="panel-footer">
            <div class="row">

            </div>
        </footer>
    </div>
    </div>
@endsection
