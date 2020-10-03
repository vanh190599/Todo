@extends('backend.layout.admin_layout')
@section('main')

<div class="row">

    <div class="col-lg-12">
        <div class="panel-heading" style="font-weight: bold; color: blue;">
            @if( !isset($record->admin_name))Thêm Danh mục @else Sửa danh mục @endif
        </div>
        <section class="panel">
            <div class="panel-body">
                <div class="col-lg-12 text-danger text-center">
                </div>
                <div class="position-center">
                    <form role="form" method="post" action="{{url( $formAction )}}">
{{--                <form role="form" method="post" action="{{url('save-category')}}">--}}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" value="{{isset($record->category_name)?$record->category_name:""}}"
                                   required class="form-control" name="category_name" id="exampleInputEmail1" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea rows="6" style="resize: none;" name="category_description" class="form-control" required>{{isset($record->category_description)?$record->category_description:""}}</textarea>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hiểt thị</label>
                            <select name="category_status" id="get_status" class="form-control input-sm m-bot15">
                                <option value="1" @if( isset($record->category_status) &&  $record->category_status== 1) selected @endif >Hiển thị</option>
                                <option value="0" @if( isset($record->category_status) &&  $record->category_status== 0) selected @endif >Ẩn</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-info">Thực hiện</button>
                    </form>
                </div>

            </div>
        </section>
    </div>



    @endsection
