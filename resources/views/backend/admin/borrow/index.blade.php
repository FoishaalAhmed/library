@extends('backend.layouts.app')
@section('title', 'Borrow Book List')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            {{__('Dashboard')}}
            <small>Version 2.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('borrows.index')}}"><i class="fa fa-group"></i> {{__('Borrow Books')}}</a></li>
            <li class="active">{{__('List')}}</li>
        </ol>
    </section>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Content Header (Book header) -->
                <div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('Borrow Book List')}}</h3>
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
                                    <th style="width: 20%;">{{__('Book')}}</th>
                                    <th style="width: 20%;">{{__('User')}}</th>
                                    <th style="width: 10%;">{{__('From')}}</th>
                                    <th style="width: 10%;">{{__('To')}}</th>
                                    <th style="width: 10%;">{{__('Quantity')}}</th>
                                    <th style="width: 10%;">{{__('Status')}}</th>
                                    <th style="width: 15%;">{{__('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $key => $book)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$book->name}}</td>
                                    <td>{{$book->user}}</td>
                                    <td>{{date('d M, Y', strtotime($book->from))}}</td>
                                    <td>{{date('d M, Y', strtotime($book->to))}}</td>
                                    <td>{{$book->quantity}}</td>
                                    <td>
                                        @if ($book->status == 0 ) {{'Pending'}}
                                        @elseif ($book->status == 1 ) {{'Confirmed'}}
                                        @elseif ($book->status == 2 ) {{'Canceled'}}
                                        @else {{'Returned'}}   
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('borrows.status', [$book->id, 2])}}" class="btn btn-sm bg-red"><i class="fa fa-times"></i></a>
                                        <a href="{{route('borrows.status', [$book->id, 1])}}" class="btn btn-sm bg-green"><i class="fa fa-check-square"></i></a>
                                        <a href="{{route('borrows.status', [$book->id, 3])}}" class="btn btn-sm bg-teal"><i class="fa fa-exchange"></i></a>
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