@extends('template.master')

@section('title', $object_type)

@section('banner')
    <div class="banner-full"
        style="background: linear-gradient(to bottom, hsla(0, 0%, 30.2%, 0.7), hsla(0, 0%, 30.2%, 0.7)), url({{ asset('img/banner.png') }}) no-repeat center center / cover;">
        <div>
            <p class="banner-full__header text-capitalize">Cari {{ $object_type }}</p>
            <p>
                @if ($object_type == 'sarana olahraga')
                    Mari jaga kesehatan fisik dengan rutin berolahraga. Pilih sarana olahraga sesuai keinginanmu!
                @else
                    Penat dengan aktifitas sehari - harimu? Mari berpariwisata untuk healing mu sejenak!
                @endif
            </p>
        </div>

    </div>
    <div style="position: absolute; padding: 30px 80px; top: 0px; width: 100%" class="notHome">
        @include('template.navbar')
    </div>

@endsection

@section('content')
    @if ($object_type == 'sarana olahraga')
        <form id="searchForm" method="get" action="{{ route('olahraga.index') }}">
    @else
        <form id="searchForm" method="get" action="{{ route('wisata.index') }}">
    @endif
        <input type="text" style="display: none" name="sortby" value="distance" id="inputSort">
        <div class="d-flex justify-content-between search">
            <input list="search" class="search__input" id="searchLoc" name="search" value="{{$search_key}}"
                style="background: url({{ asset('icon/search.svg') }}) no-repeat center center / 30px 30px; background-position:20px; background-color: white; "
                placeholder="Cari {{ $object_type }}">
            <datalist id="search">
                @foreach ($data as $item)
                    <option value="{{ $item->asset_name }}">
                @endforeach
            </datalist>
            <button type="submit" class="search__button">Cari</button>
        </div>
    </form>
    <div class="d-flex justify-content-between">
        <div class="map" id="map"></div>
        <div class="recommend">
            <div class="dropdown">
                <button class="dropbtn">Urut Berdasarkan</button>
                <div class="dropdown-content">
                    <a onclick="cek('rating')">Rating
                        Terbaik</a>
                    <a onclick="cek('distance')">Jarak
                        Terdekat</a>
                </div>
            </div>
            {{-- card rekomendasi --}}
            @foreach ($data as $item)

                <div class="d-flex mb-5 card__recommend"
                    onmousemove="popMarker({{ $item->latitude }},{{ $item->longitude }},'{{ $item->asset_name }}')"
                    onmouseout="setTimeout( clearMarker(),3000)">
                    <div class="recommend__img"
                        style="background: url({{ $item->asset_link }}) no-repeat center center / cover;">
                    </div>

                    <div class="recommend__info">
                        <p class="recommend__header">{{ $item->asset_name }}</p>
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
            {{-- end card rekomendasi --}}
        </div>
    </div>
@endsection

@section('footer')
    <script>
        function cek (sortValue){
        var sort = document.getElementById('inputSort');
        newSort = sortValue;
        sort.setAttribute('value',newSort);
        console.log(sort.value)
        document.getElementById('searchForm').submit();
    }
</script>
    <script src="{{ asset('js/map.js') }}"></script>
@endsection
