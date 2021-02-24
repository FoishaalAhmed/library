

@extends('layouts.app')
@section('title', 'Registration')
@section('content')
<!-- **********registration********* -->
<div style="background-color: #0CB8B6;">
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6 ">
                <br> <br>
                <h2 style="text-align: center;">Sign Up</h2>
                <br>
                <div class="m" style="height: 610px !important">
                    @include('includes.error')
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group" >  
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{old('name')}}">
                            <label style="margin-top: 15px;" for="phone">Phone No:</label>
                            <input type="text" class="form-control" id="phone" placeholder="Enter phone no" name="phone" value="{{old('phone')}}">

                            <label style="margin-top: 15px;" for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{old('email')}}">

                            <label style="margin-top: 15px;" for="password">Password:</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">

                            <label style="margin-top: 15px;" for="password">Confirm Password:</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter Password Again" name="password_confirmation">
                        </div>
                        <button type="submit" 
                            class="btn  btn-default"
                            style="background-color: rgb(202, 95, 76); border: 2px solid white; color: white;">
                        Sign Up
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-sm-1 triangle-right" style="margin-top: 355px !important"></div>
            <div class="col-sm-3"></div>
        </div>
    </div>
    <br> <br>
</div>
<!-- **********registration End********* -->
@endsection

