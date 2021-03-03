

@extends('layouts.app')
@section('title', 'Notice Detail')
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
            <img style="height:300px; width: 100%;" src="{{asset($notice->document)}}" alt="book">
        </div>
        <div class="col-sm-9">
            <h6>Date: <b>{{date('d M, Y', strtotime($notice->date))}}</b></h6>
            <h5 style="padding-top: 10px;">Title: <b>{{$notice->title}}</b></h5>
            
            <p>Description: {!! $notice->description !!}</p>
           
        </div>
    </div>
</div>
<!-- **********Book Details End********* -->
@endsection

