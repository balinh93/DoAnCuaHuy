@extends('user.test')

@section('title1', 'Chi tiết sản phẩm')
    
@section('content1')
{{$title}}
{{$price}}₫
{{$content}}
<img src="{{ $image }}" alt="Mô tả ảnh">
@endsection