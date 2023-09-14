@extends('layouts.app')

@section('content')
    <div class="py-5 mb-5">
        <div class="container">
            <h1 class="text-center">Register Account</h1>
        </div>

        <div class="container mt-5">
            <div class="row d-flex justify-content-center">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <span>Check your error!</span>
                                    <ol>
                                        @foreach ($errors->all() as $error)
                                            <li value="{{$loop->iteration}}">{{ $error }}</li>
                                        @endforeach
                                    </ol>
                                </div>
                            @endif
                            <form action="/register" method="POST">
                                @csrf
                                <input type="hidden" value="member" name="role">
                                <div class="mb-3">
                                    <label for="input-name" class="form-label">Your Name</label>
                                    <input type="text" class="form-control" id="input-name" name="name">
                                </div>
                                <div class="mb-3">
                                    <label for="input-email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="email" id="input-email"
                                        aria-describedby="emailHelp">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                        anyone else.</small>
                                </div>
                                <div class="mb-3">
                                    <label for="input-password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="input-password">
                                </div>
                                <div class="mb-3">
                                    <label for="reinput-password" class="form-label">Retype Password</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        id="reinput-password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Register Your Account</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
