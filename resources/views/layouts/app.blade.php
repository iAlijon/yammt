<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/admin-assets/img/favicon.ico')}}">
    <link rel="icon" href="{{asset('/admin-assets/img/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{url('/front/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('/front/css/libs.min.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/style.min.css')}}">
    <title>Yagona Milliy Mehnat Tizimi</title>
</head>
<body>
    <div class="_wrapper">
            <div class="header">
                <?php echo App::make("App\Http\Controllers\MenuController")->display(); ?>
            </div>
            <div class="content">
                @yield('content')
            </div>
    </div>
<script src="{{url('/front/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('/front/js/libs.min.js') }}" defer></script>
<script src="{{ asset('/front/js/script.min.js') }}" defer></script>
</body>
</html>
