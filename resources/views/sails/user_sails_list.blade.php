@extends('layouts.app')

@section('content')
@include('layouts.navbar')
    <div class="container mb-3 mt-5">
        <h1>List User Sails</h1>
    </div>

    <div class="container mb-3">
        @if ($errors->any())
            @php
                flash()->addError('There was an error in your data.', 'Error Ticket');
            @endphp
            <div class="alert alert-danger alert-dismissible fade show mt-3 mb-3" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="container">
        {{-- <div class="form-group row">
            <label for="location_sail" class="form-label col-2">Sort By</label>
            <select name="location_sail" id="location_sail" class="form-control col-10">
                <option value="">Show All</option>
                @foreach ($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                @endforeach
            </select>
        </div> --}}

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tiket</th>
                    <th>Lokasi</th>
                    <th>Keberangkatan</th>
                    <th>Stok</th>
                    <th>User</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="table-data">
                @foreach ($tickets as $ticket)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $ticket->name }}</td>
                        <td>{{ $ticket->location->name }}</td>
                        <td>{{ date('D, d M Y', strtotime($ticket->sail_time)) }}</td>
                        <td>{{ $ticket->stock}}</td>
                        <td>{{ $ticket->boking_count }}</td>
                        <td>
                            <a class="btn btn-primary" href="/sails/print-user-list/{{$ticket->id}}" role="button">Print User List</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection