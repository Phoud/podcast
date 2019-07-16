<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row footer_logo_row">
				<div class="col d-flex flex-row align-items-center justify-content-center">
					<div class="logo">
						<a href="#"><img style="max-height: 50px;" src="https://uc0cfeaec178c5b507de2e3e56cb.previews.dropboxusercontent.com/p/thumb/AAZ0wOE7RocvRyDvy4iTKuHS9ey_dqy6s6mGqVqbLehGMUL-aLUfVQfWuCfTnDes-5-nQxwHtXyWPnVUdYpORH0VxUo_ZXcF1R3OasmCZ1vQh9QCy28Jz2GcP1tWGiRU3r5dev7I55NCLoM3OnLpTyo3w5BNymI1bFOqSwSjXVcUE8od08OM3sTha2C0rGd3AudTQm9nC0Dvl5VprkOldzRowrq3E9tyIeCd33IsfhVuKVTqRtKrYwa67m2w1Ymqzv72L5loDFdz1LLEl9MK35oHfJDCl3q0xeMxajqn3x3fWYXplmrUHN0oMCp2qrXbpXf5wD73RQi-qhM3IxcCDdW5fDCpSX3HQHHtvyvUn3DRLMyRCCZA8B1f9NND4JgXWRc/p.jpeg?size_mode=5" alt=""></a>
					</div>
				</div>
			</div>
			<div class="row footer_content_row">
				
				<!-- Tags -->
				<div class="col-lg-4">
					<div class="footer_title">ແທັກ</div>
					<div class="footer_list">
						@foreach($tags as $tag)
						<div><div><a href="#">{{ $tag->name }}</a></div></div>
						@endforeach
					</div>
				</div>

				<!-- Latest Episodes -->
				<div class="col-lg-4">
					<div class="footer_title">ຂໍ້ມູນທີ່ສໍາຄັນ</div>
					<div class="latest_container">
						
						{{-- Footer content --}}
					<div class="footer-menu">
						<ul>
						{{-- <li><a class="footer-menu-list" href="{{ route('about') }}">ກ່ຽວກັບພວກເຮົາ</a></li> --}}
						<li><a class="footer-menu-list" href="{{ route('contact') }}">ຕິດຕໍ່ພວກເຮົາ</a></li>
						</ul>
					</div>
				
					</div>
				</div>

				<!-- Gallery -->
				<div class="col-lg-4">
					<div class="footer_title">ຂໍ້ມູນຕິດຕໍ່</div>
					<div class="latest_container">
						
						{{-- Footer content --}}
					<div class="footer-menu">
						<ul>
						<li><a class="footer-menu-list" href="#">{{ $contact->tel }}</a></li>
						<li><a class="footer-menu-list" href="#">{{ $contact->email }}</a></li>
						<li><a class="contact" href="#">{!! $contact->address !!}</a></li>
						</ul>
					</div>
				
					</div>

					</div>
				</div>
			</div>
{{-- 			<div class="row footer_social_row">
				<div class="col">
					<div class="footer_social">
						<ul class="d-flex flex-row align-items-center justify-content-center">
							<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-soundcloud" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div> --}}

</br>
<div class="ml-5">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | 108Megaheard

		</div>
	</footer>
</div>



<script src="{{ url('/') }}/home/js/jquery-3.3.1.min.js"></script>
<script src="{{ url('/') }}/home/styles/bootstrap-4.1.2/popper.js"></script>
<script src="{{ url('/') }}/home/styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="{{ url('/') }}/home/plugins/greensock/TweenMax.min.js"></script>
<script src="{{ url('/') }}/home/plugins/greensock/TimelineMax.min.js"></script>
<script src="{{ url('/') }}/home/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="{{ url('/') }}/home/plugins/greensock/animation.gsap.min.js"></script>
<script src="{{ url('/') }}/home/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="{{ url('/') }}/home/plugins/easing/easing.js"></script>
<script src="{{ url('/') }}/home/plugins/colorbox/jquery.colorbox-min.js"></script>
<script src="{{ url('/') }}/home/plugins/progressbar/progressbar.min.js"></script>
<script src="{{ url('/') }}/home/plugins/parallax-js-master/parallax.min.js"></script>
<script src="{{ url('/') }}/home/plugins/jPlayer/jquery.jplayer.min.js"></script>
<script src="{{ url('/') }}/home/plugins/jPlayer/jplayer.playlist.min.js"></script>
<script src="{{ url('/') }}/home/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="{{ url('/') }}/home/js/custom.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>



