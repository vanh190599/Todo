@extends('backend.layout.admin_layout')
@section('main')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách Quản trị viên
            </div>
            <div class="w3-res-tb" ><a href="{{url('admin/admin/add-admin')}}" class="btn btn-primary ">Thêm Admin</a></div>
            <div class="row w3-res-tb" style="margin-top: -35px;">
                <p class="text-left" style="margin-top: 10px; margin-bottom: 3px; color:red;">&nbsp;&nbsp;&nbsp;
                    @if(session('add')!=null) {{session('add')}} @else @endif
                    {{isset($message)?$message:""}}
                </p>
                <div class="col-sm-5 m-b-xs">
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <form action="{{ route('admin.index') }}" method="get">
                        <div class="input-group">
                            <input type="text" name="search" value="{{ request()->search }}" class="input-sm form-control" placeholder="Nhập từ khóa">
                            <span class="input-group-btn">
                             <button class="btn btn-sm btn-default" type="submit">Tìm kiếm</button>
                            </span>
                    </form>
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
                    <th style="color: black;" >Ngày thêm</th>
                    <th style="color: black;" >Thao tác</th>
                </tr>
                </thead>
                <tbody>

                <?php $i=1; ?>
                @if(!empty($admins))
                @foreach($admins as $key => $admin)
                    <tr>
                        <td></td>
                        <td style="color: black">{{ $key + $admins->firstItem()  }}</td>
                        <td style="color: black;">{{ $admin->admin_name }}</td>
                        <td style="color: black;">{{ $admin->admin_email }}</td>
                        <td style="color: black;">{{ $admin->admin_phone }}</td>
                        <td>
                            <span class="text-ellipsis">{{$admin->created_at}}</span>
                        </td>

                        <td>
                            <a href="{{url('admin/admin/edit-admin/'.$admin->admin_id )}}" class="active" ui-toggle-class="">
                                <i class="fa fa-pencil-square-o text-success text-active" alt="Sửa">Sửa</i>
                            </a>
                            &nbsp; &nbsp;
                            <a href="{{url('admin/admin/delete-admin/'.$admin->admin_id )}}">
                                <i class="fa fa-times text-danger text" onclick="return window.confirm('Are you sure?');" id="delete">Xóa</i>
                            </a>
                        </td>

                    </tr>
                @endforeach
                @else
                    <tr>
                        <td colspan="7"> Không có dữ liệu </td>
                    </tr>
                @endif
                </tbody>
            </table>

        </div>
        <div style="padding: 10px;" class="text-center">
            {{ $admins->render() }}
        </div>

        <footer class="panel-footer">
            <div class="row">

            </div>
        </footer>
    </div>
    </div>
    <script !src="">

    </script>

@endsection
