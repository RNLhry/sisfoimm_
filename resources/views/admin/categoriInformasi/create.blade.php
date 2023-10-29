@extends('master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Kategori Informasi Management</h4>
                    <h6>Menambahkan Kategori Informasi Baru Anda</h6>
                </div>
            </div>
            <form action="{{ route('categoriInformasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- <input type="hidden" name="id" value="{{ $galeri->id }}"> --}}
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-sm-6 col-12">
                                <div class="form-group col-lg-6">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" id="nama"
                                        placeholder="Isi kategori informasi.." required>
                                </div>


                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary">
                                        {{ 'Simpan' }}
                                    </button>
                                    <a href="/galeri" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </div>
            </form>
        </div>
    </div>
@endsection
