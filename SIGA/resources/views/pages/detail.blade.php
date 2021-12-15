@extends('template.master')

@section('title', 'Detail')

@section('banner')
    <div class="banner-full"
        style="background: linear-gradient(to bottom, hsla(0, 0%, 30.2%, 0.7), hsla(0, 0%, 30.2%, 0.7)), url({{ asset('img/banner.png') }}) no-repeat center center / cover;">
        <div>
            <p class="banner-full__header">Teropong Kota</p>
            <p>Jl. Tamin, Pasir Gintung, Kec. Tj. Karang Pusat, Kota Bandar Lampung, Lampung 35121
            </p>
            <p> +62 818 0304 4553
            </p>
            <div class="recommend__rating">
                <div class="recommend__star">★</div>
                <div class="recommend__star ">★</div>
                <div class="recommend__star ">★</div>
                <div class="recommend__star nofill">☆</div>
                <div class="recommend__star nofill">☆</div>
            </div>
        </div>

    </div>
    <div style="position: absolute; padding: 30px 80px; top: 0px; width: 100%" class="notHome">
        @include('template.navbar')
    </div>

@endsection

@section('content')
    <div class="map__detail" id="map"></div>
    <p class="recommend__text">
        Rekomendasi Tempat Olahraga Lainnya
    </p>
    <div class="recommend detail">
        <div class="d-flex mb-5 p-1 mr-5 card__recommend " onmousemove="popMarker(-5.359013097988684,105.3162449826625,'Nice')" onmouseout="clearMarker()">
            <div class="recommend__img"
                style="background: url({{ asset('img/banner.png') }}) no-repeat center center / cover;">
            </div>

            <div class="recommend__info">
                <p class="recommend__header">Meditation Lampung</p>
                <p>Jarak 3.3 Km</p>
                <div class="recommend__rating">
                    <div class="recommend__star">★</div>
                    <div class="recommend__star ">★</div>
                    <div class="recommend__star ">★</div>
                    <div class="recommend__star nofill">☆</div>
                    <div class="recommend__star nofill">☆</div>
                </div>
                <a class="recommend__link" >Lihat Selengkapnya</a>
            </div>
        </div>
        <div class="d-flex mb-5 p-1 mr-5 card__recommend " onmousemove="popMarker(-5.359013097988684,105.3162449826625,'Nice')" onmouseout="clearMarker()">
            <div class="recommend__img"
                style="background: url({{ asset('img/banner.png') }}) no-repeat center center / cover;">
            </div>

            <div class="recommend__info">
                <p class="recommend__header">Meditation Lampung</p>
                <p>Jarak 3.3 Km</p>
                <div class="recommend__rating">
                    <div class="recommend__star">★</div>
                    <div class="recommend__star ">★</div>
                    <div class="recommend__star ">★</div>
                    <div class="recommend__star nofill">☆</div>
                    <div class="recommend__star nofill">☆</div>
                </div>
                <a class="recommend__link" >Lihat Selengkapnya</a>
            </div>
        </div>
        <div class="d-flex mb-5 p-1 mr-5 card__recommend " onmousemove="popMarker(-5.359013097988684,105.3162449826625,'Nice')" onmouseout="clearMarker()">
            <div class="recommend__img"
                style="background: url({{ asset('img/banner.png') }}) no-repeat center center / cover;">
            </div>

            <div class="recommend__info">
                <p class="recommend__header">Meditation Lampung</p>
                <p>Jarak 3.3 Km</p>
                <div class="recommend__rating">
                    <div class="recommend__star">★</div>
                    <div class="recommend__star ">★</div>
                    <div class="recommend__star ">★</div>
                    <div class="recommend__star nofill">☆</div>
                    <div class="recommend__star nofill">☆</div>
                </div>
                <a class="recommend__link" >Lihat Selengkapnya</a>
            </div>
        </div>
        <div class="d-flex mb-5 p-1 mr-5 card__recommend " onmousemove="popMarker(-5.359013097988684,105.3162449826625,'Nice')" onmouseout="clearMarker()">
            <div class="recommend__img"
                style="background: url({{ asset('img/banner.png') }}) no-repeat center center / cover;">
            </div>

            <div class="recommend__info">
                <p class="recommend__header">Meditation Lampung</p>
                <p>Jarak 3.3 Km</p>
                <div class="recommend__rating">
                    <div class="recommend__star">★</div>
                    <div class="recommend__star ">★</div>
                    <div class="recommend__star ">★</div>
                    <div class="recommend__star nofill">☆</div>
                    <div class="recommend__star nofill">☆</div>
                </div>
                <a class="recommend__link" >Lihat Selengkapnya</a>
            </div>
        </div>
        <div class="d-flex mb-5 p-1 mr-5 card__recommend " onmousemove="popMarker(-5.359013097988684,105.3162449826625,'Nice')" onmouseout="clearMarker()">
            <div class="recommend__img"
                style="background: url({{ asset('img/banner.png') }}) no-repeat center center / cover;">
            </div>

            <div class="recommend__info">
                <p class="recommend__header">Meditation Lampung</p>
                <p>Jarak 3.3 Km</p>
                <div class="recommend__rating">
                    <div class="recommend__star">★</div>
                    <div class="recommend__star ">★</div>
                    <div class="recommend__star ">★</div>
                    <div class="recommend__star nofill">☆</div>
                    <div class="recommend__star nofill">☆</div>
                </div>
                <a class="recommend__link" >Lihat Selengkapnya</a>
            </div>
        </div>
        <div class="d-flex mb-5 p-1 mr-5 card__recommend " onmousemove="popMarker(-5.359013097988684,105.3162449826625,'Nice')" onmouseout="clearMarker()">
            <div class="recommend__img"
                style="background: url({{ asset('img/banner.png') }}) no-repeat center center / cover;">
            </div>

            <div class="recommend__info">
                <p class="recommend__header">Meditation Lampung</p>
                <p>Jarak 3.3 Km</p>
                <div class="recommend__rating">
                    <div class="recommend__star">★</div>
                    <div class="recommend__star ">★</div>
                    <div class="recommend__star ">★</div>
                    <div class="recommend__star nofill">☆</div>
                    <div class="recommend__star nofill">☆</div>
                </div>
                <a class="recommend__link" >Lihat Selengkapnya</a>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script src="{{ asset('js/map.js') }}"></script>
@endsection
