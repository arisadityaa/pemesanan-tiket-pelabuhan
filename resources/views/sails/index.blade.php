@extends('layouts.app')
@section('content')
    @include('layouts.navbar')

    <div class="container mb-5 mt-4">
        <h1 class="text-center mb-3">Daftar Ulang Tiket </h1>

        <form action="/sail/ticket" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="ticketid" placeholder="Masukkan ID Tiket">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Cari Tiket</button>
                </div>
            </div>
        </form>


        @if (isset($ticket))
            <div class="row d-fex justify-content-center">
                <div class="card col-8">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{$ticket->ticket->name}}</h5>
                        <h6 class="card-text text-muted">{{$ticket->status}}</h6>
                        <p class="card-text">Member: {{$ticket->member->user->name}}</p>
                        <p class="card-text text-justify">{{Str::limit($ticket->ticket->description, 200)}}</p>
                        <p class="card-text text-muted"> {{$ticket->count}} Ticket, Rp. {{number_format($ticket->total_price, 2, ",", ".")}}</p>
                        @if ($ticket->status === 'Pending')
                        <div class="row d-flex justify-content-around">
                            <a href="#" class="card-link text-success">Approve Tiket</a>
                            <a href="#" class="card-link text-danger">Reject Tiket</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-warning" role="alert">
                No Data Found
            </div>
        @endif
    </div>
@endsection
