<ul class="nav-container">
    <!-- Navigation item -->
    <li>
        <div class="logo d-flex justify-content-center align-items-center">
            <a href="/"><img src="{{ asset('img/logo.png') }}" alt="" ></a>
        </div>
    </li>

    <!-- Navigation item that sticks to the right -->
    <li class="nav__item--right">
        <a href="{{route('wisata.index')}}">
            <p>Wisata</p>
        </a>
        <a href="{{route('olahraga.index')}}">
            <p>Olahraga</p>
        </a>
    </li>
</ul>
