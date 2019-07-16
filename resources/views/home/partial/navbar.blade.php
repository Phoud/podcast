<header class="header trans_400">

		<!-- Logo -->
		<div class="logo">
			<a href="#"><img style="max-height: 50px;" src="https://uc0cfeaec178c5b507de2e3e56cb.previews.dropboxusercontent.com/p/thumb/AAZ0wOE7RocvRyDvy4iTKuHS9ey_dqy6s6mGqVqbLehGMUL-aLUfVQfWuCfTnDes-5-nQxwHtXyWPnVUdYpORH0VxUo_ZXcF1R3OasmCZ1vQh9QCy28Jz2GcP1tWGiRU3r5dev7I55NCLoM3OnLpTyo3w5BNymI1bFOqSwSjXVcUE8od08OM3sTha2C0rGd3AudTQm9nC0Dvl5VprkOldzRowrq3E9tyIeCd33IsfhVuKVTqRtKrYwa67m2w1Ymqzv72L5loDFdz1LLEl9MK35oHfJDCl3q0xeMxajqn3x3fWYXplmrUHN0oMCp2qrXbpXf5wD73RQi-qhM3IxcCDdW5fDCpSX3HQHHtvyvUn3DRLMyRCCZA8B1f9NND4JgXWRc/p.jpeg?size_mode=5" alt=""></a>
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