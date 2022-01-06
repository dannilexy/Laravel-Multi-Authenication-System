@extends('layouts.app')
@section('content')
<div class="col-md-8 offset-md-2">
    <div class="card">
        <div class="card-header text-center">
            <h3>User Dashboard</h3>
        </div>
        <div class="card-body">
            {{ Auth::user()->name }}
        </div>
    </div>
</div>
@endsection
