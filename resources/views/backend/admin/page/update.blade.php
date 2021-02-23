

@extends('backend.layouts.app')
@section('title', 'Page Update')
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
            <li><a href="{{route('pages.index')}}"><i class="fa fa-file"></i> {{__('Pages')}}</a></li>
            <li class="active">{{__('Page Update')}}</li>
        </ol>
    </section>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Content Header (page header) -->
                <div class="box box-info box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('Page Update')}}</h3>
                        <div class="box-tools pull-right">
                            <a href="{{route('pages.index')}}" class="btn btn-sm bg-green"><i class="fa fa-list"></i> {{__('Page List')}}</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <br>
                        @include('includes.error')
                        <form action="{{route('pages.update',[$page->id])}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-md-9">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>{{__('Name')}}</label>
                                            <input name="name" placeholder="{{__('Name')}}" class="form-control" required="" type="text" value="{{ $page->name }}" autocomplete="off" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>{{__('Priority')}}</label>
                                            <input name="priority" placeholder="{{__('Priority')}}" class="form-control" type="number" value="{{ $page->priority }}" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>{{__('Text')}}</label>
                                            <textarea name="text" id="editor1" rows="3" class="form-control" placeholder="{{__('Text')}}" style="resize: vertical;">{{$page->text}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="box box-info box-solid">
                                    <div class="box-header with-border">

                                        <h3 class="box-title"> {{__('Page Photo')}} </h3>

                                    </div>
                                    <div class="box-body box-profile">
                                        <img class="profile-user-img img-responsive img-circle" src="{{asset($page->photo)}}" alt="page profile picture" id="page-photo">
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
                                    <button type="reset" class="btn btn-sm bg-red">{{__('Cancel')}}</button>
                                    <button type="submit" class="btn btn-sm bg-aqua">{{__('Update')}}</button>
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
                $('#page-photo')
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
    </script>

@endsection

