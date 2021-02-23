

@extends('backend.layouts.app')
@section('title', 'New Notice')
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
            <li><a href="{{route('notices.index')}}"><i class="fa fa-file"></i> {{__('Notices')}}</a></li>
            <li class="active">{{__('New Notice')}}</li>
        </ol>
    </section>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Content Header (notice header) -->
                <div class="box box-info box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('New Notice')}}</h3>
                        <div class="box-tools pull-right">
                            <a href="{{route('notices.index')}}" class="btn btn-sm bg-green"><i class="fa fa-list"></i> {{__('Notice List')}}</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <br>
                        @include('includes.error')
                        <form action="{{route('notices.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
                                            <label>{{__('Title')}}</label>
                                            <input name="title" placeholder="{{__('Title')}}" class="form-control" required="" type="text" value="{{ old('title') }}" autocomplete="off" id="title">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>{{__('Slug')}}</label>
                                            <input name="slug" placeholder="{{__('Slug')}}" class="form-control" type="text" value="{{ old('slug') }}" autocomplete="off" id="slug">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>{{__('Description')}}</label>
                                            <textarea name="description" id="editor1" rows="3" class="form-control" placeholder="{{__('Description')}}" style="resize: vertical;">{{old('description')}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="box box-info box-solid">
                                    <div class="box-header with-border">

                                        <h3 class="box-title"> {{__('Notice Document')}} </h3>

                                    </div>
                                    <div class="box-body box-profile">
                                        <img class="profile-user-img img-responsive img-circle" src="//placehold.it/200x200" alt="notice profile picture" id="notice-photo">
                                        <input type="file" name="document" onchange="readPicture(this)">
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            </div>
                            <div class="col-md-12">
                                <center>
                                    <button type="reset" class="btn btn-sm bg-red">{{__('Reset')}}</button>
                                    <button type="submit" class="btn btn-sm bg-aqua">{{__('Save')}}</button>
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
                    $('#notice-photo')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200);
                };
        
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        });

        $("#title").keyup(function(){
            
            var title = $("#title").val();

            var slug = (title.replace(/[^a-zA-Z0-9]+/g, '-')).toLowerCase();
            $("#slug").val(slug);

        });

        $('#date').datepicker({
            autoclose:   true,
            changeYear:  true,
            changeMonth: true,
            dateFormat:  "dd-mm-yy",
            yearRange:   "-0:+10"
        });

    </script>

@endsection

