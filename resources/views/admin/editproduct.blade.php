@extends('layouts.clientAdmin')
@section('css')
<link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/plugins/summernote/summernote-bs4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/css/style.css')}}">
<style>
    .select2-container--bootstrap4.select2-container--focus .select2-selection {
        box-shadow: none;
    }
    .img-main-prd {
        margin: auto;
        width: 90%;
        position: relative;
    }
    .img-main-prd:hover .close-img-main {
        opacity: 1;
    }
    .close-img-main {
        position: absolute;
        top: 0px;
        right: 0px;
        display: block;
        padding: 0px 0.5rem;
        cursor: pointer;
        display: none;
        opacity: 0;
        transition: 0.2s;
        font-size: 20px;
    }
    input[type="file"] {
        display: none;
    }
    .title-file-input-main {
        cursor: pointer;
        width: 100%;
    }
    .title-file-input {
        display: block;
        background-color:  #b3b3b3;
        text-align: center;
        padding: 0.5rem;
        cursor: pointer;
    }
    #list-images {
        background-color: #f2f2f2;
        padding: 0.1rem;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        min-height: 80px;
    }
    #list-images img {
        height: 80px;
    }
    .img-item {
        margin: 0.1rem;
        width: 80px;
        height: 80px;
        overflow: hidden;
        position: relative;
    }
    .close-img-item{
        position: absolute;
        top: 0px;
        right: 0px;
        display: block;
        padding: 0px 0.3rem;
        cursor: pointer;
        opacity: 0;
        transition: 0.2s;
    }
    .img-item:hover .close-img-item{
        opacity: 1;
    }
</style>
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Product Add</li>
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Hình minh họa cho sản phẩm</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="img-main-prd">
                                <input type="file" name="images[]" id="file-input-main" onchange="previewImgMain()" value="" accept=".jpg,.jpeg,.png,.gif">
                                <label for="file-input-main" class="title-file-input-main">
                                    <img src="{{asset('assets/clients/images/image-icon.jpg')}}" alt="" style="width: 100%">
                                </label>
                                <div class="close-img-main"><i class="fas fa-times"></i></div>
                            </div>
                            {{-- FileInput --}}
                            <input type="file" name="images[]" id="file-input" onchange="previewImages()" multiple accept=".jpg,.jpeg,.png,.gif">
                            <label for="file-input" class="title-file-input">
                                Select Images
                            </label>
                            <div id="list-images"></div>
                            {{-- EndFileInput --}}
                            {{-- Dropzone --}}

                            {{-- EndDropzone --}}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="card card-success">
                        <div class="card-header">
                        <h3 class="card-title">Thông tin chính</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger text-center">
                                    Vui lòng kiểm tra lại dữ liệu
                                </div>
                            @endif
                            <div class="row">

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="inputName">Mã sản phẩm</label>
                                        <input type="text" id="inputName" class="form-control" name="product_code" value="{{old('product_code')}}" placeholder="Mã sản phẩm">
                                        @error('product_code')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="inputName">Tên sản phẩm</label>
                                        <input type="text" id="inputName" class="form-control" name="product_name" value="{{old('product_name')}}" placeholder="Tên sản phẩm">
                                        @error('product_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Tóm tắt sản phẩm</label>
                                <textarea id="inputDescription" class="form-control" rows="4" name="product_infor" value="{{old('product_info')}}" placeholder="Nội dung tóm tắt"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="inputName">Nhóm sản phẩm</label>
                                        <select class="form-control select2bs4" name="product_group" style="width: 100%;">
                                            <option selected="selected">--Nhóm sản phẩm--</option>
                                            <option value="Alaska">Alaska</option>
                                            <option value="California">California</option>
                                            <option value="Delaware">Delaware</option>
                                            <option value="Tennessee">Tennessee</option>
                                            <option value="Texas">Texas</option>
                                            <option value="Washington">Washington</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="inputName">Số lượng</label>
                                        <input type="text" id="inputName" class="form-control" name="product_amount" value="{{old('product_amount')}}" placeholder="0">
                                        @error('product_amount')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="inputName">Giá</label>
                                        <input type="text" id="inputName" class="form-control" name="product_price" value="{{old('product_price')}}" placeholder="VNĐ">
                                        @error('product_price')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Thông tin khuyến mại</label>
                                <input type="text" id="inputName" class="form-control" name="product_promo" value="{{old('product_promo')}}" placeholder="Điền thông tin ...">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Nhà cung cấp</label>
                                <input type="text" id="inputName" class="form-control" name="product_supplier" value="{{old('product_subpplier')}}" placeholder="Điền thông tin ...">
                            </div>
                            <div class="check-view d-flex justify-content-end">
                                <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                      <div class="card-header">
                        <h3 class="card-title">
                            Giới thiệu chi tiết về sản phẩm
                        </h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <textarea id="summernote" name="introduction_article">
                        </textarea>
                      </div>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-12">
                <a href="{{route('admin.product.show')}}" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Confirm" class="btn btn-success float-right">
              </div>
            </div>
            </form>
        </section>

@endsection

@section('js')
<script src="{{asset('assets/admin/AdminLTE/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<script src="{{asset('assets/admin/AdminLTE/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('assets/admin/AdminLTE/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets/admin/AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        // Summernote
        $('#summernote').summernote()
    })
    $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
    // FileInput
    bsCustomFileInput.init();
    // previewImages
    let fileInput = document.getElementById("file-input");
    let listImages = document.getElementById("list-images");
    function previewImages() {
        for(i of fileInput.files) {
            let reader = new FileReader();

            reader.onload = function() {
                let imgItem = document.createElement("div");
                imgItem.classList.add("img-item");
                var _html = '<img src='+ reader.result +'>'
                    + '<span class="close-img-item"><i class="fas fa-times"></i></span>';
                imgItem.innerHTML = _html;
                listImages.appendChild(imgItem);
                $('.close-img-item').click(function(){
                    $(this).closest('.img-item').remove();
                })
            }
            reader.readAsDataURL(i);
        }
    }

    let fileInputMain = document.getElementById("file-input-main");
    function previewImgMain() {
        let reader = new FileReader();
        var file = fileInputMain.files[0];
        console.log();
        reader.onload = function() {
            $(".img-main-prd img").attr('src',reader.result);
            $(".close-img-main").css('display',"block");
            $('.close-img-main').click(function(){
                $(".img-main-prd img").attr('src',"{{asset('assets/clients/images/image-icon.jpg')}}");
            })
        }
        reader.readAsDataURL(file);
    }
</script>
@endsection
