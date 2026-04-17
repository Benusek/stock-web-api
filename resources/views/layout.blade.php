<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Stock</title>
</head>
<body class="md:flex min-h-screen bg-gray-50">
    @if(auth()->guard('web')->check()) @include('navigation') @endif
    <main class="w-full">
        @yield('content')
    </main>
</body>
</html>
