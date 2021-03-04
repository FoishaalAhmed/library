

@extends('layouts.app')
@section('title', 'Coffee Table')
@section('content')
<!-- **********Publication********* -->
<div class="container">
    <h3 style="text-align: center; padding: 15px;">Book Your Desire Table</h3>
    <span id="form_output"></span>
    <div class="row">
        <div class="col-sm-3">
            <img style="height: 300px; width: 100%;" src="{{asset('public/frontend/img/lib2.jpg')}}" alt="">
        </div>
        <div class="col-sm-9">
            <div class="row">
                <!-- The Modal -->
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <h6 style="text-align: center; padding: 10px;">Confirm Your Table</h6>
                            <div class="container" style="padding: 30px;">
                                <form action="{{route('coffee.book')}}" class="shake" role="form" method="post" id="contact-form" name="contact-form" data-toggle="validator">
                                    <!-- Name -->
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="name">Name</label>
                                        <input class="form-control" id="name" type="text" name="name" required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                        <input type="text" name="table_id" id="table_id">
                                    </div>
                                    <!-- Date -->
                                    <div class="form-group label-floating">
                                        <label for="date">Date:</label>
                                        <input type="date" name="date" required>
                                    </div>
                                    <!-- Time -->
                                    <div class="form-group label-floating">
                                        <label for="appt">Select start time: (In 24 Hours) </label>
                                        <input type="time" min="09:00" max="18:00" id="appt" name="start_time">
                                    </div>
                                    <div class="form-group label-floating">
                                        <label for="appt">Select end time: (In 24 Hours) </label>
                                        <input type="time" min="09:00" max="18:00" id="appt" name="end_time">
                                    </div>
                                    <!-- Form Submit -->
                                    <div class="form-submit mt-5">
                                        <button class="btn btn-common" type="submit" id="form-submit" style="background-color: rgb(219, 82, 58); border: 3px;color: white;"><i class="material-icons mdi mdi-message-outline"></i> Book Table</button> <br> <br>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- The Modal -->
                @foreach ($coffees as $item)
                <div class="card col-sm-3" style="padding:10px">
                    <div class="card-block">
                        <img class="img-27" src="{{asset('public/frontend/img/lib.jpg')}}">
                        <p class="card-text" style="padding: 10px; text-align: center;">{{$item->table_number}}</p>
                    </div>
                    <button class="modal-btn2" type="button" onclick="showModal({{$item->id}})"> Book Table </button>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<br>
<!-- **********Publication End********* -->
@endsection

@section('footer')
<script>

    function showModal(id) {
        $('#table_id').val(id);
        $('#myModal').modal('toggle');
    }

    $(function(){
    
        $.ajaxSetup({
    
            headers: {'X-CSRF-Token' : '{{csrf_token()}}'}
    
        });
    
        $('#contact-form').submit(function(event) {

            event.preventDefault();
    
            var formData = $(this).serialize();
    
            var url = '{{route("coffee.book")}}';
    
            $.ajax({
    
                url: url,
                method: 'POST',
                data: formData,
                dataType: 'json',
    
                success: function(data){
                    //alert(data);
    
                    if (data.error.length > 0) {
    
                        var error_html = '';
    
                        for(var count = 0; count < data.error.length; count++)
                        {
                            error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
                        }
    
                        $('#form_output').html(error_html);  

                    } else {
    
                        $('#form_output').html(data.success);
                        $('#contact-form')[0].reset();
                    }
                    
                },
    
                error: function(error) {
    
                    console.log(error);
                }
    
    
            });
    
    
    });
    
    });
    
        
    
        
</script>
@endsection