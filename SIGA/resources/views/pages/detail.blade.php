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
        @foreach ($rekomendasi as $item)
        <div class="d-flex mb-5 p-1 card__recommend "onmousemove="popMarker({{ $item->latitude }},{{ $item->longitude }},'{{ $item->asset_name }}')"
            onmouseout="setTimeout( clearMarker(),3000)">
            <div class="recommend__img"
                style="background: url({{ $item->asset_link }}) no-repeat center center / cover;">
            </div>

            <div class="recommend__info">
                <p class="recommend__header">{{ $item->nama }}</p>
                <p>Jarak - Km</p>
                <div class="recommend__rating">
                    {{ $item->rating }}

                    @for ($i = 1; $i <= $item->rating; $i++)
                        @if ($i <= $item->rating)
                            <div class="recommend__star">★</div>
                        @else
                            <div class="recommend__star nofill">☆</div>
                        @endif
                    @endfor
                </div>

                @if ($object_type == 'sarana olahraga')
                    <a class="recommend__link" href="{{ route('olahraga.show', $item->id) }}">Lihat
                        Selengkapnya</a>
                @else
                    <a class="recommend__link" href="{{ route('wisata.show', $item->id) }}">Lihat
                        Selengkapnya</a>
                @endif
            </div>
        </div>
        @endforeach
    </div>
@endsection

@section('footer')
    <script src="{{ asset('js/map.js') }}"></script>
@endsection
