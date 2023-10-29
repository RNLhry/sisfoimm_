@extends('master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h2>Tambah Kader {{ $kmst[0]->id == Request::segment(3) ? $kmst[0]->nama_komisariat : '' }}
                    </h2>

                    <h6>Menambahkan Data Baru Kader</h6>
                </div>
            </div>
            <form action="/kader/store" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" id="nama" name="nama" class="form-control"
                                        placeholder="Masukkan nama kader......." required="required">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>NIM</label>
                                    <input type="number" id="nim" name="nim" class="form-control"
                                        placeholder="Masukkan NIM Kader......." required="required">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Angkatan</label>
                                    <input type="number" id="angkatan" name="angkatan" class="form-control"
                                        placeholder="Masukkan Angkatan......." required="required" min="1000" required
                                        max="9999">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Tempat/Tanggal Lahir</label>
                                    <input type="text" id="tempat_tanggal_lahir" name="tempat_tanggal_lahir"
                                        class="form-control" placeholder="Masukkan Tempat Tanggal Lahir......."
                                        required="required">
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Jurusan</label>
                                    <select class="form-control" name="jurusan" required="required">
                                        <option value="">- Pilih Jurusan -</option>
                                        @foreach ($jurusan as $data)
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
                                    <label for="email_address">Jenis Kelamin</label>
                                    <div class="form-group">
                                        <select class="form-control" name="jenis_kelamin" name="group_id"
                                            required="required">
                                            <option value="">- Pilih Jenis Kelamin -</option>
                                            <option value="1">Laki-Laki</option>
                                            <option value="0">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Nomor Telepon</label>
                                    <input type="number" id="no_telp" name="no_telp" class="form-control"
                                        placeholder="Masukkan Nomor Telpon......." required="required">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" id="alamat" name="alamat" class="form-control"
                                        placeholder="Masukkan nama Alamat......." required="required">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Nama Bapak</label>
                                    <input type="text" id="nama_bapak" name="nama_bapak" class="form-control"
                                        placeholder="Masukkan Nama Bapak......." required="required">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Nama Ibu</label>
                                    <input type="text" id="nama_ibu" name="nama_ibu" class="form-control"
                                        placeholder="Masukkan Nama Ibu......." required="required">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="email_address">Tahun Berkader</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" id="tahun_berkader" name="tahun_berkader"
                                                class="form-control" placeholder="Masukkan Nama Ibu......."
                                                required="required">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <input type="text" id="jabatan" name="jabatan" class="form-control"
                                        placeholder="Masukkan Jabatan......." required="required">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Komisariat<span class="required" style="color: #dd4b39;">*</span></label>
                                    <select class="form-control" name="komisariat" required="required">
                                        <option value="">- Pilih Komisariat -</option>
                                        @foreach ($komisariat as $data)
                                            <option value="{{ $data->id }}" <?php echo $data->id == Request::segment(3) ? 'selected' : ' '; ?>>
                                                {{ $data->nama_komisariat }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Perkaderan<span class="required" style="color: #dd4b39;">*</span></label>
                                    <select class="form-control tagging select2" name="perkaderan[]" multiple>
                                        @foreach ($perkaderan as $data)
                                            <option value="{{ $data->id }}"
                                                @if (in_array($data->id, (array) old('perkaderan', []))) selected @endif>
                                                {{ $data->nama }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Pelatihan<span class="required" style="color: #dd4b39;">*</span></label>
                                    <select class="form-control tagging select2" name="pelatihan[]" multiple >
                                        @foreach ($pelatihan as $data)
                                            <option value="{{ $data->id }}"
                                                @if (in_array($data->id, (array) old('pelatihan', []))) selected @endif>
                                                {{ $data->nama }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label> Foto Gambar</label>
                                    <div class="image-upload">
                                        <input type="file" class="form-control"
                                            placeholder="Cover/Thumbnail Informasi" name="foto" value=""
                                            accept=".png, .jpeg, .jpg">
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
                                <a href="/kader" class="btn btn-danger">Cancel</a>
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
