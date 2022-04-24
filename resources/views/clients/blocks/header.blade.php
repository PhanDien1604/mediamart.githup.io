<header class="">
    <div class="banner-top-header">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                @if (!empty($bannerTop[0]))
                @foreach ($bannerTop as $item)
                <div class="carousel-item">
                    @php
                        $img = '<img src="'.asset($item->path).'" class="d-block w-100">';
                    @endphp
                    {!!$img!!}
                </div>
                @endforeach
                @endif


            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>
    <div class="header__top">
        <section class="d-flex align-items-center justify-content-between">
            <a href="#" class="header__logo">
                <img src="{{asset('assets/clients/images/logo-web.png')}}" alt="">
            </a>
            <div class="bordercol"></div>
            <form action="" class="header__search">
                <input type="text" class="input-search" placeholder="Search" name="search">
                <button type="submit" class="btn-search">
                    <i class="fas fa-search"></i>
                </button>
            </form>
            <a href="#" class="header__cart">
                <i class="fas fa-shopping-cart"></i>
                <span>Giỏ hàng</span>
            </a>
            <a href="#" class="header__history">Lịch sử mua hàng</a>
            <div class="bordercol"></div>
            <div class="header__empty"></div>
            <div class="header__listtop d-flex align-items-center">
                <div class="bordercol"></div>
                <div class="divitem">
                    <a href="#">Tư vấn <br> chọn mua</a>
                </div>
                <div class="bordercol"></div>
                <div class="divitem">
                    <a href="#">Khuyến mại</a>
                </div>
                <div class="bordercol"></div>
                <div class="divitem">
                    <a href="#">Acount</a>
                </div>
            </div>
        </section>
    </div>
    <div class="header__main">
        <section class="d-flex align-items-center">
            <div class="category">
                <p class="category__txt">
                    <i class="fas fa-bars"></i>
                    <span>Danh mục</span>
                </p>
                <div class="category-list">
                    <ul class="main-menu">
                        @if (!empty($category[0]))
                        @foreach ($category as $item)
                        <li class="menu-item">
                            <div class="dropright">
                                <span class="icon__menuitem">
                                    @php
                                        $img = "<img src=".asset($item[0][0]->path).">";
                                    @endphp
                                    {!!$img!!}
                                    {{-- <img src="{{asset('assets/clients/images/icon-phone.PNG')}}" alt=""> --}}
                                </span>
                                @foreach ($item[1] as $value)
                                    <a href="{{route('home.groupProduct', ['groupProductId'=>$value->group_id])}}">{{$value->group_name}}</a><span class="comma">,</span>
                                @endforeach
                            </div>

                            <div class="submenu">
                                @foreach ($item[2] as $value)
                                <aside>
                                    <p class="menuitem__title">
                                        {{$value[1]}}
                                        <a href="{{route('home.groupProduct', ['groupProductId'=>$value[0]])}}">Xem tất cả</a>
                                    </p>
                                    @foreach ($value[2] as $key)
                                        {{-- @dd($key) --}}
                                        <a href="{{route('home.groupProduct', ['groupProductId'=>$key->group_sub_id])}}">{{$key->group_sub_name}}</a>
                                    @endforeach
                                </aside>
                                @endforeach
                            </div>

                        </li>
                        @endforeach
                        @endif

                    </ul>
                </div>
            </div>
            <ul class="txt-list">

                @if(!empty($categoryPromo[0]))
                @foreach ($categoryPromo as $item)
                <li>
                    <a href="{{route('home.groupProduct', ['groupProductId'=>$item->promo_id])}}">{{$item->promo_name}}</a>
                </li>
                @endforeach
                @endif
            </ul>
        </section>
    </div>
</header>
