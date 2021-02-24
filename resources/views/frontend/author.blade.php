

@extends('layouts.app')
@section('title', 'Author')
@section('content')
<!-- **********Administration********* -->
<div class="container">
    <div class="row" style="padding: 30px;">
        @foreach ($authors as $item)
            @if ($loop->odd)
                <div class="col-sm-4">
                    <div class="card">
                        <img class="card-img-top" style="height: 200px;" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/oslo.jpg" alt="Bologna">
                        <div class="card-body text-center">
                            <img class="avatar " style="height: 100px; border-radius: 50%; width: 100px;" src="{{asset($item->photo)}}" alt="Bologna">
                            <h4 class="card-title">{{$item->name}}</h4>
                            <h6 class="card-subtitle mb-2 text-muted">Date Of Birth {{date('d M, Y', strtotime($item->birth_date))}}</h6>
                            <p class="card-text">Date Of Death {{date('d M, Y', strtotime($item->death_date))}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <p> {!! $item->biography !!} </p>
                </div>
            @else
               
                <div class="col-sm-8">
                    <p> {!! $item->biography !!} </p>
                </div> 

                <div class="col-sm-4">
                    <div class="card">
                        <img class="card-img-top" style="height: 200px;" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/oslo.jpg" alt="Bologna">
                        <div class="card-body text-center">
                            <img class="avatar " style="height: 100px; border-radius: 50%; width: 100px;" src="{{asset($item->photo)}}" alt="Bologna">
                            <h4 class="card-title">{{$item->name}}</h4>
                            <h6 class="card-subtitle mb-2 text-muted">Date Of Birth {{date('d M, Y', strtotime($item->birth_date))}}</h6>
                            <p class="card-text">Date Of Death {{date('d M, Y', strtotime($item->death_date))}}</p>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        <div class="col-md-8"></div>
            <div class="col-md-4">
                <div style="float: right">
                    {{$authors->links()}}
                </div>
            </div>
    </div>
</div>
<!-- **********Administration End********* -->    
@endsection

