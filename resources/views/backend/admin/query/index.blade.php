@extends('backend.layouts.app')
@section('title', 'Query List')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            {{__('Dashboard')}}
            <small>Version 2.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('queries.index')}}"><i class="fa fa-group"></i> {{__('Queries')}}</a></li>
            <li class="active">{{__('List')}}</li>
        </ol>
    </section>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Content Header (Query header) -->
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('Query List')}}</h3>
                        <div class="box-tools pull-right">
                        	
                        </div>		
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">{{__('Sl.')}}</th>
                                    <th style="width: 15%;">{{__('Name')}}</th>
                                    <th style="width: 15%;">{{__('Email')}}</th>
                                    <th style="width: 10%;">{{__('Phone')}}</th>
                                    <th style="width: 15%;">{{__('Subject')}}</th>
                                    <th style="width: 20%;">{{__('Message')}}</th>
                                    <th style="width: 10%;">{{__('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($queries as $key => $query)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$query->name}}</td>
                                    <td>{{$query->email}}</td>
                                    <td>{{$query->phone}}</td>
                                    <td>{{$query->subject}}</td>
                                    <td>{{$query->message}}</td>
                                    <td>
                                    	<a class="btn btn-sm bg-blue" href="{{route('queries.show',[$query->id])}}"><span class="fa fa-eye"></span></a>

                                    	<form action="{{route('queries.destroy',[$query->id])}}" method="post" style="display: none;" id="delete-form-{{ $query->id}}">
                                            @csrf
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a class="btn btn-sm bg-red" href="" onclick="if(confirm('Are You Sure To Delete?')){
                                            event.preventDefault();
                                            getElementById('delete-form-{{ $query->id}}').submit();
                                            }else{
                                            event.preventDefault();
                                            }"><span class="glyphicon glyphicon-trash"></span></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
@endsection