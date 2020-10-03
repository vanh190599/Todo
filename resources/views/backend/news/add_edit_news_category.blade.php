@extends('backend.layout.admin_layout')
@section('main')

    <div class="row">

        <div class="col-lg-12">
            <div class="panel-heading" style="font-weight: bold; color: blue;">
                Thêm danh mục tin tức
            </div>
            <section class="panel">
                <div class="panel-body">
                    <div class="col-lg-12 text-danger text-center">
                    </div>
                    <div class="position-center">
                        <form role="form" method="post" action="{{url( $formAction )}}">{{--                <form role="form" method="post" action="{{url('save-news_category')}}">--}}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục tin tức</label>
                                <input type="text" value="{{isset($record->news_category_name)?$record->news_category_name:""}}"
                                       required class="form-control" name="news_category_name" id="exampleInputEmail1" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả danh mục tin</label>
                                <textarea rows="6" style="resize: none;" name="news_category_desc" class="form-control" required>{{isset($record->news_category_desc)?$record->news_category_desc:""}}</textarea>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hiển thị</label>
                                <select name="news_category_status" id="get_status" class="form-control input-sm m-bot15">
                                    <option value="1" @if( isset($record->news_category_status) &&  $record->news_category_status== 1) selected @endif >Hiển thị</option>
                                    <option value="0" @if( isset($record->news_category_status) &&  $record->news_category_status== 0) selected @endif >Ẩn</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info">Thực hiện</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
@endsection
