

@extends('backend.layouts.app')
@section('title', 'Contact Update')
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
            <li><a href="{{route('contact')}}"><i class="fa fa-file"></i> {{__('Contact')}}</a></li>
            <li class="active">{{__('Update')}}</li>
        </ol>
    </section>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Content Header (contact header) -->
                <div class="box box-danger box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('Contact')}}</h3>
                        <div class="box-tools pull-right">
                            
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <br>
                        @include('includes.error')
                        <form action="{{route('contact.update',[$contact->id])}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>{{__('Name')}}</label>
                                        <input name="name" placeholder="{{__('Name')}}" class="form-control" required="" type="text" value="{{ $contact->name }}" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>{{__('E-mail Address')}}</label>
                                        <input name="email" placeholder="{{__('E-mail Address')}}" class="form-control" type="email" value="{{ $contact->email }}" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>{{__('Phone')}}</label>
                                        <input name="phone" placeholder="{{__('Phone')}}" class="form-control" type="text" value="{{ $contact->phone }}" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>{{__('Mobile')}}</label>
                                        <input name="mobile" placeholder="{{__('Mobile')}}" class="form-control" type="text" value="{{ $contact->mobile }}" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>{{__('Fax')}}</label>
                                        <input name="fax" placeholder="{{__('Fax')}}" class="form-control" type="text" value="{{ $contact->fax }}" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>{{__('Facebook')}}</label>
                                        <input name="fb" placeholder="{{__('Facebook')}}" class="form-control" type="text" value="{{ $contact->fb }}" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>{{__('Twitter')}}</label>
                                        <input name="twitter" placeholder="{{__('Twitter')}}" class="form-control" type="text" value="{{ $contact->twitter }}" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>{{__('LinkedIn')}}</label>
                                        <input name="linkedin" placeholder="{{__('LinkedIn')}}" class="form-control" type="text" value="{{ $contact->linkedin }}" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>{{__('Instagram')}}</label>
                                        <input name="instagram" placeholder="{{__('Instagram')}}" class="form-control" type="text" value="{{ $contact->instagram }}" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>{{__('Google Map')}}</label>
                                        <textarea name="map" rows="3" class="form-control" placeholder="{{__('Google Map')}}" style="resize: vertical;">{{$contact->map}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>{{__('Address')}}</label>
                                        <textarea name="address" id="editor1" rows="3" class="form-control" placeholder="{{__('Address')}}" style="resize: vertical;">{{$contact->address}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <center>
                                    <button type="reset" class="btn btn-sm bg-red">{{__('Cancel')}}</button>
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

    $(function () {
        CKEDITOR.replace('editor1')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
    });
    </script>

@endsection

