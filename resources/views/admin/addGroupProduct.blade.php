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
                        <form action="{{route('admin.product.group.postAddGroup')}}" method="POST">
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
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-plus mr-1"></i>Thêm mới</button>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <input type="text" id="inputName" class="form-control" name="group_product_code" value="{{old('group_product_code')}}" placeholder="Nhóm sản phẩm">
                                        @error('group_product_code')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <input type="text" id="inputName" class="form-control" name="group_product_name" value="{{old('group_product_name')}}" placeholder="Nhóm sản phẩm">
                                    @error('group_product_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </form>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body row">
                        <div class="col-8">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã nhóm sản phẩm</th>
                                        <th>Tên nhóm sản phẩm</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($groupProductsList))
                                        @foreach ($groupProductsList as $item)
                                            <tr>
                                                <td></td>
                                                <td>{{$item->code}}</td>
                                                <td>{{$item->name}}</td>
                                                <td>
                                                    <div class="btn-box">
                                                        <a href="{{route('admin.product.group.editGroup', ['id' => $item->id])}}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                                        <a href="{{route('admin.product.group.deleteGroup', ['id' => $item->id])}}" onclick="return confirm('Bạn có chắc muốn xóa không')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
                        {{-- ListProduct --}}
                        <div class="col-4">
                            <!-- PRODUCT LIST -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Danh mục sản phẩm</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <ul class="products-list product-list-in-card pl-2 pr-2">
                                        @if (!empty($productsList[0]))
                                        <li class="item">
                                            <div class="product-img mr-2">
                                                @php
                                                    $img = "<img src=".asset($productsList[0]->image)." alt='Product Image' class='img-size-50' style='width: 100%'>";
                                                    // dd($img);
                                                @endphp
                                                {!!$img!!}
                                                {{-- <img src="{{asset('assets/clients/images/product/product-1.jpg')}}" alt="Product Image" class="img-size-50"> --}}
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-title">
                                                    {{$productsList[0]->name}}
                                                    <span class="badge badge-warning float-right">{{$productsList[0]->price}}đ</span>
                                                </a>
                                                <span class="product-description">
                                                    {{$productsList[0]->introduction_article}}
                                                </span>
                                            </div>
                                        </li>
                                        @endif
                                        @if (!empty($productsList[1]))
                                        <li class="item">
                                            <div class="product-img mr-2">
                                                @php
                                                    $img = "<img src=".asset($productsList[1]->image)." alt='Product Image' class='img-size-50' style='width: 100%'>";
                                                    // dd($img);
                                                @endphp
                                                {!!$img!!}
                                                {{-- <img src="{{asset('assets/clients/images/product/product-1.jpg')}}" alt="Product Image" class="img-size-50"> --}}
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-title">
                                                    {{$productsList[1]->name}}
                                                    <span class="badge badge-info float-right">{{$productsList[1]->price}}đ</span>
                                                </a>
                                                <span class="product-description">
                                                    {{$productsList[1]->introduction_article}}
                                                </span>
                                            </div>
                                        </li>
                                        @endif
                                        @if (!empty($productsList[2]))
                                        <li class="item">
                                            <div class="product-img mr-2">
                                                @php
                                                    $img = "<img src=".asset($productsList[2]->image)." alt='Product Image' class='img-size-50' style='width: 100%'>";
                                                    // dd($img);
                                                @endphp
                                                {!!$img!!}
                                                {{-- <img src="{{asset('assets/clients/images/product/product-1.jpg')}}" alt="Product Image" class="img-size-50"> --}}
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-title">
                                                    {{$productsList[2]->name}}
                                                    <span class="badge badge-danger float-right">{{$productsList[2]->price}}đ</span>
                                                </a>
                                                <span class="product-description">
                                                    {{$productsList[2]->introduction_article}}
                                                </span>
                                            </div>
                                        </li>
                                        @endif
                                        @if (!empty($productsList[3]))
                                        <li class="item">
                                            <div class="product-img mr-2">
                                                @php
                                                    $img = "<img src=".asset($productsList[3]->image)." alt='Product Image' class='img-size-50' style='width: 100%'>";
                                                    // dd($img);
                                                @endphp
                                                {!!$img!!}
                                                {{-- <img src="{{asset('assets/clients/images/product/product-1.jpg')}}" alt="Product Image" class="img-size-50"> --}}
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-title">
                                                    {{$productsList[3]->name}}
                                                    <span class="badge badge-success float-right">{{$productsList[3]->price}}đ</span>
                                                </a>
                                                <span class="product-description">
                                                    {{$productsList[3]->introduction_article}}
                                                </span>
                                            </div>
                                        </li>
                                        @endif
                                  </ul>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer text-center">
                                  <a href="{{route('admin.product.show')}}" class="uppercase">Xem tất cả sản phẩm</a>
                                </div>
                                <!-- /.card-footer -->
                              </div>
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
            { "visible": true, "targets": 0 }
        ],
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>
@endsection
