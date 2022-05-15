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
                    <input type="checkbox" class="check-all">
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
                            <input type="checkbox" class="check-item">
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
                <div class="col-2 text-center price">20000000</div>
                <div class="col-2 text-center">
                    <div class="box-amount">
                        <div class="btn-minus"><i class="fas fa-minus"></i></div>
                        <div class="amount">1</div>
                        <div class="btn-add"><i class="fas fa-plus"></i></div>
                    </div>
                </div>
                <div class="col-2 text-center total_price-sub">20000000</div>
                <div class="col-1 text-center">
                    <div class="btn btn-dlt">Xóa</div>
                </div>
            </div>
            <div class="cart-item row align-items-center">
                <div class="col-5">
                    <div class="row align-items-center">
                        <div class="col-1">
                            <input type="checkbox" class="check-item">
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
                <div class="col-2 text-center price">20000000</div>
                <div class="col-2 text-center">
                    <div class="box-amount">
                        <div class="btn-minus"><i class="fas fa-minus"></i></div>
                        <div class="amount">1</div>
                        <div class="btn-add"><i class="fas fa-plus"></i></div>
                    </div>
                </div>
                <div class="col-2 text-center total_price-sub">20000000</div>
                <div class="col-1 text-center">
                    <div class="btn btn-dlt">Xóa</div>
                </div>
            </div>
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
                    <span class="total_price" style="font-size: 20px; margin-right: 20px">0đ</span>
                    <button class="btn-buy btn mx-3" style="width: 200px; background: var(--background-main-color); color: white">Mua</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
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
                $('.total_price').text(sum+'đ')
            }
            else {
                $('.check-all').prop('checked',false)
                $('.check-item').prop('checked',false)
                $('.total_price').text(0+'đ')
            }

        })
        $('.check-item').click(function() {
            var sum = 0
            var count = 0
            var cart_item = $('.cart-item')
            cart_item.each(function() {
                if($(this).find('.check-item').is(":checked")) {
                    var val = Number($(this).find('.total_price-sub').text())
                    sum+=val
                    count++
                }
            })
            $('.total_price').text(sum+'đ')
            if(count==cart_item.length)
                $('.check-all').prop('checked',true)
            else
                $('.check-all').prop('checked',false)
        })


        $('.btn-minus').click(function () {
            var cart_item = $(this).closest('.cart-item')

            var amount = cart_item.find('.amount').text();
            if(amount>1)
                amount--
            cart_item.find('.amount').text(amount)  

            var price = cart_item.find('.price').text()
            cart_item.find('.total_price-sub').text(amount*price)

            var sum = 0
            var cart_item = $('.cart-item')
            cart_item.each(function() {
                if($(this).find('.check-item').is(":checked")) {
                    var val = Number($(this).find('.total_price-sub').text())
                    sum+=val
                }
            })
            $('.total_price').text(sum+'đ')
        })
        $('.btn-add').click(function () {
            var cart_item = $(this).closest('.cart-item')

            var amount = cart_item.find('.amount').text();
            amount++
            cart_item.find('.amount').text(amount)   
            
            var price = cart_item.find('.price').text()
            cart_item.find('.total_price-sub').text(amount*price)

            var sum = 0
            var cart_item = $('.cart-item')
            cart_item.each(function() {
                if($(this).find('.check-item').is(":checked")) {
                    var val = Number($(this).find('.total_price-sub').text())
                    sum+=val
                    console.log(val)
                }
            })
            $('.total_price').text(sum+'đ')
        })
    </script>
@endsection
