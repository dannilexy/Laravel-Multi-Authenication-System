@extends('layouts.app')
@section('content')
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header text-center">
                <h3>Admin Login</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('AdminLogin') }}" method="POST">
                    <div class="form-group">
                        <label for="name"></label>
                        <input type="email" name="email" placeholder="email@something.com" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name"></label>
                        <input type="password" name="password" placeholder="******" class="form-control">
                    </div>
                    {{ csrf_field() }}
                    <br>
                    <input type="submit" value="Login" class="btn btn-primary">
                    <a href="/admin/register" class="btn btn-success">Register Here</a>
                </form>
            </div>
        </div>
    </div>
@endsection
