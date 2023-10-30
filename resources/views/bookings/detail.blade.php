{{-- belum/gak dipakek --}}

@extends('layouts.app')
@section('content')
    @include('layouts.navbar')

    <div class="container mb-5 mt-4">
        <div class="col-lg-10">
            <h3 class="text-primary">Detail Boking</h3>

            <div class="row">
                @php
                    $stat = false;
                @endphp
                <div class="col-4">
                    <h5 class="text-muted">Status : Pending</h5>
                    @if ($stat === false)
                        <form action="#" method="post">
                            <button type="submit" class="btn btn-primary">Cancel Book</button>
                        </form>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="stock" class="col-form-label">Stock</label>
                        <input type="text" value="3" class="form-control" id="stock" disabled>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="price" class="col-form-label">Price</label>
                        <input type="text" value="12000" class="form-control" id="price" disabled>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Locations</label>
                        <input type="text" value="lorem" class="form-control" id="recipient-name" disabled>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Sail Time</label>
                        <input type="text" value="lorem" class="form-control" id="recipient-name" disabled>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Description</label><br>
                <textarea name="" id="recipient-name" class="col-12" rows="6" disabled>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Soluta possimus est non quis, numquam libero nobis, delectus labore eos et, harum expedita nemo voluptas? Recusandae vitae reiciendis quas quibusdam nam.</textarea>
            </div>

        </div>
    </div>
@endsection
