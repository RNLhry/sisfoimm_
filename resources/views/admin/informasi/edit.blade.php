@extends('master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Informasi Management</h4>
                    <h6>Mengedit Informasi Baru yang telah ditambahkan</h6>
                </div>
            </div>
           

            <form action="{{ route('informasi.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $informasi[0]->id }}">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-sm-6 col-12">
                                <div class="form-group col-lg-6">
                                    <label for="judul">Judul</label>
                                    <input type="text" name="judul" id="judul" placeholder="Isi judul galeri.."
                                        value="{{ $informasi[0]->judul }}" required>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="keterangan">Paragraf 1</label>
                                        <textarea type="text" name="isi_informasi" id="inputText" class="form-control" required>{{ $informasi[0]->isi_informasi }}</textarea>
                                        <span id="charCount">0/255 kata</span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea type="text" name="quotes" id="inputText" class="form-control" required>{{ $informasi[0]->quotes }}</textarea>
                                        <span id="charCount">0/255 kata</span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="keterangan">Paragraf 2</label>
                                        <textarea type="text" name="isi_informasi2" id="inputText" class="form-control" required>{{ $informasi[0]->isi_informasi2 }}</textarea>
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
                                            <option value="{{ $data->id }}" <?php echo $data->id == $informasi[0]->categori_informasi_id ? 'selected' : ' '; ?>>
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
                                    accept=".png, .jpeg, .jpg, .pdf">

                                @if ($informasi[0]->foto)
                                    <img id="image-preview" src="{{ url('images/' . $informasi[0]->foto) }}"
                                        alt="Preview Gambar" style="max-width: 400px;">
                                    <span id="image-name">{{ $informasi[0]->foto }}</span>

                                    <!-- Sertakan input tersembunyi untuk menyimpan nama file gambar -->
                                    <input type="hidden" name="foto" value="{{ $informasi[0]->foto }}">
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
                        <input type="hidden" name="foto_existing" value="{{ $informasi[0]->foto }}">

                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Komisariat<span class="required" style="color: #dd4b39;">*</span></label>
                                <select class="form-control" name="komisariat" required="required" disabled>
                                    <option value="">- Pilih Komisariat -</option>
                                    @foreach ($kmst as $data)
                                        <option value="{{ $data->id }}" <?php echo $data->id == $informasi[0]->komisariat_id ? 'selected' : ' '; ?>>
                                            {{ $data->nama_komisariat }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="komisariat" value="{{ $informasi[0]->komisariat_id }}">


                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary">
                                {{ 'Simpan' }}
                            </button>
                            @if (Auth::user()->roles->id == 1)
                            <a href="/informasi" class="btn btn-danger">Cancel</a>
                            return redirect()->back();
                        @else (Auth::user()->roles->id == 2)
                            <a href="/informasi2" class="btn btn-danger">Cancel</a>
                        
                        @endif
                        </div>
                    </div>
                </div>
            </form>
            {{-- @endforeach --}}
        </div>
    </div>
@endsection
