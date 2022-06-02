@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
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
        width: 50px;
        height: 50px;
        overflow: hidden;
        display: block;
        margin: auto;
        border-radius: 50%; 
    }
    .table td .img-prd>img {
        /* height: 50px; */
    }
    /* Đánh mục bảng */
    .table {
        counter-reset: rowNumber;
    }
    table tr:not(:first-child) {
        counter-increment: rowNumber;
    }

    table tr td:first-child::before {
        content: counter(rowNumber);
    }
}
</style>
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1>Quản lý khách hàng</h1>
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
                        <a href="{{route('admin.product.add')}}" class="btn btn-primary mb-2"><i class="fas fa-plus mr-1"></i>Thêm mới</a>
                        @if (session('msg'))
                            <div class="title-msg d-none">{{session('msg')}}</div>
                            <div class="icon-msg d-none">success</div>
                        @endif
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">

                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Ảnh</th>
                                <th>Họ và tên</th>
                                <th>Tên tài khoản</th>
                                <th>Số điện thoại</th>
                                <th>Tổng tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if (!empty($clients))
                                    @foreach ($clients as $item)
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div class="img-prd">
                                                    @php
                                                        $img = "<img src=".asset($item->path)." style='width: 100%'>";
                                                    @endphp
                                                    {!!$img!!}
                                                </div>
                                            </td>
                                            <td>{{$item->username}}</td>
                                            <td>{{$item->account}}</td>
                                            <td>{{$item->tel}}</td>
                                            <td>{{$item->total_price}}</td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="8">Không có khách hàng nào</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
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
        "order":[[2,'asc']],
        "columnDefs": [
            {"targets": [0,1], "orderable": false},
        ],
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

  </script>
@endsection
