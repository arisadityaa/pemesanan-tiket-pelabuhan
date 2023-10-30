@extends('document.layout')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <div>
        <h1>
            List Penumpang Kapal
        </h1>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Jumlah Tiket</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($tickets as $tickets)
            <tr>
                <td>
                    {{$loop->iteration}}
                </td>
                <td>{{$ticket->name}}</td>
                <td>{{$ticket->count}}</td>
            </tr>   
            @endforeach --}}
            </tbody>
        </table>
    </div>
@endsection
