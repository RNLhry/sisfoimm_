@extends('template2.master2')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Galeri</h2>
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li>Galeri</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Event List Section ======= -->
        <section id="event-list" class="event-list">
            <div class="container">
                <div class="row">
                    @foreach ($galeri as $key => $g)
                        <div class="col-md-6 d-flex align-items-stretch">
                            <div class="card">
                                <div class="card-img">
                                    <img src="{{ asset('images/' . $g->foto) }}" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $g->judul }}</h5>
                                    <p class="text-center">{{ \Carbon\Carbon::parse($g->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</p>
                                    <p class="card-text">{{ $g->keterangan }}</p>
                                </div>
                            </div>
                        </div>
                        @if (($key + 1) % 2 == 0)
                            </div>
                            <div class="row">
                        @endif
                    @endforeach
                </div>
            </div>
        </section><!-- End Event List Section -->
        
    </main><!-- End #main -->
@endsection
