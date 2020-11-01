@extends('backend.layout.admin_layout')
@section('main')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thương hiệu sản phẩm
            </div>
            <div class="w3-res-tb" ><a href="{{url('admin/add-brand')}}" class="btn btn-primary ">Add Brand</a></div>
            <div class="row w3-res-tb" style="margin-top: -35px;">
                <p class="text-left" style="margin-top: 10px; margin-bottom: 3px; color:red;">&nbsp;&nbsp;&nbsp;
                    @if(session('add')!=null) {{session('add')}} @else @endif
                </p>
                <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="0">Bulk action</option>
                        <option value="1">Delete selected</option>
                        <option value="2">Bulk edit</option>
                        <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-default">Apply</button>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <form action="{{ url('admin/search-brand') }}" method="get">
                        <div class="input-group">
                            <input type="text" name="key" class="input-sm form-control" placeholder="Search">
                            <span class="input-group-btn">
                  <button class="btn btn-sm btn-default" type="submit">Search</button>
                  </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th></th>
                        <th style="color: black;" >#</th>
                        <th style="color: black;" >Name</th>
                        <th style="color: black; width: 600px;" >Description</th>
                        <th style="color: black;" >Show</th>
                        <th style="color: black;" >Create</th>
                        <th style="color: black;" >Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; ?>
                    @foreach($data as $rows)
                        <tr>
                            <td></td>
                            <td style="color: black">{{ $i++ }}</td>
                            <td style="color: black;">{{$rows->brand_name}}</td>
                            <td style="color: black;">{{$rows->brand_description}}</td>
                            <td>
                     <span class="text-ellipsis" style="@if($rows->brand_status==1) color:black; @endif ">
                     @if($rows->brand_status==1) Hiện @else Ẩn @endif
                     </span>
                            </td>
                            <td><span class="text-ellipsis">{{$rows->created_at}}</span></td>
                            <td>
                                <a href="{{url('admin/edit-brand/'.$rows->brand_id )}}" class="active" ui-toggle-class="">
                                    <i class="fa fa-pencil-square-o text-success text-active" alt="Sửa">Edit</i>
                                </a>
                                &nbsp; &nbsp;
                                <a href="{{url('admin/delete-brand/'.$rows->brand_id )}}">
                                    <i class="fa fa-times text-danger text" onclick="return window.confirm('Are you sure?');" id="delete">Delete</i>
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
