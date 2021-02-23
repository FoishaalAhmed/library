@extends('backend.layouts.app')
@section('title', 'Book List')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            {{__('Dashboard')}}
            <small>Version 2.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('books.index')}}"><i class="fa fa-group"></i> {{__('Books')}}</a></li>
            <li class="active">{{__('List')}}</li>
        </ol>
    </section>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Content Header (Book header) -->
                <div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('Book List')}}</h3>
                        <div class="box-tools pull-right">
                        	<a href="{{route('books.create')}}" class="btn btn-sm bg-red"><i class="fa fa-plus"></i> {{__('New Book')}}</a>
                        </div>		
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">{{__('Sl.')}}</th>
                                    <th style="width: 25%;">{{__('Book')}}</th>
                                    <th style="width: 15%;">{{__('Author')}}</th>
                                    <th style="width: 20%;">{{__('Genre')}}</th>
                                    <th style="width: 10%;">{{__('Quantity')}}</th>
                                    <th style="width: 10%;">{{__('Photo')}}</th>
                                    <th style="width: 10%;">{{__('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $key => $book)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$book->name}}</td>
                                    <td>{{$book->author}}</td>
                                    <td>{{$book->category}}</td>
                                    <td>{{$book->quantity}}</td>
                                    
                                    <td>
                                        <img src="{{asset($book->photo)}}" alt="" style="width: 50px; height: 50px;">
                                        
                                    </td>
                                    <td>
                                    	<a class="btn btn-sm bg-green" href="{{route('books.edit',[$book->id])}}"><span class="glyphicon glyphicon-edit"></span></a>

                                    	<form action="{{route('books.destroy',[$book->id])}}" method="post" style="display: none;" id="delete-form-{{ $book->id}}">
                                            @csrf
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a class="btn btn-sm bg-red" href="" onclick="if(confirm('Are You Sure To Delete?')){
                                            event.preventDefault();
                                            getElementById('delete-form-{{ $book->id}}').submit();
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