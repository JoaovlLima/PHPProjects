<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Links de Css --}}
    <link rel="stylesheet" href="{{asset('assets/css/style.css') }}">



</head>
<body>

    @include('parts.header')

    <div class="container">
        @yield('content')
    </div>

    @include('parts.footer')


</body>
<script src="{{asset('assets/js/script.js') }}"></script>
</html>
