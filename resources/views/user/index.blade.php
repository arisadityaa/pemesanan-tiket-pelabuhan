@extends('layouts.app')

@section('content')
@include('layouts.navbar')
    <div class="container">
        <h1 class="text-center mb-5 mt-4">Detai User</h1>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-3">Nama</div>
                            <input type="text" value="{{$user->name}}" class="col-8 form-control" readonly>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">Email</div>
                            <input type="text" value="{{$user->email}}" class="col-8 form-control" readonly>
                        </div>
                    </div>
                    @if (Auth::user()->role === 'employe' || Auth::user()->id === $user->id)    
                    <div class="card-footer text-center">
                        <button class="btn btn-primary mr-5" data-toggle="modal" data-target="#EditUserModal">Edit User</button>
                        <button class="btn btn-primary ml-5" data-toggle="modal" data-target="#EditPasswordModal">Change Password</button>
                    </div>
                    @endif
                </div>
            </div>
        </div>

    </div>

    <!-- Modal Edit User -->
    <div class="modal fade" id="EditUserModal" tabindex="-1" role="dialog" aria-labelledby="EditUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditUserModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/{{$user->role}}/edit-user" method="POST">
                      @csrf
                      @method('put')
                        <input type="hidden" name="id" id="idUser" value="{{$user->id}}">
                        <div class="form-group">
                            <label for="namaUser">Edit Name</label>
                            <input type="text" name="name" value="{{$user->name}}" id="namaUser" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="emailUser">Edit Email</label>
                            <input type="email" name="email" id="emailUser" value="{{$user->email}}" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Edit User</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Password-->
    <div class="modal fade" id="EditPasswordModal" tabindex="-1" role="dialog" aria-labelledby="EditPasswordModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditPasswordModalLabel">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/{{$user->role}}/edit-password" method="POST">
                        @csrf
                        @method('put')
                      <input type="hidden" name="id" id="idUserPassword" value="{{$user->id}}">
                        <div class="form-group">
                            <label for="password">Create New Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Edit Password</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection