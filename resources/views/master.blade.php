<!DOCTYPE html>
<html lang="en">

<head>
    {{-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow"> --}}
    <title>Sistem Informasi IMM UMKendari</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/dist2//img/favicon1.png') }}">
    <link href="{{ asset('/dist2//img/favicon1.png') }}" rel="icon" style="border-radius: 50%;">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/owlcarousel/owl.carousel.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/dist2//img/favicon1.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toatr.css') }}">


</head>

<body>

    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">

        @include('template/navbar')
        @include('template/sidebar')
        @yield('content')

    </div>

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ asset('assets/js/feather.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweetalert/sweetalerts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/toastr/toastr.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}""></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    --}}
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.getElementById('foto');
            const imagePreview = document.getElementById('image-preview');
            const imageName = document.getElementById('image-name');
            const imageUploads = document.getElementById('image-uploads'); // Ambil elemen dengan ID "image-uploads"

            imageInput.addEventListener('change', function() {
                const file = this.files[0];

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreview.style.display = 'block';
                    };

                    reader.readAsDataURL(file);
                    imageName.textContent = file.name;
                    imageName.style.display = 'block';

                    // Sembunyikan elemen "image-uploads"
                    imageUploads.style.display = 'none';
                } else {
                    imagePreview.style.display = 'none';
                    imageName.style.display = 'none';

                    // Tampilkan kembali elemen "image-uploads" jika tidak ada gambar yang dipilih
                    imageUploads.style.display = 'block';
                }
            });
        });
    </script>
     <script>
        const inputText = document.getElementById('inputText');
        const charCount = document.getElementById('charCount');

        inputText.addEventListener('input', () => {
            const text = inputText.value;
            const charCountValue = text.length;

            if (charCountValue > 255) {
                inputText.value = text.slice(0, 255);
                charCount.textContent = '255/255 karakter (maksimal)';
            } else {
                charCount.textContent = `${charCountValue}/255 karakter`;
            }
        });
    </script>




</body>

</html>
