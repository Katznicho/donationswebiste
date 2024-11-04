

    <!-- Favicons -->
    <!--<link rel="icon" href="{{ asset('assets/img/favicon.png') }}">-->
    <link rel="apple-touch-icon" href="{{ asset('assets/img/apple-touch-icon.png') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Marcellus:wght@400&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <!-- Country Select CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/country-select-js/2.0.1/css/countrySelect.min.css">

    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <style>
        @media (min-width: 768px) {
            .img-lg-md-height {
                height: 500px;
                /* Adjust the height as needed */
                object-fit: cover;
            }
        }

        @media (min-width: 992px) {
            .img-lg-md-height {
                height: 600px;
                /* Adjust the height as needed */
                object-fit: cover;
            }
        }

        .btn-cta button {
            background-color: #0a4e77;
            /* Blue background */
            border-radius: 18px;
            /* Smooth rounded corners */
            color: #ffffff;
            /* White text */
            transition: background-color 0.3s ease;
            /* Smooth transition */
            font-size: 1rem !important;
            padding: 1rem 1.5rem;
        }

        .btn-cta button:hover {
            background-color: #0056b3;
            /* Dark blue on hover */
            color: #ffffff;
        }

        /* Custom styles for the country dropdown */
        .country-select.inside .country-list {
            max-height: 200px;
            overflow-y: auto;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            display: flex;
            align-items: center;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered img {
            margin-right: 8px;
        }


        .select2-container {
            width: 100% !important;
        }
    </style>

{{-- </head> --}}

{{-- <body class="index-page">   --}}


    {{-- <main class="main"> --}}

   
  
  <!-- Header -->
  <header id="header" class="header d-flex align-items-center position-relative">
    <div class="container-fluid container-lg position-relative d-flex align-items-center justify-content-between">

        <a href="#" class="logo d-flex align-items-center">
            <h1 class="sitename">Fountain of Peace International</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#" class="active">Home</a></li>
                <li><a href="#">Who we are</a></li>
                <li><a href="#">What we do</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

    </div>


    
</header>

{{--  --}}


{{-- @include('welcome') --}}


{{-- @include('layouts.new-footer') --}}

    {{-- </main> --}}

   

{{-- </body> --}}

{{-- </html> --}}

