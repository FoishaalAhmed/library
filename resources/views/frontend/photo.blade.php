@extends('layouts.app')
@section('title', 'Photo Gallery')
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
	<!-- *****************************Image Gallery******************************* -->
	<div class="container gallery-container">
		<h3 style="text-align: center;">Our Image Gallery</h3>
		<div class="tz-gallery">
			<div class="row">
                @foreach ($photos as $key => $photo)
				<div class="col-sm-12 col-md-4
                    ?>">
					<a class="lightbox" href="{{asset($photo->photo)}}">
						<img src="{{asset($photo->photo)}}" alt="Bridge">
					</a>
				</div>
                @endforeach
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <div style="float: right">
                        {{$photos->links()}}
                    </div>
                </div>
			</div>
		</div>
	</div>
	<!-- *****************************Image Gallery End******************************* -->
@endsection