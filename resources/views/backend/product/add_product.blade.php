@extends('backend.layout.admin_layout')
@section('main')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"
          integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
          crossorigin="anonymous" />

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
                        <form enctype="multipart/form-data" role="form" method="post" action="{{url( $formAction )}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="{{ old('product_name') }}" name="product_name" id="exampleInputEmail1" >
                                @error('product_name')
                                <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh <span class="text-danger">*</span></label><br>
                                <input type="file" value="" onchange="loadFile_1(event)"  class="" name="product_image" id="exampleInputEmail1" style="margin-bottom: 5px">
                                <img src="" id="image_1" style="display: none" alt="">
                                @error('product_image')
                                <span class="form-text text-danger">{{ $message }}</span>
                                @enderror

                                <script>
                                    var loadFile_1 = function(event) {
                                        var img = document.getElementById('image_1');
                                        img.setAttribute("style", "width: 130px");
                                        img.setAttribute("style", "margin-bottom: 5px");
                                        img.setAttribute("style", "height: 130px");
                                        var output_1 = document.getElementById('image_1');
                                        output_1.src = URL.createObjectURL(event.target.files[0]);
                                        output_1.onload = function() {
                                            URL.revokeObjectURL(output_1.src)
                                        }
                                    };
                                </script>
                            </div>

                            <div class="form-group">
                                <label>Chọn ảnh</label>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Màu</th>
                                            <th width="300px">Chọn ảnh</th>
                                            <th width="80px">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" name="color_name" class="form-control"></td>
                                            <td>
                                                <div style="display: flex">
                                                    <img id="img" class="" width="80px" height="80px" src="{{ asset('images/default.jpg') }}" alt="" style="margin-right: 10px; object-fit: cover">
                                                    <input type="file" name="color_image" class="uploadFile">
                                                </div>
                                            </td>
                                            <td style="vertical-align: inherit; text-align: center">
                                                <button class="btn btn-primary add-color">Thêm</button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Xanh</td>
                                            <td><img src="" alt="" style="height: 80px; width: 80px; object-fit: cover"></td>
                                            <td><button class="btn-danger btn">Xóa</button></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Danh mục <span class="text-danger">*</span></label>
                                <select name="category_id" id="get_status" class="form-control input-sm m-bot15">
                                    @foreach($category as $rows)
                                        <option value="{{isset($rows->category_id)?"$rows->category_id":""}}">{{ isset($rows->category_name)?"$rows->category_name":"" }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hãng sản xuất <span class="text-danger">*</span></label>
                                <select name="brand_id" id="get_status" class="form-control input-sm m-bot15">
                                    @foreach($brand as $rows)
                                        <option value="{{isset($rows->brand_id)?"$rows->brand_id":""}}">{{ isset($rows->brand_name)?"$rows->brand_name":"" }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá gốc <span class="text-danger">*</span></label>
                                <input value="{{ old('product_price') }}" class="form-control"  name="product_price" id="exampleInputEmail1" >
                                @error('product_price')
                                <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá bán <span class="text-danger">*</span></label>
                                <input class="form-control" value="{{ old('product_sale_price') }} " name="product_sale_price" id="exampleInputEmail1" >
                                @error('product_sale_price')
                                <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Số lượng <span class="text-danger">*</span></label>
                                <input value="{{ old('product_so_luong') }}" class="form-control" name="product_so_luong" id="exampleInputEmail1" >
                                @error('product_so_luong')
                                <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputEmail1">Số lượng đã bán <span class="text-danger">*</span></label>--}}
{{--                                <input type="number" value=""--}}
{{--                                        class="form-control" name="product_so_luong_ban" id="exampleInputEmail1" >--}}
{{--                            </div>--}}

                            <input type="hidden" name="" id="">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả <span class="text-danger">*</span></label>
                                <textarea rows="6" style="resize: none" value="{{ old('product_desc') }}" required name="product_desc" class="form-control"></textarea>
                                <script type="text/javascript">
                                    CKEDITOR.replace("product_desc");
                                </script>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Ưu đãi <span class="text-danger">*</span></label>
                                <textarea rows="6" style="resize: none" value="{{ old('product_uu_dai') }}" required name="product_uu_dai" class="form-control"></textarea>
                                <script type="text/javascript">
                                    CKEDITOR.replace("product_uu_dai");
                                </script>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Hiển thị</label>
                                <select name="product_status" id="get_status" class="form-control input-sm m-bot15">
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


        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
                integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
                crossorigin="anonymous"></script>

        <script>
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            $('.uploadFile').on('change', function (e) {
                var file_data = e.target.files[0];
                console.log(file_data)
                var type = file_data.type;
                var name = file_data.name;
                var match = ["image/png", "image/jpg", "image/jpeg"];

                if (type == match[0] || type == match[1] || type == match[2] || type == match[3] || type == match[4]) {
                    var form_data = new FormData();
                    form_data.append('file', file_data);
                    $.ajax({
                        url: "{{ route('admin.upload') }}",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (res) {
                            if (res.success == 1) {
                                let url = BASE_URL + '/upload/upload/'+ res.data;
                                $('#img').attr('src', url)


                                toastr.success('Tải ảnh thành công', 'success')
                            } else {
                                toastr.error('Upload thất bại!');
                            }
                        }
                    });
                } else {
                    toastr.error('Sai định dạng file!');
                    return false;
                }
            })



        </script>
@endsection
