

@extends('layouts.app')
@section('title', 'Contact')
@section('content')
<!-- **********Contact-us********* -->
<section class="Material-contact-section section-padding section-dark">
    <div class="container">
        <br> <br>
        <h2 class="text-center">Contact Us</h2>
        <br>
        <div class="row">
            <!-- Section Titile -->
            <div class="col-sm-6">
                <br>
                <div style="width:100%;height:400px;">
                    {!! $contact->map !!}
                </div>
                <br>
                <div class="find-widget">
                    Company: <a href="{{URL::to('/')}}">{{$contact->name}}</a>
                </div>
                <div class="find-widget">
                    Address: <a href="#"><?php echo strip_tags($contact->address); ?></a>
                </div>
                <div class="find-widget">
                    Phone: <a href="#">{{$contact->phone}}</a>
                </div>
                <div class="find-widget">
                    Phone: <a href="#">{{$contact->mobile}}</a>
                </div>
            </div>
            <!-- contact form -->
            <div class="col-md-6 wow animated fadeInRight" data-wow-delay=".2s">
                <span id="form_output"></span>
                <form class="shake" role="form" action="{{route('send.query')}}" method="POST" id="contact-form" name="contact-form" data-toggle="validator">
                    <!-- Name -->
                    <div class="form-group label-floating">
                        <label class="control-label" for="name">Name</label>
                        <input class="form-control" id="name" type="text" name="name" required
                            data-error="Please enter your name">
                        <div class="help-block with-errors"></div>
                    </div>
                    <!-- email -->
                    <div class="form-group label-floating">
                        <label class="control-label" for="email">Email</label>
                        <input class="form-control" id="email" type="email" name="email"
                            data-error="Please enter your Email">
                        <div class="help-block with-errors"></div>
                    </div>
                    <!-- phone -->
                    <div class="form-group label-floating">
                        <label class="control-label" for="phone">Phone Number</label>
                        <input class="form-control" id="phone" type="text" name="phone" required
                            data-error="Please enter your Phone Number">
                        <div class="help-block with-errors"></div>
                    </div>
                    <!-- Subject -->
                    <div class="form-group label-floating">
                        <label class="control-label">Subject</label>
                        <input class="form-control" id="msg_subject" type="text" name="subject" required
                            data-error="Please enter your message subject">
                        <div class="help-block with-errors"></div>
                    </div>
                    <!-- Message -->
                    <div class="form-group label-floating">
                        <label for="message" class="control-label">Message</label>
                        <textarea class="form-control" rows="3" id="message" name="message" required
                            data-error="Write your message"></textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                    <!-- Form Submit -->
                    <div class="form-submit mt-5">
                        <button class="btn btn-common" type="submit" id="form-submit"
                            style="background-color: rgb(219, 82, 58); border: 3px;color: white;"><i
                            class="material-icons mdi mdi-message-outline"></i> Send Message</button> <br> <br>
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br> <br>
</section>
<!-- **********Contact-us End********* -->
@endsection
@section('footer')
<script>
    $(function(){
    
        $.ajaxSetup({
    
            headers: {'X-CSRF-Token' : '{{csrf_token()}}'}
    
        });
    
        $('#contact-form').submit(function(event) {
    
    
            event.preventDefault();
    
            var formData = $(this).serialize();
    
            var url = '{{route("send.query")}}';
    
    
    
            $.ajax({
    
                url: url,
                method: 'POST',
                data: formData,
                dataType: 'json',
    
                success: function(data){
    
    
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

