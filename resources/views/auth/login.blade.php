@extends('layouts.app')
@section('content')
    <div class="py-5 mb-5">

        <div class="container">
            <h1 class="text-center">Login Account</h1>
        </div>

        <div class="container mt-5">
            <div class="row d-flex justify-content-center">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="/login" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="input-email" class="form-label">Email address</label>
                                    <input type="email" name="email" class="form-control" id="input-email" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="input-password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="input-password">
                                </div>
                                <div class="mb-1 form-check">
                                    <input type="checkbox" class="form-check-input" id="visibility" onclick="showPassword()">
                                    <label class="form-check-label" for="visibility">Show Password</label>
                                </div>
                                <div class="text-center mb-4">
                                    <span>Not have account? <a href="/register">Register now!</a></span>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
@endsection

@section('js')
<script>
    function showPassword(){
        let visibility = document.getElementById("input-password");
        visibility.type = visibility.type === 'password' ? 'text' : 'password';
    }
</script>
@endsection
