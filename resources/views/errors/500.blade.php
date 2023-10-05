


<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') }}</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
    <link href="{{ asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body class="vh-100">    
   <div class="authincation h-100" style="background-image: url(assets/images/student-bg.jpg); background-repeat:no-repeat; background-size:cover;">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-lg-6 col-sm-12">
                    <div class="form-input-content  error-page">
						<h1 class="error-text text-primary">500</h1>
						<h4>Internal Server Error</h4>
						<p>You do not have permission to view this resource</p>
                        <a class="btn btn-primary" href="/">Back to Home</a>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
					<img  class="w-100" src="assets/images/svg/student.svg" alt="">
				</div>
            </div>
        </div>
    </div>


<script src="assets/vendor/global/global.min.js"></script>
<script src="assets/js/custom.min.js"></script>
<script src="assets/js/dlabnav-init.js"></script>
</body>
</html>