@extends('layouts.app')
@section('content')
    @include('layouts.navbar')
    <div class="container text-center">
        <h1 class="mb-3 py-4">{{ config('app.name') }}</h1>
    </div>

    <div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('asset/image/sail1.jpg')}}" style="height: 300px; object-fit: cover; object-position: center;" class="d-block w-100 rounded" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('asset/image/sail2.jpg')}}" style="height: 300px; object-fit: cover; object-position: 50% 65%;" class="d-block w-100 rounded" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('asset/image/sail3.jpg')}}" style="height: 300px; object-fit: cover; object-position: center;" class="d-block w-100 rounded" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>
    </div>

    <div class="container mt-4">
        <h3 class="mb-3 text-center text-secondary">Bring your destion dreams come true</h3>

        <div class="input-group d-flex justify-content-end mt-4">
            {{-- <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)"> --}}
            <select class="form-control" aria-label="Default select example">
                <option selected value="" class="text-center">Select Location Sail</option>
                @foreach ($locations as $location)
                    <option value="{{$location->id}}" class="text-center">{{$location->name}}</option>
                @endforeach
              </select>
            <div class="input-group-append">
                <button class="btn btn-primary">Select a port location</button>
            </div>
        </div>
    </div>

    <div class="container mb-3">
        <div class="row">
            @foreach ($tickets as $ticket)
                <div class="col-lg-4 col-md-6 mt-5 d-flex align-items-stretch">
                    <div class="card">
                        <div class="card-header">{{ $ticket->name }} (Rp {{number_format($ticket->price, 2, ",", ".")}})</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-justify">{{ Str::limit($ticket->description, 200) }}</li>
                            <li class="list-group-item">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-md-4 text-left">Stock: {{ $ticket->stock }} </div>
                                    <div class="col-md-8 text-right">Sail time: {{ date('D, d M Y', strtotime($ticket->sail_time)) }}</div>
                                </div>
                            </li>
                            <div class="card-footer"> <button class="btn btn-primary btn-block">Book Now</button></div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <div class="container mb-5">
        <a class="btn btn-primary btn-block" href="/ticket" role="button">Show Me More Location!</a>
    </div>



    {{-- <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-2 mt-4">Our Location</div>
            <div class="col-md-4 text-center">
                <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card">
                                <div class="card-body">bachehe</div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card">
                                <div class="card-body">bachehe</div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card">
                                <div class="card-body">bachehe</div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls2"
                        data-slide="prev">
                        <span class="carousel-control-prev-icon bg-secondary" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-target="#carouselExampleControls2"
                        data-slide="next">
                        <span class="carousel-control-next-icon bg-secondary" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </button>
                </div>
            </div>
            
        </div>
    </div> --}}
@endsection
