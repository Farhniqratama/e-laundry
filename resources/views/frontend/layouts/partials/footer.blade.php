<div class="footer-middle">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3">
				<div class="widget">
					<h4 class="widget-title pb-2 mb-1">Kontak Kami</h4>
					<ul class="contact-info">
						<li>
							<span class="contact-info-label">Alamat:</span>Jl. Komp. Listrik, Utan Panjang, Kec. Kemayoran, Kota Jakarta Pusat, Jawa Timur 16451
						</li>
						<li>
							<span class="contact-info-label">Phone:</span>0877-1681-6892
						</li>
					</ul>
				</div>
				<!-- End .widget -->
			</div>
			<!-- End .col-lg-3 -->

			<div class="col-lg-9">
				<div class="row footer-content">
					<div class="col-lg-4">
						<div class="widget">
							<h4 class="widget-title">My Account</h4>

							<div class="row">
								<div class="col-sm-6">
									<ul class="links mb-0">
										@if(!empty(session('auth_user')))
										<li><a href="{{ URL::to('profil') }}" class="">Profil</a></li>
										<li><a href="{{ URL::to('logout-user') }}" class="">Logout</a></li>
										@else
										<li><a href="{{ URL::to('login-user') }}" class="">Login</a></li>
										@endif
									</ul>
								</div>
								<!-- End .col-sm-6 -->
							</div>
							<!-- End .row -->
						</div>
						<!-- End .widget -->
					</div>
					<!-- End .col-md-4 -->

					<div class="col-lg-5 mb-sm-2">
						<div class="widget">
							<h4 class="widget-title">Cabang Kami</h4>
							@php $cabangKami = getToko(); @endphp
							<div class="row">
								<div class="col-sm-12">
									<ul class="links mb-0">
										@foreach ($cabangKami as $valCabang)
										<li><a href="#">{{ $valCabang->cabang }}</a></li>
										@endforeach
									</ul>
								</div>
							</div>
							<!-- End .row -->
						</div>
						<!-- End .widget -->
					</div>
					<!-- End .col-md-5 -->

					<div class="col-lg-3">
						<div class="widget widget-time">
							<h4 class="widget-title mb-1">Working Days/Hours</h4>
							<ul class="contact-info">
								<li>
									Mon - Sun / 9:00AM - 8:00PM
								</li>
							</ul>
						</div>
						<!-- End .widget -->
					</div>
					<!-- End .col-md-33 -->
				</div>
				<!-- End .row -->

				<div class="footer-bottom d-sm-flex align-items-center">
					<div class="footer-left">
						<span class="footer-copyright">Toko Rendy Parfum. © 2021 All Rights Reserved</span>
					</div>
				</div>
				<!-- End .footer-bottom -->
			</div>
			<!-- End .col-lg-9 -->
		</div>
		<!-- End .row -->
	</div>
	<!-- End .container-fluid -->
</div>