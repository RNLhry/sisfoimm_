@extends('master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h2>Edit Komisariat</h2>
                    <h6>Mengedit Data Baru Komisariat</h6>
                </div>
            </div>
            <form action="/komisariat/update" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{  $komisariat[0]->id }}">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Kode Komisariat</label>
                                    <input type="text" id="nama" name="kode" class="form-control"
                                        placeholder="Masukkan kode komisariat......." required="required"
                                        value="{{ $komisariat[0]->kode_komisariat }}">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Nama Komisariat</label>
                                    <input type="text" id="nama" name="nama" class="form-control"
                                        placeholder="Masukkan nama komisariat......." required="required"
                                        value="{{ $komisariat[0]->nama_komisariat }}">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Ketua Komisariat</label>
                                    <select class="form-control" name="kaderId" required="required">
                                        <option value="">- Pilih Kader -</option>
                                        @foreach ($kader as $data)
                                            <option value="{{ $data->id }}" <?php echo $data->id == $komisariat[0]->kader_id ? 'selected' : ' '; ?>>
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
                                    <input type="text" id="akun_media_sosial" name="akun"
                                        class="form-control" placeholder="Masukkan akun media sosial......."
                                        required="required" value="{{ $komisariat[0]->akun_media_sosial }}">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Asal Fakultas</label>
                                    <input type="text" id="asal_fakultas" name="asal" class="form-control"
                                        placeholder="Masukkan Asal Fakultas......." required="required"
                                        value="{{ $komisariat[0]->asal_fakultas }}">
                                </div>
                            </div>
                            <label for="struktur">Struktur Organisasi</label>
                            <div class="image-upload">
                                <div class="form-group">
                                    <input type="file" name="struktur" id="struktur" class="form-control-file"
                                        accept=".jpeg, .jpg, .png, .pdf" value="{{ $komisariat[0]->struktur_organisasi }}" required>
                                    <br>
                                    @if ($komisariat[0]->struktur_organisasi)
                                        <img id="image-preview-struktur" src="{{ url('images/' . $komisariat[0]->struktur_organisasi) }}"
                                            alt="Preview Gambar" style="max-width: 400px;">
                                        <span id="image-name">{{ $komisariat[0]->struktur_organisasi }}</span>
                                    @else
                                        <img id="image-preview-struktur" src="{{ asset('assets/img/notFoundPicture.jpg') }}"
                                            alt="Preview Gambar" style="max-width: 400px;">
                                        <span id="image-name">Belum mempunyai gambar</span>
                                        <div class="image-uploads" id="image-uploads">
                                            <img src="{{ asset('assets/img/icons/upload.svg') }}" alt="img">
                                            <h4>Pilih file gambar</h4>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <label for="foto">Logo Komisariat</label>
                            <div class="image-upload">
                                <div class="form-group">
                                    <input type="file" name="foto" id="foto" class="form-control-file"
                                        accept=".png, .jpeg, .jpg, .pdf" value="{{$komisariat[0]->foto}}" required>
                                    <br>
                                    @if ($komisariat[0]->foto)
                                        <img id="image-preview" src="{{ url('images/' . $komisariat[0]->foto)}}" alt="Preview Gambar"
                                            style="max-width: 400px;">
                                        <span id="image-name">{{ $komisariat[0]->foto }}</span>
                                    @else
                                        <img id="image-preview" src="{{ asset('assets/img/notFoundPicture.jpg')}}"
                                            alt="Preview Gambar" style="max-width: 400px;">
                                        <span id="image-name">Belum mempunyai gambar</span>
                                        <div class="image-uploads" id="image-uploads">
                                            <img src="{{ asset('assets/img/icons/upload.svg') }}" alt="img">
                                            <h4>Pilih file gambar</h4>
                                        </div>
                                    @endif
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
