@extends('admin.layout')

@section('title', 'Chỉnh sửa sản phẩm')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chỉnh sửa sản phẩm</h1>
                <form action="{{ route('edit',['id' => $idProduct])}}" method="post" enctype="multipart/form-data">
                    @csrf   
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input class="form-control" name="title" id="productInput" value="{{$title}}">
                            <div id="productError" style="color: red;"></div>
                        </div>
                        <div class="form-group">
                            <label>Loại sản phẩm</label>
                            <select class="form-control" name="cate">
                                <option value="{{$cates}}">{{$name}}</option>
                                    @foreach($cate as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Giá tiền</label>
                            <input class="form-control" type="number" name="price" id="priceInput" value="{{$price}}">
                            <div id="priceError" style="color: red;"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Mô tả</label>
                            <input class="form-control" name="content" id="contentInput" value="{{$content}}">
                            <div id="contentError" style="color: red;"></div>
                        </div>
                        
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select class="form-control" name="status">
                                <option value="{{$status}}" >Trạng thái: 
                                    @if($status == 0)
                                        Xuất bản
                                    @else
                                        Nháp
                                    @endif
                                </option>
                                <option value="0" >Xuất bản</option>
                                <option value="1" >Nháp</option>
                            </select>
                        </div>
                        <div>
                            <label class="upload-button" for="image">Tải hình lên</label>
                            <input type="file" name="image" id="image" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-top: 20px">Chỉnh sửa sản phẩm</button>
                    </div>
                </form>
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    

    <script>
        var productInput = document.getElementById("productInput");
        var priceInput = document.getElementById("priceInput");
        var productError = document.getElementById("productError");
        var priceError = document.getElementById("priceError");
        var contentError = document.getElementById("contentError");
        var contentInput = document.getElementById("contentInput");
        

        productInput.addEventListener("blur", function() {
            if (productInput.value.trim() === "") {
                productError.textContent = "Vui lòng nhập tên sản phẩm.";
            } else {
                productError.textContent = "";
            }
        });

        priceInput.addEventListener("blur", function() {
            if (priceInput.value.trim() === "") {
                priceError.textContent = "Vui lòng nhập giá tiền.";
            } else {
                priceError.textContent = "";
            }
        });

        contentInput.addEventListener("blur", function() {
            if (contentInput.value.trim() === "") {
                contentError.textContent = "Vui lòng nhập mô tả.";
            } else {
                contentError.textContent = "";
            }
        });
    </script>
    <!-- /.container-fluid -->
</div>
@endsection