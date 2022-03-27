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
                    <h1>Nhóm sản phẩm</h1>
                  </div>
                </div>
              </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        {{-- <h3 class="card-title">DataTable with default features</h3> --}}
                        {{-- @if (session('msg'))
                            <div class="alert alert-success">ok</div>
                        @endif --}}
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body row">
                        <div class="col-8">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã khuyến mại</th>
                                        <th>Thông tin khuyến mại</th>
                                        <th>Khoảng thời gian</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>1</td>
                                        <td>Km123</td>
                                        <td>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                        </td>
                                        <td>time</td>
                                        <td>
                                            <div class="btn-box">
                                                <a href="#" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="#" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-4">
                            {{-- formPromo --}}
                            <div class="card card-success">
                                <div class="card-header">
                                <h3 class="card-title">Thêm khuyến mại</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                                <div class="card-body">
                                    {{-- @if ($errors->any())
                                        <div class="alert alert-danger text-center">
                                            Vui lòng kiểm tra lại dữ liệu
                                        </div>
                                    @endif --}}
                                    <div class="form-group">
                                        <label for="inputName">Mã khuyến mại</label>
                                        <input type="text" id="inputName" class="form-control" name="promo_code" value="{{old('promo_code')}}" placeholder="Mã khuyến mại">
                                        {{-- @error('product_code')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Thông tin khuyến mại</label>
                                        <textarea id="inputDescription" class="form-control" rows="4" name="promo_info" value="{{old('promo_info')}}" placeholder="Thông tin khuyến mại"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Khoảng thời gian</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control float-right" id="reservation">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
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
            {"targets": [0,4], "orderable": false},
            { "visible": true, "targets": 0 }
        ],
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    // DatePicker
    $('#reservation').daterangepicker()
  </script>
@endsection
