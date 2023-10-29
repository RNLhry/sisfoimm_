@extends('master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    @if ($kader->isNotEmpty())
                        <h4>Data Kader {{ $kader[0]->komisariat->nama_komisariat }}</h4>
                    @else
                        @if ($kmst)
                            <h4>Data Kader {{ $kmst[0]->nama_komisariat }}</h4>
                        @else
                            <h4>Data Kader</h4>
                        @endif
                    @endif
                    <h6>Kelola Data Kader anda</h6>
                </div>
                <div class="page-btn">
                    <a href="/kader/tambah/{{ $kmst[0]->id }}" class="btn btn-added"><img src="{{ asset('assets/img/icons/plus.svg') }}"
                            alt="img" class="me-1">Tambah Data Kader</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <!-- <div class="search-path">
                                <a class="btn btn-filter" id="filter_search">
                                    <img src="{{ asset('assets/img/icons/filter.svg') }}" alt="img">
                                    <span><img src="{{ asset('assets/img/icons/closes.svg') }}" alt="img"></span>
                                </a>
                            </div> -->
                            <form class="form-inline" action="/kader/{{$kmst[0]->id}}/cari" method="GET">
                                <div class="search-input">
                                    <a class="btn btn-searchset"><img src="{{ asset('assets/img/icons/search-white.svg') }}"
                                            alt="img"></a>
                                    <div id="DataTables_Table_0_filter" class="dataTables_filter"><label> <input
                                                type="search" type="text" name="cari"
                                                placeholder="Cari Data Kader ..." value="{{ old('cari') }}"></label>
                                    </div>
                                    <button style="display: none;" type="submit"></button>
                                </div>
                            </form>
                        </div>
                        <div class="wordset">
                            <ul>

                                <li>
                                    <a href="/kader/{{$kmst[0]->id}}/export_excel/" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="" data-bs-original-title="excel" aria-label="excel"><img
                                            src="{{ asset('assets/img/icons/excel.svg') }}" alt="img"></a>
                                </li>
                                <li>
                                    <a href="/kader/{{$kmst[0]->id}}/print" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                        data-bs-original-title="print" aria-label="print"><img
                                            src="{{ asset('assets/img/icons/printer.svg') }}" alt="img"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <form action="{{ route('kader.filter') }}" method="post">
                        @csrf

                        <div class="card mb-0" id="filter_inputs">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="row">
                                            {{-- <div class="col-lg col-sm-6 col-12">
                                                <div class="form-group">
                                                    <select class="form-control" name="jurusan">
                                                        <option value="">- Pilih Jurusan -</option>
                                                        @foreach ($jurusan as $data)
                                                            <option value="{{ $data->id }}">
                                                                {{ $data->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div> --}}
                                            <div class="col-lg col-sm-6 col-12">
                                                <div class="form-group">
                                                    <select style="cursor:pointer;" class="form-control" id="tag_select"
                                                        name="year">
                                                        <option value="0" selected> Pilih Tahun</option>
                                                        <?php
                                                        $year = date('Y');
                                                        $min = $year - 60;
                                                        $max = $year;
                                                        for ($i = $max; $i >= $min; $i--) {
                                                            echo '<option value=' . $i . '>' . $i . '</option>';
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg col-sm-6 col-12">
                                                <div class="form-group">
                                                    <select class="form-control" name="jenis_kelamin" name="group_id">
                                                        <option value="">- Pilih Jenis Kelamin -</option>
                                                        <option value="1">Laki-Laki</option>
                                                        <option value="0">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-1 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-sm">
                                                        <img src="{{ asset('assets/img/icons/search-whites.svg') }}"
                                                            alt="img">
                                                    </button>
                                                    {{-- <a type="submit" class="btn btn-filters ms-auto"><img
                                                            src="{{ asset('assets/img/icons/search-whites.svg') }}" alt="img"></a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <table class="table datanew dataTable no-footer" id="DataTables" role="grid"
                                aria-describedby="DataTables_Table_0_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1" aria-sort="ascending"
                                            aria-label=": activate to sort column descending" style="width: 41.4219px;">
                                            <label class="checkboxs">
                                                <input type="checkbox" id="select-all">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            aria-label="Nama Kader: activate to sort column ascending"
                                            style="width: 135.719px;">Nama Kader</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            aria-label="Angkatan : activate to sort column ascending"
                                            style="width: 69.3125px;">Angkatan </th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            aria-label="Tempat Tangga Lahir: activate to sort column ascending"
                                            style="width: 47.3438px;">Tempat Tanggal Lahir</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            aria-label="price: activate to sort column ascending"
                                            style="width: 39.7656px;">Jurusan</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            aria-label="Unit: activate to sort column ascending"
                                            style="width: 32.9844px;">Jenis Kelamin</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            aria-label="Qty: activate to sort column ascending" style="width: 28.7656px;">
                                            Tahun Berkader</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            aria-label="Created By: activate to sort column ascending"
                                            style="width: 83.6875px;">Created By</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            aria-label="Action: activate to sort column ascending"
                                            style="width: 94.4844px;">Action</th>
                                    </tr>
                                </thead>

                                @foreach ($kader as $k)
                                    <tbody>
                                        <tr class="odd">
                                            <td class="sorting_1">
                                                <label class="checkboxs">
                                                    <input type="checkbox">
                                                    <span class="checkmarks"></span>
                                                </label>
                                            </td>
                                            <td class="productimgname">
                                                <a href="javascript:void(0);" class="product-img">
                                                    <img src="{{ asset('assets/img/product/avatar.png') }}"
                                                        alt="img">
                                                </a>
                                                <a href="javascript:void(0);">{{ $k->nama }}</a>
                                            </td>
                                            <td>{{ $k->angkatan }}</td>
                                            <td>{{ $k->tempat_tanggal_lahir }}</td>
                                            <td>{{ $k->jurusan->nama }}</td>
                                            <td>
                                                @if ($k->jenis_kelamin == 'laki-laki')
                                                    Laki-Laki
                                                @elseif ($k->jenis_kelamin == 'perempuan')
                                                    Perempuan
                                                @else
                                                    {{ $k->jenis_kelamin }}
                                                @endif
                                            </td>
                                            <td>{{ $k->tahun_berkader }}</td>
                                            <td>
                                                @foreach ($roles as $role)
                                                    @if ($k->created_by == $role->id)
                                                        {{ $role->nama }}
                                                    @endif
                                                @endforeach
                                            </td>



                                            <td>
                                                <a class="me-3" href="/kader/detail/{{ $k->id }}">
                                                    <img src="{{ asset('assets/img/icons/eye.svg') }}" alt="img">
                                                </a>
                                                <a class="me-3" href="/kader/edit/{{ $k->id }}/{{ $k->komisariat_id }}">
                                                    <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img">
                                                </a>
                                                <a class="confirm-text" href="/kader/hapus/{{ $k->id }}">
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
