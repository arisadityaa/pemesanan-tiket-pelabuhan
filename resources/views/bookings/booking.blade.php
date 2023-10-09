@extends('layouts.app')

@section('content')
@include('layouts.navbar')
    <div class="container mb-5 mt-4">
        <h1>Boking Pemesanan</h1>

        <div class="row">
            <div class="col-lg-8">
                <h3 class="text-secondary">Detail Tiket</h3>
                <form>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="stock" class="col-form-label">Stock</label>
                                <input type="text" value="{{$boking->stock}}" class="form-control" id="stock" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="price" class="col-form-label">Price</label>
                                <input type="text" value="{{$boking->price}}" class="form-control" id="price" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Locations</label>
                                <input type="text" value="{{$boking->location->name}}" class="form-control" id="recipient-name" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Sail Time</label>
                                <input type="text" value="{{date('D, d M Y h:i', strtotime($boking->sail_time))}}" class="form-control" id="recipient-name" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Description</label><br>
                        <textarea name="" id="recipient-name" class="col-12" rows="6" disabled>{{$boking->description}}</textarea>
                    </div>
                </form>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        Konfirmasi Pembelian
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Ticket Name</label>
                                <input type="text" value="{{$boking->name}}" class="form-control" id="recipient-name" disabled>
                            </div>
                            <div class="form-group">
                                <label for="total-price" class="col-form-label d-flex justify-content-center">Harga</label>
                                <input type="number" id="total-price" value="{{$boking->price}}" class="form-control" disabled>
                            </div>
                            <div class="form-group text-center">
                                <label for="count-ticket">Jumlah Tiket</label><br>
                                <div class="row justify-content-center">
                                    <input class="btn btn-primary" type="button" onclick="decreaseBtn()" id="minBtn"
                                        value="-">
                                    <input type="text" id="count-ticket" value="1"
                                        class="mr-1 ml-1 form-control col-2 text-center" disabled>
                                    <input class="btn btn-primary" type="button" onclick="addingBtn()" id="addBtn"
                                        value="+">
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-around">
                                <button class="btn btn-primary" type="submit">Pesan Sekarang</button>
                                <a class="btn btn-warning" href="/" role="button">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('js')
    <script>
        const count = document.getElementById('count-ticket');
        const stock = document.getElementById('stock').value;
        const price = document.getElementById('price');
        const totalPrice = document.getElementById('total-price');

        function addingBtn() {
            let getCount = parseInt(count.value)
            if (getCount < stock) {
                let setCount = getCount + 1
                count.value = setCount
                changePrice(setCount)
            } else {
                alert("Ticket book over the limit stock");
            }
        }

        function decreaseBtn() {
            let getCount = parseInt(count.value)
            if (getCount > 1) {
                let setCount = getCount - 1
                count.value = setCount
                changePrice(setCount)
            } else {
                alert("Ticket book not be 0");
            }
        }

        function changePrice(count) {
            let getPrice = parseInt(price.value)
            let setPrice = getPrice * count
            totalPrice.value = setPrice
        }
    </script>
@endsection
