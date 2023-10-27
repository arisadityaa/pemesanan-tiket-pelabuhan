@extends('layouts.app')
@section('content')
    @include('layouts.navbar')

    <div class="container mb-5 mt-4">
        <h1 class="text-center mb-3">Daftar Ulang Tiket </h1>

        <form action="/sail/ticket" method="get" id="ticket-input">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="ticketid" id="number-ticket" placeholder="Masukkan ID Tiket">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Cari Tiket</button>
                </div>
            </div>
        </form>


        <div id="ticket-book">

        </div>
        {{--@if (isset($ticket))
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
                            <a href="/sail/accept/{{$ticket->id}}" class="card-link text-success">Approve Tiket</a>
                            <a href="/sail/reject/{{$ticket->id}}" class="card-link text-danger">Reject Tiket</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-warning" role="alert">
                No Data Found
            </div>
        @endif --}}
    </div>
@endsection

@section('js')
<script>
    $(document).ready(function(){

        $('#ticket-input').on("submit", function(e){
            e.preventDefault()
            let number = $('#number-ticket').val()
            // console.log(number);
            $.ajax({
                url: `/sail/ticket`,
                dataType: 'JSON',
                type: 'GET',
                data: {
                    "ticketID" : number,
                },
                success: function(response){
                    console.log(response);
                    if(response.status === 'success'){
                        $('#ticket-book').html(
                        `
                        <div class="row d-fex justify-content-center">
                            <div class="card col-8">
                                <div class="card-body">
                                    <h5 class="card-title text-center">${response.data.ticket.name}</h5>
                                    <h6 class="card-text text-muted">${response.data.status}</h6>
                                    <p class="card-text">Member: ${response.data.member.user.name}</p>
                                    <p class="card-text text-justify">${response.data.ticket.description.slice(0,200)}</p>
                                    <p class="card-text text-muted"> ${response.data.count} Ticket, Rp. ${response.data.total_price}</p>
                                    ${response.data.status === 'Pending'? 
                                    `
                                        <div class="row d-flex justify-content-around">
                                            <a href="/sail/accept/${response.data.id}" class="card-link text-success">Approve Tiket</a>
                                            <a href="/sail/reject/${response.data.id}" class="card-link text-danger">Reject Tiket</a>
                                        </div>
                                    `
                                    :
                                    ``}
                                </div>
                            </div>
                        </div>
                        `
                        )
                    }else{
                        $('#ticket-book').html(`
                        <div class="alert alert-warning" role="alert">
                            No Data Found
                        </div>
                        `)
                    }
                }
            })
        })
    })
</script>
    
@endsection
