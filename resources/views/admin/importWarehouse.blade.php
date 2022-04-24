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
                    <h1>Nhập kho</h1>
                  </div>
                </div>
              </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <form action="" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                @if (session('msg'))
                                    <div class="title-msg d-none">{{session('msg')}}</div>
                                    <div class="icon-msg d-none">success</div>
                                @endif
                                @if ($errors->any())
                                    <div class="title-msg d-none">Vui lòng kiểm tra lại giữ liệu</div>
                                    <div class="icon-msg d-none">error</div>
                                @endif
                                <div class="row">
                                    <div class="col">
                                        <a href="{{route("admin.warehouse.importProductWarehouse",['id'=>$warehouseDetail->id])}}"
                                            class="btn btn-primary"><i class="fas fa-download mr-2"></i>Nhập</a>
                                    </div>
                                    <div class="col">
                                        <div class="form-group float-right">
                                            <div class="input-group">
                                                <input disabled type="text" class="form-control" value="{{date("d/m/Y")}}"/>
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Mã sản phẩm</th>
                                            <th>Giá(VNĐ)</th>
                                            <th>Số lượng</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($products[0]))
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td></td>
                                                    <td>{{$product->code}}</td>
                                                    <td>{{$product->name}}</td>
                                                    <td>{{$product->price}}</td>
                                                    <td>{{$product->amount}}</td>
                                                    <td>
                                                        <div class="btn-box">
                                                            <div class="info-product d-none">
                                                                <span class="prd-code">{{$product->code}}</span>
                                                                <span class="prd-name">{{$product->name}}</span>
                                                                <span class="prd-price">{{$product->price}}</span>
                                                            </div>
                                                            <a href="{{route('admin.warehouse.addAmountProductWarehouse', ['id' => $warehouseDetail->id, 'product_id'=>$product->id])}}" onclick="confirmProduct(this)"
                                                                class="add_amount_new btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                                            <a href="{{route('admin.warehouse.deleteProductBelongWarehouse',['id'=>$warehouseDetail->id, 'product_id'=>$product->id])}}"
                                                            onclick="return confirm('Bạn có chắc muốn xóa không')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="6">Không có sản phẩm nào</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <a href="{{route("admin.warehouse.editWareHouse",['id'=>$warehouseDetail->id])}}" class="btn btn-secondary">Quay lại</a>
                    </div>
                </div>
                </form>
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
            {"targets": [0,5], "orderable": false},
            { "visible": true, "targets": 0 }
        ],
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    $(window).on('load',function() {
        var value = $('.value-date').text();
        $('.input-date').val(value);
    })

    // date
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

        var _href = $(e).parent().find('.add_amount_new').attr('href')

        Swal.fire({
            title: 'Thông tin sản phẩm',
            html:
            '<form action="'+_href+'" method="POST" id="form-add-amount">'+
            '@csrf'+
            '<div class="my-2">'+code+'</div>'+
            '<div class="my-2">'+name+'</div>'+
            '<div class="my-2">'+price+'</div>'+
            '<div class="font-weight-bold mt-4 mb-2">Số lượng</div>'+
            '<input class="product_amount form-control w-50 m-auto" name="product_amount" placeholder="Số lượng">'+
            '</form>',
            showLoaderOnConfirm: true,
            preConfirm: () => {
                var value = $('.product_amount').val()
                var regex = /^\d*[1-9]\d*$/;
                if(value && value.match(regex)) {
                    return
                }
                else if(!value){
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
                $('#form-add-amount').submit()
            }
        })

    }
  </script>
@endsection
