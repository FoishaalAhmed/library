

@extends('layouts.app')
@section('title', 'Support')
@section('content')
<!-- **********registration Medical test********* -->
<div class="container">
    <h2 class="text-center">Support MRSG Library</h2>
    <p style="text-align: center;">The founding premise of The Wire is this: if good library is to survive and thrive, it can only do so by being both editorially and financially independent. This means relying principally on contributions from readers and concerned citizens who have no interest other than to sustain a space for quality library.</p>

	<span id="form_output"></span>
	
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
			
            <i class="fa fa-user" style="font-size: 25px;"></i> <b style="font-size: 20px;"> Information</b> <br> <br>
        </div>
		
        <div class="col-sm-1">
            <form action="" method="post" id="support-form">
                @csrf
                <p>
                    <select style="width:100px; height: 30px; display:block;" id="curr" name="currency">
                        <option value="TK">TK</option>
                        <option value="USD">USD</option>
                        <option value="EURO">EURO</option>
                        <option value="CAD">CAD</option>
                    </select>
                </p>
        </div>
        <div class="col-sm-3">
        <input id="option" required="" value="100" style="text-align: center ;width: 100px; margin-left: 20px; border-left: none; border-right: none; border-top: none;" type="text" name="amount">
        {{-- <button style="margin-left: 10px; background-color: red; color: white;">ON-TIME</button> --}}
        </div>
        <div class="col-sm-6"> <br>
        <label for="exampleFormControlInput1"><b>First name :</b></label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Inter Your First Name" required name="first_name">
        </div>
        <div class="col-sm-6"> <br>
        <label for="exampleFormControlInput1"><b>Last name :</b></label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Inter Your Last Name" required name="last_name">
        </div>
        <div class="col-sm-6"> <br>
        <label for="exampleFormControlInput1"><b>Nationality :</b></label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Inter Your Nationality" name="nationality">
        </div>
        <div class="col-sm-6"> <br>
        <label for="exampleFormControlInput1"><b>Email Address :</b></label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Inter Your Email" name="email">
        </div>
        <div class="col-sm-6"> <br>
        <label for="exampleFormControlInput1"><b>Phone No :</b></label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Inter Your Phone no" required name="phone">
        </div>
        <div class="container"> <br>
        {{-- <div style="width: 75%;color: #535050;font-style: italic;font-size: 12px;">(Monthly and Yearly payments can be made using <b>all Visa and Mastercard credit cards and debit cards by ICICI Bank, Canara Bank, Kotak Bank, and Citibank.</b> If you wish to use any other method of payment then, please use the one-time payment option.)</div> --}}
        <button class="bot-1" type="submit">PROCEED</button>
        </div>
        </form>
    </div>
</div>
<br>
@endsection
@section('footer')
<script>
    $(function(){
    
        $.ajaxSetup({
    
            headers: {'X-CSRF-Token' : '{{csrf_token()}}'}
    
        });
    
        $('#support-form').submit(function(event) {

            event.preventDefault();
            var formData = $(this).serialize();
            var url = '{{route("send.support")}}';
    
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
                        $('#support-form')[0].reset();
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
<!-- **********registration Medical test End********* -->

