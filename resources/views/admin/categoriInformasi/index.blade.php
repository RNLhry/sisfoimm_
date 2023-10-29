@extends('master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Kategori Informasi List</h4>
                    <h6>Kelola Kategori Informasi Anda</h6>
                </div>
                <div class="page-btn">
                    <a href="/categoriInformasi/tambah" class="btn btn-added"><img src="assets/img/icons/plus.svg"
                            alt="img">Add
                        Kategori Informasi</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                           
                            <div class="search-input">
                                <a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg"
                                        alt="img"></a>
                            </div>
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
                                    <th>Nama</th>
                                    <th>Created By</th>
                                    <th>Created On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            {{-- {{ dd($informasi); }} --}}
                            @foreach ($categoriInfo as $g)
                                <tbody>
                                    <tr>
                                        <td>
                                            {{ $g->nama }}
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
                                            <a class="me-3" href="/categoriInformasi/edit/{{ $g->id }}">
                                                <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img">
                                            </a>
                                            <a class="me-3 confirm-text" href="/categoriInformasi/hapus/{{ $g->id }}">
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
