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
                        <input type="checkbox" name="Rating" id="Rating" style="margin-top: 4px;"> <span style="margin: 5px;">4.5* above</span>
                    </li>
                    <li>
                        <input type="checkbox" name="Rating" id="Rating" style="margin-top: 4px;"> <span style="margin: 5px;">4.5* above</span>
                    </li>
                    <li>
                        <input type="checkbox" name="Rating" id="Rating" style="margin-top: 4px;"> <span style="margin: 5px;">4.5* above</span>
                    </li>
                    <li>
                        <input type="checkbox" name="Rating" id="Rating" style="margin-top: 4px;"> <span style="margin: 5px;">4.5* above</span>
                    </li>
                    <li>
                        <input type="checkbox" name="Rating" id="Rating" style="margin-top: 4px;"> <span style="margin: 5px;">4.5* above</span>
                    </li>
                    <li>
                        <input type="checkbox" name="Rating" id="Rating" style="margin-top: 4px;"> <span style="margin: 5px;">4.5* above</span>
                    </li>
                </ul>

                <h5 class="txt-10">Age</h5>
                <ul style="list-style-type: none;">
                    <li>
                        <input type="checkbox" name="Rating" id="Rating" style="margin-top: 4px;"> <span style="margin: 5px;">Baby ( 5-12 )</span>
                    </li>
                    <li>
                        <input type="checkbox" name="Rating" id="Rating" style="margin-top: 4px;"> <span style="margin: 5px;">Baby ( 5-12 )</span>
                    </li>
                    <li>
                        <input type="checkbox" name="Rating" id="Rating" style="margin-top: 4px;"> <span style="margin: 5px;">Baby ( 5-12 )</span>
                    </li>
                    <li>
                        <input type="checkbox" name="Rating" id="Rating" style="margin-top: 4px;"> <span style="margin: 5px;">Baby ( 5-12 )</span>
                    </li>
                </ul>

                <h5 class="txt-10">New Publication</h5>
                <ul style="list-style-type: none;">
                    <li>
                        <input type="checkbox" name="Rating" id="Rating" style="margin-top: 4px;"> <span style="margin: 5px;">2021 ( 21 )</span>
                    </li>
                    <li>
                        <input type="checkbox" name="Rating" id="Rating" style="margin-top: 4px;"> <span style="margin: 5px;">2021 ( 21 )</span>
                    </li>
                    <li>
                        <input type="checkbox" name="Rating" id="Rating" style="margin-top: 4px;"> <span style="margin: 5px;">2021 ( 21 )</span>
                    </li>
                    <li>
                        <input type="checkbox" name="Rating" id="Rating" style="margin-top: 4px;"> <span style="margin: 5px;">2021 ( 21 )</span>
                    </li>

                </ul>
                <h5 class="txt-10">Academic Books</h5>
                <select name="cars" style="width: 100%;height: 40px; margin-bottom: 20px;">
                    <option value="class">Select Your Class</option>
                    <option value="one">xi</option>
                    <option value="two">xii</option>
                    <option value="three">xii</option>
                </select>

                <h5 class="txt-10"> List of Book Genres</h5>
                <select name="cars" style="width: 100%;height: 40px;margin-bottom: 20px;">
                    <option value="class">Select Your Class</option>
                    <option value="one">xi</option>
                    <option value="two">xii</option>
                    <option value="three">xii</option>
                </select>

                <h5 class="txt-10">Authors</h5>
                <select name="cars" style="width: 100%;height: 40px;margin-bottom: 20px;">
                    <option value="class">Select Your Class</option>
                    <option value="one">xi</option>
                    <option value="two">xii</option>
                    <option value="three">xii</option>
                </select>
            </div>
            <div class="col-sm-9">
                <div class="row">
                    @foreach ($books as $item)
                    <div class="card col-sm-3" style="padding:10px">
                        <div class="card-block">
                            <img class="img-27" src="{{asset($item->photo)}}">
                            <p class="card-text" style="padding: 10px;">{{$item->name}} </p>
                        </div>
                        <a class="modal-btn2" href="">
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