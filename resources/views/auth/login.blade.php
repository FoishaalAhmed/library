

@extends('layouts.app')
@section('title', 'Login')
@section('content')
<!-- **********registration********* -->
<div style="background-color: #0CB8B6;">
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6 ">
                <br> <br>
                <h2 style="text-align: center;">LOGIN</h2>
                <br>
                <div class="m" style="height: 415px !important">
                    @include('includes.error')
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group"> <br> <br>
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me</label>
                        </div>
                        <button type="submit" 
                            class="btn  btn-default"
                            style="background-color: rgb(202, 95, 76); border: 2px solid white; color: white;">
                        Login
                        </button>
                        <button type="button"  class="btn  btn-default" style="background-color: rgb(202, 95, 76); border: 2px solid white; color: white;">
                        <a style="text-decoration: none; color: white;" href="{{route('register')}}">Sign Up</a>
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-sm-1 triangle-right" style="margin-top: 285px !important"></div>
            <div class="col-sm-3"></div>
        </div>
    </div>
    <br> <br>
</div>
<!-- **********registration End********* -->
@endsection

