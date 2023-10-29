@extends('master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Data komisariat</h4>
                    <h6>Kelola Data Komisariat anda</h6>
                </div>
                <div class="page-btn">
                    <a href="/komisariat/tambah" class="btn btn-added"><img src="{{ asset('assets/img/icons/plus.svg') }}"
                            alt="img" class="me-1">Tambah Data Komisariat</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">

                            <form class="form-inline" action="/komisariat/cari" method="GET">
                                <div class="search-input">
                                    <a class="btn btn-searchset"><img src="{{ asset('assets/img/icons/search-white.svg') }}"
                                            alt="img"></a>
                                    <div id="DataTables_Table_0_filter" class="dataTables_filter"><label> <input
                                                type="search" type="text" name="cari"
                                                placeholder="Cari Data komisariat ..." value="{{ old('cari') }}"></label>
                                    </div>
                                    <button style="display: none;" type="submit"></button>
                                </div>
                            </form>
                        </div>
                        <div class="wordset">
                            <ul>

                                <li>
                                    <a href="/komisariat/export_excel" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="" data-bs-original-title="excel" aria-label="excel"><img
                                            src="{{ asset('assets/img/icons/excel.svg') }}" alt="img"></a>
                                </li>
                                <li>
                                    <a href="/komisariat/print" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                        data-bs-original-title="print" aria-label="print"><img
                                            src="{{ asset('assets/img/icons/printer.svg') }}" alt="img"></a>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <div class="table-responsive">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <table class="table datanew dataTable no-footer" id="DataTables_Table_0" role="grid"
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
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Angkatan : activate to sort column ascending"
                                            style="width: 69.3125px;">Kode Komisariat </th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Nama komisariat: activate to sort column ascending"
                                            style="width: 135.719px;">Nama Komisariat</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1"
                                            aria-label="Tempat Tangga Lahir: activate to sort column ascending"
                                            style="width: 47.3438px;">Ketua Komisariat</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="price: activate to sort column ascending"
                                            style="width: 39.7656px;">Akun Media Sosial</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Unit: activate to sort column ascending"
                                            style="width: 32.9844px;">Asal Fakultas</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            aria-label="Qty: activate to sort column ascending" style="width: 28.7656px;">
                                            Struktur Organisasi</th>
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


                                @foreach ($komisariat as $k)
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
                                                @if ($k->foto)
                                                <img src="{{ url('images/' .$k->foto) }}" alt="img" class="img-thumbnail" style="width: 50px; height: 50px;object-fit: cover; display: block;">   
                                                @else
                                                <img src="{{ asset('assets/img/product/avatar.png') }}"
                                                        alt="img">
                                                </a>
                                                @endif
                                                 
                                                <a href="javascript:void(0);">{{ $k->kode_komisariat }}</a>
                                            </td>
                                            <td>{{ $k->nama_komisariat }}</td>
                                            <td>
                                                @foreach ($kader as $kaders)
                                                    @if ($k->kader_id == $kaders->id)
                                                        {{ $kaders->nama }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{ $k->akun_media_sosial }}</td>
                                            <td>{{ $k->asal_fakultas }}</td>
                                            <td>{{ $k->struktur_organisasi }}</td>
                                            <td>
                                                @foreach ($roles as $role)
                                                    @if ($k->created_by == $role->id)
                                                        {{ $role->nama }}
                                                    @endif
                                                @endforeach
                                            </td>



                                            <td>
                                                <a class="me-3" href="/komisariat/edit/{{ $k->id }}">
                                                    <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img">
                                                </a>
                                                <a class="confirm-text" href="/komisariat/hapus/{{ $k->id }}">
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
