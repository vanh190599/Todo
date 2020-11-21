@extends('backend.layout.admin_layout')
@section('main')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <a href="javascript:void(0)">
                <div class="panel-heading">
                    Danh mục sản phẩm
                </div>
            </a>s


            <div class="w3-res-tb" ><a href="{{url('admin/add-product')}}" class="btn btn-primary ">Add product</a></div>
            <div class="text-danger text-center @if(isset($message)) w3-res-tb  @endif ">
                <i>{{isset($category_name)?"Kết quả lọc: ".$category_name:""}}</i>
                <i>{{isset($key_search)?"Kết quả tìm kiếm cho ".$key_search:""}}</i>
            </div>
            <div class="row w3-res-tb" style="margin-top: -35px;">
                <p class="text-left" style="margin-top: 10px; margin-bottom: 3px; color:red;">&nbsp;&nbsp;&nbsp;
                    @if(session('add')!=null) {{session('add')}} @else @endif
                </p>
                <div class="col-sm-5 m-b-xs">
                    <form action="{{url("admin/fil-product")}}" method="get">
                        <select class="input-sm form-control w-sm inline v-middle" name="category_id">
                            @foreach($category as $rows)
                                <option value="{{$rows->category_id}}" @if(isset($check) && $check == $rows->category_id ) selected @endif >{{$rows->category_name}}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-sm btn-default">Filter</button>
                    </form>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <form action="{{url('admin/search-product')}}" method="get">
                        <div class="input-group">
                            <input type="text" name="key" class="input-sm form-control" >
                            <span class="input-group-btn">
                                <button class="btn btn-sm btn-default" type="submit">Search</button>
                            </span>
                    </form>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                <tr>
                    <th  style="color: black;" >#</th>
                    <th  style="color: black;" >Image</th>
                    <th  style="color: black;" >Category</th>
                    <th style="color: black;" >Brand</th>
                    <th style="color: black;" >Name</th>
                    <th style="color: black;" >Price</th>
                    <th style="color: black;" >Price Sale</th>
                    <th style="color: black;" >Qty</th>
                    <th style="color: black;" >Saled</th>
                    <th style="color: black;" >Show</th>
                    <th style="color: black;" >Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($data as $key => $rows)
                    <tr>
                        <td style="color: black;">{{ $key + $data->firstItem() }}</td>
                        <td style="color: black;">
                            <img class="" style="width: 70px; height: 70px; border: 1px solid #dddddd; border-radius: 8px; " src="upload/product/{{$rows->product_image}}" alt="">
                        </td>
                        <td style="color: black;">
                            <?php
                            $category_name = DB::table('tbl_category')->where('category_id', $rows->category_id)->value('category_name');
                            echo $category_name;
                            ?>
                        </td>
                        <td style="color: black;">
                            <?php
                            $brand_name = DB::table('tbl_brand')->where('brand_id', $rows->brand_id)->value('brand_name');
                            echo $brand_name;
                            ?>
                        </td>
                        <td style="color: black;"> {{ isset($rows->product_name)?$rows->product_name:''  }} </td>
                        <td style="color: black; text-decoration: line-through"> {{ isset($rows->product_price)?number_format($rows->product_price):'' }} </td>
                        <td style="color: black;"> {{ isset($rows->product_sale_price)?number_format($rows->product_sale_price):'' }} </td>
                        <td style="color: black;"> {{ isset($rows->product_so_luong)?number_format($rows->product_so_luong):''  }} </td>
                        <td style="color: black;"> {{ isset($rows->product_so_luong_ban)?number_format($rows->product_so_luong_ban):''  }} </td>

                        <td>
                        <span class="text-ellipsis" style="@if($rows->product_status==1) color:black; @endif ">
                            @if($rows->product_status==1) Hiện @else Ẩn @endif
                        </span></td>

                        <td>
                            <a href="{{url('admin/edit-product/'.$rows->product_id )}}" class="active" ui-toggle-class="">
                                <i class="fa fa-pencil-square-o text-success text-active" alt="Sửa">Sửa</i>
                            </a>
                            &nbsp; &nbsp;
                            <a href="{{url('admin/delete-product/'.$rows->product_id )}}">
                                <i class="fa fa-times text-danger text" onclick="return window.confirm('Are you sure?');" id="delete">Xóa</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div style="padding: 10px;" class="text-center">
            {{ $data->render() }}
        </div>
    </div>
@endsection
