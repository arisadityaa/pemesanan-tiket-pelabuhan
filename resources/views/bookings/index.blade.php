@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <div class="container">
        <h1 class="text-center">Riwayat Boking Tiket</h1>

        <table class="table table-bordered table-hover mt-4">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Ticket Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Count</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Sail Time</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>1</th>
                    <td>Tiket pelabuhan ketapang - pelabuhan banyuwangi</td>
                    <td>15.000</td>
                    <td class="text-center">2</td>
                    <td>30.000</td>
                    <td>15 June 2023 15:40</td>
                    <td><button class="btn btn-outline-dark"><i class="fa-regular fa-eye"></i> Show Detail</button></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
