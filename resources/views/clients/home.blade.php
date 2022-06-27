@extends('layouts.client')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                <div class="list-product">
                    @if (!empty($products))
                        @foreach ($products as $product)
                        <aside class="prd-item">
                            <input type="hidden" value="{{$product->id}}" class="prd-id">
                            {{-- <a href=""> --}}

                            <a href="{{route('home.product',['groupProductId'=>$product->group_product_id,'productId'=>$product->id])}}">
                                <div class="card">
                                    @php
                                        $img = "<img src=".asset($product->image)." alt='Product Image' class='img-size-50' style='width: 100%'>";
                                    @endphp
                                    {!!$img!!}
                                    <div class="card-body">
                                        <h5 class="card-title">{{$product->name}}</h5>
                                        <div class="prd-price">
                                            <span class="prd__price-new">{{$product->price}}&#x20ab;</span>
                                            {{-- <span class="prd__price-old">10.000.000&#x20ab;</span> --}}
                                        </div>
                                        <p class="card-text">{{$product->info}}</p>
                                    </div>
                                </div>
                            </a>
                            <div class="prd__btn-box">
                                <a href="#" class="btn btn-buy">Mua hàng</a>
                                <div class="btn btn-addcart"><i class="fas fa-shopping-cart"></i></div>
                            </div>
                        </aside>
                        @endforeach
                    @else

                    @endif

                </div>
            </div>

        </section>
    </div>
@endsection

@section('js')
    <script>
        // addCart()
        // console.log($('.prd-item>a').attr('href'))
        $('.btn-addcart').click(function() {
            var product_id = $(this).closest('.prd-item').find('.prd-id').val();
            console.log(product_id)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: {{$product->group_product_id}}+'/add-cart',
                data: {
                    'product_id': product_id
                },
                dataType: "json",
                success: function (response) {
                    alert(response.status)
                }
            });
        })
    </script>
@endsection
