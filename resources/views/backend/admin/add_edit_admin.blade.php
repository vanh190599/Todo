@extends('backend.layout.admin_layout')
@section('main')
    <div class="row">
            <div class="col-lg-12">
            <div class="panel-heading" style="font-weight: bold; color: blue;">
                @if( !isset($record->admin_name))Thêm Quản trị viên @else Sửa thông tin Quản trị viên @endif
            </div>
            <section class="panel">
                <div class="panel-body">
                    <div class="col-lg-12 text-danger text-center">
                    </div>
                    <div class="position-center">
                        <form role="form" method="post" action="{{url( $formAction )}}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="exampleInputEmail1">Họ Tên</label>
                                <input type="text" value="{{isset($old_data["admin_name"])?$old_data["admin_name"]:""}} {{isset($record->admin_name)?$record->admin_name:""}}"
                                       required class="form-control" name="admin_name" id="exampleInputEmail1" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" value="{{isset($record->admin_email)?$record->admin_email:""}}"
                                       required class="form-control" name="admin_email" id="exampleInputEmail1" {{isset($record)?"readonly":""}} >
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Điện thoại</label>
                                <input type="text" value="{{isset($record->admin_phone)?$record->admin_phone:""}}"
                                       required class="form-control" name="admin_phone" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">
                                    @if( !isset($record->admin_name))Mật khẩu @else Mật khẩu mới @endif
                                </label>
                                <input type="password" id="pass1"
                                        class="form-control" {{isset($record)?"":"required"}} id="exampleInputEmail1" >
                            </div>
                            <div class="text-info" style="margin-bottom: 10px;">
                                <p>{{ isset($record)?"* không thay đổi mật khẩu thì không cần nhập. ":"" }}</p>
                                <p>* Mật khẩu không chứa kí tự đặc biệt, độ dài từ 3->30.</p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nhập lại Mật khẩu</label>
                                <input type="password" id="pass2" value=""
                                       class="form-control" {{isset($record)?"":"required"}} name="admin_password" id="exampleInputEmail1" >
                            </div>

                            <div class="text-center text-danger" style="font-size: 20px;">
                               @if(session('message')!=null) {{session('message')}} @else @endif
{{--                                Error: Email đã tồn tại !--}}
                            </div>
                            <button type="submit" class="btn btn-info" onclick="return check()">Thực hiện</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>

        <script !src="">
            function check() {
                var pass1 = document.getElementById('pass1').value;
                var pass2 = document.getElementById('pass2').value;
                var regex = '[a-zA-Z0-9]$';
                //khi edit nếu bằng rỗng thì cho submit (khong thay doi mat khau)
                if(pass1 == ""){
                    return true;
                }
                else if(!pass1.match(regex) ){
                    alert("Nhập mật khẩu không chứa kí tự đặc biệt");
                    return false;
                }
                else if(pass1.length < 3 || pass1.length > 30){
                    // 3 den 30 ki tu
                    alert("Nhập mật khẩu từ phải từ 3-30 kí tự");
                    return false;
                }
                //neu sai thi dung lai, neu dung thi return true tiep tuc submit
                else if(pass1 != pass2){
                    alert('Mật khẩu không khớp');
                    return false;
                }
            }
        </script>

@endsection
