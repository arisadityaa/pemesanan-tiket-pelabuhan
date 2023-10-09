@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <div class="container mt-3">
        <h1 class="text-center">Riwayat Boking Tiket</h1>

        <table class="table table-bordered table-hover mt-4">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Ticket Name</th>
                    <th scope="col">Price</th>
                    {{-- <th scope="col">Count</th>
                    <th scope="col">Total Price</th> --}}
                    <th scope="col">Sail Time</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bokings as $boking)    
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>{{$boking->ticket->name}}</td>
                    {{-- <td>15.000</td>
                    <td class="text-center">2</td> --}}
                    <td>{{$boking->total_price}}</td> 
                    <td>{{date('D, d M Y h:i', strtotime($boking->ticket->sail_time))}}</td>
                    <td><button class="btn btn-outline-dark"><i class="fa-regular fa-eye"></i> Show Detail</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
