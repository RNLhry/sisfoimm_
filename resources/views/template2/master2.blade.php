<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Ikatan Mahasiswa Muhammadiyah UMKendari</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('/dist2//img/favicon1.png') }}" rel="icon" style="border-radius: 50%;">
    <link href="{{ asset('/dist2//img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/dist2//vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/dist2//vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/dist2//vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/dist2//vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/dist2//vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('/dist2//vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('/dist2//css/style.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/dist2//img/favicon1.png') }}">
    <link href="{{ asset('/dist2//img/favicon1.png') }}" rel="icon" style="border-radius: 50%;">

    <!-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"> -->

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    



    <style>
        /* Style for the main content */
        #main {
            background-color: #f9f9f9;
            padding: 40px 0;
        }

        /* Style for breadcrumbs section */
        #breadcrumbs {
            background-color: #fff;
            padding: 20px 0;
            border-bottom: 1px solid #e5e5e5;
        }

        #breadcrumbs h2 {
            font-size: 24px;
            margin: 0;
            padding: 0;
        }

        #breadcrumbs ol {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        #breadcrumbs ol li {
            display: inline;
            margin-right: 10px;
            font-size: 14px;
        }

        #breadcrumbs ol li:last-child {
            margin-right: 0;
        }

        #breadcrumbs ol li a {
            text-decoration: none;
            color: #007BFF;
        }

        /* Style for the sidebar */
        .left-blog {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
        }

        .left-blog h4 {
            font-size: 20px;
            margin-bottom: 15px;
        }

        .left-blog ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .left-blog ul li {
            margin-bottom: 10px;
        }

        .left-blog ul li a {
            text-decoration: none;
            color: #007BFF;
        }

        /* Style for the main content area */
        .blog-post-wrapper {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
        }

        .blog-post-wrapper h2 {
            font-size: 24px;
            margin: 0;
            padding: 0;
        }

        .entry-meta {
            margin-top: 10px;
            font-size: 14px;
            color: #777;
        }

        .entry-meta span {
            margin-right: 10px;
        }

        .entry-meta .author-meta a {
            text-decoration: none;
            color: #007BFF;
        }

        .entry-content {
            margin-top: 20px;
            font-size: 16px;
            line-height: 1.6;
        }

        blockquote {
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #f5f5f5;
            border-left: 4px solid #007BFF;
        }

        /* Style for comments section */
        .comments-area {
            margin-top: 20px;
        }

        .comments-heading h3 {
            font-size: 24px;
        }

        .comments-list ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .comments-list li {
            margin-bottom: 20px;
        }

        .comments-details {
            display: flex;
            align-items: center;
        }

        .comments-list-img img {
            max-width: 40px;
            max-height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .comments-content-wrap {
            flex-grow: 1;
        }

        .comment-reply-title {
            font-size: 20px;
            margin-top: 30px;
            margin-bottom: 20px;
        }

        .email-notes {
            font-size: 14px;
            color: #777;


        }

        .square-image-container {
            width: 300px;
            /* Lebar gambar yang diinginkan */
            height: 300px;
            /* Tinggi gambar yang diinginkan */
            overflow: hidden;
        }

        .square-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>


    <!-- =======================================================
  * Template Name: MeFamily
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/family-multipurpose-html-bootstrap-template-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        @include('template2.navbar')
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    @yield('content')

    <!-- ======= Footer ======= -->
    @include('template2.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('/dist2//vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/dist2//vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('/dist2//vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('/dist2//vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('/dist2//vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('/dist2//js/main.js') }}"></script>

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
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

</body>

</html>
