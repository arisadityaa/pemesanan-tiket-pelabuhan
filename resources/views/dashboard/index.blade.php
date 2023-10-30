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
                    <img src="{{ asset('asset/image/sail1.jpg') }}"
                        style="height: 300px; object-fit: cover; object-position: center;" class="d-block w-100 rounded"
                        alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('asset/image/sail2.jpg') }}"
                        style="height: 300px; object-fit: cover; object-position: 50% 65%;" class="d-block w-100 rounded"
                        alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('asset/image/sail3.jpg') }}"
                        style="height: 300px; object-fit: cover; object-position: center;" class="d-block w-100 rounded"
                        alt="...">
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
            <select class="form-control" id="filter-location" aria-label="Default select example">
                <option value="" class="text-center">Show All</option>
                @foreach ($locations as $location)
                    <option value="{{ $location->id }}" class="text-center">{{ $location->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="container mb-3">
        <div class="row" id="card-ticket">
            @foreach ($tickets as $ticket)
                <div class="col-lg-4 col-md-6 mt-5 d-flex align-items-stretch">
                    <div class="card">
                        <div class="card-header">{{ $ticket->name }} (Rp {{ number_format($ticket->price, 2, ',', '.') }})
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-justify">{{ Str::limit($ticket->description, 200) }}</li>
                            <li class="list-group-item">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-md-4 text-left">Stock: {{ $ticket->stock }} </div>
                                    <div class="col-md-8 text-right">Sail time:
                                        {{ date('D, d M Y', strtotime($ticket->sail_time)) }}</div>
                                </div>
                            </li>
                            @guest
                                <div class="card-footer">
                                    <a class="btn btn-primary btn-block" href="/ticket/boking/{{ $ticket->id }}">Login To Book</a>
                                </div>
                            @endguest
                            @can('member')
                            <div class="card-footer">
                                <a class="btn btn-primary btn-block" href="/ticket/boking/{{ $ticket->id }}">@guest
                                        Login To Book
                                    @else
                                    Book Now @endguest
                                </a>
                            </div>
                            @endcan
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <div class="container mb-5">
        <a class="btn btn-primary btn-block" href="/ticket" role="button">Show Me More Location!</a>
    </div>
@endsection


@section('js')
    <script>
        $('#filter-location').on("change", function() {
            let location = $('#filter-location').find(":selected").val()
            $.ajax({
                url: location === "" ? `/ticket/all` : `/ticket/location/${location}`,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('#card-ticket').html("")
                    response.data.forEach(i => {
                        console.log(i);
                        //format tanggal
                        let dateData = i.sail_time;
                        let formatDate = { weekday: 'short', day: '2-digit', month: 'short', year: 'numeric' }
                        let formattedDate = new Date(dateData).toLocaleDateString('en-GB', formatDate)
                        
                        //format rupiah
                        let rupiahFormat = new Intl.NumberFormat('id-ID', {style: 'currency', currency: 'IDR',}).format(i.price);
                        // console.log(rupiahFormat);
                        $('#card-ticket').append(`
                            <div class="col-lg-4 col-md-6 mt-5 d-flex align-items-stretch">
                                <div class="card">
                                    <div class="card-header"> ${i.name} (${rupiahFormat})</div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item text-justify">${i.description.substring(0,200)}</li>
                                        <li class="list-group-item">
                                            <div class="row d-flex justify-content-between">
                                                <div class="col-md-4 text-left">Stock: ${i.stock} </div>
                                                <div class="col-md-8 text-right">Sail time: ${formattedDate}</div>
                                            </div>
                                        </li>
                                        ${response.role!=='employe'? `<div class="card-footer">
                                                <a class="btn btn-primary btn-block" href="/ticket/boking/${i.id}">${response.role==='member' ? 'Book Now': 'Login To Book'}</a>
                                            </div>` : ''}
                                        
                                </div>
                            </div>
                        `)
                    });
                },

            })
        })
    </script>
@endsection
