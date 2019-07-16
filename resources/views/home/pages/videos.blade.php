@extends('home.common.main')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/home/styles/videos.css">
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/home/styles/videos_responsive.css">

@endsection
@section('content')
<div class="video_container">
	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{ url('/') }}/home/images/about.jpg" data-speed="0.8"></div>
		<div class="home_container d-flex flex-column align-items-center justify-content-center">
			<div class="home_content">
				<div class="home_title"><h1>ລາຍການທຸກທິດທາງ</h1></div>
			</div>
		</div>
	</div>

	<!-- Episodes -->

	<div class="episodes">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="season_links">
						
					</div>
				</div>
			</div>
			<div class="row episodes_row">
				
				<!-- Sidebar -->
				<div class="col-lg-3">
					<div class="sidebar">
						
						<!-- Search -->
						<div class="sidebar_search">
						<div class="sidebar_title">ຄົ້ນຫາ</div>
						<form action="{{ url()->current() }}" class="search_form" id="search_form">
							<input type="text" class="search_input" name="query" value="{{ app('request')->get('query') }}" placeholder="ຄົ້ນຫາທີ່ນີ້">
							<button class="search_button"><img src="{{ url('/') }}/home/images/search.png" alt=""></button>
						</form>
					</div>

						<!-- Categories -->
						<div class="sidebar_list">
							<div class="sidebar_title">ໝວດໝູ່</div>
							<ul>
								@foreach($cates as $cate)
								<li><a href="#">{{ $cate->name }}</a></li>
								@endforeach
							</ul>
						</div>

						<!-- Tags -->
						<div class="sidebar_tags">
							<div class="sidebar_title">ແທັກ</div>
							<div class="tags">
								<ul class="d-flex flex-row align-items-start justify-content-start flex-wrap">
									@foreach($tags as $tag)
									<li><a href="#">{{ $tag->name }}</a></li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
				</div>

				<!-- Episodes -->
				<div class="col-lg-9 episodes_col">
					<div class="episodes_container">
						
						<!-- Episode -->
						@foreach($videos as $video)
						<div class="episode d-flex flex-row align-items-start justify-content-start s1">
							<a href="{{ route('video', $video->id) }}">
								<div class="episode_image">
									<img src="{{ url('/') }}/admins/media/{{ $video->image }}" alt="">
									<div class="tags">
										
									</div>
								</div>



								<div class="episode_content">
									<div class="episode_name"><a href="{{ route('video', $video->id) }}">{{ $video->title }}</a></div>
									<div class="episode_date"><a href="#">{{ $video->created_at->format('Y F d') }}</a></div>
									<div class="show_info d-flex flex-row align-items-start justify-content-start">
										@if(Auth::check())
								<div class="show_fav d-flex flex-row align-items-center justify-content-start">
									<div class="show_fav_icon show_info_icon" id="likeme_{{ $video->id }}"><img class="svg" src="home/images/heart.svg" alt=""></div>
									<div id="count_{{ $video->id }}" class="show_fav_count">{{ \App\Like::where('post_id', $video->id)->get()->count() }}</div>
								</div>
								@else
								<div class="show_fav d-flex flex-row align-items-center justify-content-start">
									<div data-toggle="modal" data-target="#exampleModal" class="show_fav_icon show_info_icon" id="likeme_{{ $video->id }}"><img class="svg" src="home/images/heart.svg" alt=""></div>
									<div id="count_{{ $video->id }}" class="show_fav_count">{{ \App\Like::where('post_id', $video->id)->get()->count() }}</div>
								</div>
								@endif
										<div class="show_comments">

											<div class="d-flex flex-row align-items-center justify-content-start">
												<div class="show_comments_icon show_info_icon"><img class="svg" src="home/images/speech-bubble.svg" alt=""></div>
												<div class="show_comments_count">{{ count($video->comments) }} Comments</div>
											</div>

										</div>
									</div>
									<!-- Player -->

								</div>
								</a>
							</div>
							@endforeach
						<!-- Episode -->
						


					</div>
				</div>




				
			</div>
		</div>

	</div>
	<div class="row page_nav_row mb-3">
		<div class="col">
			<div class="d-flex flex-row align-items-center justify-content-center">
			

					{{ $videos->links() }}
				
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
<script>
	@foreach($videos as $video)
	$(document).ready(function(){
			checkLike();

		 	$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': '{{ csrf_token() }}'
		        }
		    });
		 	var btnLike = $('#likeme_{{ $video->id }}'), likeCount = $('#count_{{ $video->id }}');
			btnLike.click(function(e){
				var post = { id: "{{ $video->id }}"};
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
			        url: '{{ url('/') }}/post/{{ $video->id  }}/islikedbyme',
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
<script src="{{ url('/') }}/home/js/videos.js"></script>
@endsection

{{-- <li class="active"><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li> --}}