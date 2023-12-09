@extends('document.layout')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        .text-center{
            text-align: center;
        }
    </style>


    <div>
        <h2 class="text-center">
            List Keberangkatan Penumpang Kapal
        </h2>
        <h4 class="text-center">{{ $lists->name }} ({{$lists->stock}} Penumpang Max)</h4>
        {{-- <h4 class="text-center">{{}}</h4> --}}


        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Jumlah Tiket</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lists->boking as $list)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>{{ $list->member->user->name }}</td>
                        <td>{{ $list->count }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2">Total</td>
                    <td style="font-weight: bold;">{{$lists->boking_count}}</td>
                </tr>
            </tbody>
        </table>
        <br><br>
    </div>
@endsection
