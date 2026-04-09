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
<body class="md:flex">
    @include('navigation')
    <main class="w-full sm:w-3/4 bg-gray-50">
        @yield('content')
    </main>
</body>
</html>
