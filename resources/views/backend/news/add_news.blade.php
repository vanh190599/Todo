@extends('backend.layout.admin_layout')
@section('main')


    <div class="row">
        <div class="col-lg-12">
            <div class="panel-heading" style="font-weight: bold; color: blue;">
                Thêm sản phẩm
            </div>
            <section class="panel">
                <div class="panel-body">
                    <div class="col-lg-12 text-danger text-center">
                    </div>
                    <div class="position-center">
                        <form enctype="multipart/form-data" role="form" method="post" action="{{ url('admin/do-add-news') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề</label>
                                <input type="text" value=""  required class="form-control" name="news_title" id="exampleInputEmail1" >
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">hình ảnh</label>
                                <input type="file" value="" required class="" name="news_image" id="exampleInputEmail1" >
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Thuộc danh mục</label>
                                <select name="news_category_id" id="get_status" class="form-control input-sm m-bot15">
                                    @foreach($news_category as $rows)
                                        <option value="{{isset($rows->news_category_id)?"$rows->news_category_id":""}}">{{ isset($rows->news_category_name)?"$rows->news_category_name":"" }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tin hot</label>
                                <select name="news_hot" class="form-control input-sm m-bot15">
                                    <option value="1" >Tin hot</option>
                                    <option value="0" >Không</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả ngắn gọn</label>
                                <textarea rows="6" style="resize: none" name="news_desc" class="form-control"></textarea>
                                <script type="text/javascript">
                                    // CKEDITOR.replace("news_desc");
                                </script>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung</label>
                                <textarea rows="6" style="resize: none" name="news_content" class="form-control"></textarea>
                                <script type="text/javascript">
                                    CKEDITOR.replace("news_content");
                                </script>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Hiển thị</label>
                                <select name="news_status" id="get_status" class="form-control input-sm m-bot15">
                                    <option value="1" >Hiển thị</option>
                                    <option value="0" >Ẩn</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info">Thực hiện</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>



@endsection
