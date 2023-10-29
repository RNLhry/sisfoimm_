@extends('template2.master2')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Informasi</h2>
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li>Informasi</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Event List Section ======= -->
        <!-- ======= Blog Page ======= -->
        <section class="page-area">
            <div class="blog-page area-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="page-head-blog">
                                <div class="single-blog-page mb-2">
                                    <!-- search option start -->
                                    <form action="#">
                                        <div class="search-option">
                                            <input type="text" placeholder="Search...">
                                            <button class="button" type="submit">
                                                <i class="bi bi-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                    <!-- search option end -->
                                </div>
                                <div class="single-blog-page">
                                    <!-- recent start -->
                                    <div class="left-blog">
                                        <h5>recent post</h5>
                                        <div class="recent-post">
                                            <!-- start single post -->
                                            @foreach ($info as $i)
                                                <div class="recent-single-post">
                                                    <div class="post-img">
                                                        <a href="/informasi-2/{{ $i->id }}">
                                                            <img src="{{ asset('images/' . $i->foto) }}" alt="..."
                                                                style="width: 240px;">
                                                        </a>
                                                    </div>
                                                    <div class="pst-content">
                                                        <p><a
                                                                href="/informasi-2/{{ $i->id }}"">{{ $i->judul }}</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach

                                            <!-- End single post -->
                                        </div>
                                    </div>
                                    <!-- recent end -->
                                </div>
                                <div class="single-blog-page">
                                    <div class="left-blog">
                                        <h4>categories</h4>
                                        <ul>
                                            @foreach ($categoriInfo as $c)
                                            @endforeach
                                            <li>
                                                <a href="#">{{ $c->nama }}</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="single-blog-page">
                                    <div class="left-blog">
                                        <h4>Archive</h4>
                                        <ul>
                                            @foreach ($archivedYears as $year => $informasiByYear)
                                                <li>
                                                    <a href="#">{{ $year }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End left sidebar -->
                        <!-- Start single blog -->

                        @foreach ($informasi as $i)
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <!-- single-blog start -->
                                        <article class="blog-post-wrapper">
                                            <div class="post-thumbnail">
                                                <img src="{{ asset('images/' . $i->foto) }}" alt="..."
                                                    class="img-fluid">
                                            </div>

                                            <div class="post-information">
                                                <h2>{{ $i->judul }}</h2>
                                                <div class="entry-meta">
                                                    <span class="author-meta"><i class="bi bi-person"></i> <a
                                                            href="#">{{ $i->komisariat->nama_komisariat }}</a></span>
                                                    <span><i class="bi bi-clock"></i> {{ $i->created_at }}</span>
                                                    <span class="tag-meta">
                                                        <i class="bi bi-folder"></i>
                                                        <a href="#">{{ $i->categori_informasi->nama }}</a>
                                                        {{-- <span><i class="bi bi-chat"></i> <a href="#">6
                                                                    comments</a></span> --}}
                                                    </span>
                                                </div>
                                                <div class="entry-content">
                                                    <p>{{ $i->isi_informasi }}</p>
                                                    <blockquote>
                                                        <p>{{ $i->quotes }}</p>
                                                    </blockquote>
                                                    <p>{{ $i->isi_informasi2 }}</p>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div><!-- End Blog Page -->

        </section>

    </main><!-- End #main -->
@endsection
