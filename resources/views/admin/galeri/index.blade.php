@extends('master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Galeri List</h4>
                    <h6>Kelola Galeri Anda</h6>
                </div>
                <div class="page-btn">
                    <a href="/galeri/tambah" class="btn btn-added"><img src="{{ asset('assets/img/icons/plus.svg') }}" alt="img">Add
                        Galeri</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <!-- <div class="search-path">
                                <a class="btn btn-filter" id="filter_search">
                                    <img src="assets/img/icons/filter.svg" alt="img">
                                    <span><img src="assets/img/icons/closes.svg" alt="img"></span>
                                </a>
                            </div> -->
                            <form class="form-inline" action="/galeri/cari" method="GET">
                                <div class="search-input">
                                    <a class="btn btn-searchset"><img src="{{ asset('assets/img/icons/search-white.svg') }}"
                                            alt="img"></a>
                                    <div id="DataTables_Table_0_filter" class="dataTables_filter"><label> <input
                                                type="search" type="text" name="cari"
                                                placeholder="Cari Data Galeri ..." value="{{ old('cari') }}"></label>
                                    </div>
                                    <button style="display: none;" type="submit"></button>
                                </div>
                            </form>
                        </div>
                        <!-- <div class="wordset">
                            <ul>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                            src="assets/img/icons/pdf.svg" alt="img"></a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                            src="assets/img/icons/excel.svg" alt="img"></a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                            src="assets/img/icons/printer.svg" alt="img"></a>
                                </li>
                            </ul>
                        </div> -->
                    </div>

                    <div class="card" id="filter_inputs">
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter User Name">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Phone">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" class="datetimepicker cal-icon" placeholder="Choose Date">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="select">
                                            <option>Disable</option>
                                            <option>Enable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                                    <div class="form-group">
                                        <a class="btn btn-filters ms-auto"><img src="assets/img/icons/search-whites.svg"
                                                alt="img"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table  datanew">
                            <thead>
                                <tr>
                                    
                                    <th>Gambar </th>
                                    <th>Judul </th>
                                    <th >Keterangan </th>
                                    <th>Created By</th>
                                    <th>Created On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            {{-- {{ dd($galeri); }} --}}
                            @foreach ($galeri as $g)
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="javascript:void(0);" class="product-img" style="font-size: 1.25rem;
                                            max-width: 75ch;">
                                                @if ($g->foto)
                                                <img src="{{ url('images/' .$g->foto) }}" alt="img" class="img-thumbnail" style="width: 150px; height: 150px;object-fit: cover; display: block;">   
                                                @else
                                                    <img src="{{ asset('assets/img/notFoundPicture.jpg') }}" alt="img" style="width: 150px; height: 150px;object-fit: cover; display: block;">
                                                @endif
                                            </a>
                                        </td>
                                        
                                        <td>
                                            <a href="javascript:void(0);">{{ $g->judul }}</a>
                                        </td>
                                        <td style="white-space: pre-line;">
                                                    {{ $g->keterangan }}
                                        </td>
                                        
                                        <td>
                                            @foreach ($roles as $role)
                                                @if ($g->created_by == $role->id)
                                                    <span class="bg-lightgreen badges">{{ $role->nama }}</span>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $g->created_at }}</td>
                                        <td>
                                            <a class="me-3" href="/galeri/edit/{{ $g->id }}">
                                                <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img">
                                            </a>
                                            <a class="me-3 confirm-text" href="/galeri/hapus/{{ $g->id }}">
                                                <img src="{{ asset('assets/img/icons/delete.svg') }}" alt="img">
                                            </a>
                                        </td>
                                    </tr>

                                </tbody>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
