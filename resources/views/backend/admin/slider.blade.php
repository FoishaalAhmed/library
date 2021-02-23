@extends('backend.layouts.app')
@section('title', 'Slider')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Dashboard
            <small>Version 2.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('sliders.index')}}"><i class="fa fa-group"></i> Slider</a></li>
        </ol>
    </section>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Content Header (user header) -->
                <div class="box box-teal box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Slider</h3>
                        <div class="box-tools pull-right">
                        </div>		
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" id="box-body">
                        @include('includes.error')
                        @if (isset($slider))
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{route('sliders.update',[$slider->id])}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Title</label>
                                            <div class="col-sm-9">
                                                <input name="title" id="title" placeholder="Title" class="form-control" type="text" value="{{ $slider->title }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Text</label>
                                            <div class="col-sm-9">
                                                <textarea name="text" id="text" class="form-control" placeholder="Text" cols="30" rows="5">{{ $slider->text }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="box box-teal box-solid">
                                            <div class="box-header with-border">

                                                <h3 class="box-title"> {{__('Slider Photo')}} </h3>

                                            </div>
                                            <div class="box-body box-profile">
                                                <img class="profile-user-img img-responsive img-circle" src="{{asset($slider->photo)}}" alt="author profile picture" id="author-photo">
                                                <input type="file" name="photo" onchange="readPicture(this)">
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <center>
                                            <button type="reset" class="btn btn-sm bg-red">{{__('Reset')}}</button>
                                            <button type="submit" class="btn btn-sm bg-teal">{{__('Update')}}</button>
                                        </center>
                                    </div>
                                </form>
                            </div>
                        </div>

                        @else 
                        
                            <div class="row">
                            <div class="col-md-12">
                                <form action="{{route('sliders.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Title</label>
                                            <div class="col-sm-9">
                                                <input name="title" id="title" placeholder="Title" class="form-control" type="text" value="{{ old('title') }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Text</label>
                                            <div class="col-sm-9">
                                                <textarea name="text" id="text" class="form-control" placeholder="Text" cols="30" rows="5">{{ old('text') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="box box-teal box-solid">
                                            <div class="box-header with-border">

                                                <h3 class="box-title"> {{__('Slider Photo')}} </h3>

                                            </div>
                                            <div class="box-body box-profile">
                                                <img class="profile-user-img img-responsive img-circle" src="//placehold.it/200x200" alt="author profile picture" id="author-photo">
                                                <input type="file" name="photo" onchange="readPicture(this)">
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <center>
                                            <button type="reset" class="btn btn-sm bg-red">{{__('Reset')}}</button>
                                            <button type="submit" class="btn btn-sm bg-teal">{{__('Save')}}</button>
                                        </center>
                                    </div>
                                </form>
                            </div>
                        </div>

                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%">Sl.</th>
                                            <th style="width: 30%">Title</th>
                                            <th style="width: 45%">Text</th>
                                            <th style="width: 10%">Photo</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sliders as $key => $slider)
                                        <tr>
                                            <td>{{$loop->index + 1}}</td>
                                            <td>{{$slider->title}}</td>
                                            <td>{{$slider->text}}</td>
                                            <td>
                                                <img src="{{asset($slider->photo)}}" alt="Slider Photo" style="width: 50px; height:50px;">
                                                
                                            </td>
                                            <td>
                                                <a class="btn btn-sm bg-teal" href="{{route('sliders.edit',[$slider->id])}}"><span class="glyphicon glyphicon-edit"></span></a>

                                                <form action="{{route('sliders.destroy',$slider->id)}}" method="post" style="display: none;" id="delete-form-{{ $slider->id}}">
                                                    @csrf
                                                    {{method_field('DELETE')}}
                                                </form>
                                                <a class="btn btn-sm bg-red" href="" onclick="if(confirm('Are You Sure To Delete?')){
                                                    event.preventDefault();
                                                    getElementById('delete-form-{{ $slider->id}}').submit();
                                                    }else{
                                                    event.preventDefault();
                                                    }"><span class="glyphicon glyphicon-trash"></span></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
                    $('#author-photo')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200);
                };
        
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
@endsection
