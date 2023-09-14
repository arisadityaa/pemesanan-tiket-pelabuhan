@extends('layouts.app')
@section('content')
@include('layouts.navbar')

    <div class="container mb-5 mt-4">
        <h1>Create a new Ticket</h1>

        <div class="mt-4">
            <form action="/ticket/create" method="post">
                @csrf
                <div class="form-group">
                    <label for="name" class="col-form-label">Ticket Name</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group">
                    <label for="location" class="col-form-label">Locations</label>
                    <select class="form-control" id="location" name="location_id" required>
                        <option selected disabled value="">Select the Location Sails</option>
                        @foreach ($locations as $location)
                        <option value="{{$location->id}}">{{$location->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="stock" class="col-form-label">Stock</label>
                    <input type="number" name="stock" class="form-control" id="stock" required>
                </div>
                <div class="form-group">
                    <label for="price" class="col-form-label">Price (in Rupiah)</label>
                    <input type="number" class="form-control" name="price" id="price" required>
                </div>
                <div class="form-group">
                    <label for="sail_time" class="col-form-label">Sail Time</label>
                    <input type="datetime-local" name="sail_time" class="form-control" id="sail_time" required>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Description</label><br>
                    <textarea name="description" id="recipient-name" rows="6" class="col-12" required></textarea>
                </div>

                <div class="form-group d-flex justify-content-around">
                    <button type="submit" class="btn btn-primary">Create a new Ticket</button>
                    <a href="/ticket" class="btn btn-warning" role="button">Cancel</a>
                </div>

            </form>
        </div>

    </div>
@endsection
