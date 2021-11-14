@extends('layouts.layout')

@section('content')
    <div class="container">
        <div id="login">
            <fieldset>
                <legend>Login</legend>
                <form action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="form-group">
                         <div class="label">Email</div>
                        <input type="email" name="email" id="" placeholder="something@gmail.com" required>
                    </div>
                    <div class="form-group">
                        <div class="label">Password</div>
                        <input type="password" name="password" id="" placeholder="********" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Login">
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
@endsection