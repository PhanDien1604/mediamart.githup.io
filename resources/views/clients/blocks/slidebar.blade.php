<div class="slidebar">
    <section class="d-flex">
        <div class="bar-left">
        </div>
        <div class="homebanner-container">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach ($bannerBody as $key => $item)
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$key}}" class="active" aria-current="true" aria-label="Slide 1"></button>
                    @endforeach
                  {{-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{}}" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button> --}}
                </div>
                <div class="carousel-inner">
                    @foreach ($bannerBody as $item)
                        <div class="carousel-item">
                            @php
                                $img = '<img src="'.asset($item->path).'" class="d-block w-100">';
                            @endphp
                            {!!$img!!}
                        {{-- <img src="{{asset('assets/clients/images/banner/banner-header-1.png')}}" class="d-block w-100" alt="..."> --}}
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </div>
        <div class="preorder-hot">
            <a href="#"></a>
            <a href="#"></a>
            <a href="#"></a>
        </div>
    </section>
</div>
