

@extends('layouts.app')
@section('title', 'Book Rating')
@section('header')
<style>
    .rate {
    float: left;
    height: 46px;
    padding: 0 10px;
    }
    .rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
    }
    .rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
    }
    .rate:not(:checked) > label:before {
    content: '★ ';
    }
    .rate > input:checked ~ label {
    color: #ffc700;    
    }
    .rate:not(:checked) > label:hover,
    .rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
    }
    .rate > input:checked + label:hover,
    .rate > input:checked + label:hover ~ label,
    .rate > input:checked ~ label:hover,
    .rate > input:checked ~ label:hover ~ label,
    .rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
    }
</style>
@endsection
@section('content')
<div class="container"
    style="background-color: #f4f4f4; padding-top: 10px; padding-left: 0px; padding-right: 0px; padding-bottom: 100px; ">
    <div class="row">
        @include('frontend.user.sidebar')
        <div class="col-md-10" style="padding-left: 40px;" >
            <div class="row" style="padding-right: 15px;" >
                <div class="col-md-12">
                    <span id="return-message" style="color:green"></span>
                </div>
            </div>
            <hr style=" border: 2px solid black; margin-bottom: 5px; " >
            <div class="row">
                <div class="col-md-12" style=" padding-right: 0px; " >
                    <table class="table">
                        <tr>
                            <td> Name: {{$book->name}} </td>
                        
                            <td> 
                                {{-- onclick="givebookRating();" --}}
                                <div class="rate">
                                    <input type="radio" id="star5" name="book_rating" value="5" />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="book_rating" value="4" />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="book_rating" value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="book_rating" value="2" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="book_rating" value="1" />
                                    <label for="star1" title="text">1 star</label>
                                </div> 
                            </td>
                            <td>Rate this book</td>
                        </tr>
                    </table>
                </div>
            </div>
            <hr style=" border: 1px solid black; margin-bottom: 5px;margin-top: 5px; " >
        </div>
    </div>
</div>
@endsection

@section('footer')
    <script>

        $(document).ready(function(){

            $("input[name='book_rating']").click(function(){

                let rating   = $(this).val();
                let user_id  = '{{auth()->user()->id}}';
                let book_id  = '{{$book->id}}';


                let url = "{{route('give.rating')}}";

                $.ajaxSetup({

                    headers: {'X-CSRF-Token' : '{{csrf_token()}}'}

                });

                $.ajax({

                    url: url,
                    method: 'POST',
                    data: { 'rating' : rating, 'user_id': user_id, 'book_id': book_id,},

                    success: function(data){

                        $('#return-message').text(data);
                        
                    },

                    error: function(error) {

                        console.log(error);
                    }


                });
               

            });
        });
    </script>
@endsection

