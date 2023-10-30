@extends('layouts.app')
@section('content')
    @include('layouts.navbar')

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-8">
                <h1>List User</h1>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employes as $employe)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $employe->name }}</td>
                                <td>{{ $employe->email }}</td>
                                <td>{{ $employe->created_at->format('D, M Y') }}</td>
                                <td class="text-center">
                                    @if (Auth::user()->id === $employe->id)
                                        {{-- <button class="btn btn-primary text-center">Edit</button> --}}
                                        <a class="btn btn-primary text-center" href="/user/{{ $employe->id }}">Edit</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">Add New Employee</div>
                    <div class="card-body">
                        <form action="/employe" method="post">
                            @csrf
                            <input type="hidden" value="employe" name="role">
                            <div class="mb-3">
                                <label for="input-name" class="form-label">Employe Name</label>
                                <input type="text" class="form-control" id="input-name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="input-email" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" id="input-email">
                            </div>
                            <div class="mb-3">
                                <label for="input-password" class="form-label">Password</label>
                                <input type="text" name="password" value="password" class="form-control"
                                    id="input-password" readonly>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Register Employe Account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
