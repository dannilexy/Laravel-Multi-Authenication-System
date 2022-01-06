@extends('layouts.app')
@section('content')
<div class="col-md-8 offset-md-2">
    <div class="card">
        <div class="card-header text-center">
            <h3>Author Register</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('AuthorCreate') }}" method="POST">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" placeholder="enter name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Email:</label>
                    <input type="text" name="email" placeholder="enter email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Password:</label>
                    <input type="password" name="password" placeholder="****" class="form-control">
                </div>
                {{ csrf_field() }}
                <br>
                <input type="submit" value="Register" class="btn btn-primary">
                <a href="/" class="btn btn-success">Login Here</a>
            </form>
        </div>
    </div>
</div>
@endsection
