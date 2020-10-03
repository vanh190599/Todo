@extends('backend.layout.admin_layout')
@section('main')

    <div class="row">

        <div class="col-lg-12">
            <section class="panel">
                <div class="panel-body">
                    <div class="col-lg-12 text-danger text-center">
                    </div>
                    <div class="position-center">
                        <form role="form" method="post" action="{{url( $formAction )}}" enctype="multipart/form-data">
                            {{--                <form role="form" method="post" action="{{url('save-brand')}}">--}}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thương hiệu</label>
                                <input type="text" value="{{isset($record->brand_name)?$record->brand_name:""}}"
                                       required class="form-control" name="brand_name" id="exampleInputEmail1" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                <textarea rows="6" style="resize: none;" name="brand_description" class="form-control">{{isset($record->brand_description)?$record->brand_description:""}}</textarea>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hiểt thị</label>
                                <select name="brand_status" id="get_status" class="form-control input-sm m-bot15">
                                    {{--                                phải bắt chặt điều kiện không thì báo lỗi $record not defined--}}
                                    <option value="1" @if( isset($record->brand_status) &&  $record->brand_status== 1) selected @endif >Hiển thị</option>
                                    <option value="0" @if( isset($record->brand_status) &&  $record->brand_status== 0) selected @endif >Ẩn</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info">Thực hiện</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
@endsection
