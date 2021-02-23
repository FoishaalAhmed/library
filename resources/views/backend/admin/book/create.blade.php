

@extends('backend.layouts.app')
@section('title', 'New Book')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            {{__('Dashboard')}}
            <small>Version 2.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('books.index')}}"><i class="fa fa-group"></i> {{__('Books')}}</a></li>
            <li class="active">{{__('New Book')}}</li>
        </ol>
    </section>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Content Header (Book header) -->
                <div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('New Book')}}</h3>
                        <div class="box-tools pull-right">
                            <a href="{{route('books.index')}}" class="btn btn-sm bg-red"><i class="fa fa-list"></i> {{__('Book List')}}</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <br>
                        @include('includes.error')
                        <form action="{{route('books.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-9">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>{{__('Date')}}</label>
                                            <input name="date" placeholder="{{__('Date')}}" class="form-control" required="" type="text" value="{{ old('date') }}" autocomplete="off" id="date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>{{__('Name')}}</label>
                                            <input name="name" placeholder="{{__('Name')}}" class="form-control" required="" type="text" value="{{ old('name') }}" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>{{__('Suitable For')}}</label>

                                            <select name="suitable_for" class="form-control select2" required width="100%" id="">
                                                <option value="Baby (5-12)" @if (old('suitable_for') == 'Baby (5-12)') {{'selected'}}
                                                    
                                                @endif>{{__('Baby (5-12)')}}</option>
                                                <option value="Young (12-21)" @if (old('suitable_for') == 'Young (12-21)') {{'selected'}}
                                                    
                                                @endif>{{__('Young (12-21)')}}</option>
                                                <option value="Youth (21-40)" @if (old('suitable_for') == 'Youth (21-40)') {{'selected'}}
                                                    
                                                @endif>{{__('Youth (21-40)')}}</option>
                                                <option value="Youth plus (40-100)" @if (old('suitable_for') == 'Youth plus (40-100)') {{'selected'}}
                                                    
                                                @endif>{{__('Youth plus (40-100)')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>{{__('Publish Year')}}</label>
                                            <input type="number" class="form-control" placeholder="{{__('Publish Year')}}" name="publish year" value="{{old('publish year')}}" autocomplete="off" id="publish-year">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>{{__('Author')}}</label>
                                            <select name="author_id" class="form-control select2" width="100%" id="">

                                                <option value="">{{__('Select Author')}}</option>
                                                @foreach ($authors as $author)
                                                    
                                                    <option value="{{$author->id}}" @if (old('author_id') == $author->id) {{'selected'}}
                                                        
                                                    @endif>{{$author->name}}</option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>{{__('Genre')}}</label>
                                            <select name="category_id" class="form-control select2" width="100%" id="">

                                                <option value="">{{__('Select Genre')}}</option>
                                                @foreach ($categories as $category)
                                                    
                                                    <option value="{{$category->id}}" @if (old('category_id') == $category->id) {{'selected'}}
                                                        
                                                    @endif>{{$category->name}}</option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>{{__('Quantity')}}</label>
                                            <input type="number" class="form-control" placeholder="{{__('Quantity')}}" name="quantity" value="{{old('quantity')}}" required="" autocomplete="off" id="quantity">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>{{__('Donation')}}</label>
                                            <select name="donation" class="form-control select2" required width="100%" id="">

                                                <option value="Yes" @if (old('donation') == 'Yes') {{'selected'}}
                                                    
                                                @endif>{{__('Yes')}}</option>
                                                <option value="No" @if (old('donation') == 'No') {{'selected'}}
                                                    
                                                @endif>{{__('No')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>{{__('Donar')}}</label>
                                            <input type="text" class="form-control" placeholder="{{__('Donar')}}" name="donar" value="{{old('donar')}}" autocomplete="off" id="donar">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="box box-success box-solid">
                                    <div class="box-header with-border">

                                        <h3 class="box-title"> {{__('Book Photo')}} </h3>

                                    </div>
                                    <div class="box-body box-profile">
                                        <img class="profile-user-img img-responsive img-circle" src="//placehold.it/200x200" alt="Book profile picture" id="book-photo">
                                        <input type="file" name="photo" onchange="readPicture(this)">
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <center>
                                    <button type="reset" class="btn btn-sm bg-red">{{__('Reset')}}</button>
                                    <button type="submit" class="btn btn-sm bg-green">{{__('Save')}}</button>
                                </center>
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

@section('footer')
    <script>
        function readPicture(input) {

            if (input.files && input.files[0]) {

                var reader = new FileReader();
        
                reader.onload = function (e) {
                    $('#book-photo')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200);
                };
        
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#date').datepicker({
            autoclose:   true,
            changeYear:  true,
            changeMonth: true,
            dateFormat:  "dd-mm-yy",
            yearRange:   "-10:+0"
        });
    </script>
@endsection

