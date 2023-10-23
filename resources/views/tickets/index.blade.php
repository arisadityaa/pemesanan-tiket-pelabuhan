@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <div class="container mb-3 mt-5">
        <h1>List Tiket</h1>
    </div>

    <div class="container mb-3">
        @auth
            @if (Auth::user()->role === 'employe')
                <a class="btn btn-primary" href="/ticket/create" role="button">Add New Ticket</a>
            @endif
        @endauth

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
        <div class="form-group row">
            <label for="location_sail" class="form-label col-2">Sort By</label>
            <select name="location_sail" id="location_sail" class="form-control col-10">
                <option value="">Show All</option>
                @foreach ($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                @endforeach
            </select>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th class="col-2">Tiket</th>
                    <th class="col-2">Lokasi</th>
                    <th class="col-2">Keberangkatan</th>
                    <th class="col-1">Stok</th>
                    <th class="col-2">Harga</th>
                    <th class="col-2">Action</th>
                </tr>
            </thead>
            <tbody id="table-data">
                @foreach ($tickets as $ticket)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $ticket->name }}</td>
                        <td>{{ $ticket->location->name }}</td>
                        <td>{{ date('D, d M Y', strtotime($ticket->sail_time)) }}</td>
                        <td>{{ $ticket->stock }}</td>
                        <td>Rp. {{ number_format($ticket->price, 2, ',', '.') }}</td>
                        <td>
                            <div class="row">
                                <div class="col-5">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#showModal" data-id="{{ $ticket->id }}"
                                        data-nama="{{ $ticket->name }}" data-location-id="{{ $ticket->location_id }}"
                                        data-stok="{{ $ticket->stock }}" data-price="{{ $ticket->price }}"
                                        data-sail-time="{{ $ticket->sail_time }}"
                                        data-description="{{ $ticket->description }}"
                                        onclick="isiModal(this)">Detail</button>
                                </div>
                                @auth
                                    @if (Auth::user()->role === 'employe')
                                        <div class="col-5">
                                            <form action="/ticket/{{ $ticket->id }}" method="post"
                                                onsubmit="return confirm('Are You Sure To Delete This Item?');">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-primary">Delete</button>
                                            </form>
                                        </div>
                                    @elseif (Auth::user()->role === 'member')
                                        <div class="col-5">
                                            <form action="/ticket/boking/{{ $ticket->id }}" method="get">
                                                <button type="submit" class="btn btn-primary">Booking</button>
                                            </form>
                                        </div>
                                    @endif
                                @endauth
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showModalLabel">Details Ticket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/ticket" method="POST">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" id="ticket-id">
                        <div class="form-group">
                            <label for="name-ticket" class="col-form-label">Ticket Name</label>
                            <input type="text" name="name" class="form-control" id="name-ticket" autocomplete="off"
                                @auth @if (Auth::user()->role !== 'employe') disabled @endif @endauth @guest disabled @endguest
                                required>
                        </div>
                        <div class="form-group">
                            <label for="location-ticket" class="col-form-label">Locations</label>
                            <select class="form-control" name="location_id" id="location-ticket"
                                @auth @if (Auth::user()->role !== 'employe') disabled @endif @endauth @guest disabled @endguest
                                required>
                                <option value="" disabled>Select Location Sail</option>
                                @foreach ($locations as $location)
                                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="stock-ticket" class="col-form-label">Stock</label>
                            <input type="number" name="stock" class="form-control" id="stock-ticket"
                                @auth @if (Auth::user()->role !== 'employe') disabled @endif @endauth @guest disabled @endguest
                                required>
                        </div>
                        <div class="form-group">
                            <label for="ticket-price" class="col-form-label">Price</label>
                            <input type="number" name="price" class="form-control" id="ticket-price"
                                @auth @if (Auth::user()->role !== 'employe') disabled @endif @endauth @guest disabled @endguest
                                required>
                        </div>
                        <div class="form-group">
                            <label for="ticket-sail-time" class="col-form-label">Sail Time</label>
                            <input type="datetime-local" name="sail-time" class="form-control" id="ticket-sail-time"
                                @auth @if (Auth::user()->role !== 'employe') disabled @endif @endauth @guest disabled @endguest
                                required>
                        </div>
                        <div class="form-group">
                            <label for="description-ticket" class="col-form-label">Description</label>
                            <textarea name="description" id="description-ticket"rows="6" class="col-12" required
                                @auth @if (Auth::user()->role !== 'employe') disabled @endif @endauth @guest disabled @endguest></textarea>
                        </div>
                        <div class="row">
                            @auth
                                @if (Auth::user()->role === 'employe')
                                    <div class="col d-flex justify-content-start"><button type="submit"
                                            class="btn btn-primary">Edit Ticket</button>
                                    </div>
                                @endif
                            @endauth
                            <div class="col d-flex justify-content-end"><button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        const ticketID = document.querySelector('#ticket-id')
        const ticketName = document.querySelector('#name-ticket')
        const ticketLocation = document.querySelector('#location-ticket')
        const ticketStock = document.querySelector('#stock-ticket')
        const ticketPrice = document.querySelector('#ticket-price')
        const ticketSailTime = document.querySelector('#ticket-sail-time')
        const ticketDescription = document.querySelector('#description-ticket')

        function isiModal(e) {
            console.log(e);
            ticketID.value = e.getAttribute("data-id");
            ticketName.value = e.getAttribute("data-nama");
            ticketLocation.value = e.getAttribute("data-location-id");
            ticketStock.value = e.getAttribute("data-stok");
            ticketPrice.value = e.getAttribute("data-price");
            ticketSailTime.value = e.getAttribute("data-sail-time");
            ticketDescription.value = e.getAttribute("data-description");
        }

        $(document).ready(function() {
            $("#location_sail").on("change", function() {
                let location = $('#location_sail').find(":selected").val()
                let urlfilter = '/ticket/location/'
                let urlAll = '/ticket/all'
                console.log(location);

                $.ajax({
                    url: location === "" ? urlAll : `${urlfilter}+${location}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // console.log(data);
                        $('#table-data').html("")
                        let indexdata = 1;
                        console.log(response);
                        let role = response.role
                        response.data.forEach(i => {
                            // console.log(i);
                            $('#table-data').append(
                                `
                                <tr>
                                    <th>${indexdata++}</th>
                                    <td>${i.name}</td>
                                    <td>${i.location.name}</td>
                                    <td>${i.sail_time}</td>
                                    <td>${i.stock}</td>
                                    <td>Rp. ${i.price}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-5">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#showModal" data-id="${i.id}"
                                                    data-nama="${i.name}" data-location-id="${i.location_id}"
                                                    data-stok="${i.stock}" data-price="${i.price}"
                                                    data-sail-time="${i.sail_time}"
                                                    data-description="${i.description}"
                                                    onclick="isiModal(this)">Detail</button>
                                            </div>
                                            ${role==='employe' ? 
                                                `<div class="col-5">
                                                    <form action="/ticket/${i.id}" method="post"
                                                        onsubmit="return confirm('Are You Sure To Delete This Item?');">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-primary">Delete</button>
                                                    </form>
                                                </div>`
                                                :
                                                `<div class="col-5">
                                                    <form action="/ticket/boking/${i.id}" method="get">
                                                        <button type="submit" class="btn btn-primary">Booking</button>
                                                    </form>
                                                </div>`
                                            }
                                        </div>
                                    </td>
                                </tr>
                                `
                            )
                        });
                    }
                })
            })
        })

        function btn_delete(data){
            return
            `
            <div class="col-5">
                <form action="/ticket/${data.id}" method="post"
                    onsubmit="return confirm('Are You Sure To Delete This Item?');">
                    //  @csrf
                    //  @method('delete')
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>
            </div>
            `
        }
    </script>
@endsection
