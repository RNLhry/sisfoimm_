@extends('master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Galeri Management</h4>
                    <h6>Menambahkan Galeri Baru Anda</h6>
                </div>
            </div>
            <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- <input type="hidden" name="id" value="{{ $galeri->id }}"> --}}
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-sm-6 col-12">
                                <div class="form-group col-lg-6">
                                    <label for="judul">Judul</label>
                                    <input type="text" name="judul" id="judul" placeholder="Isi judul galeri.."
                                        required>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea type="text" name="keterangan" id="inputText" maxlength="255" placeholder="Isi keterangan galeri.."
                                            class="form-control" required></textarea>
                                        <span id="charCount">0/255 kata</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <label for="foto">Gambar</label>
                        <div class="image-upload">
                            <div class="form-group">
                                <input type="file" name="foto" id="foto" class="form-control-file"
                                    accept=".png, .jpeg, .jpg, .pdf" required>
                                <br>
                                <img id="image-preview" src="#" alt="Preview Gambar"
                                    style="max-width: 400px; display: none;">
                                <span id="image-name" style="display: none;"></span>
                            </div>
                            <div class="image-uploads" id="image-uploads">
                                <img src="{{ asset('assets/img/icons/upload.svg') }}" alt="img">
                                <h4>Drag and drop a file to upload</h4>
                            </div>
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
