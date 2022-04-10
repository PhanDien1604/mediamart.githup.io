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
    .img-banner-promo {
        position: relative;
    }
    .img-backgroud-promo {
        position: relative;
        width: 90%;
        margin: auto;
    }
    .img-banner-sub {
        position: relative;
    }
    .img-banner-sub:hover .close-img-main,
    .img-banner-promo:hover .close-img-main,
    .img-backgroud-promo:hover .close-img-main {
        opacity: 1;
    }
    .img-banner-sub img,
    .img-backgroud-promo img,
    .img-banner-sub img,
    .img-banner-promo img {
        cursor: pointer;
    }
    .close-img-main {
        position: absolute;
        top: -10px;
        right: -5px;
        width: 20px;
        height: 20px;
        line-height: 20px;
        text-align: center;
        cursor: pointer;
        display: none;
        opacity: 0;
        font-size: 14px;
        color: white;
        background: black;
        border-radius: 50%;
    }
    .close-img-main:hover {
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
    .img-banner-body,
    .img-banner-top {
        background-color: #f2f2f2;
        min-height: 80px;
        margin-top: 1rem;
    }
    .li_file_hide {
        opacity: 0;
        visibility: visible;
        width: 0 !important;
        height: 0 !important;
        overflow: hidden;
        margin: -0.2rem -0.2rem;
    }
    .box-view-img {
        display: flex;
        flex-wrap: wrap;
        padding: 0.5rem;
        justify-content: center;
    }
    .box-view-img .img-wrap-box {
        overflow: hidden;
        min-height: 10px;
        width: 100px;
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

    /*  */
    .img-banner-top .box-view-img .img-wrap-box {
        width: 100%;
    }
    .img-banner-top .box-view-img .img-wrap-box img {
        width: 100%;
        height: auto;
    }
</style>
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Hình ảnh hiển thị cho website</h1>
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
                            <h3 class="card-title">Hình ảnh</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- banner-top --}}
                            <div class="col-12">
                                <span class="btn-add-img btn btn-outline-secondary" onclick="AddImg('.img-banner-top','banner_top')">Banner top</span>
                            </div>
                            <div class="img-banner-top">
                                <ul class="box-view-img">
                                    @if (!empty($bannerTop))
                                        @foreach ($bannerTop as $image)
                                        <li>
                                            <div class="img-wrap">
                                                <a href="{{route('admin.website.deleteImageWeb',['id' => $image->id])}}" onclick="return confirm('Bạn có chắc muốn xóa ảnh chứ ???')" class="close-img-sub"><i class="fas fa-times"></i></a>
                                                <div class="img-wrap-box">
                                                    @php
                                                        $img = "<img src=".asset($image->path).">";
                                                    @endphp
                                                    {!!$img!!}
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    @endif
                                    {{-- List Image --}}
                                </ul>
                            </div>
                            {{-- banner-body --}}
                            <div class="col-12 mt-3">
                                <span class="btn-add-img btn btn-outline-secondary" onclick="AddImg('.img-banner-body','banner_body')">Banner body</span>
                            </div>
                            <div class="img-banner-body">
                                <ul class="box-view-img">
                                    @if (!empty($bannerBody))
                                        @foreach ($bannerBody as $image)
                                        <li>
                                            <div class="img-wrap">
                                                <a href="{{route('admin.website.deleteImageWeb',['id' => $image->id])}}" onclick="return confirm('Bạn có chắc muốn xóa ảnh chứ ???')" class="close-img-sub"><i class="fas fa-times"></i></a>
                                                <div class="img-wrap-box">
                                                    @php
                                                        $img = "<img src=".asset($image->path).">";
                                                    @endphp
                                                    {!!$img!!}
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    @endif
                                    {{-- List Image --}}
                                </ul>
                            </div>
                            {{-- banner-sub --}}
                            <div class="col-12 my-4">
                                <div class="py-1 text-center rounded border border-secondary">Banner sub</div>
                            </div>
                            <div class="row">
                                <div class="img-banner-sub col-4">
                                    <input type="file" name="banner_sub[]" id="bannerSub_1" class="" onchange="prevImg('#bannerSub_1')" accept=".jpg,.jpeg,.png,.gif">
                                    @if (!empty($bannerSub[0]))
                                        @php
                                            $img = "<img src=".asset($bannerSub[0]->path)." style='width: 100%'>";
                                        @endphp
                                        <label for="bannerSub_1" class="title-file-input">
                                            {!!$img!!}
                                        </label>
                                        <a href="{{route('admin.website.deleteImageWeb',['id' => $bannerSub[0]->id])}}" onclick="return confirm('Bạn có chắc muốn xóa ảnh chứ ???')"
                                            class="close-img-main" style="display:block"><i class="fas fa-times"></i></a>
                                    @else
                                        <label for="bannerSub_1" class="title-file-input">
                                            <img src="{{asset('assets/clients/images/image-icon.jpg')}}" alt="" style="width: 100%">
                                        </label>
                                    <div class="close-img-main" onclick="DelImg('#bannerSub_1')"><i class="fas fa-times"></i></div>
                                    @endif
                                </div>
                                <div class="img-banner-sub col-4">
                                    <input type="file" name="banner_sub[]" id="bannerSub_2" class="" onchange="prevImg('#bannerSub_2')" accept=".jpg,.jpeg,.png,.gif">
                                    @if (!empty($bannerSub[1]))
                                        @php
                                            $img = "<img src=".asset($bannerSub[1]->path)." style='width: 100%'>";
                                        @endphp
                                        <label for="bannerSub_2" class="title-file-input">
                                            {!!$img!!}
                                        </label>
                                        <a href="{{route('admin.website.deleteImageWeb',['id' => $bannerSub[1]->id])}}" onclick="return confirm('Bạn có chắc muốn xóa ảnh chứ ???')"
                                            class="close-img-main" style="display:block"><i class="fas fa-times"></i></a>
                                    @else
                                        <label for="bannerSub_2" class="title-file-input">
                                            <img src="{{asset('assets/clients/images/image-icon.jpg')}}" alt="" style="width: 100%">
                                        </label>
                                    <div class="close-img-main" onclick="DelImg('#bannerSub_2')"><i class="fas fa-times"></i></div>
                                    @endif
                                </div>
                                <div class="img-banner-sub col-4">
                                    <input type="file" name="banner_sub[]" id="bannerSub_2" class="" onchange="prevImg('#bannerSub_2')" accept=".jpg,.jpeg,.png,.gif">
                                    @if (!empty($bannerSub[2]))
                                        @php
                                            $img = "<img src=".asset($bannerSub[2]->path)." style='width: 100%'>";
                                        @endphp
                                        <label for="bannerSub_2" class="title-file-input">
                                            {!!$img!!}
                                        </label>
                                        <a href="{{route('admin.website.deleteImageWeb',['id' => $bannerSub[2]->id])}}" onclick="return confirm('Bạn có chắc muốn xóa ảnh chứ ???')"
                                            class="close-img-main" style="display:block"><i class="fas fa-times"></i></a>
                                    @else
                                        <label for="bannerSub_2" class="title-file-input">
                                            <img src="{{asset('assets/clients/images/image-icon.jpg')}}" alt="" style="width: 100%">
                                        </label>
                                    <div class="close-img-main" onclick="DelImg('#bannerSub_2')"><i class="fas fa-times"></i></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Hình ảnh</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="border border-secondary text-center py-1 rounded mb-2">Banner Promotion</div>
                            <div class="img-banner-promo">
                                <input type="file" name="banner_promo[]" id="banner_promo" class="" onchange="prevImg('#banner_promo')" accept=".jpg,.jpeg,.png,.gif">
                                @if (!empty($bannerPromo))
                                    @php
                                        $img = "<img src=".asset($bannerPromo[0]->path)." style='width: 100%'>";
                                    @endphp
                                    <label for="banner_promo" class="title-file-input">
                                        {!!$img!!}
                                    </label>
                                    <a href="{{route('admin.website.deleteImageWeb',['id' => $bannerPromo[0]->id])}}" onclick="return confirm('Bạn có chắc muốn xóa ảnh chứ ???')"
                                        class="close-img-main" style="display:block"><i class="fas fa-times"></i></a>
                                @else
                                    <label for="banner_promo" class="title-file-input">
                                        <img src="{{asset('assets/clients/images/image-icon.jpg')}}" alt="" style="width: 100%">
                                    </label>
                                    <div class="close-img-main" onclick="DelImg('#banner_promo')"><i class="fas fa-times"></i></div>
                                @endif
                            </div>
                            <div class="border border-secondary text-center py-1 rounded mb-2">Backgroud Promotion</div>
                            <div class="img-backgroud-promo">
                                <input type="file" name="backgroud_promo[]" id="bg_promo" class="" onchange="prevImg('#bg_promo')" accept=".jpg,.jpeg,.png,.gif">
                                @if (!empty($backgroudPromo[0]))
                                    @php
                                        $img = "<img src=".asset($backgroudPromo[0]->path)." style='width: 100%'>";
                                    @endphp
                                    <label for="bg_promo" class="title-file-input">
                                        {!!$img!!}
                                    </label>
                                    <a href="{{route('admin.website.deleteImageWeb',['id' => $backgroudPromo[0]->id])}}" onclick="return confirm('Bạn có chắc muốn xóa ảnh chứ ???')"
                                        class="close-img-main" style="display:block"><i class="fas fa-times"></i></a>
                                @else
                                    <label for="bg_promo" class="title-file-input">
                                        <img src="{{asset('assets/clients/images/image-icon.jpg')}}" alt="" style="width: 100%">
                                    </label>
                                    <div class="close-img-main" onclick="DelImg('#bg_promo')"><i class="fas fa-times"></i></div>
                                @endif
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-12">
                    <a href="{{route('admin.website.index')}}" class="btn btn-secondary">Quay lại</a>
                    <button class="btn btn-success float-right">Xác nhận</button>
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
    function prevImg(e) {
        var fileInput = document.querySelector(e).files
            if(fileInput.length > 0) {
            var file_data = $(e).prop('files')[0]
            var type = file_data.type
            var fileToLoad = file_data

            var fileReade = new FileReader();
            fileReade.onload = function(fileLoadedEvent) {
                var srcData = fileLoadedEvent.target.result;
                // $(".img-main-prd img").attr('src',srcData);
                // $(".close-img-main").css('display',"block");
                $(e).parent().find("img").attr('src',srcData);
                $(e).parent().find(".close-img-main").css('display',"block");
            }
            fileReade.readAsDataURL(fileToLoad);
        }
    }
    function DelImg(e) {
        $(e).parent().find(".close-img-main").css('display',"none");
        $(e).parent().find('img').attr('src',"{{asset('assets/clients/images/image-icon.jpg')}}");
        $(e).val('')
    }
    // ListImage
    function AddImg(e,key) {
        console.log(key);
        if($(e).hasClass('show-btn')===false) {
            $(e).addClass('show-btn')
        }
        var _lastimg = $(e).find('.box-view-img li').last().find('input[type="file"]').val();

        if(_lastimg != '') {
            var d = new Date();
            var _time = d.getTime();
            var _html = '<li id="li_files_'+ _time +'" class="li_file_hide">';
            _html += '<div class="img-wrap">';
            _html += '<span class="close-img-sub" onclick="DelImgSub(this)"><i class="fas fa-times"></i></span>';
            _html += '<div class="img-wrap-box"></div>';
            _html += '</div>';
            _html += '<div class="'+ _time +'">';
            _html += '<input type="file" class="hidden" name="'+key+'[]" onchange="uploadImg(this)" id="file_'+_time+'" accept=".jpg,.jpeg,.png,.gif">';
            _html +='</div>';
            _html += '</li>';

            $(e).find('.box-view-img').append(_html);
            $(e).find('.box-view-img li').last().find('input[type="file"]').click();

        }else {
            if(_lastimg == '') {
                $(e).find('.box-view-img li').last().find('input[type="file"]').click();
            } else {
                if($(e).hasClass('show-btn')===true) {
                    $(e).removeClass('show-btn')
                }
            }
        }
    }

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

    function DelImgSub(e) {
        $(e).closest('li').remove();
    }
</script>
@endsection
