@extends('backend.layouts.app')
@section('title', 'Notice List')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            {{__('Dashboard')}}
            <small>Version 2.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('notices.index')}}"><i class="fa fa-group"></i> {{__('Notices')}}</a></li>
            <li class="active">{{__('List')}}</li>
        </ol>
    </section>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Content Header (Notice header) -->
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('Notice List')}}</h3>
                        <div class="box-tools pull-right">
                        	<a href="{{route('notices.create')}}" class="btn btn-sm bg-green"><i class="fa fa-plus"></i> {{__('New Notice')}}</a>
                        </div>		
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10%;">{{__('Sl.')}}</th>
                                    <th style="width: 20%;">{{__('Date')}}</th>
                                    <th style="width: 60%;">{{__('Title')}}</th>
                                    <th style="width: 10%;">{{__('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notices as $key => $notice)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$notice->date}}</td>
                                    <td>{{$notice->title}}</td>
                                    <td>
                                    	<a class="btn btn-sm bg-blue" href="{{route('notices.edit',[$notice->id])}}"><span class="glyphicon glyphicon-edit"></span></a>

                                    	<form action="{{route('notices.destroy',[$notice->id])}}" method="post" style="display: none;" id="delete-form-{{ $notice->id}}">
                                            @csrf
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a class="btn btn-sm bg-red" href="" onclick="if(confirm('Are You Sure To Delete?')){
                                            event.preventDefault();
                                            getElementById('delete-form-{{ $notice->id}}').submit();
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