@extends('backend.layouts.app')
@section('title', 'Author List')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            {{__('Dashboard')}}
            <small>Version 2.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('authors.index')}}"><i class="fa fa-group"></i> {{__('Author')}}</a></li>
            <li class="active">{{__('List')}}</li>
        </ol>
    </section>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Content Header (Author header) -->
                <div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('Author List')}}</h3>
                        <div class="box-tools pull-right">
                        	<a href="{{route('authors.create')}}" class="btn btn-sm bg-red"><i class="fa fa-plus"></i> {{__('New Author')}}</a>
                        </div>		
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">{{__('Sl.')}}</th>
                                    <th style="width: 15%;">{{__('Author')}}</th>
                                    <th style="width: 15%;">{{__('B. Date')}}</th>
                                    <th style="width: 15%;">{{__('D. Date')}}</th>
                                    <th style="width: 20%;">{{__('Genre')}}</th>
                                    <th style="width: 10%;">{{__('Photo')}}</th>
                                    <th style="width: 15%;">{{__('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($authors as $key => $author)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$author->name}}</td>
                                    <td>{{date('d M, Y', strtotime($author->birth_date))}}</td>
                                    <td>{{date('d M, Y', strtotime($author->death_date))}}</td>
                                    <td>{{$author->genres}}</td>
                                    
                                    <td>
                                        <img src="{{asset($author->photo)}}" alt="" style="width: 50px; height: 50px;">
                                        
                                    </td>
                                    <td>
                                    	<a class="btn btn-sm bg-green" href="{{route('authors.edit',[$author->id])}}"><span class="glyphicon glyphicon-edit"></span></a>

                                    	<form action="{{route('authors.destroy',[$author->id])}}" method="post" style="display: none;" id="delete-form-{{ $author->id}}">
                                            @csrf
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a class="btn btn-sm bg-red" href="" onclick="if(confirm('Are You Sure To Delete?')){
                                            event.preventDefault();
                                            getElementById('delete-form-{{ $author->id}}').submit();
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