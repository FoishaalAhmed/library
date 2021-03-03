

@extends('layouts.app')
@section('title', 'Book Detail')
@section('content')
<!-- **********Book Details********* -->
<div class="container" style="padding: 20px;">
    @include('includes.error')

    <?php if (session()->has('message')) { ?>
        <div class="alert alert-success">
        <strong>{{session('message')}}</strong>
        </div>
    <?php } ?>


    <div class="row">
        <div class="col-sm-3">
            <img style="height:300px; width: 100%;" src="{{asset($book->photo)}}" alt="book">
        </div>
        <div class="col-sm-9">
            <h5 style="padding-top: 10px;">Book name: <b>{{$book->name}}</b></h5>
            <h6>Author: {{$book->author}}</h6>
            <h6>Category: {{$book->category}}</h6>
            <h6>Suitable For: {{$book->suitable_for}}</h6>
            <h6>Publish Year: {{$book->publish_year}}</h6>
            {{-- 
            <p>Description: Lorem ipsum, dolor sit amet consectetur adipisicing elit. Distinctio sit minima pariatur exercitationem autem doloremque laboriosam expedita esse ullam. Quae placeat sit omnis similique asperiores dolore id veniam iste dolorem?</p>
            --}}
            {{-- 
            <p>Price: <span style="color: rgb(50, 205, 71);"> <span style="font-size: 20px;">৳</span>720</span></p>
            --}}
            <div class='rating-widget'>
                <div class='rating-stars'>
                    <ul id='stars'>
                        <li class='star' title='1' data-value='1'>
                            <i class='fa fa-star fa-fw'></i>
                        </li>
                        <li class='star' title='2' data-value='2'>
                            <i class='fa fa-star fa-fw'></i>
                        </li>
                        <li class='star' title='3' data-value='3'>
                            <i class='fa fa-star fa-fw'></i>
                        </li>
                        <li class='star' title='4' data-value='4'>
                            <i class='fa fa-star fa-fw'></i>
                        </li>
                        <li class='star' title='5' data-value='5'>
                            <i class='fa fa-star fa-fw'></i>
                        </li>
                    </ul>
                </div>
            </div>
            <button class="bot-1" data-toggle="modal" data-target="#myModal">Borrow BOOK</button>
            <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Book Borrow</h4>
                            
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="{{route('book.borrow')}}" method="post" class="form-horizontal">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label> From </label>
                                            <input type="date" name="from" class="form-control" placeholder="Book Borrow From" required>   

                                            <input type="hidden" name="book" value="{{$book->id}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label> To </label>
                                            <input type="date" name="to" class="form-control" placeholder="Book Borrow To" required>   
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label> Quantity </label>
                                            <input type="number" name="quantity" class="form-control" placeholder="Quantity" required value="1">   
                                        </div>
                                    </div>
                                    <center>
                                        <button type="submit" class="btn btn-sm btn-primary">Borrow</button>
                                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                                    </center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- **********Book Details End********* -->
@endsection

