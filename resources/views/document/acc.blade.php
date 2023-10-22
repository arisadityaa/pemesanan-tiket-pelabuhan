@extends('document.layout')

@section('title')
    {{ $title }}
@endsection

@section('content')

<div>
    <h1> Bukti Pemesanan Tiket </h1>
    <p>Bukti persetujuan pemesanan tiket oleh pegawai</p>
    <p style="color: orange">Simpan bukti ini sebagai arsip!</p>


    <ul style="list-style-type: none;">
        <li>ID Tiket: <strong>{{$ticket->id}}</strong></li>
        <li>Nama Tiket: {{ $ticket->ticket->name }} </li>
        <li>Nama Pemesan: {{ $ticket->member->user->name }}</li>
        <li>Jumlah Tiket: {{$ticket->count}}</li>
        <li>Harga: {{ number_format($ticket->ticket->price, 2, ',', '.') }}</li>
        <li>Waktu Pelayaran : {{date('D, d M Y h:i', strtotime($ticket->ticket->sail_time))}}</li>
        <li>Total <strong>{{number_format($ticket->total_price, 2, ',', '.')}}</strong></li>
    </ul>

</div>

    <div style="text-align: right; margin-right: 10%; margin-bottom: 30px">
        <p>Disetujui Oleh</p>
        <p>Pegawai: {{$ticket->sail->employe->user->name}}</p>
    </div>
@endsection
