@extends('layouts.client')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{asset('assets/clients/css/cart.css')}}">
@endsection
@section('slidebar')
@endsection
@section('content')
    <div class="content">
        <section>
            <div class="cart-header row">
                <div class="col-5">
                    Sản phẩm
                </div>
                <div class="col-2 text-center">Đơn giá</div>
                <div class="col-2 text-center">Số lượng</div>
                <div class="col-2 text-center">Số tiền</div>
            </div>
            @if (!empty($orders[0]))
            <form action="{{route('home.deleteOrder')}}" method="post">
                @csrf
                @foreach ($orders as $item)
                <div class="cart-item row align-items-center">
                    <div class="col-5">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <div class="box-img">
                                    @php
                                        $img = "<img src=".asset($item->image)." alt='Product Image'>";
                                    @endphp
                                    {!!$img!!}
                                </div>
                            </div>
                            <div class="col-8">{{$item->name}} {{$item->code}}</div>
                        </div>
                    </div>
                    <div class="col-2 text-center price">{{$item->price}}</div>
                    <div class="col-2 text-center">
                        <div class="amount">{{$item->amount}}</div>
                    </div>
                    <div class="col-2 text-center total_price-sub">{{$item->price * $item->amount}}</div>
                </div>
                @endforeach
            <button class="btn-form-order d-none">Submit</button>
            </form>
            @else
                
            @endif
        </section>
    <div class="container-buy">
        <div class="btn btn-select-buy btn-danger"><i class="fas fa-angle-double-up"></i></div>    
        <div class="box-buy">
            <div class="voucher">
                <h5>MediaMart Voucher</h5>
                <div class="btn-voucher" style="width: 300px; text-align: end;">Chọn mã khuyến mại</div>
            </div>
            <div class="content-voucher">???</div>
            <div class="d-flex justify-content-end mt-3">
                <div class="d-flex mt-2">
                    <span style="font-size: 20px; font-weight: 600; margin-right: 20px">Tổng tiền:</span>
                    <span class="total_price" style="font-size: 20px;">0</span><span style="margin-right: 20px;">đ</span>
                    <button class="btn-buy btn mx-3" form="#form-order" style="width: 200px; background: var(--background-main-color); color: white">Huỷ mua</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('.btn-buy').click(function() {
            if($('.btn-form-order').has()) {
                $('.btn-form-order').click()
            }
        })
        $('.btn-select-buy').click(function() {
            var btn_select_by = $('.btn-select-buy').html()
            if(btn_select_by == '<i class="fas fa-angle-double-up"></i>') {
            console.log(btn_select_by)

                $('.container-buy').css('transform','translateY(-210px)')
                $('.btn-select-buy').html('<i class="fas fa-angle-double-down"></i>')
            }else {
            console.log(btn_select_by)

                $('.container-buy').css('transform','translateY(0px)')
                $('.btn-select-buy').html('<i class="fas fa-angle-double-up"></i>')
            }
        })
        var sum = 0
        $('.cart-item').each(function() {
            var val = Number($(this).find('.total_price-sub').text())
            sum+=val
        });
        $('.total_price').text(sum)
    </script>
@endsection
