@extends('master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Informasi Management</h4>
                    <h6>Menambahkan Informasi Baru Anda</h6>
                </div>
            </div>
            <form action="{{ route('informasi.store') }}" method="POST" enctype="multipart/form-data">
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
                                        <label for="isi_informasi">Paragraf 1</label>
                                        <textarea type="text" name="isi_informasi" id="inputText" maxlength="255" placeholder="Isi keterangan paragraf ke satu.."
                                            class="form-control" required></textarea>
                                        <span id="charCount">0/255 kata</span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="quotes">Quotes</label>
                                        <textarea type="text" name="quotes" id="inputText" maxlength="255" placeholder="Isi Quotes Informasi.."
                                            class="form-control" required></textarea>
                                        <span id="charCount">0/255 kata</span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="isi_informasi2">Paragraf 2</label>
                                        <textarea type="text" name="isi_informasi2" id="inputText" maxlength="255" placeholder="Isi paragraf ke dua.."
                                            class="form-control" required></textarea>
                                        <span id="charCount">0/255 kata</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Kategori Informasi<span class="required" style="color: #dd4b39;">*</span></label>
                                    <select class="form-control" name="categori_informasi" required="required">
                                        <option value="">- Pilih Kategori Informasi -</option>
                                        @foreach ($categoriInfo as $data)
                                            <option value="{{ $data->id }}"
                                                @if ($data->id == old('categori_informasi_id')) selected @endif>
                                                {{ $data->nama }}
                                            </option>
                                        @endforeach
                                    </select>
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
                        @if (Auth::user()->roles->id == 1)
                        <div class="col-lg-5 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Komisariat<span class="required" style="color: #dd4b39;">*</span></label>
                                <select class="form-control" name="komisariat" required="required" >
                                    <option value="">- Pilih Komisariat -</option>
                                    @foreach ($kmst as $data)
                                        <option value="{{ $data->id }}"
                                            @if ($data->id) selected @endif>
                                            {{ $data->nama_komisariat }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        @endif
                        @if (Auth::user()->roles->id == 2)
                        <div class="col-lg-5 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Komisariat<span class="required" style="color: #dd4b39;">*</span></label>
                                <select class="form-control" name="komisariat" required="required" disabled >
                                    <option value="">- Pilih Komisariat -</option>
                                    @foreach ($kmst as $data)
                                        <option value="{{ $data->id }}"
                                            @if ($data->id === $komisariat[0]->id ) selected @endif>
                                            {{ $data->nama_komisariat }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="komisariat" value="{{ $komisariat[0]->id }}"> 
                        @endif

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
