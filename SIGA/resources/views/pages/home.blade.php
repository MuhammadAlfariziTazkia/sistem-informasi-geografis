@extends('template.master')

@section('title', 'Home')

@section('content')

    @include('template.navbar')
    <div class="banner"
        style="background: linear-gradient(to bottom, hsla(0, 0%, 30.2%, 0.7), hsla(0, 0%, 30.2%, 0.7)), url({{ asset('img/banner.png') }}) no-repeat center center / cover;">
        <div>
            <p class="banner__header">Selamat Datang</p>
            <p>Yuk mulai buat harimu menjadi sehat atau membuat dirimu menjadi tenang dan santai dengan liburan kesuatu
                tempat.
        </div>
        </p>
    </div>
    <p class="topic">
        Mulai Buat Pengalamanmu
    </p>

    <section class="menu-section">
        <div class="menu"
            style="background: linear-gradient(180deg,transparent 16%, hsl(0,0%,87.5%,0.3) 46%, hsl(0,0%,21%) 100%), url({{ asset('img/olahraga.png') }}) no-repeat center center / cover;">
            <a href="{{route('olahraga.index')}}" class="menu__text">
                <p class="menu__header">Cari Lokasi Olahraga</p>
                <p>Temukan tempat sehat kamu sekarang</p>
            </a>
        </div>

        <div class="menu"
            style="background: linear-gradient(180deg,transparent 16%, hsl(0,0%,87.5%,0.3) 46%, hsl(0,0%,21%) 100%), url({{ asset('img/wisata.png') }}) no-repeat center center / cover;">
            <a href="{{route('wisata.index')}}" class="menu__text">
                <p class="menu__header">Cari Lokasi Wisata</p>
                <p>Mulai cari lokasi untuk liburan kamu</p>
            </a>
        </div>
    </section>

    <section class="why-section">
        <div class="menu-section">
            <div style="background: url({{ asset('img/olahraga1.png') }}) no-repeat center center / cover" alt=""
                class="why__img"></div>
            <div class="why__text">
                <p class="why__header">Kenapa Harus Olahraga?</p>
                <p>Olahraga merupakan obat ajaib yang bisa Anda dapatkan dengan mudah tanpa biaya mahal, namun sering kali
                    terabaikan sehingga menimbulkan beragam keluhan kesehatan.</p>
            </div>
        </div>
        <div class="menu-section">
            <div class="why__text">
                <p class="why__header">Kenapa Harus Liburan ?</p>
                <p>Saat merasa penat karena rutinitas harian yang padat, kebanyakan orang mungkin akan memilih untuk pergi
                    berlibur. Siapa sangka bahwa ini adalah pilihan yang tepat. Selain bisa membantu menyegarkan pikiran
                    yang penat</p>
            </div>
            <div style="background: url({{ asset('img/wisata1.png') }}) no-repeat center center / cover" alt=""
                class="why__img"></div>
        </div>
    </section>
@endsection

@section('footer')
    @include('template.footer')
@endsection
