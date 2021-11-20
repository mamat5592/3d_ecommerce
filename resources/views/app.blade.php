<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <link rel="icon" href="%PUBLIC_URL%/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="%PUBLIC_URL%/logo192.png" />
    <link rel="manifest" href="%PUBLIC_URL%/manifest.json" />
    <title>Laravel</title>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    <noscript>You need to enable JavaScript to run this app.</noscript>

    <!-- React root DOM -->
    <div id="main">
    </div>

    <!-- Font Aseasome Icon's -->
    <script src="https://kit.fontawesome.com/894b4d4182.js" crossorigin="anonymous"></script>

    <!-- React JS -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</body>

</html>