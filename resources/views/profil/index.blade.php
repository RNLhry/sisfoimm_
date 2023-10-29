@extends('master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Profile</h4>
                    <h6>User Profile</h6>
                </div>
            </div>
            <form action="/user/update/{{ Request::segment(3) }}" method="POST">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-body">
                        <div class="profile-set">
                            <div class="profile-head">
                            </div>
                            <div class="profile-top">
                                <div class="profile-content">
                                    <div class="profile-contentimg">
                                        @if ($foto)
                                            <img src="{{ url('images/' .$foto) }}" class="user-image" alt="img" id="blah">
                                           
                                        @else
                                            <img src="{{ asset('assets/img/product/avatar.png') }}" alt="img"
                                                id="blah">
                                        @endif
                                        <!-- <div class="profileupload">
                                            <input type="file" id="imgInp">
                                            <a href="javascript:void(0);"><img
                                                    src="{{ asset('assets/img/icons/edit-set.svg') }}" alt="img"></a>
                                        </div> -->
                                    </div>
                                    <div class="profile-contentname">
                                        <h2>{{ $user->nama }}</h2>
                                        <h4>Updates Your Photo and Personal Details.</h4>
                                    </div>
                                </div>
                                {{-- <div class="ms-auto">
                                <a href="javascript:void(0);" class="btn btn-submit me-2">Save</a>
                                <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
                            </div> --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" value="{{ $user->nama }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" name="username" value="{{ $user->username }}" disabled>
                                    <input type="hidden" name="username" value="{{ $user->username }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="pass-group">
                                        <input type="password" name="password" class=" pass-input"
                                            value="{{ $user->password }}">
                                        <span class="fas toggle-password fa-eye-slash"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ 'Simpan' }}
                                </button>
                                <a href="/home" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
