@extends('layouts.app')
@section('title', 'Home')
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
	<!-- /* ******************** About Us ************************* */ -->
	<div class="container ">
		<h2 class="text-center">About Us</h2>
		<div class="row">
			<div class="col-sm-6"> <br> <br>
				<img style="width: 100%;" src="{{asset($about_us->photo)}}" alt="">
			</div>
			<div class="col-sm-6 ">
				<p> {!!$about_us->text!!} </p>
			</div>
		</div>
	</div>
	<br>
	<!-- /* ******************** About Us End************************* */ -->
	<!-- *****************************Authority******************************* -->
	<div class=" container slideanim">
		<h3 class="text-center slideanim">AUTHORITY</h3>
		<img class="center slideanim" src="img/title-icon.png" alt=""> <br>
		<div class="demo" slideanim>
			<br> <br> <br>
			<div class="row">
				<div class="col-sm-3">
				</div>
				<div class="col-md-6 slideanim">
					<div id="testimonial-slider" class="owl-carousel" style="padding: 30px;">
                        @foreach ($administrators as $item)
						<div class="testimonial">
                                
                            
							<p class="description">
                                <?php echo strip_tags($item->bio) ?>
							</p>
							<h3 class="title">{{$item->name}}</h3>
							<p>{{$item->position}}, {{$item->company}}</p>
							<div class="pic">
								<img src="{{asset($item->photo)}}" alt="">
							</div>
						</div>
                        @endforeach
					</div>
				</div>
				<div class="col-sm-3">
				</div>
			</div>
		</div>
	</div>
	<!-- *****************************Authority End******************************* -->
	<!-- *****************************Image Gallery******************************* -->
	<div class="container gallery-container">
		<h3 style="text-align: center;">Our Image Gallery</h3>
		<div class="tz-gallery">
			<div class="row">
                @foreach ($photos as $key => $photo)
				<div class="col-sm-<?php if($key == 0 || $key == 3) echo '12'; elseif($key == 1 || $key == 2 || $key == 6 || $key == 7 || $key == 8 || $key == 4 || $key == 5) echo "6"; ?> col-md-<?php if ($key == 3 || $key == 5) echo '3'; elseif($key == 1 || $key == 2 || $key == 6 || $key == 7 || $key == 8 || $key == 0) echo "4"; elseif ($key == 4) echo '6';
                    ?>">
					<a class="lightbox" href="{{asset($photo->photo)}}">
						<img src="{{asset($photo->photo)}}" alt="Bridge">
					</a>
				</div>
                @endforeach
			</div>
		</div>
	</div>
	<!-- *****************************Image Gallery End******************************* -->
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
		</div>
	</div>
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