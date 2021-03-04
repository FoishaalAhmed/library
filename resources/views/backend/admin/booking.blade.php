@extends('backend.layouts.app')
@section('title', 'Book Table List')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            {{__('Dashboard')}}
            <small>Version 2.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('booking.index')}}"><i class="fa fa-group"></i> {{__('Book Tables')}}</a></li>
            <li class="active">{{__('List')}}</li>
        </ol>
    </section>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Content Header (Book header) -->
                <div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('Book Table List')}}</h3>
                        <div class="box-tools pull-right">
                        	{{-- <a href="{{route('booking.create')}}" class="btn btn-sm bg-red"><i class="fa fa-plus"></i> {{__('New Book')}}</a> --}}
                        </div>		
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">{{__('Sl.')}}</th>
                                    <th style="width: 20%;">{{__('Name')}}</th>
                                    <th style="width: 20%;">{{__('Table')}}</th>
                                    <th style="width: 10%;">{{__('Date')}}</th>
                                    <th style="width: 10%;">{{__('From')}}</th>
                                    <th style="width: 10%;">{{__('To')}}</th>
                                    <th style="width: 10%;">{{__('Status')}}</th>
                                    <th style="width: 15%;">{{__('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $key => $book)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$book->name}}</td>
                                    <td>{{$book->table_number}}</td>
                                    <td>{{date('d M, Y', strtotime($book->date))}}</td>
                                    <td>{{date('h:i A', strtotime($book->start_time))}}</td>
                                    <td>{{date('h:i A', strtotime($book->end_time))}}</td>
                                    <td>
                                        @if ($book->status == 1 ) {{'Confirmed'}}
                                        @else {{'Canceled'}}   
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('booking.status', [$book->id, 0])}}" class="btn btn-sm bg-red"><i class="fa fa-times"></i></a>
                                        <a href="{{route('booking.status', [$book->id, 1])}}" class="btn btn-sm bg-green"><i class="fa fa-check-square"></i></a>
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