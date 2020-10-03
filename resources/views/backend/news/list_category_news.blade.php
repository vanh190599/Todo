@extends('backend.layout.admin_layout')
@section('main')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh mục tin tức
            </div>
            <div class="w3-res-tb" ><a href="{{url('admin/add-news-category')}}" class="btn btn-primary ">Thêm Danh mục sản phẩm</a></div>

            <div class="row w3-res-tb" style="margin-top: -35px;">
                <p class="text-left" style="margin-top: 10px; margin-bottom: 3px; color:red;">&nbsp;&nbsp;&nbsp;
                    @if(session('message')!=null) {{session('message')}} @else @endif
                </p>
                <div class="col-sm-5 m-b-xs">
                    <a class="btn btn-sm btn-default" href="{{url('sapxep-category')}}">List theo Tên</a>
                    <a class="btn btn-sm btn-default" href="{{url('list-category')}}">List Thời gian tạo</a>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <form action="{{url('search-category/')}}" method="get">
                        <div class="input-group">
                            <input type="text" name="key" class="input-sm form-control" >
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
                            {{--                            <input type="checkbox"><i></i>--}}
                        </label>
                    </th>
                    <th style="color: black;" >STT</th>
                    <th style="color: black;" >Tên danh mục tin tức</th>
                    <th style="color: black;" >Mô tả danh mục tin tức</th>
                    <th style="color: black;" >Hiển thị</th>
                    <th style="color: black;" >Ngày thêm</th>
                </tr>
                </thead>
                <tbody>

                <?php $i = 1; ?>
                @foreach($data as $rows)
                    <tr>
                        <td><label class="i-checks m-b-none"><i></i></label></td>
                        <td style="color: black;">{{$i++}}</td>
                        <td style="color: black;">{{$rows->news_category_name}}</td>
                        <td style="color: black;">{{$rows->news_category_desc}}</td>
                        <td>
                        <span class="text-ellipsis" style="@if($rows->news_category_status==1) color:black; @endif ">
                            @if($rows->news_category_status==1) Hiện @else Ẩn @endif
                        </span></td>
                        <td><span class="text-ellipsis">{{$rows->created_at}}</span></td>

                        <td>
                            <a href="{{url('admin/edit-news-category/'.$rows->news_category_id )}}" class="active" ui-toggle-class="">
                                <i class="fa fa-pencil-square-o text-success text-active" alt="Sửa">Sửa</i>
                            </a>
                            &nbsp; &nbsp;
                            <a href="{{url('admin/delete-news-category/'.$rows->news_category_id )}}">
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

        <footer class="panel-footer">
            <div class="row">

            </div>
        </footer>
    </div>
    </div>
@endsection
