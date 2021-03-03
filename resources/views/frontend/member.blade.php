

@extends('layouts.app')
@section('title', 'Top Members')
@section('content')
<!-- **********Administration********* -->
<div class="container">
    <div class="row" style="padding: 30px;">
        @foreach ($members as $item)
                <div class="col-sm-4">
                    <div class="card">
                        <img class="card-img-top" style="height: 200px;" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/oslo.jpg" alt="Bologna">
                        <div class="card-body text-center">
                            <img class="avatar " style="height: 100px; border-radius: 50%; width: 100px;" src="{{asset($item->photo)}}" alt="Bologna">
                            <h4 class="card-title">{{$item->name}}</h4>
                            <h6 class="card-subtitle mb-2 text-muted">Total Book: {{$item->total_quantity}} </h6>
                        </div>
                    </div>
                </div>
        @endforeach
        <div class="col-md-8"></div>
            <div class="col-md-4">
                <div style="float: right">
                    {{$members->links()}}
                </div>
            </div>
    </div>
</div>
<!-- **********Administration End********* -->    
@endsection

