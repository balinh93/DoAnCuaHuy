@extends('admin.layout')

@section('title', 'Chỉnh sửa loại sản phẩm')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chỉnh sửa loại sản phẩm</h1>
                <form action="{{ route('editCate', ['id' => $cateId])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nhập tên loại sản phẩm</label>
                            <input class="form-control" name="name" id="productInput" value="{{$name}}">
                            <div id="productError" style="color: red;"></div>
                        </div>
                        <div class="form-group">
                            <label>Nhập mô tả</label>
                            <input class="form-control" type="text" name="desc" value="{{$mota}}">
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-top: 20px">Thêm sản phẩm</button>
                    </div>
                    </form>
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<script>
        var form = document.querySelector("form");
    var productInput = document.getElementById("productInput");
    var categorySelect = document.getElementById("categorySelect");
    var priceInput = document.getElementById("priceInput");
    var contentInput = document.getElementById("contentInput");

    form.addEventListener("submit", function(event) {
        var hasError = false; // Biến kiểm tra lỗi

        // Xóa thông báo lỗi trước khi kiểm tra
        var errorDivs = document.querySelectorAll(".error-message");
        for (var i = 0; i < errorDivs.length; i++) {
            errorDivs[i].textContent = "";
        }

        // Kiểm tra tên sản phẩm
        if (productInput.value.trim() === "") {
            var productError = document.getElementById("productError");
            productError.textContent = "Vui lòng nhập tên loại sản phẩm.";
            hasError = true;
        }
        // Nếu có lỗi, ngăn chặn form submit
        if (hasError) {
            event.preventDefault();
        }
    });
</script>
@endsection