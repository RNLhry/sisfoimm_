@extends('template2.master2')
@section('content')
    <section id="hero">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">
                <div class="carousel-inner" role="listbox">

                    <!-- Slide 1 -->
                    <div class="carousel-item active"
                        style="background-image: url({{ asset('/dist2//img/slide/s-1.jpg') }})">
                    </div>


                </div>
                @foreach ($galeri as $gambar)
                    <div class="carousel-item" style="background-image: url({{ asset('images/' . $gambar->foto) }}">
                    </div>
                @endforeach
            </div>


            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= My & Family Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="section-title">
                    <h2 class="animated-text">Welcome To Sistem Informasi Data Kader IMM UMK</h2>
                    <h4>IMM mempunyai tujuan, yaitu : terbentuknya akademisi muslim yang berakhlak mulia dalam rangka
                        mencapai tujuan muhammadiyah. IMM berdiri pada tanggal 14 Maret 1964 M bertepatan dengan tanggal
                        dengan tanggal 29 syawal 1384 H di Yogyakarta.</h4>
                </div>

                <div class="row content">
                    <div class="col-lg-6">
                        <a href="{{ asset('/dist2//img/Logo_IMM.png') }}" download="Log IMM New-1.png">
                            <button class="btn btn-light btn-sm">Download Gambar</button>
                        </a>
                        <img src="{{ asset('/dist2//img/Logo_IMM.png') }}" class="img-fluid" alt=""
                            style="width: 200px;">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <h4>
                            <b>Bentuk Logo IMM</b>
                        </h4>
                        <ul>
                            <li><i class="ri-check-double-line"></i><h4>Perisai Pena, berarti lambang orang yang menuntut ilmu.</h4>
                            </li>
                            <li><i class="ri-check-double-line"></i><h4>Berlapis tiga maknanya : Iman, Islam dan Ikhsan atau
                                Iman, Ilmu dan Amal.</h4></li>
                        </ul>
                        <h4>
                            <b>Warna Logo IMM</b>
                        </h4>
                        <ul>
                            <li><i class="ri-check-double-line"></i><h4>Hitam : Kekuatan, ketabahan, dan keabadian.</h4></li>
                            <li><i class="ri-check-double-line"></i><h4>Kuning : Kemuliaan tujuan.</h4></li>
                            <li><i class="ri-check-double-line"></i><h4>Merah : Keberanian dalam berfikir, berbuat dan
                                bertanggung jawab.</h4></li>
                            <li><i class="ri-check-double-line"></i><h4>Hijau : Kesejahteraan.</h4></li>
                            <li><i class="ri-check-double-line"></i><h4>Putih : Kesucian</h4></li>
                        </ul>
                        <h4>
                            <b>Gambar Logo IMM</b>
                        </h4>
                        <ul>
                            <li><i class="ri-check-double-line"></i><h4>Sinar Muhammadiyah : Lambang Muhammadiyah.</h4></li>
                            <li><i class="ri-check-double-line"></i><h4>Melati : IMM sebagai kader muda Muhammadiyah.</h4></li>
                            <li><i class="ri-check-double-line"></i><h4>Tulisan dalam pita : Fastabiqul Khairat (berlomba-lomba
                                dalam kebajikan)</h4></li>
                        </ul>
                        {{-- <a href="our-story.html" class="btn-learn-more">Learn More</a> --}}
                    </div>
                </div>

            </div>
        </section><!-- End My & Family Section -->

        <!-- ======= Features Section ======= -->
        <section id="features" class="features">
            <div class="section">
                <h2 class="text-center mb-5">6 Penegasan IMM</h2>
            </div>
            <div class="container">

                <div class="row">
                    <div class="col-lg-4 col-md-6 icon-box">
                        <div class="icon"><i class="bi bi-laptop"></i></div>
                        <h4 class="title"><a href="">Pertama</a></h4>
                        <h3 class="description">Menegaskan bahwa IMM adalah gerakan mahasiswa Islam.</h3>
                    </div>
                    <div class="col-lg-4 col-md-6 icon-box">
                        <div class="icon"><i class="bi bi-bar-chart"></i></div>
                        <h4 class="title"><a href="">Kedua</a></h4>
                        <h3 class="description">Menegaskan bahwa Kepribadian Muhammadiyah adalah landasan perjuangan Ikatan
                            Mahasiswa Muhammadiyah.</h3>
                    </div>
                    <div class="col-lg-4 col-md-6 icon-box">
                        <div class="icon"><i class="bi bi-bounding-box"></i></div>
                        <h4 class="title"><a href="">Ketiga</a></h4>
                        <h3 class="description">Menegaskan bahwa fungsi IMM adalah eksponen mahasiswa dalam Muhammadiyah.</h3>
                    </div>
                    <div class="col-lg-4 col-md-6 icon-box">
                        <div class="icon"><i class="bi bi-broadcast"></i></div>
                        <h4 class="title"><a href="">Keempat</a></h4>
                        <h3 class="description">Menegaskan bahwa IMM adalah organisasi yang sah dengan mengindahkan segala
                            hukum, undang-undang, peraturan, serta dasar dan falsafah negara.</h3>
                    </div>
                    <div class="col-lg-4 col-md-6 icon-box">
                        <div class="icon"><i class="bi bi-camera"></i></div>
                        <h4 class="title"><a href="">Kelima</a></h4>
                        <h3 class="description">Menegaskan bahwa ilmu adalah amaliah dan amal adalah ilmiah</h3>
                    </div>
                    <div class="col-lg-4 col-md-6 icon-box">
                        <div class="icon"><i class="bi bi-diagram-3"></i></div>
                        <h4 class="title"><a href="">Keenam</a></h4>
                        <h3 class="description">Menegaskan bahwa amal Ikatan Mahasiswa Muhammadiyah adalah lillahi ta’ala dan
                            senantiasa diabadikan untuk kepentingan rakyat</h3>
                    </div>
                </div>

            </div>
        </section><!-- End Features Section -->

        <!-- ======= Recent Photos Section ======= -->
        <section id="recent-photos" class="recent-photos">
            <div class="container">
                <div class="section-title">
                    <h2>Recent Photos</h2>
                    <h4 >Kegiatan IMM UMKendari Terakhir ini.</h4>
                </div>
                <div class="recent-photos-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        @foreach ($galeri as $foto)
                        <div class="swiper-slide">
                            <a href="{{ asset('/images/' . $foto->foto) }}" class="glightbox">
                                <div class="square-image-container">
                                    <img src="{{ asset('/images/' . $foto->foto) }}" class="square-image" alt="">
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section><!-- End Recent Photos Section -->


        <section id="features" class="features mt-5">
          
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 icon-box">
                        <div class="icon"><h5 style="color:red;"><strong>{{$jumlahKomisariat}}</strong></h5></div>
                        <h4 class="title"><a href="">Jumlah Komisariat</a></h4>
                    </div>
                    <div class="col-lg-4 col-md-6 icon-box">
                        <div class="icon"><h5 style="color:red;"><strong>{{$jumlahKader}}</strong></h5></div>
                        <h4 class="title"><a href="">Jumlah Kader</a></h4>
                    </div>
                   
                </div>

            </div>
        </section><!-- End Features Section -->

       

        


    </main><!-- End #main -->
@endsection
