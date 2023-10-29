<div class="container d-flex align-items-center justify-content-between">

    <h1 class="logo">
        <a href="/">
            <svg viewBox="0 0 960 300">
                <symbol id="s-text">
                    <text text-anchor="middle" x="50%" y="80%">IMM </text>
                    <text text-anchor="middle" x="50%" y="80%">IMM </text>

                </symbol>

                <g class="g-ants">
                    <use xlink:href="#s-text" class="text-copy"></use>
                    <use xlink:href="#s-text" class="text-copy"></use>
                    <use xlink:href="#s-text" class="text-copy"></use>
                    <use xlink:href="#s-text" class="text-copy"></use>
                    <use xlink:href="#s-text" class="text-copy"></use>
                </g>
            </svg>
        </a>
    </h1>
    <h1 class="logo"><a href="https://umkendari.ac.id/"><img src="{{ asset('assets/img/logoUMK.png') }}"
                alt=""></a> </h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

    <nav id="navbar" class="navbar">
        <ul>
            <li><a class="active" href="/">Home</a></li>
            <li><a href="/informasi-2">Informasi</a></li>
            <li><a href="/galeri-2">Galeri</a></li>
            <li class="dropdown"><a href="#"><span>Data Kader</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    @foreach ($komisariat as $k)
                        <li><a href="/kader-2/{{ $k->id }}">{{ $k->nama_komisariat }}</a></li>
                    @endforeach
                </ul>
            </li>
            <!-- <li> <a href="/login" class="btn"> <img src="{{ asset('assets/img/icons/users1.svg') }}"
                        alt="img">Login</a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

</div>
