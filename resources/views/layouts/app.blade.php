<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>MRSG - @yield('title')</title>
	<link rel="stylesheet" href="{{asset('public/frontend/css/main.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/bootstrap/css/bootstrap.min.css')}}">
	<link rel="icon" href="{{asset('public/frontend/img/logo-1.png')}}" type="image/gif" sizes="16x16">
	<link rel="stylesheet" href="{{asset('public/frontend/css/owl/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/owl/owl.theme.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/owl/owl.transitions.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/img_gallery/baguetteBox.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/frontend/css/log.css')}}">
	<!--image gallery -->

<body onload="startTime()">
	<!-- *********head-1-start*********** -->
	<div class="head-1">
		<div class="container">
			<div class="row">
				<div class="col-sm-3" style="padding: 5px;padding-left: 20px;">
					<div class="bt_1" id="txt"></div>
				</div>
				<div class="col-sm-6" style="padding: 5px;padding-left: 20px;">
					<span class="bt_1"><a style="text-decoration: none; color: white;" href="MRSG-Support.html">BECOME A
							SUPPORTER
						</a></span>
				</div>
				<div class="col-sm-3" style="padding: 5px;padding-left: 20px;">
					<div>
						<span style="margin: auto; display: table; text-align: center;" class="fas fa-sign-in-alt bt_1">
							<a style=" text-decoration: none; color: white; margin-left: 5px;"
								href="{{route('login')}}">Login / My
								MRSG</a></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div>
					<img style="width: 65%;" src="{{asset('public/frontend/img/logo-1.png')}}" alt="logo-1">
				</div>
			</div>
			<div class="col-sm-6">
				<select class="input_2">
					<option value="INR">INR</option>
					<option value="JMD">JMD</option>
					<option value="KES">KES</option>
					<option value="KGS">KGS</option>
					<option value="MUR">MUR</option>
					<option value="MVR">MVR</option>
					<option value="MWK">MWK</option>
					<option value="MXN">MXN</option>
					<option value="MYR">MYR</option>
					<option value="NAD">NAD</option>
					<option value="RUB">RUB</option>
				</select>
				<input class="input_1" placeholder="Search here..." list="brow"> <button
					class="fa fa-search btn_1"></button>
			</div>
		</div>
	</div>
	<!-- *********head-1-start-end********** -->
	<!-- **********dropdown menubar**********  -->
	<nav class="navbar navbar-expand-xl bg-light navbar-light ">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="container ">
			<ul class="navbar-nav collapse navbar-collapse" id="collapsibleNavbar">
				<span style="margin-right: -3px; margin-bottom: 7px;" class="fa fa-home"></span>
				<li class="nav-item active dropdown">
					<a class="nav-link @if(request()->is('book')) {{'active'}} @endif" href="{{route('book')}}">All Books</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link @if(request()->is('author')) {{'active'}} @endif" href="{{route('author')}}">Aurthor’s</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link @if(request()->is('administrator')) {{'active'}} @endif" href="{{route('administrator')}}">Administration </a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link " href="Publications.html">Publications</a>
					<ul class="dropdown-menu">
						<li><a href="#">Another Books 1</a></li>
						<li><a href="#">Another Books 2</a></li>
						<li><a href="#">Another Books 3</a></li>
						<li><a href="#">Another Books 4</a></li>
						<li><a href="#">Another Books 5</a></li>
					</ul>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link " href="Education.html">Education</a>
					<ul class="dropdown-menu">
						<li><a href="#">Another Books 1</a></li>
						<li><a href="#">Another Books 2</a></li>
						<li><a href="#">Another Books 3</a></li>
						<li><a href="#">Another Books 4</a></li>
						<li><a href="#">Another Books 5</a></li>
					</ul>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link " href="Top-Members.html">Top Members</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link @if(request()->is('photo-gallery')) {{'active'}} @endif" href="{{route('photo')}}">Photo Gallery</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link @if(request()->is('video-gallery')) {{'active'}} @endif" href="{{route('video')}}">Video Gallery</a>
				</li>
				<li class="nav-item">
					<a class="nav-link @if(request()->is('contact')) {{'active'}} @endif" href="{{route('front.contact')}}">Contact us</a>
				</li>
			</ul>
		</div>
	</nav>
	<!-- **********dropdown menubar End*********  -->
	<!-- ***************News Ticker****************** -->
	<div class="row">
		<div class="col-sm-2">
			<h6 style="text-align: center; margin-top: 5px;">Notice Update</h6>
		</div>
		<div class="col-sm-10">
			<div class="tcontainer">
				<div class="ticker-wrap">
					<div class="ticker-move">
						<div class="ticker-item"> <a href="http://">Poor state of poverty alleviation.</a> </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ***************News Ticker End****************** -->
        @section('content')
            
        @show
	<!-- ********************footer******************** -->
	<footer class="footer">
		<div class="container bottom_border">
			<div class="row">
				<div class=" col-sm-4 col-md col-sm-4  col-12 col">
					<h5 class="headin5_amrc col_white_amrc pt2">Find us</h5>
					<p class="mb10">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
						Ipsum has
						been the industry's standard dummy text ever since the 1500s
					</p>
					<p><i class="fa fa-location-arrow"></i> 9878/25 sec 9 rohini 35 </p>
					<p><i class="fa fa-phone"></i> +91-9999878398 </p>
					<p><i class="fa fa fa-envelope"></i> info@example.com </p>
				</div>
				<div class=" col-sm-4 col-md  col-6 col">
					<h5 class="headin5_amrc col_white_amrc pt2">Quick links</h5>
					<ul class="footer_ul_amrc">
						<li><a href="#">Image Rectoucing</a></li>
						<li><a href="#">Clipping Path</a></li>
						<li><a href="#">Hollow Man Montage</a></li>
						<li><a href="#">Ebay & Amazon</a></li>
						<li><a href="#">Hair Masking/Clipping</a></li>
						<li><a href="#">Image Cropping</a></li>
					</ul>
				</div>
				<div class=" col-sm-4 col-md  col-6 col">
					<h5 class="headin5_amrc col_white_amrc pt2">Quick links</h5>
					<ul class="footer_ul_amrc">
						<li><a href="#">Remove Background</a></li>
						<li><a href="#">Shadows & Mirror Reflection</a></li>
						<li><a href="#">Logo Design</a></li>
						<li><a href="#">Vectorization</a></li>
						<li><a href="#">Hair Masking/Clipping</a></li>
						<li><a href="#">Image Cropping</a></li>
					</ul>
				</div>
				<div class=" col-sm-4 col-md  col-12 col">
					<h5 class="headin5_amrc col_white_amrc pt2">Follow us</h5>
					<ul class="footer_ul2_amrc">
						<li>
							<a href="#"><i class="fab fa-twitter fleft padding-right"></i> </a>
							<p>Lorem Ipsum is simply dummy text of the printing...<a
									href="#">https://www.twitter.com/</a></p>
						</li>
						<li>
							<a href="#"><i class="fab fa-facebook fleft padding-right"></i> </a>
							<p>Lorem Ipsum is simply dummy text of the printing...<a
									href="#">https://www.facebook.com/</a></p>
						</li>
						<li>
							<a href="#"><i class="fab fa-linkedin fleft padding-right"></i> </a>
							<p>Lorem Ipsum is simply dummy text of the printing...<a
									href="#">https://www.linkedin.com/</a></p>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			<br>
			<p class="text-center">All rights reserved@MRSG</p>
			<ul class="social_footer_ul">
				<li><a target="_blank" href="https://{{$contact->fb}}"><i class="fab fa-facebook-f"></i></a></li>
				<li><a target="_blank" href="https://{{$contact->twitter}}"><i class="fab fa-twitter"></i></a></li>
				<li><a target="_blank" href="https://{{$contact->linkedin}}"><i class="fab fa-linkedin"></i></a></li>
				<li><a target="_blank" href="https://{{$contact->instagram}}"><i class="fab fa-instagram"></i></a></li>
			</ul>
		</div>
	</footer>
	<!-- ********************footer End******************** -->
	<script src="{{asset('public/frontend/css/img_gallery/baguetteBox.min.js')}}"></script>
	<!--image gallery -->
	<!-- Script File -->
	<script src="{{asset('public/frontend/js/jquery.min.js')}}"></script>
	<script src="{{asset('public/frontend/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/popper.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/main.js')}}"></script>
	<script src="{{asset('public/frontend/js/fontawesome.js')}}"></script>
	<script src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script>

	@section('footer')
		
	@show

</body>

</html>