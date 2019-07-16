@extends('home.common.main')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/home/styles/episode.css">
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/home/styles/episode_responsive.css">
<link href="https://vjs.zencdn.net/7.4.1/video-js.css" rel="stylesheet">
	
@endsection
@section('content')
    <div>
      
                    
                    {{-- <video width="80%" height="80%" controls>
                            <source src="home/video/video.mp4" type="video/mp4">
                            <source src="home/video/video.ogg" type="video/ogg">
                            Your browser does not support the video tag.
                          </video> --}}

                          <video
                          id="my-video"
                          class="video-js vjs-big-play-centered"
                          controls
                          preload="auto"
                          poster="{{ url('/') }}/admins/media/{{ $media->image }}"
                          data-setup='{}'>
                        <source src="{{ url('/') }}/admins/media/{{ $media->media }}" type="video/mp4"></source>
                        <source src="{{ url('/') }}/admins/media/{{ $media->media }}" type="video/webm"></source>
                        <source src="{{ url('/') }}/admins/media/{{ $media->media }}" type="video/ogg"></source>
                        <p class="vjs-no-js">
                          To view this video please enable JavaScript, and consider upgrading to a
                          web browser that
                          <a href="https://videojs.com/html5-video-support/" target="_blank">
                            supports HTML5 video
                          </a>
                        </p>
                      </video>

        
        
        {{-- <div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content text-center">
                                
						</div>
					</div>
				</div>
			</div>		
        </div> --}}
        

	</div>

	<!-- Episode -->

	<div class="episode_container">
		<!-- Episode Image -->

		<div class="container">
			<div class="row">
				
				<!-- Sidebar -->
				<div class="col-lg-3 order-lg-1 order-2 sidebar_col">
					<div class="sidebar">

						<!-- Categories -->
						<div class="sidebar_list">
							<div class="sidebar_title">ໝວດໝູ່</div>
							<ul>
								@foreach($tags as $tag)
									<li><a href="#">{{ $tag->name }}</a></li>
									@endforeach
							</ul>
						</div>

						<!-- Tags -->
						<div class="sidebar_tags">
							<div class="sidebar_title">ແທັກ</div>
							<div class="tags">
								<ul class="d-flex flex-row align-items-start justify-content-start flex-wrap">
									@foreach($cates as $cate)
								<li><a href="#">{{ $cate->name }}</a></li>
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
							{!!   $media->description !!}
						</div>
					</div>
					<div class="guests">
						<div class="section_title">ແຂກຮັບເຊີນ</div>
						<div class="guests_container d-flex flex-md-row flex-column align-items-md-start align-items-center justify-content-start">
							
							<!-- Guest -->
							@foreach($video as $guest)
							<div class="guest_container">
								<div class="guest">
									<div class="guest_image"><img src="{{ url('/') }}/admins/guest/{{ $guest->Guest->photo }}" alt="guest"></div>
									<div class="guest_content text-center">
										<div class="guest_name"><a href="#">{{ $guest->Guest->name }}</a></div>
										<div class="guest_title">{{ $guest->Guest->position }}</div>
									</div>
								</div>
							</div>
							@endforeach

						</div>
					</div>

					<!-- Comments -->
				<div class="comments">
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

<script src='https://vjs.zencdn.net/7.4.1/video.js'></script>
<script src="//cdn.sc.gl/videojs-hotkeys/0.2/videojs.hotkeys.min.js"></script>
<script>
        var video = videojs("my-video", {
            playbackRates: [1, 1.5, 2, 2.5, 5],
            fluid: true,
            plugins: {
                hotkeys: {
                seekStep: 10,
                enableNumbers: false
            }
            }
        });
        </script>
@endsection