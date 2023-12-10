<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') }}</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
    <link href="{{ asset('assets/vendor/wow-master/css/libs/animate.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    
    <style>
        .profile_pics {
            width: 50px;
            height: 50px;
        }

        .object-cover {
            object-fit: cover;
        }


        .hide-print{
            display: none;
        }

        @media print {
            .btn-secondary {
                display: none ;
            }
        }

    </style>


</head>

<body class="body ">

    <div id="result-body">

    </div>

    <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>

    <script src="{{ asset('assets/js/general.js') }}"></script>

    <script src="{{ asset('assets/js/results.js') }}"></script>


    <script>
        function checkResult() {
            result_id = `{{ $result_id }}`

            $.ajax({
                method: 'get',
                url: `/api/viewer/result/${result_id}`
            }).done(function(res) {
                console.log(res);
                $('#result-body').html(ResultTemplate(res.data, ''))
            }).fail(function(res) {
                console.log(res);
            })
        }

        checkResult();
    </script>

</body>

</html>
