<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>

<body>
    <nav>
        <h1 style="text-align: center; color:blue">
            {{ config('app.name') }} &COPY;
        </h1>
    </nav>
    @yield('content')

    <footer style="text-align: center; font-weight: bold"> &copy;Let Sail's Tickets {{ date('Y') }} </footer>
</body>

</html>
