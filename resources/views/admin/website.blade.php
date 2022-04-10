@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/plugins/summernote/summernote-bs4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/css/style.css')}}">
<style>
    .table thead th,
    .table td, .table th {
        vertical-align: middle
    }
    .table th,table td {
        text-align: center;
    }
    .table.dataTable>thead .sorting:before,
    .table.dataTable>thead .sorting:after {
        bottom: 50%;
        transform: translateY(50%);
    }
    .table td:nth-last-child(2)>input {
        display: block;
        margin: auto;
    }
    .table td .btn-box {
        display: flex;
        justify-content: center;
    }
    .table td .btn-box>.btn {
        margin: 0px 0.2rem;
        padding: 0.2rem 0.5rem;
    }
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
                    <h1>Website</h1>
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
            @if (session('msg'))
                <div class="title-msg d-none">{{session('msg')}}</div>
                <div class="icon-msg d-none">success</div>
            @endif
            @if ($errors->any())
                <div class="title-msg d-none">Vui lòng kiểm tra lại giữ liệu</div>
                <div class="icon-msg d-none">error</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <a href="{{route('admin.website.imageWeb')}}" class="btn btn-warning float-right">Hình ảnh</a>
                </div>
                <div class="card-body row">
                    <div class="col-md-7">
                        <form action="{{route('admin.website.postCategoryPromo')}}" method="post">
                        @csrf
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Khuyến mại</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <select class="form-control select2bs4" name="promo_web[]" style="width: 100%;">
                                            <option value="0">--Khuyến mại--</option>
                                                @if (!empty($promos))
                                                    @foreach ($promos as $promo)
                                                        <option {{$categoryPromo[0]->promo_id != 0 && $promo->id == $categoryPromo[0]->promo_id ? "selected" : ""}} value="{{$promo->id}}">{{$promo->code}}</option>
                                                    @endforeach
                                                @endif
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-control select2bs4" name="promo_web[]" style="width: 100%;">
                                            <option value="0">--Khuyến mại--</option>
                                                @if (!empty($promos))
                                                    @foreach ($promos as $promo)
                                                        <option {{$categoryPromo[1]->promo_id != 0 && $promo->id == $categoryPromo[1]->promo_id ? "selected" : ""}} value="{{$promo->id}}">{{$promo->code}}</option>
                                                    @endforeach
                                                @endif
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-control select2bs4" name="promo_web[]" style="width: 100%;">
                                            <option value="0">--Khuyến mại--</option>
                                                @if (!empty($promos))
                                                    @foreach ($promos as $promo)
                                                        <option {{$categoryPromo[2]->promo_id != 0 && $promo->id == $categoryPromo[2]->promo_id ? "selected" : ""}} value="{{$promo->id}}">{{$promo->code}}</option>
                                                    @endforeach
                                                @endif
                                        </select>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <button class="btn btn-danger float-right">Xác nhận</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Hàng</th>
                                    <th>Nhóm chính</th>
                                    <th>Nhóm phụ</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($category[0]))
                                    @foreach ($category as $item)
                                    <tr>
                                        <td></td>
                                        <td>{{$item->row}}</td>
                                        <td>{{($item->group_main_name)}}</td>
                                        <td>{{($item->group_sub_name)}}</td>
                                        <td>
                                            <div class="btn-box">
                                                <a href="{{route('admin.website.deleteCategory', ['id'=>$item->id])}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">Không có danh mục nào</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-5">
                        <form action="{{route('admin.website.postAddCategory')}}" method="POST">
                        @csrf
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Danh mục</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label>Hàng</label>
                                            <select class="custom-select" name="row_category" style="width: 100%;">
                                                @for ($key = 1; $key <= 7; $key++)
                                                    <option value="{{$key}}">{{$key}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <div class="form-group">
                                            <label>Nhóm chính</label>
                                            <select class="form-control select2bs4" name="category_main" style="width: 100%;">
                                                <option value="0">--Nhóm chính--</option>
                                                @if (!empty($groupProducts))
                                                    @foreach ($groupProducts as $groupProduct)
                                                        <option value="{{$groupProduct->id}}">{{$groupProduct->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('category_main')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><div class="btn-add-categorySub btn btn-primary"><i class="fas fa-plus mr-1"></i>Thêm</div></label>
                                    <div class="category-sub">
                                        {{-- CategorySub --}}

                                        {{-- EndCategorySub --}}
                                    </div>
                                </div>
                                <div class="col-12">
                                    <input type="submit" value="Xác nhận" class="btn btn-success float-right">
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

@endsection

@section('js')
<script src="{{asset('assets/admin/AdminLTE/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<script src="{{asset('assets/admin/AdminLTE/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('assets/admin/AdminLTE/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets/admin/AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script src="{{asset('assets/admin/AdminLTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/admin/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/admin/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/admin/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/admin/AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>

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
    $(function () {
      $("#example1").DataTable({
        // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "order":[[1,'asc']],
        "columnDefs": [
            {"targets": [0,2,3,4], "orderable": false},
            { "visible": true, "targets": 0 }
        ],
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
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
    $('.close-img-main').click(function(){
        $(".close-img-main").css('display',"none");
        $(".img-main-prd img").attr('src',"{{asset('assets/clients/images/image-icon.jpg')}}");
    })
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
            _html += '<input type="file" class="hidden" name="images[]" onchange="uploadImg(this)" id="file_'+_time+'">';
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
    // CategorySub
    var _html ='<div class="row py-2 add-categorySub">'
        _html +='<div class="col-10">'
        _html +='<select class="form-control select2bs4" name="category_sub[]" style="width: 100%;">'
        _html +='<option value="0">--Nhóm phụ--</option>'
        _html +='@if (!empty($groupProducts))'
        _html +=    '@foreach ($groupProducts as $groupProduct)'
        _html +='       <option value="{{$groupProduct->id}}">{{$groupProduct->name}}</option>'
        _html +='      @endforeach'
        _html +='@endif'
        _html +='</select>'
        _html +='</div>'
        _html +='<div class="col-2">'
        _html +='<a href="#" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>'
        _html +='</div>'
        _html +='</div>'
    $('.btn-add-categorySub').click(function() {
        $('.category-sub').append(_html);
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

    })
    // EndCategorySub
</script>
@endsection
