@extends('home.common.main')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/home/styles/episodes.css">
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/home/styles/episodes_responsive.css">

@endsection
@section('content')
<div class="home">
	<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{ url('/') }}/home/images/about.jpg" data-speed="0.8"></div>
	<div class="home_container d-flex flex-column align-items-center justify-content-center">
		<div class="home_content">
			<div class="home_title"><h1>episodes</h1></div>
		</div>
	</div>
</div>

<!-- Episodes -->

<div class="episodes">
	<div class="container">

		<div class="row episodes_row">

			<!-- Sidebar -->
			<div class="col-lg-3 order-lg-1 order-1 sidebar_col">
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
			<div class="col-lg-9 episodes_col order-lg-2 order-2 sidebar_col">
				<div class="episodes_container">

					<!-- Episode -->
					@foreach($podcasts as $podcast)
					<div class="episode d-flex flex-row align-items-start justify-content-start s1">
						<div>
							<div class="episode_image">
								<img src="{{ url('/') }}/admins/media/{{ $podcast->image }}" alt="">
							</div>
						</div>
						<div class="episode_content">
							<div class="episode_name"><a href="{{ route('episode', $podcast->id) }}">{{ $podcast->title }}</a></div>
							<div class="episode_date"><a href="#">{{ $podcast->created_at->format('d M Y') }}</a></div>
							<div class="show_info d-flex flex-row align-items-start justify-content-start">
								@if(Auth::check())
								<div class="show_fav d-flex flex-row align-items-center justify-content-start">
									<div class="show_fav_icon show_info_icon" id="likeme_{{ $podcast->id }}"><img class="svg" src="home/images/heart.svg" alt=""></div>
									<div id="count_{{ $podcast->id }}" class="show_fav_count">{{ \App\Like::where('post_id', $podcast->id)->get()->count() }}</div>
								</div>
								@else
								<div class="show_fav d-flex flex-row align-items-center justify-content-start">
									<div data-toggle="modal" data-target="#exampleModal" class="show_fav_icon show_info_icon" id="likeme_{{ $podcast->id }}"><img class="svg" src="home/images/heart.svg" alt=""></div>
									<div id="count_{{ $podcast->id }}" class="show_fav_count">{{ \App\Like::where('post_id', $podcast->id)->get()->count() }}</div>
								</div>
								@endif
								<div class="show_comments">
									<a href="#">
										<div class="d-flex flex-row align-items-center justify-content-start">
											<div class="show_comments_icon show_info_icon"><img class="svg" src="home/images/speech-bubble.svg" alt=""></div>
											<div class="show_comments_count">{{ count($podcast->comments) }} ຄວາມຄິດເຫັນ</div>
										</div>
									</a>	
								</div>
							</div>
							<!-- Player -->
							<div class="single_player_container">

								<div class="single_player d-flex flex-row align-items-center justify-content-start">
									<div id="jplayer_1" class="jp-jplayer"></div>
									<div id="jp_container_1" class="jp-audio" role="application" aria-label="media player">
										<div class="jp-type-single">
											<div class="player_controls">
												<div class="jp-gui jp-interface d-flex flex-row align-items-center justify-content-start">
													<div class="jp-controls-holder time_controls d-flex flex-row align-items-center justify-content-between">
														<div>
															<div class="jp-controls-holder play_button ml-auto">
																<button class="jp-play" tabindex="0"></button>
															</div>
														</div>
														<div>
															<div class="jp-progress">
																<div class="jp-seek-bar">
																	<div class="jp-play-bar"></div>
																</div>
															</div>
														</div>
													</div>
													<div class="jp-volume-controls d-flex flex-row align-items-center justify-content-between ml-auto">
														<div class="d-flex flex-row align-items-center justify-content-start">
															<button class="jp-mute" tabindex="0"></button>
														</div>
														<div class="d-flex flex-row align-items-center justify-content-start">
															<div class="jp-volume-bar">
																<div class="jp-volume-bar-value"></div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="jp-no-solution">
												<span>Update Required</span>
												To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>

					@endforeach

				</div>
			</div>
		</div>
		<div class="row page_nav_row">
		<div class="col">
			<div class="d-flex flex-row align-items-center justify-content-center">
			

					{{ $podcasts->links() }}
				
			</div>
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
		 	var btnLike = $('#likeme_{{ $podcast->id }}'), likeCount = $('#count_{{ $podcast->id }}');
			btnLike.click(function(e){
				var post = { id: "{{ $podcast->id }}"};
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
			        url: '{{ url('/') }}/post/{{ $podcast->id  }}/islikedbyme',
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
@endsection