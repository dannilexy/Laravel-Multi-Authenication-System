@extends('layouts.app')
@section('content')
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header text-center">
                <h3>Author Login</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('AuthorLogin') }}" method="POST">
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" name="email" placeholder="enter email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Password:</label>
                        <input type="password" name="password" placeholder="******" class="form-control">
                    </div>
                    <br>
                    {{ csrf_field() }}
                    <input type="submit" value="Login" class="btn btn-primary">
                    <a href="/author/register" class="btn btn-success">Register Here</a>
                </form>
            </div>
        </div>
    </div>
@endsection
