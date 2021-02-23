@extends('backend.layouts.app')
@section('title', 'Page List')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            {{__('Dashboard')}}
            <small>Version 2.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('pages.index')}}"><i class="fa fa-group"></i> {{__('Pages')}}</a></li>
            <li class="active">{{__('List')}}</li>
        </ol>
    </section>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Content Header (page header) -->
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('Page List')}}</h3>
                        <div class="box-tools pull-right">
                        	<a href="{{route('pages.create')}}" class="btn btn-sm bg-green"><i class="fa fa-plus"></i> {{__('New page')}}</a>
                        </div>		
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">{{__('Sl.')}}</th>
                                    <th style="width: 15%;">{{__('Name')}}</th>
                                    <th style="width: 10%;">{{__('Priority')}}</th>
                                    <th style="width: 50%;">{{__('Text')}}</th>
                                    <th style="width: 10%;">{{__('Photo')}}</th>
                                    <th style="width: 10%;">{{__('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pages as $key => $page)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$page->name}}</td>
                                    <td>{{$page->priority}}</td>
                                    <td>{!!\Illuminate\Support\Str::limit($page->text, 100, $end='...')!!}</td>
                                    
                                    <td>
                                        <img src="{{asset($page->photo)}}" alt="" style="width: 50px; height: 50px;">
                                        
                                    </td>
                                    <td>
                                    	<a class="btn btn-sm bg-blue" href="{{route('pages.edit',[$page->id])}}"><span class="glyphicon glyphicon-edit"></span></a>

                                    	<form action="{{route('pages.destroy',[$page->id])}}" method="post" style="display: none;" id="delete-form-{{ $page->id}}">
                                            @csrf
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a class="btn btn-sm bg-red" href="" onclick="if(confirm('Are You Sure To Delete?')){
                                            event.preventDefault();
                                            getElementById('delete-form-{{ $page->id}}').submit();
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