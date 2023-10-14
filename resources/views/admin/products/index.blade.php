@extends('admin.layout')

@section('title', 'Sản phẩm')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách sản phẩm</h1>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">Thêm mới sản phẩm</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    
                                        <form action="{{ route('xu-li-them-san-pham')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Nhập tên sản phẩm</label>
                                                    <input class="form-control" name="title" id="productInput">
                                                    <div id="productError" style="color: red;"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Loại sản phẩm</label>
                                                    <select class="form-control" name="cate" id="categorySelect">
                                                        <option value="">Chọn loại sản phẩm</option>
                                                        @foreach($cates as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div id="categoryError" style="color: red;"></div>
                                                </div>                                                
                                                <div class="form-group">
                                                    <label>Nhập giá tiền</label>
                                                    <input class="form-control" type="number" name="price" id="priceInput">
                                                    <div id="priceError" style="color: red;"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Nhập mô tả</label>
                                                    <input class="form-control" name="content" id="contentInput">
                                                    <div id="contentError" style="color: red;"></div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Trạng thái</label>
                                                    <select class="form-control" name="status">
                                                        <option value="0" >Xuất bản</option>
                                                        <option value="1" >Nháp</option>
                                                    </select>
                                                </div>
                                                <div>
                                                    <label class="upload-button" for="image">Tải hình lên</label>
                                                    <input type="file" name="image" id="image" accept="image/*">
                                                </div>
                                                <button type="submit" class="btn btn-primary" style="margin-top: 20px">Thêm sản phẩm</button>
                                            </div>
                                            </form>
                                            
                                        
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Bảng sản phẩm
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th>Loại sản phẩm</th>
                                        <th>Giá tiền</th>
                                        <th>Trạng thái</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $item)
                                        <tr class="odd gradeX">
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->cate_id}}</td>
                                        <td>{{$item->price}}₫</td>
                                        <td class="center"> @if ($item->status==0)
                                            Xuất bản
                                        @else
                                            Nháp
                                        @endif </td>
                                        <td><button type="button" class="btn btn-link"><a href="{{route('show', ['id' => $item->id])}}">Chỉnh sửa</a></button>
                                            <form action="{{route('destroy', ['id' => $item->id])}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link">Xóa</button>
                                            </form>
                                        </td>
                                        
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
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
            productError.textContent = "Vui lòng nhập tên sản phẩm.";
            hasError = true;
        }

        // Kiểm tra loại sản phẩm
        if (categorySelect.value === "") {
            var categoryError = document.getElementById("categoryError");
            categoryError.textContent = "Vui lòng chọn loại sản phẩm.";
            hasError = true;
        }

        // Kiểm tra giá tiền
        if (priceInput.value.trim() === "") {
            var priceError = document.getElementById("priceError");
            priceError.textContent = "Vui lòng nhập giá tiền.";
            hasError = true;
        }

        // Kiểm tra mô tả
        if (contentInput.value.trim() === "") {
            var contentError = document.getElementById("contentError");
            contentError.textContent = "Vui lòng nhập mô tả.";
            hasError = true;
        }

        // Nếu có lỗi, ngăn chặn form submit
        if (hasError) {
            event.preventDefault();
        }
    });
</script>


<!-- /#page-wrapper -->
@endsection
