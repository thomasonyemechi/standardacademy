<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DexignLab">
    <meta name="robots" content="">
    {{-- <meta name="keywords" content="school, Standard Academy, education, academy, Akure, Best, Primary school," > --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Page Title Here -->
    <title>{{ env('APP_NAME') }}</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
    <link href="{{ asset('assets/vendor/wow-master/css/libs/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">


    <style>
        .al_bg {
            background: linear-gradient(to right, #b04300, #ff0000) !important;
        }
    </style>

</head>




<body data-typography="poppins" data-theme-version="light" data-layout="vertical" data-nav-headerbg="color_2"
    data-headerbg="color_1" data-sidebar-style="full" data-sidebarbg="color_2" data-sidebar-position="fixed"
    data-header-position="fixed" data-container="wide" direction="ltr" data-primary="color_1">


    {{-- 
	<div id="preloader">
	  <div class="loader">
		<div class="dots">
			  <div class="dot mainDot"></div>
			  <div class="dot"></div>
			  <div class="dot"></div>
			  <div class="dot"></div>
			  <div class="dot"></div>
		</div>
		</div>
	</div> --}}

    <div id="main-wrapper">


        @include('layout.inc.admin_nav')

        @include('layout.inc.admin_header')

        @include('layout.inc.admin_sidebar')



        @if ($errors->any())
            <div id="refresh" class="alert al_bg" style="position:fixed; top:10px; right:10px; z-index:10000; width: auto;">
                <i class="text-white">
                    @foreach ($errors->all() as $error)
                        {{ $error }} <br />
                    @endforeach
                </i>
            </div>
        @endif


        <div class="content-body">
            <div class="container-fluid">
                <!-- Row -->
                @yield('page_content')
            </div>
        </div>





        <div class="footer footer-outer" style="width: 100%">
            <div class="copyright text-center">
                <p>Copyright © Designed &amp; Developed by <a href="/">bitech</a> {{ date('Y') }}</p>
            </div>
        </div>

    </div>


    <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>


    <script src="{{ asset('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/wow-master/dist/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/dlabnav-init.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/general.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>


    @if (session('error'))
        <script>
            Toastify({
                text: "<?= session('error') ?>",
                duration: 5000,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(to right, #b04300, #ff0000)",
                },
            }).showToast();
        </script>
    @endif

    @if (session('success'))
        <script>
            Toastify({
                text: "<?= session('success') ?>",
                duration: 5000,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(to right, #00b09b, #01ff01)",
                },
            }).showToast();
        </script>
    @endif

    <script>
        $(function() {
            setTimeout(() => {
                $('#refresh').hide('slow');
            }, 5000);
        })
    </script>
    @stack('scripts')
</body>

</html>
