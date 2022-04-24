@extends('layouts.client')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/clients/css/home.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/card-product.css')}}">
@endsection
@section('slidebar')
    @parent
@endsection

@section('content')
    <div class="content">
        <section>
            <a href="#" class="subbanner">
                @if(!empty($bannerPromo[0]))
                    @php
                        $img = '<img src="'.asset($bannerPromo[0]->path).'" class="d-block w-100">';
                    @endphp
                    {!!$img!!}
                @endif
                {{-- <img src="{{asset('assets/clients/images/banner/subbanner.png')}}" alt=""> --}}
            </a>
            <div class="product-promotion">
                <div class="list-product-slick">
                <aside class="prd-item">
                    <a href="#">
                        <div class="card">
                            <img src="{{asset('assets/clients/images/product/product-1.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title Phan Quang Điện B19DCCN181</h5>
                                <div class="prd-price">
                                    <span class="prd__price-new">10.000.000&#x20ab;</span>
                                    <span class="prd__price-old">10.000.000&#x20ab;</span>
                                </div>
                                <p class="card-text"></p>
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
            <div class="d-flex justify-content-between position-relative mt-5 mb-4">
                <h4 class="txt__prd">Sản phẩm</h4>
                <a href="#" class="link-see-all__prd">Xem tất cả 100 sản phẩm</a>
                <div class="borderrow-prd"></div>
            </div>
            <div class="container-productbox">
                <div class="list-product-slick">
                <aside class="prd-item">
                    <a href="#">
                        <div class="card">
                            <img src="{{asset('assets/clients/images/product/product-1.jpg')}}" class="card-img-top" alt="...">
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
            </div>

        </section>
    </div>
@endsection
