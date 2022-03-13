@extends('layouts.client')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/clients/css/card-product.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/productgroup.css')}}">
@endsection
@section('slidebar')
    @parent
@endsection
@section('content')
    <div class="content">
        <section>
            <div class="select-option-product d-flex justify-content-between">
                <div class="boxfilter-product">
                    <button href="#" class="filer-main-product"><i class="fas fa-filter"></i>Bộ lọc</button>
                </div>
                <div href="#" class="sort-product">
                    <button class="btn-sort-product">Xếp theo: Nổi bật</button>
                </div>
            </div>
            <div class="container-productbox">
                <div class="list-product ">
                <aside class="prd-item">
                    <a href="#">
                        <div class="card">
                            <img src="{{asset('assets/clients/images/product/product-1.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <div class="prd-price">
                                    <span class="prd__price-new">10.000.000&#x20ab;</span>
                                    <span class="prd__price-old">10.000.000&#x20ab;</span>
                                </div>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </a>
                    <div class="prd__btn-box">
                        <a href="#" class="btn btn-buy">Mua hàng</a>
                        <a href="#" class="btn btn-addcart"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                </aside>
                <aside class="prd-item">
                    <a href="#">
                        <div class="card">
                            <img src="{{asset('assets/clients/images/product/product-2.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title Phan Quang Điện B19DCCN181</h5>
                                <div class="prd-price">
                                    <span class="prd__price-new">10.000.000&#x20ab;</span>
                                    <span class="prd__price-old">10.000.000&#x20ab;</span>
                                </div>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </a>
                    <div class="prd__btn-box">
                        <a href="#" class="btn btn-buy">Mua hàng</a>
                        <a href="#" class="btn btn-addcart"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                </aside>
                <aside class="prd-item">
                    <a href="#">
                        <div class="card">
                            <img src="{{asset('assets/clients/images/product/product-3.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title Phan Quang Điện B19DCCN181</h5>
                                <div class="prd-price">
                                    <span class="prd__price-new">10.000.000&#x20ab;</span>
                                    <span class="prd__price-old">10.000.000&#x20ab;</span>
                                </div>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </a>
                    <div class="prd__btn-box">
                        <a href="#" class="btn btn-buy">Mua hàng</a>
                        <a href="#" class="btn btn-addcart"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                </aside>
                <aside class="prd-item">
                    <a href="#">
                        <div class="card">
                            <img src="{{asset('assets/clients/images/product/product-4.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title Phan Quang Điện B19DCCN181</h5>
                                <div class="prd-price">
                                    <span class="prd__price-new">10.000.000&#x20ab;</span>
                                    <span class="prd__price-old">10.000.000&#x20ab;</span>
                                </div>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </a>
                    <div class="prd__btn-box">
                        <a href="#" class="btn btn-buy">Mua hàng</a>
                        <a href="#" class="btn btn-addcart"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                </aside>
                <aside class="prd-item">
                    <a href="#">
                        <div class="card">
                            <img src="{{asset('assets/clients/images/product/product-5.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title Phan Quang Điện B19DCCN181</h5>
                                <div class="prd-price">
                                    <span class="prd__price-new">10.000.000&#x20ab;</span>
                                    <span class="prd__price-old">10.000.000&#x20ab;</span>
                                </div>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </a>
                    <div class="prd__btn-box">
                        <a href="#" class="btn btn-buy">Mua hàng</a>
                        <a href="#" class="btn btn-addcart"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                </aside>
                <aside class="prd-item">
                    <a href="#">
                        <div class="card">
                            <img src="{{asset('assets/clients/images/product/product-3.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title Phan Quang Điện B19DCCN181</h5>
                                <div class="prd-price">
                                    <span class="prd__price-new">10.000.000&#x20ab;</span>
                                    <span class="prd__price-old">10.000.000&#x20ab;</span>
                                </div>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </a>
                    <div class="prd__btn-box">
                        <a href="#" class="btn btn-buy">Mua hàng</a>
                        <a href="#" class="btn btn-addcart"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                </aside>
                </div>
                <a href="#" class="btn-prd-promo__see-all">Xem tất cả</a>
            </div>
        </section>
    </div>
@endsection
