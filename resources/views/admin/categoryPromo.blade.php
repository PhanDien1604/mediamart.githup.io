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
            <div class="container-fluid">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        {{-- <h3 class="card-title">DataTable with default features</h3> --}}
                        <a href="{{route('admin.promo.add')}}" class="btn btn-primary"><i class="fas fa-plus mr-1"></i>Thêm mới</a>
                        <div class="float-right">
                            <a href="{{route('admin.promo.showSub',['promo_sub'=>"product"])}}" class="btn btn-success">Sản phẩm</a>
                            <a href="{{route('admin.promo.showSub',['promo_sub'=>"client"])}}" class="btn btn-warning">Khách hàng</a>
                            <a href="{{route('admin.promo.showSub',['promo_sub'=>"order"])}}" class="btn btn-danger">Đơn hàng</a>
                        </div>

                        {{-- @if (session('msg'))
                            <div class="alert alert-success">ok</div>
                        @endif --}}
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã khuyến mại</th>
                                        <th>Thông tin khuyến mại</th>
                                        <th>Áp dụng</th>
                                        <th>Tổng tiền</th>
                                        <th>Giảm giá</th>
                                        <th>Khoảng thời gian</th>
                                        <th>Trạng thái</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($promoList))
                                        @foreach ($promoList as $promo)
                                            <tr>
                                                <td></td>
                                                <td>{{$promo->code}}</td>
                                                <td>{{$promo->info}}</td>
                                                <td>{{$promo->subject_apply}}</td>
                                                <td>{{$promo->total_money}}</td>
                                                <td>{{$promo->discount}}{{$promo->unit}}</td>
                                                <td>{{$promo->date_range}}</td>
                                                <td>
                                                    <input type="checkbox" {{!empty($promo->status) ? "checked": ""}} disabled>
                                                </td>
                                                <td>
                                                    <div class="btn-box">
                                                        <a href="{{route('admin.promo.edit',['id'=>$promo->id])}}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                                        <a href="{{route('admin.promo.delete',['id'=>$promo->id])}}" onclick="return confirm('Bạn có chắc muốn xóa không ???')"
                                                            class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="8">Không có khuyến mại nào</td>
                                            </tr>
                                        @endif
                                </tbody>
                            </table>
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
            {"targets": [0,7], "orderable": false},
            { "visible": true, "targets": 0 }
        ],
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    // DatePicker
    $('#reservation').daterangepicker()

    //
    $('.promo_unit').click(function() {
        var _placeholder = $('.promo_unit').val();
        $('.promo_discount').attr('placeholder',_placeholder)
    })
  </script>
@endsection
