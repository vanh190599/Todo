@extends('backend.layout.admin_layout')
@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-heading" style="font-weight: bold; color: blue;">
                Sửa thông tin sản phẩm
            </div>

            <section class="panel">
                <div class="panel-body">
                    <div class="col-lg-12 text-danger text-center">
                    </div>

                    <div class="position-center">
                        <form enctype="multipart/form-data" role="form" method="post" action="{{url( $formAction )}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" value="{{isset($record->product_name)?$record->product_name:""}}"
                                       required class="form-control" name="product_name" id="exampleInputEmail1" >
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh</label>
                                <input type="file" value="{{isset($record->product_name)?$record->product_name:""}}"
                                        class="" name="product_image" id="exampleInputEmail1" >
                                <img src="upload/product/{{$record->product_image}}" style="width: 170px; height: 170px; padding: 5px;
                                    border:1px solid #dddddd; margin-top: 7px" alt="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Size</label>
                                <input type="text" name="size" value="{{ old('size', $record->size) }}"
                                       required class="form-control" id="exampleInputEmail1" >
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Size</label>
                                <select name="category_id" id="get_status" class="form-control input-sm m-bot15">
                                    @foreach($category as $rows)
                                        <option @if(isset($rows->category_id) && $rows->category_id == $record->category_id) selected @endif
                                        value="{{isset($rows->category_id)?"$rows->category_id":""}}">{{ isset($rows->category_name)?"$rows->category_name":"" }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Hãng</label>
                                <select name="brand_id" id="get_status" class="form-control input-sm m-bot15">
                                    @foreach($brand as $rows)
                                        <option @if(isset($rows->brand_id) && $rows->brand_id == $record->brand_id) selected @endif
                                        value="{{isset($rows->brand_id)?"$rows->brand_id":""}}">{{ isset($rows->brand_name)?"$rows->brand_name":"" }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá gốc</label>
                                <input type="" value="{{isset($record->product_price)?$record->product_price:""}}"
                                       required class="form-control" name="product_price" id="exampleInputEmail1" >
                                @error('product_price')
                                <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá bán</label>
                                <input type="" value="{{isset($record->product_sale_price)?$record->product_sale_price:""}}"
                                       required class="form-control" name="product_sale_price" id="exampleInputEmail1" >
                                @error('product_sale_price')
                                <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputEmail1">Bảo hành</label>--}}
{{--                                <input type="text" value="{{isset($record->product_bao_hanh)?$record->product_bao_hanh:""}}"--}}
{{--                                       required class="form-control" name="product_bao_hanh" id="exampleInputEmail1" >--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số lượng</label>
                                <input type="" value="{{isset($record->product_so_luong)?$record->product_so_luong:""}}"
                                       required class="form-control" name="product_so_luong" id="exampleInputEmail1" >
                                @error('product_so_luong')
                                <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputEmail1">Số lượng đã bán</label>--}}
{{--                                <input type="number" value="{{isset($record->product_so_luong_ban)?$record->product_so_luong_ban:""}}"--}}
{{--                                       required class="form-control" name="product_so_luong_ban" id="exampleInputEmail1" >--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả</label>
                                <textarea rows="30" style="resize: none" name="product_desc" class="form-control">{{isset($record->product_desc)?$record->product_desc:""}}</textarea>
                                <script type="text/javascript">
                                    CKEDITOR.replace("product_desc");
                                </script>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Ưu đãi</label>
                                <textarea rows="6" style="resize: none" name="product_uu_dai" class="form-control">{{isset($record->product_uu_dai)?$record->product_uu_dai:""}}</textarea>
                                <script type="text/javascript">
                                    CKEDITOR.replace("product_uu_dai");
                                </script>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Hiển thị</label>
                                <select name="product_status" id="get_status" class="form-control input-sm m-bot15">
                                    <option value="1" @if( isset($record->product_status) &&  $record->product_status== 1) selected @endif >Hiển thị</option>
                                    <option value="0" @if( isset($record->product_status) &&  $record->product_status== 0) selected @endif >Ẩn</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info">Thực hiện</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
@endsection
