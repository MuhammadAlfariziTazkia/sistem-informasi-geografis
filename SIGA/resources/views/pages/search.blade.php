@extends('template.master')

@section('title', 'Cari')

@section('banner')
    <div class="banner-full"
        style="background: linear-gradient(to bottom, hsla(0, 0%, 30.2%, 0.7), hsla(0, 0%, 30.2%, 0.7)), url({{ asset('img/banner.png') }}) no-repeat center center / cover;">
        <div>
            <p class="banner-full__header">Cari Tempat Olahraga</p>
            <p>Mari jaga kesehatan fisik dengan rutin berolahraga. Pilih sarana olahraga sesuai keinginanmu!
            </p>
        </div>

    </div>
    <div style="position: absolute; padding: 30px 80px; top: 0px; width: 100%" class="notHome">
        @include('template.navbar')
    </div>

@endsection

@section('content')
    <div class="d-flex justify-content-between search">
        <input list="search" class="search__input"
            style="background: url({{ asset('icon/search.svg') }}) no-repeat center center / 30px 30px; background-position:20px; background-color: white; "
            placeholder="Cari Tempat Olahraga">
        <datalist id="search">
            <option value="Edge">
            <option value="Firefox">
            <option value="Chrome">
            <option value="Opera">
            <option value="Safari">
        </datalist>
        <button class="search__button">Cari</button>
    </div>
    <div class="d-flex justify-content-between">
        <div class="map" id="map"></div>
        <div class="recommend">
            <div class="dropdown">
                <button class="dropbtn">Urut Berdasarkan</button>
                <div class="dropdown-content">
                    <a href="#">Rating</a>
                    <a href="#">Jarak terdekat</a>
                </div>
            </div>
            {{-- card rekomendasi --}}
            <div class="d-flex mb-5 card__recommend" onmousemove="popMarker(-5.359013097988684,105.3162449826625,'Nice')" onmouseout="clearMarker()">
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
            {{-- end card rekomendasi --}}
        </div>
    </div>
@endsection

@section('footer')
    <script src="{{ asset('js/map.js') }}"></script>
@endsection
