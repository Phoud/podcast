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
				<div class="home_title"><h1>ຂໍ້ມູນຂ່າວສານ</h1></div>
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

				<!-- Blog -->
				<div class="col-lg-9 blog_col order-lg-2 order-1">
					<div class="blog_posts">
						
						<!-- Blog Post -->

						@foreach($blogs as $blog)
						<div class="blog_post d-flex flex-md-row flex-column align-items-start justify-content-start">
							<div class="blog_post_image">
								<img src="{{ url('/') }}/admins/blog/{{ $blog->image }}" alt="news-image">
								<div class="blog_post_date"><a href="{{ route('read', $blog->id) }}">{{ $blog->created_at->format('d M Y') }}</a></div>
							</div>
							<div class="blog_post_content">
								<div class="blog_post_title"><a href="{{ route('read', $blog->id) }}">{{ $blog->title }}</a></div>
								<div class="blog_post_author">By <a href="#">Michael Smith</a></div>
								<div class="blog_post_text">
									{!! $blog->body !!}
								</div>
								<div class="blog_post_link"><a href="{{ route('read', $blog->id) }}">Read More</a></div>
							</div>
						</div>

						@endforeach

					</div>
				</div>
			</div>

			<!-- Page Nav -->
			<div class="row page_nav_row">
				<div class="col">
					<div class="d-flex flex-row align-items-center justify-content-center">
						
							{{ $blogs->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('js')
<script src="{{ url('/') }}/home/js/blog.js"></script>
@endsection