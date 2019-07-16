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
			<div class="home_title"><h1>ວາລະສານ</h1></div>
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
					
					{{-- <div class="episode d-flex flex-row align-items-start justify-content-start s1"> --}}
						
						
					{{-- </div> --}}

					<div class="row">
						@foreach($magazines as $mag)
						<div class="col-md-4 col-sm-12 mt-5 text-center">
							<a href="{{ route('viewMagazine', $mag->id) }}">
							<div>
								<img class="shadow" style="max-height: 250px" src="{{ url('/') }}/admins/magazine/{{ $mag->cover }}" alt="">
							</div>
							
							<div class="mt-3">
								<p>ສະບັບທີ {{ $mag->issue }}</p>
								<p>ຈັດພິມວັນທີ {{ $mag->date_of_publish }}</p>
							</div>
							</a>
						</div>
						@endforeach
					</div>

	

				</div>
			</div>
		</div>
		<div class="row page_nav_row">
		<div class="col">
			<div class="d-flex flex-row align-items-center justify-content-center">
			

					{{ $magazines->links() }}
				
			</div>
		</div>
	</div>
	</div>
</div>
@endsection
@section('js')
<script src="home/js/episodes.js"></script>
@endsection