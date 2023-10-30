@extends('layouts.app')

@section('content')
    @include('layouts.navbar')

    <div class="container mb-5 mt-5">
        <h1>List Lokasi</h1>
    </div>

    <div class="container mb-3">
        <!-- Button trigger modal -->
        @can('employe')
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Create Locations</button>
        @endcan
        @if ($errors->any())
            @php
                flash()->addError('There was an error in your data.', 'Error Location');
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
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="col-2">No</th>
                    <th class="col-8">Lokasi</th>
                    @can('employe')
                        <th class="col-2">Action</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($locations as $location)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $location->name }}</td>
                        @can('employe')
                            <td>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" id="editModalBtn"
                                            data-target="#editModal" data-id="{{ $location->id }}"
                                            data-name="{{ $location->name }}" onclick="isiModal(this)">Edit</button>
                                    </div>
                                    <div class="col-lg-4">
                                        <form action="/location/{{ $location->id }}" method="post"
                                            onsubmit="return confirm('Are You Sure To Delete This Item?');">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-primary">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add Location Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Add Locations</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/location" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="col-form-label">Locations Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary">Add Locations</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Location Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Locations</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/location" method="POST">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" id="id-location">
                        <div class="form-group">
                            <label for="nameEdit" class="col-form-label">Locations Name</label>
                            <input type="text" name="name" class="form-control" id="name-edit" required>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary">Edit Locations</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        const nameId = document.querySelector('#name-edit')
        const locationId = document.querySelector('#id-location')

        function isiModal(e) {
            console.log(e);
            nameId.value = e.getAttribute("data-name");
            locationId.value = e.getAttribute("data-id");
        }
    </script>
@endsection
