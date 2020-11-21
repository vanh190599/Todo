@extends('backend.layout.admin_layout')
@section('main')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Danh mục
        </div>
        <div class="w3-res-tb" ><a href="{{url('add-category')}}" class="btn btn-primary ">Add category</a></div>
{{--        <div class="{{isset($message)?"w3-res-tb":""}} text-danger" >--}}
{{--            <i>{{isset($message)?$message:""}}</i>--}}
{{--        </div>--}}
        <div class="row w3-res-tb" style="margin-top: -35px;">
            <p class="text-left" style="margin-top: 10px; margin-bottom: 3px; color:red;">&nbsp;&nbsp;&nbsp;
                @if(session('add')!=null) {{session('add')}} @else @endif
            </p>
            <div class="col-sm-5 m-b-xs">
                <a class="btn btn-sm btn-default" href="{{url('sapxep-category')}}">Sort by name</a>
                <a class="btn btn-sm btn-default" href="{{url('list-category')}}">Sort by time create</a>
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
                    <th style="color: black;" >#</th>
                    <th style="color: black;" >Name</th>
                    <th style="color: black; width: 600px" >Description</th>
                    <th style="color: black;" >Show</th>
                    <th style="color: black;" >Created</th>
                    <th style="color: black;" >Action</th>
                </tr>
                </thead>
                <tbody>

                <?php $i = 1; ?>
                @foreach($data as $rows)
                <tr>
                    <td><label class="i-checks m-b-none"><i></i></label></td>
                    <td style="color: black;">{{$i++}}</td>
                    <td style="color: black;">{{$rows->category_name}}</td>
                    <td style="color: black;">{{$rows->category_description}}</td>
                    <td>
                        <span class="text-ellipsis" style="@if($rows->category_status==1) color:black; @endif ">
                            @if($rows->category_status==1) Hiện @else Ẩn @endif
                        </span></td>
                    <td><span class="text-ellipsis">{{$rows->created_at}}</span></td>

                    <td>
                        <a href="{{url('edit-category/'.$rows->category_id )}}" class="active" ui-toggle-class="">
                            <i class="fa fa-pencil-square-o text-success text-active" alt="Sửa">Sửa</i>
                        </a>
                        &nbsp; &nbsp;
                        <a href="{{url('delete-category/'.$rows->category_id )}}">
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

{{--                <div class="col-sm-5 text-center">--}}
{{--                    <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>--}}
{{--                </div>--}}
{{--                <div class="col-sm-7 text-right text-center-xs">--}}
{{--                    <ul class="pagination pagination-sm m-t-none m-b-none">--}}
{{--                        <li><a href=""><i class="fa fa-chevron-left"></i></a></li>--}}
{{--                        <li><a href="">1</a></li>--}}
{{--                        <li><a href="">2</a></li>--}}
{{--                        <li><a href="">3</a></li>--}}
{{--                        <li><a href="">4</a></li>--}}
{{--                        <li><a href=""><i class="fa fa-chevron-right"></i></a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}

            </div>
        </footer>
    </div>
</div>

<script !src="">

</script>

    @endsection
