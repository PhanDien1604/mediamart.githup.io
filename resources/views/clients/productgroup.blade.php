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
                @if (!empty($products[0]))
                    @foreach ($products as $product)
                    <aside class="prd-item">
                        <a href="{{route('home.product',['groupProductId'=>$groupId,'productId'=>$product->id])}}">
                            <div class="card">
                                @php
                                    $img = "<img src=".asset($product->image)." alt='Product Image' class='img-size-50' style='width: 100%'>";
                                @endphp
                                {!!$img!!}
                                <div class="card-body">
                                    <h5 class="card-title">{{$product->name}}</h5>
                                    <div class="prd-price">
                                        <span class="prd__price-new">{{$product->price}}&#x20ab;</span>
                                        <span class="prd__price-old">10.000.000&#x20ab;</span>
                                    </div>
                                    <p class="card-text">{{$product->info}}</p>
                                </div>
                            </div>
                        </a>
                        <div class="prd__btn-box">
                            <a href="#" class="btn btn-buy">Mua hàng</a>
                            <a href="#" class="btn btn-addcart"><i class="fas fa-shopping-cart"></i></a>
                        </div>
                    </aside>
                    @endforeach
                    @else
                        
                    @endif
                </div>
                <a href="#" class="btn-prd-promo__see-all">Xem tất cả</a>
            </div>
        </section>
    </div>
@endsection
