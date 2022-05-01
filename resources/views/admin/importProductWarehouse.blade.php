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
                    <h1>Chọn sản phẩm</h1>
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
                @if (session('msg'))
                    <div class="title-msg d-none">{{session('msg')}}</div>
                    <div class="icon-msg d-none">success</div>
                @endif
                @if ($errors->any())
                    <div class="title-msg d-none">Vui lòng kiểm tra lại giữ liệu</div>
                    <div class="icon-msg d-none">error</div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{route('admin.warehouse.importWarehouse',['id'=>$warehouseDetail->id])}}"
                                    class="btn btn-secondary mb-2"><i class="fas fa-undo mr-2"></i>Quay lại</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body row">
                                <div class="col-8">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Mã sản phẩm</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Giá(VNĐ)</th>
                                                <th>Chức năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($products[0]))
                                                @foreach ($products as $item)
                                                    <tr>
                                                        <td></td>
                                                        <td>{{$item->code}}</td>
                                                        <td>{{$item->name}}</td>
                                                        <td>{{$item->price}}</td>
                                                        <td>
                                                            <div class="btn-box">
                                                                <div class="info-product d-none">
                                                                    <span class="prd-code">{{$item->code}}</span>
                                                                    <span class="prd-name">{{$item->name}}</span>
                                                                    <span class="prd-price">{{$item->price}}</span>
                                                                </div>
                                                                <button class="btn btn-info" onclick='confirmProduct(this)'><i class="fas fa-angle-double-right"></i></button>
                                                                <a href="{{route('admin.warehouse.postImportProductOldWarehouse', ['id'=>$warehouseDetail->id,'warehouse_product_id'=>$item->id])}}"
                                                                    class="abc btn btn-info d-none"><i class="fas fa-angle-double-right"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="4">Không có sản phẩm nào</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-4">
                                    <form action="{{route("admin.warehouse.postImportProductNewWarehouse",['id'=>$warehouseDetail->id])}}" method="post">
                                        @csrf
                                        <div class="card card-success">
                                            <div class="card-header">
                                                <h3 class="card-title">Thêm sản phẩm</h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="inputName">Mã sản phẩm</label>
                                                            <input type="text" id="inputName" class="form-control" name="product_code" value="{{old('product_code')}}" placeholder="Mã sản phẩm">
                                                            @error('product_code')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="inputName">Tên sản phẩm</label>
                                                            <input type="text" id="inputName" class="form-control" name="product_name" value="{{old('product_name')}}" placeholder="Tên sản phẩm">
                                                            @error('product_name')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="inputName">Số lượng</label>
                                                            <input type="text" id="inputName" class="form-control" name="product_amount" value="{{old('product_amount')}}" placeholder="0">
                                                            @error('product_amount')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="inputName">Giá</label>
                                                            <input type="text" id="inputName" class="form-control" name="product_price" value="{{old('product_price')}}" placeholder="VNĐ">
                                                            @error('product_price')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="submit" value="Xác nhận" class="btn btn-success">
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
        "order":[[1,'asc']],
        "columnDefs": [
            {"targets": [0,3], "orderable": false},
        ],
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    // SweetAlert
    function confirmProduct(e) {
        var evt = window.event
        evt.preventDefault();
        let infoPrd = $(e).parent().find('.info-product')
        var code = infoPrd.find('.prd-code').text()
        var name = infoPrd.find('.prd-name').text()
        var price = infoPrd.find('.prd-price').text()

        var _href = $(e).parent().find('a').attr('href')

        Swal.fire({
            title: 'Thông tin sản phẩm',
            html:
            '<form action="'+_href+'" method="POST">'+
            '@csrf'+
            '<div class="my-2">'+code+'</div>'+
            '<div class="my-2">'+name+'</div>'+
            '<div class="my-2">'+price+'</div>'+
            '<div class="font-weight-bold mt-4 mb-2">Số lượng</div>'+
            '<input class="product_amount form-control w-50 m-auto" name="product_amount" placeholder="Số lượng">'+
            '</form>',
            showLoaderOnConfirm: true,
            preConfirm: () => {
                var price = $('.product_price').val()
                var amount = $('.product_amount').val()
                var regex = /^\d*[1-9]\d*$/;
                if(amount && amount.match(regex)) {
                    return
                }
                else if(!amount){
                        Swal.showValidationMessage(
                            'Vui lòng nhập số lượng'
                        )
                    } else {
                        Swal.showValidationMessage(
                            'Số lượng phải là số nguyên dương'
                        )
                    }
            },
        }).then((result) => {
            if (result.isConfirmed) {
                $('form').submit()
            }
        })

    }
  </script>
@endsection
