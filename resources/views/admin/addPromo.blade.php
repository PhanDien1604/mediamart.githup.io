@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/plugins/daterangepicker/daterangepicker.css')}}">
<style >
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
    .table td .img-prd {
        width: 30px;
        height: 30px;
        overflow: hidden;
        display: block;
        margin: auto;
    }
    .table td .img-prd>img {
        width: 30px;
    }

</style>
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1>Khuyến mại</h1>
                  </div>
                </div>
              </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <form action="{{route('admin.promo.postAdd')}}" method="post">
                @csrf
                @if (session('msg'))
                    <div class="title-msg d-none">{{session('msg')}}</div>
                    <div class="icon-msg d-none">success</div>
                @endif
                @if ($errors->any())
                    <div class="title-msg d-none">Vui lòng kiểm tra lại giữ liệu</div>
                    <div class="icon-msg d-none">error</div>
                @endif
            <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card card-danger">
                      <div class="card-header">
                        <h3 class="card-title">Nội dung khuyến mại</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                      </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="inputName">Mã khuyến mại</label>
                                    <input type="text" id="inputName" class="form-control" name="promo_code" value="{{old('promo_code')}}" placeholder="Mã khuyến mại">
                                    @error('promo_code')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Thông tin</label>
                                    <textarea id="inputDescription" class="form-control" rows="4" name="promo_info" placeholder="Thông tin khuyến mại">{{old('promo_info')}}</textarea>
                                    @error('promo_info')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                              </div>
                              <div class="col-lg-7">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Loại hình áp dụng</label>
                                            <select class="promo_apply form-control" name="promo_apply" style="width: 100%;">
                                                <option selected="selected" value="Sản phẩm">Sản phẩm</option>
                                                <option value="Đơn hàng">Đơn hàng</option>
                                                <option value="Khách hàng">Khách hàng</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Tổng tiền áp dụng</label>
                                            <input disabled type="text" id="inputName" class="promo_total_money form-control" name="promo_total_money" value="{{old('promo_total_money')}}" placeholder="VNĐ">
                                            @error('promo_total_money')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Đơn vị</label>
                                            <select class="promo_unit custom-select" name="promo_unit" style="width: 100%;">
                                                <option {{old('promo_unit') == "%" ? "selected": ""}} value="%">%</option>
                                                <option {{old('promo_unit') == "VNĐ" ? "selected": ""}} value="VNĐ">VNĐ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="inputName">Giảm giá</label>
                                            <input type="text" id="inputName" class="promo_discount form-control" name="promo_discount" value="{{old('promo_discount')}}" placeholder="%">
                                            @error('promo_discount')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Khoảng thời gian</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    {{-- <input type="text"> --}}
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control float-right" name="date_range" value="{{old('date_range')}}" id="reservation">
                                            </div>
                                            @error('date_range')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="check-view d-flex justify-content-end">
                                    <input type="checkbox" name="promo_status" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                </div>
                              </div>
                          </div>
                        <div class="col-12 mt-lg-0 mt-3">
                            <a href="{{route('admin.promo.show')}}" class="btn btn-secondary">Quay lại</a>
                            <button type="submit" class="btn btn-success float-right">Xác nhận</button>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
            </form>
        </section>
    </div>

@endsection
@section('js')
<script src="{{asset('assets/admin/AdminLTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/admin/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/admin/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/admin/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/admin/AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/admin/AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/admin/AdminLTE/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/admin/AdminLTE/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/admin/AdminLTE/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/admin/AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/admin/AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/admin/AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/admin/AdminLTE/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('assets/admin/AdminLTE/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>

<script>
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
            {"targets": [0,5], "orderable": false},
            { "visible": true, "targets": 0 }
        ],
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    // Switch
    $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
    // DatePicker
    $('#reservation').daterangepicker()

    var _placeholder = $('.promo_unit').val();
    $('.promo_discount').attr('placeholder',_placeholder)
    $('.promo_unit').click(function() {
        var _placeholder = $('.promo_unit').val();
        $('.promo_discount').attr('placeholder',_placeholder)
    })

    $('.promo_apply').click(function() {
        var h = $('.promo_apply').val()
        if(h == "Sản phẩm") {
            $('.promo_total_money').attr('disabled','disabled')
        }else {
            $('.promo_total_money').removeAttr('disabled')
        }
    })
  </script>
@endsection
