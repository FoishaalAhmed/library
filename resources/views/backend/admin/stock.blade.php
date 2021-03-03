@extends('backend.layouts.app')
@section('title', 'Stocks List')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            {{__('Dashboard')}}
            <small>Version 2.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('stocks.index')}}"><i class="fa fa-group"></i> {{__('Stockss')}}</a></li>
            <li class="active">{{__('List')}}</li>
        </ol>
    </section>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Content Header (Book header) -->
                <div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('Stocks List')}}</h3>
                        <div class="box-tools pull-right">
                        	{{-- <a href="{{route('borrows.create')}}" class="btn btn-sm bg-red"><i class="fa fa-plus"></i> {{__('New Book')}}</a> --}}
                        </div>		
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">{{__('Sl.')}}</th>
                                    <th style="width: 50%;">{{__('Book')}}</th>
                                    <th style="width: 15%;">{{__('Quantity')}}</th>
                                    <th style="width: 15%;">{{__('Borrowed')}}</th>
                                    <th style="width: 15%;">{{__('Available')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $key => $book)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$book->name}}</td>
                                    <td>{{$book->quantity}}</td>
                                    <td>{{$book->borrow}}</td>
                                    <td>{{$book->available}}</td>
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