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
    .list-img {
        display: flex;
        flex-wrap: nowrap;
        padding: 0.2rem;
    }
    .list-img .img-item{
        width: 22px;
        height: 26px;
        margin: 0.2rem 0.2rem;
        background-color: white;
        position: relative;
        cursor: pointer;
    }
    .delete-logo {
        position: absolute;
        top: -4px;
        right: -4px;
        background-color: black;
        color: white;
        width: 10px;
        height: 10px;
        font-size: 10px;
        text-align: center;
        line-height: 12px;
        border-radius: 50%;
        cursor: pointer;
        display: none;
    }
    .delete-logo:hover {
        color: white
    }
    .img-item:hover .delete-logo{
        display: block;
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
                    <a href="{{route('admin.website.imageWeb')}}" class="btn btn-info float-right">Hình ảnh</a>
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
                        <hr class="my-4">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Hàng</th>
                                    <th>Nhóm</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($categoryMain[0]))
                                    @foreach ($categoryMain as $item)
                                    <tr>
                                        <td></td>
                                        <td>{{$item->row}}</td>
                                        <td>{{($item->group_name)}}</td>
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
                        <hr class="my-4">
                        <table id="example2" class="table table-bordered table-hover">
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
                                @if (!empty($categorySub[0]))
                                    @foreach ($categorySub as $item)
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
                        <div class="row">
                            {{-- Logo-category --}}
                            <div class="col-12">
                                <form action="{{route('admin.website.postAddLogoCategory')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card card-warning">
                                    <div class="card-header">
                                        <h3 class="card-title">Logo</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        @error('row_logo')
                                            <div class="alert alert-danger text-center">{{$message}}</div>
                                        @enderror
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label>Hàng</label>
                                                    <select class="custom-select" name="row_logo" style="width: 100%;">
                                                        @for ($key = 1; $key <= 10; $key++)
                                                            <option value="{{$key}}">{{$key}}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-10">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">File input</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="logo_category" id="exampleInputFile" accept=".jpg, .png, .jpge, .gif">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-img bg-light">
                                            <div class="list-img">
                                                @if (!empty($logoCategory[0]))
                                                    @foreach ($logoCategory as $item)
                                                    <div class="img-item">
                                                        @php
                                                            $img = "<img src=".asset($item->path)." style='width: 100%'>";
                                                        @endphp
                                                        {!!$img!!}
                                                        <a href="{{route('admin.website.deleteLogoCategory',['id'=>$item->id])}}" class="delete-logo"><i class="fas fa-times"></i></a>
                                                    </div>
                                                    @endforeach
                                                @endif

                                            </div>
                                        </div>
                                        <button class="btn btn-warning float-right mt-3">Xác nhận</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                            {{-- categoty-main --}}
                            <div class="col-12">
                                <form action="{{route('admin.website.postAddCategory')}}" method="post">
                                @csrf
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Danh mục chính</h3>

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
                                                    <select class="custom-select" name="row_category_main" style="width: 100%;">
                                                        @for ($key = 1; $key <= 10; $key++)
                                                            <option value="{{$key}}">{{$key}}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-10">
                                                <div class="form-group">
                                                    <label>Nhóm</label>
                                                    <select class="form-control select2bs4" name="category" style="width: 100%;">
                                                        <option value="0">--Nhóm--</option>
                                                        @if (!empty($groupProducts))
                                                            @foreach ($groupProducts as $groupProduct)
                                                                <option value="{{$groupProduct->id}}">{{$groupProduct->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    @error('category')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <input type="submit" value="Xác nhận" class="btn btn-primary float-right">
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                            {{-- category-sub --}}
                            <div class="col-12">
                                <form action="{{route('admin.website.postAddCategorySub')}}" method="POST">
                                @csrf
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Danh mục phụ</h3>

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
                                                        @for ($key = 1; $key <= 10; $key++)
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
                                            <label><div class="btn-add-categorySub btn btn-success"><i class="fas fa-plus mr-1"></i>Thêm</div></label>
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
            {"targets": [0,2,3], "orderable": false},
            { "visible": true, "targets": 0 }
        ],
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    $(function () {
    $("#example2").DataTable({
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
