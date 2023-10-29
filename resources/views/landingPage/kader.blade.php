@extends('template2.master2')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs mb-4">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    @if ($kader->isNotEmpty())
                        <h2>Data Kader {{ $kader[0]->komisariat->nama_komisariat }}</h2>
                    @else
                        @if ($kmst)
                            <h2>Data Kader {{ $kmst[0]->nama_komisariat }}</h2>
                        @else
                            <h2>Data Kader</h2>
                        @endif
                    @endif
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li>Informasi</li>
                    </ol>
                </div>
                
            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Event List Section ======= -->
        <!-- ======= Blog Page ======= -->
    
    <section class="container container-fluid">
        <div class="position-relative">
<!-- ----------------------------CAri Kader---------------------------------------- -->
        
<div class="input-group mb-3">
    <input type="text" name="nama" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Masukkan nama kader.........." id="searchInput" value="{{ old('nama') }}">
</div>

<div id="searchResults"></div>
<br>
<style>
    .result-item {
        background-color: #f8f9fa;
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 10px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .result-item:hover {
        background-color: #e9ecef;
    }

    .result-item p {
        margin: 0;
        font-size: 14px;
    }
</style>

<script>
    var kader = @json($kader); // Menyertakan data kaders dari controller
    var j = "{{ $j }}"; // Menyertakan nilai $j dari controller

    document.getElementById('searchInput').addEventListener('input', function() {
        var searchQuery = this.value;
        var resultsContainer = document.getElementById('searchResults');

        if (searchQuery.length >= 3) {
            // Menghapus hasil pencarian sebelumnya
            resultsContainer.innerHTML = '';

            // Cari kaders yang cocok dengan searchQuery
            var filteredKader = kader.filter(function(kader) {
                return kader.nama.toLowerCase().includes(searchQuery.toLowerCase());
            });

            if (filteredKader.length > 0) {
                filteredKader.forEach(function(item) {
                    var resultItem = document.createElement('div');
                    resultItem.classList.add('result-item');
                    resultItem.innerHTML = `
                        <p>Nama: ${item.nama}</p>
                        <p>Tahun Berkader: ${item.tahun_berkader}</p>
                        <p>Angkatan: ${item.angkatan}</p>
                        <p>Tempat Tanggal Lahir: ${item.tempat_tanggal_lahir}</p>
                    `;

                    resultItem.addEventListener('click', function() {
                        document.getElementById('searchInput').value = item.nama;
                        resultsContainer.innerHTML = '';
                    });

                    resultsContainer.appendChild(resultItem);
                });
            } else {
                resultsContainer.innerHTML = 'Tidak ada hasil.';
            }
        } else {
            // Jika panjang query kurang dari 3 karakter, hapus hasil pencarian
            resultsContainer.innerHTML = '';
        }
    });

</script>



<!-- ----------------------------End Cari Kader------------------------------------------- -->
        <div class="content">
            <div class="row">
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count">
                            <div class="dash-counts">
                                <h4>{{$jumlahKader}}</h4>
                                <h5>Jumlah Kader</h5>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count das2">
                            <div class="dash-counts">
                                <h4>{{$jumlahKaderDad}}</h4>
                                <h5>Kader DAD</h5>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="user-check"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count das2">
                            <div class="dash-counts">
                            <h4>{{$jumlahKaderDam}}</h4>
                                <h5>Kader DAM</h5>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="user-check"></i>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count das2">
                            <div class="dash-counts">
                                <h4>{{$jumlahKaderPid}}</h4>
                                <h5>Kader PID</h5>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="user-check"></i>
                            </div>
                        </div>
                    </div>
            </div>
            
            </div>
        </div>
       

        <section class="page-area" style=" margin-left: 60px;  margin-right: 60px;">
           
        </section>

    </main><!-- End #main -->
@endsection
