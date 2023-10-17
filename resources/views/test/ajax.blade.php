@extends('layouts.app')
@section('content')
@include('layouts.navbar')
<div class="container mt-5">
    <button class="btn btn-primary" type="button" id="btn_ajax" >Show Data</button>

    <div id="data-ajax">
        <h1 class="text-center">No Data Found</h1>
    </div>
</div>
@endsection

@section('js')

    
@endsection