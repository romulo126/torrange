<!-- resources/views/default.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Torrange</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/ico.png') }}"/>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/ico.png') }}"/>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/ico.png') }}"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        img.logo, img.download{
            display: block;
            margin: 0 auto;
            width: 25%;
        }

        #load_gif{
            display: block;
            margin: 0 auto;
            width: 25%;
        }
        
        img.cove{
            display: block;
            margin: 0 auto;
        }

        #logo_triste {
            display: none;
        }
    </style>
    @yield('head')
</head>

<body style="background-color: #0C0E1F;">
    <div class="container text-center mt-5">
        @yield('content')
    </div>

</body>
@yield('script')

</html>