@extends('home.common.main')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/home/styles/episode.css">
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/home/styles/episode_responsive.css">

@endsection
@section('content')
<div class="home">
	<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{ url('/') }}/home/images/about.jpg" data-speed="0.8"></div>
	<div class="home_container">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_content text-center">
						<div class="home_title"><h1>{{ $media->title }}</h1></div>
						<div class="home_subtitle text-center">{{ $media->created_at->format('d M Y') }}</div>
					</div>
				</div>
			</div>
		</div>		
	</div>
	<div class="home_player_container">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 offset-lg-3">
								{{-- @if($errors->any())
					<div class="alert alert-danger" role="alert">
					  {{ $errors->first() }}
					</div>
					@endif --}}
					<!-- Episode -->
					<div class="player d-flex flex-row align-items-start justify-content-start s1">
						<div class="player_content">

							<!-- Player -->
							<div class="single_player_container">
								<div class="single_player d-flex flex-row align-items-center justify-content-start">
									<div id="jplayer_{{ $media->id }}" class="jp-jplayer"></div>
									<div id="jp_container_{{ $media->id }}" class="jp-audio" role="application" aria-label="media player">
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

							<div class="show_info d-flex flex-row align-items-start justify-content-start">
								@if(Auth::check())
								<div class="show_fav d-flex flex-row align-items-center justify-content-start">
									<div class="show_fav_icon show_info_icon"><img class="svg" src="{{ url('/') }}/home/images/heart.svg" alt=""></div>
									<div class="show_fav_count">{{ \App\Like::where('post_id', $media->id)->get()->count() }}</div>
								</div>
								@else
								<div class="show_fav d-flex flex-row align-items-center justify-content-start">
									<div data-toggle="modal" data-target="#exampleModal" class="show_fav_icon show_info_icon"><img class="svg" src="{{ url('/') }}/home/images/heart.svg" alt=""></div>
									<div class="show_fav_count">{{ \App\Like::where('post_id', $media->id)->get()->count() }}</div>
								</div>
								@endif
								<div class="show_comments">
									<a href="#comment">
										<div class="d-flex flex-row align-items-center justify-content-start">
											<div class="download"><i style="color: white;" class="fa fa-comments"></i></div>
											<div class="show_comments_count">{{ count($media->comments) }} ຄວາມຄິດເຫັນ</div>
										</div>
									</a>	
								</div>
								@if(Auth::check())
								<div class="show_comments">
										<a href="{{ route('getDonwload', $media->id) }}">
											<div class="d-flex flex-row align-items-center justify-content-start">
												<div class="download"><i style="color: white;" class="fa fa-download"></i></div>
												<div class="show_comments_count">Download</div>
											</div>
										</a>	
									</div>

									@else
									<div class="show_comments">
										<a href="" data-toggle="modal" data-target="#exampleModal">
											<div class="d-flex flex-row align-items-center justify-content-start">
												<div class="download"><i style="color: white;" class="fa fa-download"></i></div>
												<div class="show_comments_count">Download</div>
											</div>
										</a>	
									</div>
									@endif
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Episode -->

