@extends('layouts.app')
@section('title', 'User Dashboard')
@section('content')

      <!-- **********user-profile-1********* -->

  <div class="container">
    <h3 class="txt-3">USER PROFILE</h3>
      <div class="row">   
        <div class="col-sm-2">
            @include('frontend.user.sidebar')
        </div>
        <div class="col-sm-10">
            <h6 class="txt-4">Personal Information</h6>
            <div class="row">
                <div class="col-sm-2">
                    <img class="img-5 img-center" src="{{asset($user->photo)}}" alt="profile photo"> <br>
                </div>
                <div class="col-sm-10">

                    <div class="container" style="overflow-x:auto;">
                        <table class="table">
                            <tbody>
                              <tr>
                                  <td >Account</td>
                                  <td >: {{auth()->user()->created_at->toFormattedDateString()}} ( {{auth()->user()->created_at->diffForHumans()}})</td>  
                              </tr>
                              <tr>
                                  <td >Name</td>
                                  <td >: {{$user->name}} </td>  
                              </tr>
  
                              <tr>
                                  <td >Email Address</td>
                                  <td >: {{$user->email}} </td>  
                              </tr>
                              <tr>
                                  <td >Phone</td>
                                  <td >: {{$user->phone}} </td>  
                              </tr>
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
            <h6 class="txt-4">Address Information</h6>

            <div class="row">
                <div class="col-sm-2">
                    <img class="img-5 img-center" src="img/au-1.jpg" alt="au-1"> <br>
                </div>
                <div class="col-sm-10">

                    <div class="container" style="overflow-x:auto;">
                        <table class="table">
                            <tbody>
                              <tr>
                                  <td >Address</td>
                                  <td >: {{$user->address}} </td>  
                              </tr>
                            </tbody>
                          </table>
                          <a href="{{route('user.profile')}}" class="btn btn-sm btn-primary" style="float: right"> Edit </a>
                    </div>
                </div>
            </div>
        </div>
      </div>
  </div>
  <!-- **********user-profile-1 End********* -->

@endsection