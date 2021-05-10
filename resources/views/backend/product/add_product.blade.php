@extends('backend.layout.admin_layout')
@section('main')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"
          integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
          crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
          integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
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
                            <input type="hidden" name="colors" >
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
                                <table class="table table-bordered table-color">
                                    <thead>
                                        <tr>
                                            <th>Màu</th>
                                            <th width="300px">Chọn ảnh</th>
                                            <th width="80px">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="form-color">
                                            <td><input type="text" name="color_name" class="form-control"></td>
                                            <td>
                                                <div style="display: flex">
                                                    <img id="img" class="" width="80px" height="80px" src="{{ asset('images/default.jpg') }}" alt="" style="margin-right: 10px; object-fit: cover">
                                                    <input type="file" name="color_image" class="uploadFile">
                                                </div>
                                                <input type="text" name="link_image" disabled style="width: 100%">
                                            </td>
                                            <td style="vertical-align: inherit; text-align: center">
                                                <a href="javascript:void(0)" class="btn btn-primary add-color">Thêm</a>
                                            </td>
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
                                <label for="exampleInputEmail1">Size <span class="text-danger">*</span></label>
                                <input type="text" name="size" class="form-control input-sm m-bot15">
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
                                <labelclass="product-information" for="exampleInputEmail1">Giá gốc <span class="text-danger">*</span></label>
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
                                <label for="exampleInputPassword1">Gợi ý sản phẩm <span class="text-danger">*</span></label>

                                <select class="js-example-basic-single" name="suggest[]" multiple="multiple">

                                </select>

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Hiển thị</label><br>
                                <select name="product_status form-control" id="get_status" class="form-control input-sm m-bot15">
                                    <option value="1" >Hiển thị</option>
                                    <option value="0" >Ẩn</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-info btn-submit">Thực hiện</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>

        <style>
            .select2-container.select2-container--default {
                width: 100% !important;
            }
        </style>



        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
                integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
                crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
                integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
                crossorigin="anonymous"></script>

        <script>
            $(document).ready(function() {
                var products = @json($allProduct);
                console.log(products)
                var data = []
                if (products.length > 0) {
                    console.log(23)
                    $.each(products, function (key, value) {
                        data.push({
                            id: value.product_id,
                            img: value.product_image,
                            text: value.product_name,
                        })
                    })
                }

                function formatState (state) {
                    if (!state.id) {
                        return state.text;
                    }
                    var img = "{{ asset('upload/product/') }}/" + state.img;
                    var $state = $(
                        '<span><img src="'+img+'" class="img-flag" style="width: 50px; height: 50px; object-fit: cover" /> ' + state.text + '</span>'
                    );
                    return $state;
                }

                $(".js-example-basic-single").select2({
                    templateResult: formatState,
                    data: data
                });

            });
        </script>

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
                                $('.form-color').find("input[name='link_image']").val(url)
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

            $(document).ready(function (){
                $('.add-color').on('click', function (){
                    let name = $('.form-color').find('input[name="color_name"]').val()
                    let link = $('.form-color').find('input[name="link_image"]').val()

                    if (name == "") toastr.error('Vui lòng nhập màu', 'error')
                    else if (link == "") toastr.error('Vui lòng chọn ảnh', 'error')
                    else {
                        let html = `
                        <tr class="color-item">
                            <td><input type="text" name="color_name" value="`+ name +`" class="form-control" disabled></td>
                            <td>
                                <div style="display: flex">
                                    <img id="img" class="" width="80px" height="80px" src="`+link+`" alt="" style="margin-right: 10px; object-fit: cover">
                                </div>
                            </td>
                            <td style="vertical-align: inherit; text-align: center">
                                <a href="javascript:void(0)" class="btn btn-danger delete-color">Xóa</a>
                            </td>
                        </tr>
                    `
                        $('.table-color').find('tbody').append(html)

                        $('#img').attr('src', '{{ asset("images/default.jpg") }}')
                        $('.form-color').find("input[name='color_name']").val('')
                    }
                })

                $(this).delegate('.delete-color', 'click', function (){
                    $(this).closest('.color-item').remove()
                })
            })
        </script>

        <script>
            $('.btn-submit').on('click', function (e){
                let color = $('.color-item')
                let listColor = []

                if (color.length > 0) {
                    $.each(color, function (key, value) {
                        let src = $(value).find('img').attr('src')
                        let name = $(value).find('input[name="color_name"]').val()

                        listColor.push({
                            name: name,
                            image: src
                        })
                    })
                    $('input[name="colors"]').val( JSON.stringify(listColor) )
                }
                console.log(listColor)

            })
        </script>
@endsection
