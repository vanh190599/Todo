@extends('backend.layout.admin_layout')
@section('main')
<div class="container-fluid">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <div class="text-center text-1">
            Giới thiệu về trang web
        </div>

        <div class="form-group" >
            <form action="{{ route('admin.introduce.store') }}" method="post">
                @csrf
                <div class="text-center text-2">Mô tả <span class="text-danger">*</span></div>

                <textarea rows="6" value="{{ old('content1') }}" name="content1" class="form-control"> {!! isset($intro->content) ? $intro->content : '' !!} </textarea>
                <script type="text/javascript">
                    CKEDITOR.replace("content1", {
                        height: '800px',
                    });
                </script>
                <div style="background: white; padding: 10px; text-align: center">
                    <button class="btn btn-primary">Cập nhật</button>
                </div>
            </form>
        </div>

    </div>
    <div class="col-lg-1"></div>
</div>
@endsection

@section('custom_css')
    <style>
        .text-1 {
            font-size: 18px;
        }
        .text-2 {
            font-weight: bold;
        }
        .ck-editor__editable {min-height: 500px;}
        .ck.ck-editor {
            max-width: 500px;
        }
    </style>
@endsection