<div class="episode_container">

	<!-- Episode Image -->
	<div class="episode_image_container">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<!-- Episode Image -->
					<div class="episode_image"><img src="{{ url('/') }}/admins/media/{{ $media->image }}" alt=""></div>

				</div>
			</div>
		</div>
	</div>

	<div class="container mt-3">
		<div class="row">

			<!-- Sidebar -->
			<div class="col-lg-3 order-lg-1 order-2 sidebar_col">
				<div class="sidebar">

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

			<!-- Episode -->
			<div class="col-lg-9 episode_col order-lg-2 order-1">
				<div class="intro">
					<div class="section_title">{{ $media->title }}</div>
					<div class="intro_text">
						<p>{!! $media->description !!}</p>
					</div>
				</div>
				<div class="guests">
					<div class="section_title">ແຂກຮັບເຊີນ</div>
					<div class="guests_container d-flex flex-md-row flex-column align-items-md-start align-items-center justify-content-start">

						<!-- Guest -->
						@foreach($episode as $episode)
						<div class="guest_container">
							<div class="guest">
								<div class="guest_image"><img src="{{ url('/') }}/admins/guest/{{ $episode->Guest->photo }}" alt="geust"></div>
								<div class="guest_content text-center">
									<div class="guest_name"><a href="#">{{ $episode->Guest->name }}</a></div>
									<div class="guest_title">{{ $episode->Guest->position }}</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>

				<!-- Comments -->
				@if(count($media->comments) > 0)
				<div class="comments" id="comment">
					<div class="section_title">ຄວາມຄິດເຫັນ</div>
					<div class="comments_container">
						<ul>

							<!-- Comment -->
							@foreach($media->comments as $comment)
							<li class="d-flex flex-row">
								<div>
									<div class="comment_image"><img style="border-radius: 50%;" src="{{ url('/') }}/home/images/{{ isset($comment->user->profile) ? $comment->user->profile : 'user.png' }}" alt="profile"></div>
								</div>
								<div class="comment_content">
									<div class="user_name"><a href="#">{{ $comment->user->name }}</a></div>
									<div class="comment_text">
										<p>{{ $comment->comment }}</p>
									</div>
								</div>
							</li>
							@endforeach

						</ul>
					</div>
				</div>
				@endif

				<!-- Leave a Comment -->
				
				<div class="comment_form_container">
					<div class="section_title">ສະແດງຄວາມຄິດເຫັນ</div>
					<form action="{{ route('postComment') }}" id="comment_form" class="comment_form" method="POST">
						@csrf
						<input type="hidden" value="{{ $media->id }}" name="post_id">
						<div><textarea class="comment_input comment_textarea" placeholder="ຄວາມຄິດເຫັນ" required="required" name="comment"></textarea></div>
						@if(Auth::check())
						<button class="comment_button button_fill mb-5">ສົ່ງຄວາມຄິດເຫັນ</button>
						@else
						<div class="mb-5">
							ກະລຸນາ <a href="" data-toggle="modal" data-target="#exampleModal" class="title">ເຂົ້າສູ່ລະບົບ</a> ເພື່ອຄອມເມັ້ນ
							ຫຼື<a href="{{ route('getSignup') }}"> ລົງທະບຽນ</a>
						</div>
						@endif
					</form>
				</div>
				
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
<script type="text/javascript">
	$(document).ready(function(){
			checkLike();
		 	$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': '{{ csrf_token() }}'
		        }
		    });
		 	var btnLike = $('.show_fav_icon.show_info_icon'), likeCount = $('.show_fav_count');
			btnLike.click(function(e){
				var post = { id: "{{ $media->id }}"};
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
			        url: '{{ url('/') }}/post/{{ $media->id  }}/islikedbyme',
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

			if($(".jp-jplayer").length)
			{
				$("#jplayer_{{ $media->id }}").jPlayer({
					ready: function () {
						$(this).jPlayer("setMedia", {
								title:"Better Days",
								artist:"Bensound",
								mp3:"{{ url('/') }}/stream/{{ $media->media }}"
						});
					},
					play: function() { // To avoid multiple jPlayers playing together.
						$(this).jPlayer("pauseOthers");
					},
					swfPath: "{{ url('/') }}/home/plugins/jPlayer",
					supplied: "mp3",
					cssSelectorAncestor: "#jp_container_{{ $media->id }}",
					wmode: "window",
					globalVolume: false,
					useStateClassSkin: true,
					autoBlur: false,
					smoothPlayBar: true,
					keyEnabled: true,
					solution: "html,flash",
					preload: 'metadata',
					volume: 0.2,
					muted: false,
					backgroundColor: '#000000',
					errorAlerts: false,
					warningAlerts: false
				});
			}
	});

</script>
@endsection