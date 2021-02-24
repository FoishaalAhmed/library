@extends('layouts.app')
@section('title', 'Video Gallery')
@section('content')

    <!-- ***********slider************ -->
	<div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
		<div class="carousel-inner">
            @foreach ($sliders as $key => $slider)
            
			<div class="carousel-item @if($key == 0) {{'active'}} @endif">
				<div class="mask flex-center">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-md-7 col-12 order-md-1 order-2">
								<h4 style="line-height: 60px; padding: 15px;">
                                    {{$slider->title}}
                                </h4>
								<p> {{$slider->text}} </p>
								
							</div>
							<div class="col-md-5 col-12 order-md-2 order-1"><img class="img-2" src="{{asset($slider->photo)}}" style="width: 97%;" class="mx-auto" alt="slide"></div>
						</div>
					</div>
				</div>
			</div>

            @endforeach
		</div>
	</div>
	<br> <br>
	<!-- ***********slider End************ -->
	<!-- *****************************Video Gallery******************************* -->
	<div class="container mt-4" style="margin-top: 50px;">
		<h4 style="text-align: center;">VIDEO GALLERY</h4>
		<div class="row" style="margin-top: 50px;">
            @foreach ($videos as $key => $video)
                
            
			<div class="col-md-4">
				<a data-target="#modalYT-{{$key}}" data-toggle="modal" href="#" class="color-gray-darker td-hover-none">
					<div class="ba-0 ds-1">
						<img alt="Card image cap" class="card-img-top" src="https://img.youtube.com/vi/<?php echo $video->video; ?>/0.jpg">
					</div>
				</a>
			</div>
            @endforeach

            <div class="col-md-8"></div>
            <div class="col-md-4">
                <div style="float: right">
                    {{$videos->links()}}
                </div>
            </div>
		</div>
	</div>
	<br>
    @foreach ($videos as $key => $item)
        <div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="modalYT-{{$key}}" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body mb-0 p-0">
                        <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $item->video; ?>" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div><b>View:</b> <a href="#">Transcript</a> | <a href="#">Low-res Video</a></div>
                        <button class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center" data-dismiss="modal"
                            type="button">Close</button>
                    </div>
                </div>
            </div>
        </div>

    @endforeach
	<!-- *****************************Video Gallery End******************************* -->
@endsection