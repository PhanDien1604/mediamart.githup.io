@extends('layouts.client')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/clients/css/product.css')}}">
@endsection
@section('slidebar')
@endsection
@section('content')
    <div class="content">
        <section>
            <div class="d-flex justify-content-between mt-5">
                <h3 class="prd-title">Sản phẩm</h3>
                <div class="prdbox-txt">
                    <div class="prd-review mt-2">Đánh giá</div>
                </div>
            </div>
            <hr class="m-0 my-4 mt-3">
            <div class="container-prdbox">
                <div class="prd-info-left">
                    <div class="img-prd-item-box">
                        <img src="{{asset('assets/clients/images/product/product-1.jpg')}}" alt="">
                        <img src="{{asset('assets/clients/images/product/product-2.jpg')}}" alt="">
                        <img src="{{asset('assets/clients/images/product/product-3.jpg')}}" alt="">
                        <img src="{{asset('assets/clients/images/product/product-4.jpg')}}" alt="">
                    </div>
                    <div class="specifications-prd">
                        <span>Phan dien</span> <br>
                        <span>22 tuổi</span>
                        <button>Xem chi tiết thông số kĩ thuật</button>
                    </div>
                </div>
                <div class="prd-info-right">
                    <div class="prd-price">
                        <span class="prd__price-new">10.000.000&#x20ab;</span>
                        <span class="prd__price-old">10.000.000&#x20ab;</span>
                    </div>
                    <div class="info-prd-promo-item">
                        Thông tin khuyến mãi
                    </div>
                    <div class="prd__btn-box">
                        <a href="#" class="btn-buy">Mua hàng</a>
                        <a href="#" class="btn-addcart"><i class="fas fa-shopping-cart"></i>Giỏ hàng</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
