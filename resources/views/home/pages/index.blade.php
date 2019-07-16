@extends('home.common.main')
@section('css')
<link href="home/plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/home/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/home/styles/responsive.css">
@endsection
@section('content')
<div class="home">
		<div class="background_image" style="background-image:url({{ url('/') }}/home/images/index.jpg)"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="feature">

							<div class="tags">
								<ul class="d-flex flex-row align-items-start justify-content-start">
									@foreach($latest->media_tag as $post_tag)
									<li><a onclick="return false;" href="">{{ $post_tag->tag->name }}</a></li>
									@endforeach
								</ul>
							</div>
							<a href="{{ $latest->mediaType === 'podcast' ? route('episode', $latest->id) : route('video', $latest->id) }}">
							<div class="home_title"><h1>{{ $latest->title }}</h1></div>
							</a>
							<div class="track_info">
								<ul class="d-flex flex-row align-items-start justify-content-start">
									<li><a href="#">{{ $latest->created_at->format('M d Y') }}</a></li>
							
									<li><a href="#">{{ count($latest->comments) }} Comments</a></li>
								</ul>
							</div>
							


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Shows -->

	<div class="shows home-cover">
		<div class="container">
			<div class="row shows_row">
				
				<!-- Show -->
				@foreach($podcasts as $podcast)
				<div class="col-lg-4 text-center">
					<div class="show">
						<div class="show_image">
							<a href="{{ route('episode', $podcast->id) }}">
								<img src="{{ url('/') }}/admins/media/{{ $podcast->image }}" alt="https://unsplash.com/@icons8">
							</a>
							{{-- <div class="show_tags">
								<div class="tags">
									<ul class="d-flex flex-row align-items-start justify-content-start text-center">
										<li><a href="#">Music</a></li>
									</ul>
								</div>
							</div> --}}
							<div class="show_play_icon"><img src="{{ url('/') }}/home/images/play.svg" alt="play"></div>
						</div>
						<div class="show_content">
							<div class="show_date"><a href="{{ route('episode', $podcast->id) }}">{{ $podcast->created_at->format('d M Y') }}</a></div>
							<div class="show_title"><a href="{{ route('episode', $podcast->id) }}">{{ $podcast->title }}</a></div>
							<div class="show_info d-flex flex-row align-items-start justify-content-start text-center">
								<div class="show_fav d-flex flex-row align-items-center justify-content-start">
									<div class="show_fav_icon show_info_icon"><img class="svg" src="home/images/heart.svg" alt=""></div>
									<div class="show_fav_count">{{ \App\Like::where('post_id', $podcast->id)->get()->count() }}</div>
								</div>
								<div class="show_comments">
									<a href="{{ route('episode', $podcast->id) }}">
										<div class="d-flex flex-row align-items-center justify-content-start">
											<div class="show_comments_icon show_info_icon"><img class="svg" src="home/images/speech-bubble.svg" alt=""></div>
											<div class="show_comments_count">{{ count($podcast->comments) }} ຄວາມຄິດເຫັນ</div>
										</div>
									</a>	
								</div>
							</div>
						</div>
					</div>
				</div>

			@endforeach
			</div>
			<div class="row">
				<div class="col text-center">
					<div class="button_fill shows_button"><a href="{{ route('episodes') }}">ເບິ່ງທັງໝົດ</a></div>
				</div>
			</div>
		</div>
	</div>

	<!-- Bi Weekly -->

	<div class="weekly">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="home/images/weekly.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row row-eq-height">
				
				<!-- Weekly Content -->

				<div class="col-lg-6">
					<a href="{{ route('video', $videos->id) }}">
					<div class="weekly_content d-flex flex-column align-items-start justify-content-lg-center justify-content-start">
						<div>
							<div class="weekly_title"><h1>{{ $videos->title }}</h1></div>
							<div class="weekly_text">
								{!! $videos->description !!}
							</div>
						</div>
					</div>
				</a>
				</div>

				<!-- Weekly Image -->
				<div class="col-lg-6">
					<a href="{{ route('video', $videos->id) }}">
					<div class="weekly_image">
						<img src="{{ url('/') }}/admins/media/{{ $videos->image }}" alt="">
						
					</div>
					</a>
				</div>
			
			</div>
		</div>
	</div>

	<!-- Shows 2 -->

	<div class="shows_2">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="shows_2_title mb-30">ວາລະສານ</div>
				</div>
			</div>
			<div class="row">
				
				<!-- Show -->
				@foreach($magazines as $mag)
				<div class="col-xl-3 col-md-6 col-sm-12 text-center mb-30">
					<div class="show">
						<div class="show_image">
							<a href="{{ route('viewMagazine', $mag->id) }}">
								<img src="{{ url('/') }}/admins/magazine/{{ $mag->cover }}" alt="magazine">
							</a>

						</div>
					</div>
				</div>
				@endforeach

			</div>
			<div class="row">
				<div class="col text-center">
					<div class="button_fill shows_2_button"><a href="{{ route('getMagazine') }}">ເບິ່ງທັງໝົດ</a></div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('js')
<script>
	@foreach($podcasts as $podcast)
	$(document).ready(function(){
			checkLike();

		 	$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': '{{ csrf_token() }}'
		        }
		    });
		 	var btnLike = $('#likeme_{{ $feature->id }}'), likeCount = $('#count_{{ $feature->id }}');
			btnLike.click(function(e){
				var post = { id: "{{ $feature->id }}"};
				$.ajax({
			        type: "POST",
			        url: '{{ url('/') }}/post/like',
            		data: post,
            		dataType: 'JSON',
			        success: function(data) {
			        	if(data.success) {
			        		likeCount.get(0).innerHTML = data.count;
			        	}
				        checkLike();
			        }
			    });
				checkLike();
			});

			function checkLike(){
				$.ajax({
			        type: "GET",
			        url: '{{ url('/') }}/post/{{ $feature->id  }}/islikedbyme',
			        success: function(data) {
				        if (data == 'true') {
		                  btnLike.addClass('active');
		                } else {
		                  btnLike.removeClass('active');
		                }
			        },
			        error: function(e){
			        	console.log('error: ', e.responseJSON);
			        }
			    });
	        };
	    });
	@endforeach
</script>
<script src="home/js/episodes.js"></script>
@stop