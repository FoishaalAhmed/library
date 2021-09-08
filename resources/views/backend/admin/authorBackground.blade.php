@extends('backend.layouts.app')
@section('title', 'Author Background')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Dashboard
                <small>Version 2.0</small>
            </h1>
        </section>
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- Content Header (user header) -->
                    <div class="box box-teal box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Author Background</h3>
                            <div class="box-tools pull-right">
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" id="box-body">
                            @include('includes.error')
                            @if (isset($background))
                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="{{ route('backgrounds.update', [$background->id]) }}" method="POST"
                                            class="form-horizontal" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="col-md-3">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="box box-teal box-solid">
                                                    <div class="box-header with-border">

                                                        <h3 class="box-title"> {{ __('Author Background Photo') }}
                                                        </h3>

                                                    </div>
                                                    <div class="box-body box-profile">
                                                        <img class="profile-user-img img-responsive img-circle"
                                                            src="{{ asset($background->photo) }}"
                                                            alt="author profile picture" id="author-photo">
                                                        <input type="file" name="photo" onchange="readPicture(this)">
                                                    </div>
                                                    <!-- /.box-body -->
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                            </div>
                                            <div class="col-md-12">
                                                <center>
                                                    <button type="reset"
                                                        class="btn btn-sm bg-red">{{ __('Reset') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-sm bg-teal">{{ __('Update') }}</button>
                                                </center>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            @else

                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="{{ route('backgrounds.store') }}" method="POST"
                                            class="form-horizontal" enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-md-3">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="box box-teal box-solid">
                                                    <div class="box-header with-border">

                                                        <h3 class="box-title"> {{ __('Author Background Photo') }}
                                                        </h3>

                                                    </div>
                                                    <div class="box-body box-profile">
                                                        <img class="profile-user-img img-responsive img-circle"
                                                            src="//placehold.it/200x200" alt="author profile picture"
                                                            id="author-photo">
                                                        <input type="file" name="photo" onchange="readPicture(this)">
                                                    </div>
                                                    <!-- /.box-body -->
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                            </div>
                                            <div class="col-md-12">
                                                <center>
                                                    <button type="reset"
                                                        class="btn btn-sm bg-red">{{ __('Reset') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-sm bg-teal">{{ __('Save') }}</button>
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
                                                <th style="width: 80%">Photo</th>
                                                <th style="width: 10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($backgrounds as $key => $background)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>
                                                        <img src="{{ asset($background->photo) }}"
                                                            alt="Author Background Photo" style="width: 50px; height:50px;">

                                                    </td>
                                                    <td>
                                                        <a class="btn btn-sm bg-teal"
                                                            href="{{ route('backgrounds.edit', [$background->id]) }}"><span
                                                                class="glyphicon glyphicon-edit"></span></a>
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

                reader.onload = function(e) {
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
