

@extends('backend.layouts.app')
@section('title', 'Update Administrator')
@section('head')
    <link rel="stylesheet" href="{{asset('public/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            {{__('Dashboard')}}
            <small>Version 2.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('administrators.index')}}"><i class="fa fa-group"></i> {{__('administrators')}}</a></li>
            <li class="active">{{__('Update Administrator')}}</li>
        </ol>
    </section>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Content Header (administrator header) -->
                <div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('Update Administrator')}}</h3>
                        <div class="box-tools pull-right">
                            <a href="{{route('administrators.index')}}" class="btn btn-sm bg-red"><i class="fa fa-list"></i> {{__('Administrator List')}}</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <br>
                        @include('includes.error')
                        <form action="{{route('administrators.update', $administrator->id)}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-md-9">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>{{__('Name')}}</label>
                                            <input name="name" placeholder="{{__('Name')}}" class="form-control" required="" type="text" value="{{ $administrator->name }}" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>{{__('Position')}}</label>
                                            <input type="text" class="form-control" placeholder="{{__('Position')}}" name="position" value="{{$administrator->position}}" autocomplete="off" id="position">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>{{__('Company')}}</label>
                                            <input type="text" class="form-control" placeholder="{{__('Company')}}" name="company" value="{{$administrator->company}}" autocomplete="off" id="company">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>{{__('Facebook')}}</label>
                                            <input name="facebook" placeholder="{{__('Facebook')}}" class="form-control" type="text" value="{{ $administrator->facebook }}" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>{{__('Twitter')}}</label>
                                            <input type="text" class="form-control" placeholder="{{__('Twitter')}}" name="twitter" value="{{$administrator->twitter}}" autocomplete="off" id="twitter">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>{{__('Linkedin')}}</label>
                                            <input type="text" class="form-control" placeholder="{{__('Linkedin')}}" name="linkedin" value="{{$administrator->linkedin}}" autocomplete="off" id="linkedin">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>{{__('Priority')}}</label>
                                            <input type="number" class="form-control" placeholder="{{__('Priority')}}" name="priority" value="{{$administrator->priority}}" autocomplete="off" id="priority">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>{{__('Biography')}}</label>
                                            <textarea name="bio" id="editor1" >{{$administrator->bio}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="box box-success box-solid">
                                    <div class="box-header with-border">

                                        <h3 class="box-title"> {{__('Administrator Photo')}} </h3>

                                    </div>
                                    <div class="box-body box-profile">
                                        <img class="profile-user-img img-responsive img-circle" src="{{asset($administrator->photo)}}" alt="Administrator profile picture" id="administrator-photo">
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
                                    <button type="submit" class="btn btn-sm bg-green">{{__('Update')}}</button>
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

    <script src="{{asset('public/backend/bower_components/ckeditor/ckeditor.js')}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('public/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <script>
        function readPicture(input) {

            if (input.files && input.files[0]) {

                var reader = new FileReader();
        
                reader.onload = function (e) {
                    $('#administrator-photo')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200);
                };
        
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {

            CKEDITOR.replace('editor1');
        });
    </script>
@endsection

