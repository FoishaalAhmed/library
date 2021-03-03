@extends('layouts.app')

@section('title', 'Books')
@section('content')
     <!-- **********Publication********* -->

    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h5 class="txt-9">Top Rating books</h5>
                <ul style="list-style-type: none;">
                    <li>
                        <input type="radio" name="rating" value="4.5" id="Rating" style="margin-top: 4px;" onclick="filterBooks()"> <span style="margin: 5px;">4.5* above</span>
                    </li>
                    <li>
                        <input type="radio" name="rating" value="4.3" id="Rating" style="margin-top: 4px;" onclick="filterBooks()"> <span style="margin: 5px;">4.3* above</span>
                    </li>
                    <li>
                        <input type="radio" name="rating" value="4" id="Rating" style="margin-top: 4px;" onclick="filterBooks()"> <span style="margin: 5px;">4* above</span>
                    </li>
                    <li>
                        <input type="radio" name="rating" value="3.5" id="Rating" style="margin-top: 4px;" onclick="filterBooks()"> <span style="margin: 5px;">3.5* above</span>
                    </li>
                    <li>
                        <input type="radio" name="rating" value="3" id="Rating" style="margin-top: 4px;" onclick="filterBooks()"> <span style="margin: 5px;">3* above</span>
                    </li>
                    <li>
                        <input type="radio" name="rating" value="2.5" id="Rating" style="margin-top: 4px;" onclick="filterBooks()"> <span style="margin: 5px;">2.5* above</span>
                    </li>
                    <li>
                        <input type="radio" name="rating" value="2" id="Rating" style="margin-top: 4px;" onclick="filterBooks()"> <span style="margin: 5px;">2* above</span>
                    </li>
                </ul>

                <h5 class="txt-10">Age</h5>
                <ul style="list-style-type: none;">
                    <li>
                        <input type="radio" name="suitable_for" value="Young (12-21)" style="margin-top: 4px;" onclick="filterBooks()"> <span style="margin: 5px;">{{__('Baby (5-12)')}}</span>
                    </li>
                    <li>
                        <input type="radio" name="suitable_for" value="Young (12-21)" style="margin-top: 4px;" onclick="filterBooks()"> <span style="margin: 5px;">{{__('Young (12-21)')}}</span>
                    </li>
                    <li>
                        <input type="radio" name="suitable_for" value="Youth (21-40)" style="margin-top: 4px;" onclick="filterBooks()"> <span style="margin: 5px;">{{__('Youth (21-40)')}}</span>
                    </li>
                    <li>
                        <input type="radio" name="suitable_for" value="Youth plus (40-100)" style="margin-top: 4px;" onclick="filterBooks()"> <span style="margin: 5px;">{{__('Youth plus (40-100)')}}</span>
                    </li>
                </ul>

                <h5 class="txt-10">Publish Year</h5>
                <ul style="list-style-type: none;">

                    @php
                        $year = date("Y");
                        $end_year = date("Y", strtotime('-10 Years'));
                    @endphp
                    @for ($i = $year; $i >= $end_year; $i--)
                    <li>
                        <input type="radio" name="publish_year" value="{{$i}}" style="margin-top: 4px;" onclick="filterBooks()"> <span style="margin: 5px;"> {{$i}} </span>
                    </li>
                    @endfor
                </ul>
                {{-- <h5 class="txt-10">Academic Books</h5>
                <select name="cars" style="width: 100%;height: 40px; margin-bottom: 20px;">
                    <option value="class">Select Your Class</option>
                    <option value="one">xi</option>
                    <option value="two">xii</option>
                    <option value="three">xii</option>
                </select> --}}

                <h5 class="txt-10"> List of Book Genres</h5>
                <select name="cars" style="width: 100%;height: 40px;margin-bottom: 20px;" onchange="filterBooks()" id="category">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach

                </select>

                <h5 class="txt-10">Authors</h5>
                <select name="cars" style="width: 100%;height: 40px;margin-bottom: 20px;" onchange="filterBooks()" id="author">
                    <option value="">Select Author</option>
                    @foreach ($authors as $author)
                        <option value="{{$author->id}}">{{$author->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-9">
                <div id="loading-message"></div>
                <span id="filter"></span>
                <div class="row" id="books">
                    @foreach ($books as $item)
                        <div class="card col-sm-3" style="padding:10px">
                            <div class="card-block">
                                <img class="img-27" src="{{asset($item->photo)}}">
                                <p class="card-text" style="padding: 10px;">{{$item->name}} </p>
                            </div>
                            <a class="modal-btn2" href="{{route('book.detail', [$item->id, strtolower(str_replace(' ', '-', $item->name))])}}">
                                Show details
                            </a>
                        </div>
                    @endforeach
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <div style="float: right">
                            {{$books->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <br>




    <!-- **********Publication End********* -->
@endsection

@section('footer')
    <script>
        function showLoadingMsg() {
            var img = '<img src="{{asset('public/images/loading.gif')}}" style="" alt= "" />'

            $('#books').html(img);
        }

        function hideLoadingMsg() {
            $('#books').remove();
        }

        function filterBooks() {

            let category     = $('#category').find(":selected").val();
            let author       = $('#author').find(":selected").val();
            let rating       = $('input[name="rating"]:checked').val();
            let suitable_for = $('input[name="suitable_for"]:checked').val();
            let publish_year = $('input[name="publish_year"]:checked').val();

            if (suitable_for == undefined) suitable_for = '';  
            if (publish_year == undefined) publish_year = '';  

            $.ajaxSetup({
    
                headers: {'X-CSRF-Token' : '{{csrf_token()}}'}
        
            });

            var url = '{{route("filter.books")}}';

            $('#books').fadeOut(5000);
    
            $.ajax({
    
                url: url,
                method: 'POST',
                data: { 'category' : category, 'author': author, 'rating': rating, 'suitable_for': suitable_for, 'publish_year': publish_year,},
    
                success: function(data){
                    //alert(data);
                    $('#filter').html(data).fadeIn(10000);
                },
    
                error: function(error) {
    
                    console.log(error);
                }
    
    
            });
        }
    </script>
@endsection