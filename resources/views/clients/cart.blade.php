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
                    <input type="checkbox" class="check-all">
                    Sản phẩm
                </div>
                <div class="col-2 text-center">Đơn giá</div>
                <div class="col-2 text-center">Số lượng</div>
                <div class="col-2 text-center">Số tiền</div>
                <div class="col-1 text-center">Thao tác</div>
            </div>
            @if (!empty($prdInCart[0]))
            <form action="{{route('home.postOrder')}}" method="post">
                @csrf
                @foreach ($prdInCart as $item)
                <div class="cart-item row align-items-center">
                    <input type="hidden" value="{{$item->product_id}}" class="product-id">
                    <input type="hidden" value="{{$item->id}}" class="cart-id">

                    <div class="col-5">
                        <div class="row align-items-center">
                            <div class="col-1">
                                <input type="checkbox" class="check-item" value="{{$item->product_id}}" name="products_order[]">
                            </div>
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
                        <div class="box-amount">
                            <div class="btn-minus"><i class="fas fa-minus"></i></div>
                            <div class="amount">{{$item->amount}}</div>
                            <input type="text" class="d-none" name="amounts[]" value="{{$item->amount}}">
                            <div class="btn-add"><i class="fas fa-plus"></i></div>
                        </div>
                    </div>
                    <div class="col-2 text-center total_price-sub">{{$item->price * $item->amount}}</div>
                    <div class="col-1 text-center">
                        <div class="btn btn-dlt">Xóa</div>
                    </div>
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
            <div class="d-flex justify-content-between mt-3">
                <div class="d-flex align-items-center mt-3" style="font-size: 18px">
                    <div style="width: 130px">
                        <input type="checkbox" class="check-all" style="width: 30px">Chọn tất cả
                    </div>
                    <div class="btn-delete_all" style="cursor: pointer;">Xóa</div>
                </div>
                <div class="d-flex mt-2">
                    <span style="font-size: 20px; font-weight: 600; margin-right: 20px">Tổng tiền:</span>
                    <span class="total_price" style="font-size: 20px;">0</span><span style="margin-right: 20px;">đ</span>
                    <button class="btn-buy btn mx-3" form="#form-order" style="width: 200px; background: var(--background-main-color); color: white">Mua</button>
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
        $('.check-all').click(function() {
            var check = $(this).val()
            if ($(this).is(":checked")) {
                $('.check-all').prop('checked',true)
                $('.check-item').prop('checked',true)
                var sum = 0
                var cart_item = $('.cart-item')
                cart_item.each(function() {
                    var val = Number($(this).find('.total_price-sub').text())
                    sum+=val
                })
                $('.total_price').text(sum)
            }
            else {
                $('.check-all').prop('checked',false)
                $('.check-item').prop('checked',false)
                $('.total_price').text(0)
            }

        })
        $('.check-item').click(function() {
            var cart_item = $(this).closest('.cart-item')
            var total_price_sub = cart_item.find('.total_price-sub').text()
            var sum = Number($('.total_price').text())
            if(cart_item.find('.check-item').is(":checked")) {
                sum+=Number(total_price_sub)
            } else {
                sum-=Number(total_price_sub)
            }
            $('.total_price').text(sum)

            var count = 0
            $('.cart-item').each(function() {
                if($(this).find('.check-item').is(":checked")) {
                    count++
                }
            })
            if(count==$('.cart-item').length)
                $('.check-all').prop('checked',true)
            else
                $('.check-all').prop('checked',false)
        })

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.btn-minus').click(function () {
            var cart_item = $(this).closest('.cart-item')

            var amount = cart_item.find('.amount').text();
            var product_id = cart_item.find('.product-id').val();
            var price = cart_item.find('.price').text()

            if(amount>1) {
                amount--
                $.ajax({
                    type: "post",
                    url: "/cart/update",
                    data: {
                        'amount': amount,
                        'product_id': product_id
                    },
                    dataType: "json",
                    success: function (response) {
                        
                    }
                });
                cart_item.find('.amount').text(amount)
                cart_item.find('.total_price-sub').text(amount*price)
                if(cart_item.find('.check-item').is(":checked")) {
                    var sum = Number($('.total_price').text())
                    sum-=Number(price)
                    $('.total_price').text(sum)
                }
            }
            
        })
        $('.btn-add').click(function () {
            var cart_item = $(this).closest('.cart-item')

            var amount = cart_item.find('.amount').text();
            var product_id = cart_item.find('.product-id').val();
            var price = cart_item.find('.price').text()

            if(amount) {
                amount++
                $.ajax({
                    type: "post",
                    url: "/cart/update",
                    data: {
                        'amount': amount,
                        'product_id': product_id
                    },
                    dataType: "json",
                    success: function (response) {
                        
                    }
                });
                
                cart_item.find('.amount').text(amount)
                cart_item.find('.total_price-sub').text(amount*price)
                if(cart_item.find('.check-item').is(":checked")) {
                    var sum = Number($('.total_price').text())
                    sum+=Number(price)
                    $('.total_price').text(sum)
                } 
            }
                  
        })

        $('.btn-dlt').click(function(){
            var cart_item = $(this).closest('.cart-item')
            var cart_id = cart_item.find('.cart-id').val();
            $.ajax({
                type: "post",
                url: "/cart/delete",
                data: {
                    'cart_id':cart_id
                },
                dataType: "json",
                success: function (response) {
                }
            });
            cart_item.remove()
        })
        $('.btn-delete_all').click(function(){
            $('.cart-item').each(function() {
                if($(this).find('.check-item').is(":checked")) {
                    var cart_id = $(this).find('.cart-id').val();
                    $.ajax({
                        type: "post",
                        url: "/cart/delete",
                        data: {
                            'cart_id':cart_id
                        },
                        dataType: "json",
                        success: function (response) {
                        }
                    });
                    $(this).remove()
                }
            })
            
        })
    </script>
@endsection
