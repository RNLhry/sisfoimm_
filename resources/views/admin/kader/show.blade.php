@extends('master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h2>Detail Data Kader</h2>
                    <h6>Seluruh Data Diri Kader</h6>
                </div>
            </div>

            @foreach ($kader as $k)
                <div class="row">
                    <div class="col-lg-8 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                {{-- <div class="bar-code-view">
                            <img src="{{ asset ('assets/img/barcode1.png') }}" alt="barcode">
                            <a class="printimg">
                                <img src="{{ asset ('assets/img/icons/printer.svg') }}" alt="print">
                            </a>
                        </div> --}}
                                <div class="productdetails">
                                    <ul class="product-bar">
                                        <li>
                                            <h4>Nama</h4>
                                            <h6>{{ $k->nama }}</h6>
                                        </li>
                                        <li>
                                            <h4>NIM</h4>
                                            <h6>{{ $k->nim }}</h6>
                                        </li>
                                        <li>
                                            <h4>Angkata</h4>
                                            <h6>{{ $k->angkatan }}</h6>
                                        </li>
                                        <li>
                                            <h4>Tempat Tanggal Lahir</h4>
                                            <h6>{{ $k->tempat_tanggal_lahir }}</h6>
                                        </li>
                                        <li>
                                            <h4>Jurusan</h4>
                                            <h6>{{ $k->jurusan->nama }}</h6>
                                        </li>
                                        <li>
                                            <h4>Jenis Kelamin</h4>
                                            <h6>
                                                @if ($k->jenis_kelamin == 'laki-laki')
                                                    Laki-Laki
                                                @elseif ($k->jenis_kelamin == 'perempuan')
                                                    Perempuan
                                                @else
                                                    {{ $k->jenis_kelamin }}
                                                @endif
                                            </h6>
                                        </li>
                                        
                                        <li>
                                            <h4>No. Telepon</h4>
                                            <h6>{{ $k->no_telp }}</h6>
                                        </li>
                                        <li>
                                            <h4>Alamat</h4>
                                            <h6>{{ $k->alamat }}</h6>
                                        </li>
                                        <li>
                                            <h4>Nama Bapak</h4>
                                            <h6>{{ $k->nama_bapak }}</h6>
                                        </li>
                                        <li>
                                            <h4>Nama Ibu</h4>
                                            <h6>{{ $k->nama_ibu }}</h6>
                                        </li>
                                        <li>
                                            <h4>Tahun Berkader</h4>
                                            <h6>{{ $k->tahun_berkader }}</h6>
                                        </li>
                                        <li>
                                            <h4>Jabatan</h4>
                                            <h6>{{ $k->jabatan }}</h6>
                                        </li>
                                        <li>
                                            <h4>Asal Komisariat</h4>
                                            <h6>{{ $k->komisariat->nama_komisariat }}</h6>
                                        </li>
                                        <li>
                                            <h4>Jenjang Perkaderan</h4>
                                            <h6>
                                                @foreach ($k->perkaderan as $perkaderanItem)
                                                    @if ($perkaderanItem->nama == 'DAD')
                                                        <span class="badges bg-lightgreen">DAD</span>
                                                    @elseif($perkaderanItem->nama == 'DAM')
                                                        <span class="badges bg-lightred">DAM</span>
                                                    @elseif($perkaderanItem->nama == 'DAP')
                                                        <span class="badges bg-lightred">DAP</span>
                                                    @endif
                                                @endforeach
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Jenjang Pelatihan</h4>
                                            <h6>
                                            @if ($k->pelatihan->isNotEmpty())
                                                @foreach ($k->pelatihan as $pelatihanItem)
                                                    @if ($pelatihanItem->nama == 'PID')
                                                        <span class="badges bg-lightgreen">PID</span>
                                                    @elseif($pelatihanItem->nama == 'PIM')
                                                        <span class="badges bg-lightred">PIM</span>
                                                    @elseif($pelatihanItem->nama == 'PIP')
                                                        <span class="badges bg-lightred">DAP</span>
                                                    @endif
                                                @endforeach
                                            @else
                                                <span>-</span>
                                            @endif
                                        </h6>

                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                {{-- <div class="slider-product-details"> --}}
                                {{-- <div class="owl-carousel owl-theme product-slide"> --}}
                                <div class="slider-product">
                                    <img src="{{ asset('assets/img/product/avatar.png') }}" alt="img"
                                        style="width: 200px; height: 200px;object-fit: cover; display: center;">
                                    <h5>Foto</h5>
                                </div>

                                {{-- </div> --}}
                                {{-- </div> --}}
            @endforeach
        </div>
    </div>
    </div>
    </div>

    </div>
    </div>
    </div>
@endsection
