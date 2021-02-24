

@extends('backend.layouts.app')
@section('title', 'Query Show')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            {{__('Dashboard')}} 
            <small>Version 2.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('queries.index')}}"><i class="fa fa-group"></i> {{__('Queries')}}</a></li>
            <li class="active">{{__('Query Show')}}</li>
        </ol>
    </section>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Content Header (Query header) -->
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('Query Show')}}</h3>
                        <div class="box-tools pull-right">
                            <a href="{{route('queries.index')}}" class="btn btn-sm bg-green"><i class="fa fa-list"></i> {{__('Query List')}}</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <br>
                        @include('includes.error')
                        <form class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>{{__('Name')}}</label>
                                            <input name="name" placeholder="{{__('Name')}}" class="form-control" required="" type="text" value="{{ $query->name }}" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>{{__('E-mail Address')}}</label>
                                            <input type="email" class="form-control" placeholder="{{__('E-mail Address')}}" name="email" value="{{$query->email}}" required="" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>{{__('Phone')}}</label>
                                            <input name="phone" placeholder="{{__('Phone')}}" class="form-control" type="text" value="{{ $query->phone }}" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>{{__('Subject')}}</label>
                                            <input name="subject" placeholder="{{__('Subject')}}" class="form-control" type="text" value="{{ $query->subject }}" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>{{__('Message')}}</label>
                                            <textarea name="message" rows="3" class="form-control" placeholder="{{__('Message')}}" style="resize: vertical;">{{$query->message}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

