@extends('backend.layouts.app')
@section('title', 'Administrator List')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            {{__('Dashboard')}}
            <small>Version 2.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('administrators.index')}}"><i class="fa fa-group"></i> {{__('Administrators')}}</a></li>
            <li class="active">{{__('List')}}</li>
        </ol>
    </section>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Content Header (administrator header) -->
                <div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('Administrator List')}}</h3>
                        <div class="box-tools pull-right">
                        	<a href="{{route('administrators.create')}}" class="btn btn-sm bg-red"><i class="fa fa-plus"></i> {{__('New Administrator')}}</a>
                        </div>		
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">{{__('Sl.')}}</th>
                                    <th style="width: 25%;">{{__('Administrator')}}</th>
                                    <th style="width: 15%;">{{__('Position')}}</th>
                                    <th style="width: 20%;">{{__('Company')}}</th>
                                    <th style="width: 10%;">{{__('Priority')}}</th>
                                    <th style="width: 10%;">{{__('Photo')}}</th>
                                    <th style="width: 10%;">{{__('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($administrators as $key => $administrator)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$administrator->name}}</td>
                                    <td>{{$administrator->position}}</td>
                                    <td>{{$administrator->company}}</td>
                                    <td>{{$administrator->priority}}</td>
                                    
                                    <td>
                                        <img src="{{asset($administrator->photo)}}" alt="" style="width: 50px; height: 50px;">
                                        
                                    </td>
                                    <td>
                                    	<a class="btn btn-sm bg-green" href="{{route('administrators.edit',[$administrator->id])}}"><span class="glyphicon glyphicon-edit"></span></a>

                                    	<form action="{{route('administrators.destroy',[$administrator->id])}}" method="post" style="display: none;" id="delete-form-{{ $administrator->id}}">
                                            @csrf
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a class="btn btn-sm bg-red" href="" onclick="if(confirm('Are You Sure To Delete?')){
                                            event.preventDefault();
                                            getElementById('delete-form-{{ $administrator->id}}').submit();
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