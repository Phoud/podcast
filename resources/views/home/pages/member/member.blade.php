@extends('home.common.main')
@section('css')
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/home/styles/blog.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/home/styles/blog_responsive.css">
@endsection
@section('content')
    <div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="home/images/blog.jpg" data-speed="0.8"></div>
		<div class="home_container d-flex flex-column align-items-center justify-content-center">
			<div class="home_content">
				<div class="home_title"><h1>ຂໍ້ມູນໂພຟາຍ</h1></div>
			</div>
		</div>
	</div>

	<!-- Blog -->

	<div class="blog">
		<div class="container">
			<div class="row">
				
				<!-- Sidebar -->
				<div class="col-lg-3 order-lg-1 order-2 sidebar_col">
					<div class="sidebar">
						
						<!-- Search -->
						<div class="sidebar_search">
							<div class="sidebar_title">ຄົ້ນຫາ</div>
							<form action="#" class="search_form" id="search_form">
								<input type="text" class="search_input" placeholder="ຄົ້ນຫາທີ່ນີ້" required="required">
								<button class="search_button"><img src="home/images/search.png" alt=""></button>
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

				<!-- Blog -->
				<div class="col-lg-9 blog_col order-lg-2 order-1">
					<div class="row">
						
					
					<div class="col-md-3 col-sm-12 order-1 d-flex justify-content-center">
						<div class="profile-image">
							<img style="max-height: 150px;" src="{{ url('/') }}/home/images/{{ isset($profile->profile) ? $profile->profile : 'user.png'  }}" alt="user">
						</div>
						
					</div>

					<div class="col-md-9 col-sm-12 order-2">
						<h3 class="mt-15">{{ $profile->name }}</h3>
						<div class="email">
							<p>{{ $profile->email }}</p>
						</div>
							<div>
						<button type="button" onclick="window.location='{{ route('getProfileUpdate', $profile->id) }}'" class="btn btn-outline-secondary mt-15">ແກ້ໄຂໂພຟາຍ</button>
						</div>
						
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('js')
<script src="{{ url('/') }}/home/js/blog.js"></script>
@endsection