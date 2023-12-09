<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? config('app.name') }}</title>
    <link rel="icon" href="{{ asset('asset/icon/sail.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="https://kit.fontawesome.com/d715832e0c.js" crossorigin="anonymous"></script>
</head>

<body>
    <br><br>
    {{-- <div class="container-fluid">
        <div class="row">
            <div class="col-2 bg-dark min-vh-100 ">
                <div class="bg-dark p-2">
                    <ul class="nav nav-pills flex-column mt-4" style="position: fixed; max-width: 20%; ">
                        <li class="nav-item py-2 py-sm-0">
                            <a href="#" class="nav-link active">Satu</a>
                        </li>
                        <li class="nav-item py-2 py-sm-0">
                            <a href="#" class="nav-link">Dua</a>
                        </li>
                        <li class="nav-item py-2 py-sm-0">
                            <a href="#" class="nav-link">Tiga</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="p-3"> --}}
                @yield('content')
            {{-- </div> --}}
        {{-- </div> --}}
    {{-- </div> --}}
    <br><br>
    <footer class="fixed-bottom text-center text-light py-2 bg-primary"> &copy;Let Sail's Tickets {{ date('Y') }}
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>
    @yield('js')
</body>

</html>
