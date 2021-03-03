@extends('layouts.app')
@section('title', 'User Profile')
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
            @include('includes.error')
            <div class="row">
                <div class="col-sm-3">
                    <form action="{{route('profile')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <img class="img-5 img-center" src="{{asset($user->photo)}}" alt="profile photo" id="user_photo"> <br>
                    <input type="file" name="photo" onchange="readPicture(this);">
                    <br>
                    <center>
                        <br>
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </center>
                    </form>
                </div>
                <div class="col-sm-9">

                    <div class="container" style="overflow-x:auto;">
                        <table class="table">
                            <tbody>
                                <form action="{{route('profile.update')}}" class="form-horizontal" method="POST">
                                    @csrf
                                <tr>
                                    <td >Name</td>
                                    <td >: <input type="text" name="name" value="{{$user->name}}" required> </td>  
                                </tr>
    
                                <tr>
                                    <td >Email Address</td>
                                    <td >: <input type="email" name="email" value="{{$user->email}}" required> </td>  
                                </tr>
                                <tr>
                                    <td >Phone</td>
                                    <td >: <input type="text" name="phone" value="{{$user->phone}}"> </td>  
                                </tr>
                                <tr>
                                    <td >Address</td>
                                    <td >: <input type="text" name="address" id="address" value="{{$user->address}}"> </td>  
                                </tr>
                                <br>
                                <tr>
                                    <td></td>
                                    <td><button type="submit" class="btn btn-sm btn-primary">Submit</button></td>
                                </tr>
                                
                                </form>
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
            <h6 class="txt-4">Password Information</h6>

            <div class="row">
                <div class="col-sm-3">
                    {{-- <img class="img-5 img-center" src="img/au-1.jpg" alt="au-1"> <br> --}}
                </div>
                <div class="col-sm-9">

                    <div class="container" style="overflow-x:auto;">
                        <table class="table">
                            <tbody>
                                <form action="{{route('password.change')}}" method="POST" class="form-horizontal">
                                @csrf
                                    <tr>
                                        <td >Old Password</td>
                                        <td >: <input type="password" name="old_password" placeholder="Old Password"> </td>  
                                    </tr>
                                    <tr>
                                        <td >New Password</td>
                                        <td >: <input type="password" name="new_password" placeholder="New Password"> </td>  
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><button type="submit" class="btn btn-sm btn-primary">Submit</button></td>
                                    </tr>
                                </form>
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
      </div>
  </div>
  <!-- **********user-profile-1 End********* -->

@endsection

@section('footer')
    <script>
    // profile picture change
    function readPicture(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function (e) {
                $('#user_photo')
                .attr('src', e.target.result)
                .width(100)
                .height(100);
            };
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    
</script>
@endsection