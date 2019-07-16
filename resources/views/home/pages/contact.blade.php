@extends('home.common.main')
@section('css')
	<link rel="stylesheet" type="text/css" href="{{ url('/') }}/home/styles/contact.css">
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/home/styles/contact_responsive.css">
@endsection
@section('content')
<div class="contact_container">
<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{ url('/') }}/home/images/contact.jpg" data-speed="0.8"></div>
		<div class="home_container d-flex flex-column align-items-center justify-content-center">
			<div class="home_content">
				<div class="home_title"><h1>ຕິດຕໍ່ພວກເຮົາ</h1></div>
			</div>
		</div>
	</div>
	

	<!-- Contact -->

	<div class="contacts">
		<div class="container">
			<div class="row">
				<div class="col">
					@if(isset($contact))
					<div class="contact-info text-center">
						<p>ໂທລະສັບ: {{ $contact->tel }}</p>
						<p>ທີ່ຢູ່ ອີເມວ: {{ $contact->email }}</p>
						<p>ທີ່ຢູ່: {!! $contact->address !!}</p>
					</div>
					@endif
					<!-- Contact Form -->
						
					<div class="contact_form_container">
						<div class="contact_form_title text-center">ສົ່ງຂໍ້ຄວາມ</div>
						<div class="row">
							<div class="col-lg-8 offset-lg-2">
								<form action="{{ route('contactForm') }}" class="contact_form" method="POST">
									@csrf
									<div class="row">
										<div class="col-md-6 contact_col">
											<input type="text" class="contact_input" placeholder="ຊື່" name="name" required="required">
										</div>
										<div class="col-md-6">
											<input type="email" class="contact_input" placeholder="ທີ່ຢູ່ອີເມວ" name="email" required="required">
										</div>
									</div>
									<div><input type="text" class="contact_input" name="subject" placeholder="ຫົວຂໍ້"></div>
									<div><textarea class="contact_input contact_textarea" placeholder="ຂໍ້ຄວາມ" name="message" required="required"></textarea></div>
									<button class="contact_button button_fill ml-auto mr-auto">ສົ່ງ</button>
								</form>
							</div>
						</div>	
					</div>
					<!-- Google Map -->
					<div class="google_map_container">
						<div class="map">
							<div id="google_map" class="google_map">
								<div class="map_container">
									<div id="map"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    </div>
@endsection
@section('js')
<script src="{{ url('/') }}/home/js/contact.js"></script>
@endsection