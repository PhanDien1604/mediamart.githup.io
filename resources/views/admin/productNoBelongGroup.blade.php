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
        background: red;
    }
    .table td .img-prd>img {
        height: 50px;
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
                    <h1>Chọn sản phẩm vào nhóm</h1>
                  </div>
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">DataTables</li>
                    </ol>
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
                        <a href="{{route('admin.product.group.editGroup',['id'=>$group_id])}}" class="btn btn-secondary mb-2"><i class="fas fa-undo mr-2"></i>Quay lại</a>
                        @if (session('msg'))
                            {{-- @php
                                dd(session('msg'));
                            @endphp --}}
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
                                <th>Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá(VNĐ)</th>
                                <th>Chức năng</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if (!empty($productsList[0]))
                                    @foreach ($productsList as $item)
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div class="img-prd">
                                                    @php
                                                        $img = "<img src=".asset($item->image)." style='width: 100%'>";
                                                    @endphp
                                                    {!!$img!!}
                                                </div>
                                            </td>
                                            <td>{{$item->code}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->price}}</td>
                                            <td>
                                                <div class="btn-box">
                                                    <a href="{{route('admin.product.group.addGroupBelongProduct', ['id' => $item->id, 'group_id'=>$group_id])}}" class="btn btn-info"><i class="fas fa-angle-double-right"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="7">Không có sản phẩm nào</td>
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
            {"targets": [0,1,6], "orderable": false},
        ],
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

  </script>
@endsection
