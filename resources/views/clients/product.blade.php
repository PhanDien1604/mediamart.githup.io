@extends('layouts.client')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/product.css')}}">
@endsection
@section('slidebar')
@endsection
@section('content')
    <div class="content">
        <section>
            @if(!empty($product))
            <div class="d-flex justify-content-between mt-5">
                <h3 class="prd-title">{{$product->name}} + {{$product->code}}</h3>
                <div class="prdbox-txt">
                    <div class="prd-review mt-2">Đánh giá</div>
                </div>
            </div>
            <hr class="m-0 my-4 mt-3">
            <div class="container-prdbox">
                <div class="prd-info-left">
                    <div class="img-prd-item-box">
                        @if (!empty($images[0]))
                            @foreach ($images as $image)
                            @php
                                $img = "<img src=".asset($image->path)." alt='Product Image' class='img-size-50' style='width: 100%'>";
                            @endphp
                            {!!$img!!}
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="prd-info-right">
                    <div class="prd-price">
                        <span class="prd__price-new">{{number_format($product->price,0,',','.')}}&#x20ab;</span>
                        {{-- <span class="prd__price-old">10.000.000&#x20ab;</span> --}}
                    </div>
                    <div class="info-prd-promo-item">
                        {!!$promo->info!!}
                    </div>
                    <div class="prd__btn-box">
                        <a href="#" class="btn-buy">Mua hàng</a>
                        <input type="hidden" value="{{$product->id}}" class="prd-id">
                        <div class="btn btn-addcart"><i class="fas fa-shopping-cart"></i>Giỏ hàng</div>
                    </div>
                </div>

            </div>
            <div class="mt-5">
                {!!$product->introduction_article!!}
                <span style=""></span>
            </div>

            @endif

        </section>

    </div>
@endsection

@section('js')
    <script>
        // addCart()
        // console.log($('.prd-item>a').attr('href'))
        $('.btn-addcart').click(function() {
            var product_id = $(this).parent().find('.prd-id').val();
            console.log(product_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: '/add-cart',
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
