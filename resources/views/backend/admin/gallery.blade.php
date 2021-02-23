@extends('backend.layouts.app')
@section('title', 'Gallery')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Dashboard
            <small>Version 2.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('galleries.index')}}"><i class="fa fa-group"></i> Gallery</a></li>
        </ol>
    </section>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Content Header (user header) -->
                <div class="box box-teal box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Gallery</h3>
                        <div class="box-tools pull-right">
                        </div>		
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" id="box-body">
                        @include('includes.error')
                        @if (isset($gallery))
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{route('galleries.update',[$gallery->id])}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="">{{__('Type')}}</label>
                                                <select name="type" class="form-control" required="" id="type" onchange="showHideVideoPhoto();">
                                                    <option value="Photo" @if ($gallery->type == 'Photo') {{'selected'}}
                                                        
                                                    @endif>{{__('Photo')}}</option>
                                                    <option value="Video" @if ($gallery->type == 'Video') {{'selected'}}
                                                        
                                                    @endif>{{__('Video')}}</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group" id="video-hidden">
                                            <div class="col-md-12">
                                                <label for="">{{__('Video')}}</label>
                                                <input type="text" class="form-control" placeholder="{{__('Video')}}" id="video" onkeyup="youtube_parser();" value="{{$gallery->video}}">
                                                <input type="hidden" name="video" id="video-link" value="{{$gallery->video}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="box box-teal box-solid" id="photo-hidden">
                                            <div class="box-header with-border">

                                                <h3 class="box-title"> {{__('Gallery Photo')}} </h3>

                                            </div>
                                            <div class="box-body box-profile">
                                                <img class="profile-user-img img-responsive img-circle" src="{{asset($gallery->photo)}}" alt="author profile picture" id="author-photo">
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
                                <form action="{{route('galleries.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="">{{__('Type')}}</label>
                                                <select name="type" class="form-control" required="" id="type" onchange="showHideVideoPhoto();">
                                                    <option value="Photo" @if (old('type') == 'Photo') {{'selected'}}
                                                        
                                                    @endif>{{__('Photo')}}</option>
                                                    <option value="Video" @if (old('type') == 'Video') {{'selected'}}
                                                        
                                                    @endif>{{__('Video')}}</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group" id="video-hidden" style="display:none">
                                            <div class="col-md-12">
                                                <label for="">{{__('Video')}}</label>
                                                <input type="text" class="form-control" placeholder="{{__('Video')}}" id="video" onkeyup="youtube_parser();" >
                                                <input type="hidden" name="video" id="video-link">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="box box-teal box-solid" id="photo-hidden">
                                            <div class="box-header with-border">

                                                <h3 class="box-title"> {{__('Gallery Photo')}} </h3>

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
                                            <th style="width: 10%">Sl.</th>
                                            <th style="width: 25%">Type</th>
                                            <th style="width: 40%">Video</th>
                                            <th style="width: 10%">Photo</th>
                                            <th style="width: 15%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($galleries as $key => $gallery)
                                        <tr>
                                            <td>{{$loop->index + 1}}</td>
                                            <td>{{$gallery->type}}</td>
                                            <td>{{$gallery->video}}</td>
                                            <td>
                                                <img src="{{asset($gallery->photo)}}" alt="gallery Photo" style="width: 50px; height:50px;">
                                                
                                            </td>
                                            <td>
                                                <a class="btn btn-sm bg-teal" href="{{route('galleries.edit',[$gallery->id])}}"><span class="glyphicon glyphicon-edit"></span></a>

                                                <form action="{{route('galleries.destroy',$gallery->id)}}" method="post" style="display: none;" id="delete-form-{{ $gallery->id}}">
                                                    @csrf
                                                    {{method_field('DELETE')}}
                                                </form>
                                                <a class="btn btn-sm bg-red" href="" onclick="if(confirm('Are You Sure To Delete?')){
                                                    event.preventDefault();
                                                    getElementById('delete-form-{{ $gallery->id}}').submit();
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

        function showHideVideoPhoto() {

            let type = $('#type').val();

            if (type == 'Video') {

                $('#video-hidden').show();
                $('#photo-hidden').hide();
                
            } else {

                $('#video-hidden').hide();
                $('#photo-hidden').show();
            }
        }

        function youtube_parser() {

            let url = $('#video').val();

            var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
            var match = url.match(regExp);

            if ((match && match[7].length == 11)) $("#video-link").val(match[7]);
        }

    </script>
@endsection
