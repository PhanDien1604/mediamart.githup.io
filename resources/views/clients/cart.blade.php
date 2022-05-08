@extends('layouts.client')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/clients/css/cart.css')}}">
@endsection
@section('slidebar')
@endsection
@section('content')
    <div class="content">
        <section>
            <div class="cart-header row">
                <div class="col-5">
                    <input type="checkbox">
                    Sản phẩm
                </div>
                <div class="col-2 text-center">Đơn giá</div>
                <div class="col-2 text-center">Số lượng</div>
                <div class="col-2 text-center">Số tiền</div>
                <div class="col-1 text-center">Thao tác</div>
            </div>
            <div class="cart-item row align-items-center">
                <div class="col-5">
                    <div class="row align-items-center">
                        <div class="col-1">
                            <input type="checkbox">
                        </div>
                        <div class="col-3">
                            <div class="box-img">
                                <img src="{{asset('assets/clients/images/banner/banner-1 - Copy.png')}}" alt="">
                            </div>
                        </div>
                        <div class="col-5">
                            Tên sản phẩm
                        </div>
                    </div>
                </div>
                <div class="col-2 text-center">20000000</div>
                <div class="col-2 text-center">
                    <div class="box-amount">
                        <div class="btn-minus"><i class="fas fa-minus"></i></div>
                        <div class="amount">1</div>
                        <div class="btn-add"><i class="fas fa-plus"></i></div>
                    </div>
                </div>
                <div class="col-2 text-center">20000000</div>
                <div class="col-1 text-center">
                    <div class="btn btn-dlt">Xóa</div>
                </div>
            </div>
        </section>
    
    <div class="container-buy">
            <div class="box-buy">
                <div class="voucher">
                    <h5>MediaMart Voucher</h5>
                    <div class="btn-voucher" style="width: 300px; text-align: end;">Chọn mã khuyến mại</div>
                </div>
                <div class="total">
                    <h5>Tổng tiền</h5>
                    <span style="width: 200px; text-align: end;">2000000</span>
                </div>
                <button class="btn-buy btn btn-danger">Mua</button>
            </div>
        </div>
    </div>
@endsection
