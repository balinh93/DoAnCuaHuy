@extends('admin.layout')

@section('title', 'Loại sản phẩm')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách loại sản phẩm</h1>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">Thêm mới loại sản phẩm</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    
                                        <form action="{{ route('xu-li-them-loai-san-pham')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Nhập tên loại sản phẩm</label>
                                                    <input class="form-control" name="name" id="productInput">
                                                    <div id="productError" style="color: red;"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nhập mô tả</label>
                                                    <input class="form-control" type="text" name="desc">
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
                        Bảng loại sản phẩm
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Tên loại sản phẩm</th>
                                        <th>Mô tả</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cates as $item)
                                        <tr class="odd gradeX">
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->description}}</td>
                                        <td>
                                            <button type="button" class="btn btn-link"><a href="{{route('showCate', ['id' => $item->id])}}">Chỉnh sửa</a></button>
                                            <form action="{{route('destroyCate', ['id' => $item->id])}}" method="POST">
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
            productError.textContent = "Vui lòng nhập tên loai sản phẩm.";
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
