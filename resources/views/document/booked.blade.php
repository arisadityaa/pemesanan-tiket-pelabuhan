@extends('document.layout')
@section('title')
    {{$title}}
@endsection

@section('content')

<div class="container mt-3">
    <h2 class="text-center">
        Bukti Boking Pemesanan Tiket Pelayaran
        <p>Tunjukkan Bukti Boking ini kepada pegawai</p>
    </h2>

    <ul style="list-style-type: none;">
        <li>ID Tiket: <strong>{{$ticket->id}}</strong></li>
        <li>Nama Pemesan: {{$ticket->member->user->name}}</li>
        <li>Nama Tiket: {{$ticket->ticket->name}}</li>
        <li>Waktu Pelayaran: {{date('D, d M Y h:i', strtotime($ticket->ticket->sail_time))}}</li>
        <li>Total: <strong>Rp.{{number_format($ticket->ticket->price, 2, ',', '.')}}</strong></li>
      </ul>

      <div style="text-align: center; color: orange">
        <h3>Harap dibayarkan H-3 Sebelum Pelayaran Berlangsung!</h3>
      </div>
</div>
    
@endsection