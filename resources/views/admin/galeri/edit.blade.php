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
            @foreach ($galeri as $g)
                <form action="{{ route('image.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $g->id }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="form-group col-lg-6">
                                        <label for="judul">Judul</label>
                                        <input type="text" name="judul" id="judul" placeholder="Isi judul galeri.."
                                            value="{{ $g->judul }}" required>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="keterangan">Keterangan</label>
                                            <textarea type="text" name="keterangan" id="inputText" class="form-control" required>{{ $g->keterangan }}</textarea>
                                            <span id="charCount">0/255 kata</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label for="foto">Gambar</label>
                            <div class="image-upload">
                                <div class="form-group">
                                    <input type="file" name="foto" id="foto" class="form-control-file"
                                        accept=".png, .jpeg, .jpg, .pdf">
                                    <br>
                                    @if ($g->foto)
                                        <img id="image-preview" src="{{ url('images/' . $g->foto) }}" alt="Preview Gambar"
                                            style="max-width: 400px;">
                                        <span id="image-name">{{ $g->foto }}</span>

                                        <input type="hidden" name="foto" value="{{ $g->foto }}">
                                    @else
                                        <img id="image-preview" src="{{ asset('assets/img/notFoundPicture.jpg') }}"
                                            alt="Preview Gambar" style="max-width: 400px;">
                                        <span id="image-name">Belum mempunyai gambar</span>
                                        <div class="image-uploads" id="image-uploads">
                                            <img src="{{ asset('assets/img/icons/upload.svg') }}" alt="img">
                                            <h4>Pilih file gambar</h4>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <input type="hidden" name="foto_existing" value="{{ $g->foto }}">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ 'Simpan' }}
                                </button>
                                <a href="/galeri" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
@endsection
