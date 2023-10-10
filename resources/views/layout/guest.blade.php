<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Bitech">
    <meta name="keywords"
        content="school, Standard Academy, education, academy, Akure, Best, Primary school, Best primary school, primary">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Favicons-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}" />

    <!--Page Title-->
    <title>@yield('page_title')</title>

    <link href="{{ asset('main/assets/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Dosis:300,400,500,600,700,800|Roboto:300,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('main/assets/css/icofont.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('main/assets/css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/owlcarousel/css/owl.carousel.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('main/assets/owlcarousel/css/owl.theme.default.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('main/assets/css/animate.css') }} ">
    <link rel="stylesheet" href="{{ asset('main/assets/venobox/css/venobox.min.css') }} " />
    <link rel="stylesheet" href="{{ asset('main/assets/css/style.css') }} ">
    <link rel="stylesheet" href="{{ asset('main/assets/css/responsive.css') }} ">


    <style>
        .object-cover {
            object-fit: cover;
        }

        .blog-img {
            width: 100%;
            height: 250px;
        }

        .four-lines {
            display: -webkit-box;
            max-width: 100%;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .two-lines {
            display: -webkit-box;
            max-width: 100%;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>

<body id="main">
    {{-- <div id="page-preloader">
        <div class="loader"></div>
        <div class="loa-shadow"></div>
    </div> --}}

    @include('layout.inc.web_header')

    @yield('page_content')

    @include('layout.inc.web_footer')

    <script src="{{ asset('main/assets/js/jquery-2.2.4.min.js') }} "></script>
    <script src="{{ asset('main/assets/bootstrap/js/popper.min.js') }} "></script>
    <script src="{{ asset('main/assets/bootstrap/js/bootstrap.min.js') }} "></script>
    <script src="{{ asset('main/assets/js/jquery.meanmenu.js') }} "></script>
    <script src="{{ asset('main/assets/js/jquery.sticky.js') }} "></script>
    <script src="{{ asset('main/assets/owlcarousel/js/owl.carousel.min.js') }} "></script>
    <script src="{{ asset('main/assets/js/isotope.3.0.6.min.js') }} "></script>
    <script src="{{ asset('main/assets/venobox/js/venobox.min.js') }} "></script>
    <script src="{{ asset('main/assets/js/jquery.appear.js') }} "></script>
    <script src="{{ asset('main/assets/js/jquery.inview.min.js') }} "></script>
    <script src="{{ asset('main/assets/js/scrolltopcontrol.js') }} "></script>
    <script src="{{ asset('main/assets/js/wow.min.js') }} "></script>
    <script src="{{ asset('main/assets/js/scripts.js') }} "></script>

    <script>
        $(function() {
            // alert('hello dumy')
        })
    </script>
</body>

</html>
