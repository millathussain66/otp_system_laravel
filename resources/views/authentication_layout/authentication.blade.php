<!DOCTYPE html>
<html>
<head>
    <title> @yield('page_title','Admin Login Register And OTP Validation') </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('') }}public/login_register_otp.css">
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
