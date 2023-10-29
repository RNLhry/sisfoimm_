<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Login - Pos admin template</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.jpg">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="account-page">

    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <div class="login-userset">
                        <div class="login-logo">
                            <img src="assets/img/logo1.png" alt="img">
                        </div>
                        <div class="login-userheading">
                            <h3>Log In</h3>
                            <h4>Please login to your account</h4>
                        </div>
                        <div class="row">


                            @if (session('error'))
                                <div class="alert alert-danger">
                                    <b>Opps!</b> {{ session('error') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('actionlogin') }}">
                                @csrf
                                <div class="form-login">
                                    <label>Username</label>
                                    <div class="form-addons">
                                        <input placeholder="Masukkan username anda...." id="username" type="username"
                                            class="form-control @error('username') is-invalid @enderror" name="username"
                                            value="{{ old('username') }}" required autocomplete="username" autofocus>
                                        <img src="assets/img/icons/users1.svg" alt="img">
                                    </div>
                                </div>
                                <div class="form-login">
                                    <label>Password</label>
                                    <div class="pass-group">
                                        <input placeholder="Masukkan password anda..." id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">
                                        {{-- <span class="fas toggle-password fa-eye-slash"></span> --}}
                                    </div>
                                </div>




                                <div class="row mb-0">
                                    <div class="col-md-12 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ 'Login' }}
                                        </button>

                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="login-img">
                    <img src="assets/img/login.jpg" alt="img">
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

</html>
