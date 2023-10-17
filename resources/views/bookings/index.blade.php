@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <div class="container mt-3">
        <h1 class="text-center">Riwayat Boking Tiket</h1>

        <table class="table table-bordered table-hover mt-4">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Boking Id</th>
                    <th scope="col">Ticket Name</th>
                    <th scope="col">Sail Time</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bokings as $boking)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $boking->id }}</td>
                        <td>{{ $boking->ticket->name }}</td>
                        <td>{{ date('D, d M Y h:i', strtotime($boking->ticket->sail_time)) }}</td>
                        <td>{{ $boking->status }}</td>
                        <td>
                            <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#showModal"
                                @isset($boking->sail)
                                data-employe="{{ $boking->sail->employe->user->name }}"
                                @endisset
                                data-id="{{ $boking->id }}" data-ticket="{{ $boking->ticket->name }}"
                                data-status="{{ $boking->status }}"
                                data-sail="{{ date('D, d M Y h:i', strtotime($boking->ticket->sail_time)) }}"
                                data-count="{{ $boking->count }}" data-total-price="{{ $boking->total_price }}"
                                data-description="{{ $boking->ticket->description }}" onclick="isiModal(this)">
                                <i class="fa-regular fa-eye"></i> Show Detail</button>
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
                    <h5 class="modal-title" id="showModalLabel">Boking Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="boking-id" class="col-form-label">Boking Id</label>
                            <input type="text" name="boking-id" class="form-control" id="boking-id" autocomplete="off"
                                disabled>
                        </div>
                        <div class="form-group">
                            <label for="name-ticket" class="col-form-label">Ticket Name</label>
                            <input type="text" name="name" class="form-control" id="name-ticket" autocomplete="off"
                                disabled>
                        </div>
                        <div class="form-group">
                            <label for="booking-status" class="col-form-label">Status</label>
                            <input type="text" name="status" id="booking-status" class="form-control" disabled>
                        </div>
                        <div class="form-group" id="employe-data">
                            <label for="employe-handle" class="col-form-label">Employe Accept</label>
                            <input type="text" name="employe" id="employe-handle" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="ticket-sail-time" class="col-form-label">Sail Time</label>
                            <input type="text" name="sail-time" class="form-control" id="ticket-sail-time" disabled>
                        </div>
                        <div class="form-group">
                            <label for="stock-ticket" class="col-form-label">Count</label>
                            <input type="number" name="stock" class="form-control" id="stock-ticket" disabled>
                        </div>
                        <div class="form-group">
                            <label for="ticket-price" class="col-form-label">Total Price</label>
                            <input type="number" name="price" class="form-control" id="ticket-price" disabled>
                        </div>
                        <div class="form-group">
                            <label for="description-ticket" class="col-form-label">Description</label>
                            <textarea name="description" id="description-ticket"rows="6" class="col-12" disabled></textarea>
                        </div>
                    </form>
                    <div class="form-group d-flex text-center">
                            <div class="col"><a class="btn btn-primary btn-block" id="print-recipt" href="#" role="button">Print Recipt Book</a></div>
                            <div class="col" id="acc-btn"><a class="btn btn-primary btn-block" id="print-acc" href="#" role="button">Print Recipt Accept</a></div>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        const bookingId = document.querySelector('#boking-id')
        const ticketName = document.querySelector('#name-ticket')
        const bookingStatus = document.querySelector('#booking-status')
        const SailTime = document.querySelector('#ticket-sail-time')
        const bookCount = document.querySelector('#stock-ticket')
        const totalPrice = document.querySelector('#ticket-price')
        const ticketDescription = document.querySelector('#description-ticket')
        const employeHandle = document.querySelector("#employe-handle")
        const employeCol = document.querySelector("#employe-data")
        const documetAcc = document.querySelector("#acc-btn")
        const printAcc = document.querySelector("#print-acc")
        const printRecipt = document.querySelector("#print-recipt")

        function isiModal(e) {
            console.log(e)
            bookingId.value = e.getAttribute("data-id")
            ticketName.value = e.getAttribute("data-ticket")
            bookingStatus.value = e.getAttribute("data-status")
            SailTime.value = e.getAttribute("data-sail")
            bookCount.value = e.getAttribute("data-count")
            totalPrice.value = e.getAttribute("data-total-price")
            ticketDescription.value = e.getAttribute("data-description")

            printRecipt.setAttribute("href", `user-book/print/${e.getAttribute("data-id")}`)

            const employe = e.getAttribute("data-employe")
            if(employe===null){
                employeCol.hidden = true
            }else{
                employeCol.hidden = false
                employeHandle.value = employe
            }
            if(e.getAttribute("data-status")==='Accept'){
                let link = "/"
                console.log(link);
                printAcc.setAttribute("href", link)
                documetAcc.hidden = false
            }else{
                documetAcc.hidden = true
            }
            console.log(employe);
        }
    </script>
@endsection
