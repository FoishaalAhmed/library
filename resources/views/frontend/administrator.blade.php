

@extends('layouts.app')
@section('title', 'Administrator')
@section('content')
<!-- **********Administration********* -->
<div class="container">
    <div class="row" style="padding: 30px;">
        @foreach ($administrators as $item)
            @if ($loop->odd)
                <div class="col-sm-4">
                    <div class="card">
                        <img class="card-img-top" style="height: 200px;" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/oslo.jpg" alt="Bologna">
                        <div class="card-body text-center">
                            <img class="avatar " style="height: 100px; border-radius: 50%; width: 100px;" src="{{asset($item->photo)}}" alt="Bologna">
                            <h4 class="card-title">{{$item->name}}</h4>
                            <h6 class="card-subtitle mb-2 text-muted">{{$item->position}}</h6>
                            <p class="card-text">{{$item->company}}</p>
                            <a href="https://{{$item->facebook}}" target="_blank" class="btn btn-outline-info"><i class="fa fa-facebook"></i></a>
                            <a href="https://{{$item->twitter}}" target="_blank" class="btn btn-outline-info"><i class="fa fa-twitter"></i></a>
                            <a href="https://{{$item->linkedin}}" target="_blank" class="btn btn-outline-info"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <p> {!! $item->bio !!} </p>
                </div>
            @else
               
                <div class="col-sm-8">
                    <p> {!! $item->bio !!} </p>
                </div> 

                <div class="col-sm-4">
                    <div class="card">
                        <img class="card-img-top" style="height: 200px;" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/oslo.jpg" alt="Bologna">
                        <div class="card-body text-center">
                            <img class="avatar " style="height: 100px; border-radius: 50%; width: 100px;" src="{{asset($item->photo)}}" alt="Bologna">
                            <h4 class="card-title">{{$item->name}}</h4>
                            <h6 class="card-subtitle mb-2 text-muted">{{$item->position}}</h6>
                            <p class="card-text">{{$item->company}}</p>
                            <a href="https://{{$item->facebook}}" target="_blank" class="btn btn-outline-info"><i class="fa fa-facebook"></i></a>
                            <a href="https://{{$item->twitter}}" target="_blank" class="btn btn-outline-info"><i class="fa fa-twitter"></i></a>
                            <a href="https://{{$item->linkedin}}" target="_blank" class="btn btn-outline-info"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        <div class="col-md-8"></div>
            <div class="col-md-4">
                <div style="float: right">
                    {{$administrators->links()}}
                </div>
            </div>
    </div>
</div>
<!-- **********Administration End********* -->    
@endsection

