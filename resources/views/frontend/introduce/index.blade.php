@extends('frontend\layout')
@section('content')
    <div class="content">
        {!! isset($data->content) ? $data->content : 'Đang cập nhât...'  !!}
    </div>
@endsection

@section('custom_css')
    <style>
        .content {
            margin-top: 20px;
        }
    </style>
@endsection
