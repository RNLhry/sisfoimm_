@extends('master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>User Management</h4>
                    <h6>Create User</h6>
                </div>
            </div>
            <form action="/user/store" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $users[0]->id }}">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" placeholder="Isi nama user..">
                                </div>
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" placeholder="Isi username user.." name="username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="pass-group">
                                        <input type="password" name="password" class=" pass-input">
                                        <span class="fas toggle-password fa-eye-slash"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control" name="roles_id" required="required">
                                        <option value="">- Pilih Role -</option>
                                        @foreach ($roles as $data)
                                            <option value="{{ $data->id }}">
                                                {{ $data->nama }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group uploadedimage">
                                    <label> Profile Picture</label>
                                    <div class="image-upload image-upload-new">
                                        <div class="image-uploads">
                                            <img src="{{ asset('assets/img/product/avatar.png') }}" alt="img">
                                            <div class="productviews">
                                                <div class="productviewscontent">
                                                    <a href="javascript:void(0);" class="hideset">x</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ 'Simpan' }}
                                </button>
                                <a href="/user" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
