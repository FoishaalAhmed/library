

@extends('layouts.app')
@section('title', 'Administrator')
@section('content')
<!-- **********Administration********* -->
<div class="container">
    <div class="row" style="padding: 30px;">
        @if ($administrators) 
        
        @foreach ($administrators as $item)
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
        @endforeach

        @endif
        @if ($authors) 
        @foreach ($authors as $item)
            <div class="col-sm-4">
                <div class="card">
                    <img class="card-img-top" style="height: 200px;" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/oslo.jpg" alt="Bologna">
                    <div class="card-body text-center">
                        <img class="avatar " style="height: 100px; border-radius: 50%; width: 100px;" src="{{asset($item->photo)}}" alt="Bologna">
                        <h4 class="card-title"><a href="{{route('author.books', [$item->id, strtolower(str_replace(' ', '-', $item->name))])}}">{{$item->name}}</a></h4>
                        <h6 class="card-subtitle mb-2 text-muted">Date Of Birth {{date('d M, Y', strtotime($item->birth_date))}}</h6>
                        <p class="card-text">Date Of Death {{date('d M, Y', strtotime($item->death_date))}}</p>
                    </div>
                </div>
            </div>
        @endforeach
        @endif

        @if ($books) 
        @foreach ($books as $item)
            <div class="card col-sm-4" style="padding:10px">
                <div class="card-block">
                    <img class="img-27" src="{{asset($item->photo)}}">
                    <p class="card-text" style="padding: 10px;">{{$item->name}} </p>
                </div>
                <a class="modal-btn2" href="{{route('book.detail', [$item->id, strtolower(str_replace(' ', '-', $item->name))])}}">
                    Show details
                </a>
            </div>
        @endforeach
        @endif
    </div>
</div>
<!-- **********Administration End********* -->    
@endsection

