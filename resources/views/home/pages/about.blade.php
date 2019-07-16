@extends('home.common.main')
@section('css')
<link rel="stylesheet" type="text/css" href="home/styles/about.css">
<link rel="stylesheet" type="text/css" href="home/styles/about_responsive.css">
@endsection
@section('content')
<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="home/images/about.jpg" data-speed="0.8"></div>
		<div class="home_container d-flex flex-column align-items-center justify-content-center">
			<div class="home_content">
				<div class="home_title"><h1>about</h1></div>
			</div>
		</div>
	</div>

	<!-- Intro -->

	<div class="intro">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="intro_content text-center">
						<div class="section_title text-center"><h1>About my<span>podcast</span></h1></div>
						<div class="intro_text text-center">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a bibendum sem. Fusce dignissim et diam quis pretium. 
Etiam efficitur semper accumsan. Sed et dui aliquet, ultrices tellus non, sagittis magna. Nullam justo quam, vestibulum non magna et, tempus tincidunt est. Ut laoreet magna ac luctus lacinia. Aliquam eget neque turpis. Phasellus nibh ex, tristique a magna ac, convallis tincidunt diam. Nulla facilisi. Phasellus porta sapien sit amet tortor rhoncus mattis.</p>
						</div>
						<div class="button_fill intro_button"><a href="#">read more</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Milestones -->

	<div class="milestones">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="home/images/milestones.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title light text-center"><h1>Fun Facts</h1></div>
				</div>
			</div>
			<div class="row milestones_row">
							
				<!-- Milestone -->
				<div class="col-xl-3 col-md-6">
					<div class="milestone text-center">
						<div class="milestone_content ml-auto mr-auto">
							<div class="milestone_counter" data-end-value="55126">0</div>
							<div class="milestone_icon"><img src="home/images/alarm-clock.svg" alt="https://www.flaticon.com/authors/smashicons"></div>
						</div>
						<div class="milestone_title">Streamed Hours</div>
					</div>
				</div>

				<!-- Milestone -->
				<div class="col-xl-3 col-md-6">
					<div class="milestone text-center">
						<div class="milestone_content ml-auto mr-auto">
							<div class="milestone_counter" data-end-value="3520">0</div>
							<div class="milestone_icon"><img src="images/speaker.svg" alt="https://www.flaticon.com/authors/smashicons"></div>
						</div>
						<div class="milestone_title">Audio Episodes</div>
					</div>
				</div>

				<!-- Milestone -->
				<div class="col-xl-3 col-md-6">
					<div class="milestone text-center">
						<div class="milestone_content ml-auto mr-auto">
							<div class="milestone_counter" data-end-value="2056">0</div>
							<div class="milestone_icon"><img src="home/images/film.svg" alt="https://www.flaticon.com/authors/smashicons"></div>
						</div>
						<div class="milestone_title">Video Episodes</div>
					</div>
				</div>

				<!-- Milestone -->
				<div class="col-xl-3 col-md-6">
					<div class="milestone text-center">
						<div class="milestone_content ml-auto mr-auto">
							<div class="milestone_counter" data-end-value="25">0</div>
							<div class="milestone_icon"><img src="home/images/television.svg" alt="https://www.flaticon.com/authors/smashicons"></div>
						</div>
						<div class="milestone_title">Documentaries</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- About -->

	<div class="about">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="about_container d-flex flex-lg-row flex-column align-items-start justify-content-start">
						<div class="about_content">
							<div class="section_title"><h1>About Me</h1></div>
							<div class="about_text">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a bibendum sem. Fusce dignissim et diam quis pretium.  Etiam efficitur semper accumsan. Sed et dui aliquet, ultrices tellus non, sagittis magna. Nullam justo quam, vestibulum non magna et, tempus tincidunt est. Ut laoreet magna ac luctus lacinia. Aliquam eget neque turpis. Phasellus nibh ex, tristique a magna ac, convallis tincidunt diam. Nulla facilisi. Phasellus porta sapien sit amet tortor rhoncus mattis.</p>
							</div>
							<div class="social">
								<ul class="d-flex flex-row align-items-start justify-content-start">
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-soundcloud" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="about_image"><img src="home/images/man.png" alt=""></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="home/images/newsletter.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title light text-center"><h1>Join my Newsletter</h1></div>
					<div class="newsletter_text text-center">
						<p>Stay on track with the latest information about our podcasts, guests, special guest and giveaways.</p>
					</div>
				</div>
			</div>
			<div class="row newsletter_row">
				<div class="col-lg-10 offset-lg-1">
					<div class="newsletter_form_container">
						<form action="#" class="newsletter_form d-flex flex-md-row flex-column align-items-md-start align-items-center justify-content-md-between justify-content-start" id="newsletter_form">
							<input type="email" class="newsletter_input" required="required">
							<button class="newsletter_button button_fill">subscribe now!</button>
						</form>
					</div>
				</div>
			</div>
		</div>
    </div>
	@endsection
	
	@section('js')
	<script src="home/js/about.js"></script>
	@endsection