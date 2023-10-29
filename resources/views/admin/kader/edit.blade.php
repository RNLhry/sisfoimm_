@extends('master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h2>Edit Kader {{ $komisariat[0]->id == Request::segment(3) ? $komisariat[0]->nama_komisariat : '' }}</h2>
                    <h6>Menngedit Data Kader</h6>
                </div>
            </div>
            <form action="/kader/update" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $kader[0]->id }}">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" id="nama" name="nama" class="form-control"
                                        placeholder="Masukkan nama kader......." required="required"
                                        value="{{ $kader[0]->nama }}">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>NIM</label>
                                    <input type="number" id="nim" name="nim" class="form-control"
                                        placeholder="Masukkan NIM kader......." required="required"
                                        value="{{ $kader[0]->nim }}">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Angkatan</label>
                                    <input type="number" id="angkatan" name="angkatan" class="form-control"
                                        placeholder="Masukkan Angkatan......." required="required"
                                        value="{{ $kader[0]->angkatan }}">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Tempat/Tanggal Lahir</label>
                                    <input type="text" id="tempat_tanggal_lahir" name="tempat_tanggal_lahir"
                                        class="form-control" placeholder="Masukkan Tempat Tanggal Lahir......."
                                        required="required" value="{{ $kader[0]->tempat_tanggal_lahir }}">
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Jurusan</label>
                                    <select class="form-control" name="jurusan" required="required">
                                        <option value="">- Pilih Jurusan -</option>
                                        @foreach ($jurusan as $data)
                                            <option value="{{ $data->id }}" <?php echo $data->id == $kader[0]->jurusan_id ? 'selected' : ' '; ?>>
                                                {{ $data->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <div class="form-group">
                                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin"
                                            required="required">
                                            <option value="">- Pilih Jenis Kelamin -</option>
                                            <option value="Laki-Laki" @selected($kader[0]->jenis_kelamin == 'laki-laki')>Laki-Laki</option>
                                            <option value="Perempuan" @selected($kader[0]->jenis_kelamin == 'perempuan')>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Nomor Telepon</label>
                                    <input type="number" id="no_telp" name="no_telp" class="form-control"
                                        placeholder="Masukkan Nomor Telpon......." required="required"
                                        value="{{ $kader[0]->no_telp }}">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" id="alamat" name="alamat" class="form-control"
                                        placeholder="Masukkan nama Alamat......." required="required"
                                        value="{{ $kader[0]->alamat }}">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Nama Bapak</label>
                                    <input type="text" id="nama_bapak" name="nama_bapak" class="form-control"
                                        placeholder="Masukkan Nama Bapak......." required="required"
                                        value="{{ $kader[0]->nama_bapak }}">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Nama Ibu</label>
                                    <input type="text" id="nama_ibu" name="nama_ibu" class="form-control"
                                        placeholder="Masukkan Nama Ibu......." required="required"
                                        value="{{ $kader[0]->nama_ibu }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="email_address">Tahun Berkader</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" id="tahun_berkader" name="tahun_berkader"
                                                class="form-control" required="required"
                                                value="{{ $kader[0]->tahun_berkader }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <input type="text" id="jabatan" name="jabatan" class="form-control"
                                        placeholder="Masukkan Nama Ibu......." required="required"
                                        value="{{ $kader[0]->jabatan }}"">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Komisariat<span class="required" style="color: #dd4b39;">*</span></label>
                                    <select class="form-control" name="komisariat" required="required">
                                        <option value="">- Pilih Komisariat -</option>
                                        @foreach ($komisariat as $data)
                                            <option value="{{ $data->id }}" <?php echo $data->id == $kader[0]->komisariat_id ? 'selected' : ' '; ?>>
                                                {{ $data->nama_komisariat }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Perkaderan<span class="required" style="color: #dd4b39;">*</span></label>
                                    <select class="form-control tagging select2" name="perkaderan[]" multiple required>
                                        @foreach ($perkaderanOptions as $id => $nama)
                                            <option value="{{ $id }}"
                                                @if (in_array($id, (array) $perkaderan)) selected @endif>
                                                {{ $nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Pelatihan<span class="required" style="color: #dd4b39;">*</span></label>
                                    <select class="form-control tagging select2" name="pelatihan[]" multiple>
                                        @foreach ($pelatihanOptions as $id => $nama)
                                            <option value="{{ $id }}"
                                                @if (in_array($id, (array) $pelatihan)) selected @endif>
                                                {{ $nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label> Foto Gambar</label>
                                <div class="image-upload">
                                    <input type="file" class="form-control" placeholder="Cover/Thumbnail Informasi"
                                        name="foto" value="" accept=".png, .jpeg, .jpg">
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
                            
                            @if (Auth::user()->roles->id == 1)
                            <a href="/kader" class="btn btn-danger">Cancel</a>
                            return redirect()->back();
                        @else (Auth::user()->roles->id == 2)
                            <a href="/kaderKmst" class="btn btn-danger">Cancel</a>
                        
                        @endif
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
