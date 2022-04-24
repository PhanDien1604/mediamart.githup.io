@extends('layouts.admin')
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
        top: -0.6rem;
        right: -0.6rem;
        padding: 0px 0.5rem;
        cursor: pointer;
        display: none;
        opacity: 0;
        transition: 0.2s;
        font-size: 20px;
        color: white;
        background: black;
        border-radius: 50%;
    }.close-img-main:hover {
        color: white
    }
    input[type="file"] {
        display: none;
    }
    .box-img-main {
        cursor: pointer;
        width: 100%;
    }
    /*  */
    .img-sub-prd {
        background-color: #f2f2f2;
        min-height: 80px;
    }
    .li_file_hide {
        opacity: 0;
        visibility: visible;
        width: 0 !important;
        height: 0 !important;
        overflow: hidden;
        margin: 0rem -0.2rem;
    }
    .box-view-img {
        display: flex;
        flex-wrap: wrap;
        padding: 0.5rem;
        justify-content: center;
    }
    .box-view-img .img-wrap-box {
        overflow: hidden;
        height: 80px;
        width: 80px;
        background-position: 50% 50%;
        background-size: cover;
    }
    .box-view-img .img-wrap-box img {
        height: 80px;
    }
    .box-view-img>li {
        list-style: none;
        padding: 0.2rem 0.2rem;
    }
    .img-wrap {
        position: relative;
    }
    .img-wrap .close-img-sub {
        position: absolute;
        top: -5px;
        right: -5px;
        width: 20px;
        height: 20px;
        cursor: pointer;
        display: block;
        text-align: center;
        line-height: 20px;
        opacity: 0;
        font-size: 14px;
        color: white;
        background: black;
        border-radius: 50%;
    }
    .img-wrap:hover .close-img-sub {
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
            @if (session('msg'))
                <div class="title-msg d-none">{{session('msg')}}</div>
                <div class="icon-msg d-none">success</div>
            @endif
            @if ($errors->any())
                <div class="title-msg d-none">Vui lòng kiểm tra lại giữ liệu</div>
                <div class="icon-msg d-none">error</div>
            @endif
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
                                <input type="file" name="img_prd_main" id="file-input-main" onchange="previewImgMain(this)" accept=".jpg,.jpeg,.png,.gif">
                                <label for="file-input-main" class="title-file-input">
                                    <img src="{{asset('assets/clients/images/image-icon.jpg')}}" alt="" style="width: 100%">
                                </label>
                                <div class="close-img-main" onclick="DelImgMain(this)"><i class="fas fa-times"></i></div>
                            </div>
                            <div class="py-3 row">
                                <div class="col-12">
                                    <span class="insert-img btn-add-img btn btn-primary btn-block"><i class="fas fa-plus mr-2"></i>Thêm hình ảnh</span>
                                </div>
                            </div>
                            <div class="img-sub-prd">
                                <ul class="box-view-img">
                                    {{-- List Image --}}
                                </ul>
                            </div>
                            {{-- EndFileInput --}}
                        </div>
                        <!-- /.card-body -->
                    </div>
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
                                <label for="">Tóm tắt sản phẩm</label>
                                <textarea id="" class="form-control" rows="4" name="product_info" placeholder="Nội dung tóm tắt">{{old('product_info')}}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="inputName">Giá</label>
                                        <input type="text" id="inputName" class="form-control" name="product_price" value="{{old('product_price')}}" placeholder="VNĐ">
                                        @error('product_price')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Ngày tạo:</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="creat_at" value="{{old('creat_at')}}"/>
                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Thông tin khuyến mại</label>
                                <select class="form-control select2bs4" name="product_promo" style="width: 100%;">
                                    <option value="">--Thông tin khuyến mại--</option>
                                    @if(!empty($promoList))
                                        @foreach ($promoList as $promo)
                                            <option {{old('product_promo') == $promo->id ? "selected": ""}} value="{{$promo->id}}">{{$promo->info}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="check-view d-flex justify-content-end">
                                <input type="checkbox" name="product_status" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                          <h3 class="card-title">
                              Giới thiệu chi tiết về sản phẩm
                          </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <textarea id="summernote" name="introduction_article" placeholder="aksjhkjh">
                              {{old('introduction_article')}}
                          </textarea>
                        </div>
                      </div>
                </div>
                <div class="col-12">
                    <a href="{{route('admin.product.show')}}" class="btn btn-secondary">Quay lại</a>
                    <input type="submit" value="Thêm mới" class="btn btn-success float-right">
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
        $('#summernote').summernote({
            height: 100
        })
        // Date
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
    })
    $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
    // FileInput
    bsCustomFileInput.init();
    // ImageMain
    function previewImgMain(e) {
        var fileInputMain = document.getElementById("file-input-main").files
            if(fileInputMain.length > 0) {
            var file_data = $(e).prop('files')[0]
            var type = file_data.type
            var fileToLoad = file_data

            var fileReade = new FileReader();
            fileReade.onload = function(fileLoadedEvent) {
                var srcData = fileLoadedEvent.target.result;
                $(".img-main-prd img").attr('src',srcData);
                $(".close-img-main").css('display',"block");
            }
            fileReade.readAsDataURL(fileToLoad);
        }
    }
    function DelImgMain(e) {
        $(".close-img-main").css('display',"none");
        $(e).parent().find('img').attr('src',"{{asset('assets/clients/images/image-icon.jpg')}}");
        $(e).val('')
    }
    // ListImage
    $('.insert-img').click(function() {
        if($('.img-sub-prd').hasClass('show-btn')===false) {
            $('.img-sub-prd').addClass('show-btn')
        }
        var _lastimg = $('.box-view-img li').last().find('input[type="file"]').val();

        console.log(_lastimg)
        if(_lastimg != '') {
            var d = new Date();
            var _time = d.getTime();
            var _html = '<li id="li_files_'+ _time +'" class="li_file_hide">';
            _html += '<div class="img-wrap">';
            _html += '<span class="close-img-sub" onclick="DelImg(this)"><i class="fas fa-times"></i></span>';
            _html += '<div class="img-wrap-box"></div>';
            _html += '</div>';
            _html += '<div class="'+ _time +'">';
            _html += '<input type="file" class="hidden" name="img_prd_sub[]" onchange="uploadImg(this)" id="file_'+_time+'">';
            _html +='</div>';
            _html += '</li>';

            $('.box-view-img').append(_html);
            $('.box-view-img li').last().find('input[type="file"]').click();

        }else {
            if(_lastimg == '') {
                $('.box-view-img li').last().find('input[type="file"]').click();
            } else {
                if($('.img-sub-prd').hasClass('show-btn')===true) {
                    $('.img-sub-prd').removeClass('show-btn')
                }
            }
        }
    })

    function uploadImg(e) {
        var file_data = $(e).prop('files')[0]
        var type = file_data.type
        var fileToLoad = file_data

        var fileReade = new FileReader();

        fileReade.onload = function(fileLoadedEvent) {
            var srcData = fileLoadedEvent.target.result;

            var newImgae = document.createElement('img');
            newImgae.src = srcData;
            var _li = $(e).closest('li');
            if(_li.hasClass('li_file_hide')) {
                _li.removeClass('li_file_hide')
            }
            _li.find('.img-wrap-box').append(newImgae.outerHTML);
        }
        fileReade.readAsDataURL(fileToLoad);
    }

    function DelImg(e) {
        $(e).closest('li').remove();
    }
</script>
@endsection
