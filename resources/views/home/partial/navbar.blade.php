<header class="header trans_400">

		<!-- Logo -->
		<div class="logo">
			<a href="#"><img style="max-height: 50px;" src="{{ url('/') }}/admins/weblogo/{{ $logo->logo }}" alt=""></a>
		</div>

		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_content d-flex flex-row align-items-center justify-content-start trans_400">
						<nav class="main_nav">
							<ul class="d-flex flex-row align-items-start justify-content-start">
								<li><a href="/">ໜ້າຫຼັກ</a></li>
								<li><a href="{{ route('videos') }}">ລາຍການທຸກທິດທາງ</a></li>
								<li><a href="{{ route('episodes') }}">Podcast</a></li>
								<li><a href="{{ route('getMagazine') }}">ວາລະສານ</a></li>
								<li><a href="{{ route('blog') }}">ຂໍ້ມູນຂ່າວສານ</a></li>
								
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<!-- Submit & Social -->
		<div class="header_right d-flex flex-row align-items-start justify-content-start">

			
			<!-- Social -->
			@if(!Auth::check())
			<div class="login">
				<ul class="d-flex flex-row align-items-start justify-content-start">
					<li><button data-toggle="modal" data-target="#exampleModal" type="button" class="btn login-button">ເຂົ້າສູ່ລະບົບ</button></li>
					<li><button type="button" onclick="window.location='{{ route('getSignup') }}'" class="btn login-button">ລົງທະບຽນ</button></li>
				</ul>
			</div>
			@else
			<div class="login">
				<ul class="d-flex flex-row align-items-start justify-content-start">
					<li><button onclick="window.location='{{ route('getProfile') }}'" type="button" class="btn login-button">ໂປຣຟາຍ</button></li>
					<button onclick="window.location='{{ route('logout') }}'" type="button" class="btn login-button">ອອກຈາກລະບົບ</button></li>
	
				</ul>
			</div>
			@endif
			<!-- Hamburger -->
			<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
			
		</div>
    </header>
    
    <!-- Menu -->

	<div class="menu">
		<div class="menu_content d-flex flex-column align-items-end justify-content-start">
			<ul class="menu_nav_list text-right">
				<li><a href="/">ໜ້າຫຼັກ</a></li>
								<li><a href="{{ route('videos') }}">ວີດີໂອ</a></li>
								<li><a href="{{ route('episodes') }}">Podcast</a></li>
								<li><a href="{{ route('blog') }}">ຂໍ້ມູນຂ່າວສານ</a></li>
								<li><a href="{{ route('getMagazine') }}">ວາລະສານ</a></li>
								<li><a href="{{ route('contact') }}">ຕິດຕໍ່ພວກເຮົາ</a></li>
			</ul>
		</div>
	</div>