@extends('master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h2>Tambah Komisariat</h2>
                    <h6>Menambahkan Data Baru Komisariat</h6>
                </div>
            </div>
            <form action="/komisariat/store" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Kode Komisariat</label>
                                    <input type="text" id="nama" name="kode_komisariat" class="form-control"
                                        placeholder="Masukkan kode komisariat......." required="required">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Nama Komisariat</label>
                                    <input type="text" id="nama" name="nama_komisariat" class="form-control"
                                        placeholder="Masukkan nama komisariat......." required="required">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Ketua Komisariat</label>
                                    <select class="form-control" name="kader_id" required="required">
                                        <option value="">- Pilih Kader -</option>
                                        @foreach ($kader as $data)
                                            <option value="{{ $data->id }}">
                                                {{ $data->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Akun Sosial Media</label>
                                    <input type="text" id="akun_media_sosial" name="akun_media_sosial"
                                        class="form-control" placeholder="Masukkan akun media sosial......."
                                        required="required" min="1000" required max="9999">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Asal Fakultas</label>
                                    <input type="text" id="asal_fakultas" name="asal_fakultas" class="form-control"
                                        placeholder="Masukkan Asal Fakultas......." required="required">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Struktur Organisasi</label>
                                    <div class="image-upload">
                                        <input type="file" class="form-control" placeholder="Cover/Thumbnail Informasi"
                                            name="struktur_organisasi" value="" accept=".png, .jpeg, .jpg, .pdf">
                                        <div class="image-uploads">
                                            <img src="{{ asset('assets/img/icons/upload.svg') }}" alt="img">
                                            <h4>Drag and drop a file to upload</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Logo Komisariat</label>
                                    <div class="image-upload">
                                        <input type="file" class="form-control" placeholder="Cover/Thumbnail Informasi"
                                            name="logo_komisariat" value="" accept=".png, .jpeg, .jpg">
                                        <div class="image-uploads">
                                            <img src="{{ asset('assets/img/icons/upload.svg') }}" alt="img">
                                            <h4>Drag and drop a file to upload</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ 'Simpan' }}
                                </button>
                                <a href="/komisariat" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>

    </div>

    </div>
    </div>
    </div>
@endsection
