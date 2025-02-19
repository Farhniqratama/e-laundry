<div class="footer-middle">
	<div class="container">
		<div class="row">
			<!-- Contact Information -->
			<div class="col-lg-3 col-md-6 col-sm-12 mb-4">
				<div class="widget">
					<h4 class="widget-title pb-2 mb-1">Kontak Kami</h4>
					<ul class="contact-info">
						<li>
							<span class="contact-info-label">Alamat:</span>
							Coming Soon 2026
						</li>
						<li>
							<span class="contact-info-label">Phone:</span>
							<a href="tel:+6287716816892">0877-1681-6892</a>
						</li>
					</ul>
				</div>
			</div>

			<!-- My Account Section -->
			<div class="col-lg-3 col-md-6 col-sm-12 mb-4">
				<div class="widget">
					<h4 class="widget-title">My Account</h4>
					<ul class="links">
						@if(!empty(session('auth_user')))
						<li><a href="{{ URL::to('profil') }}">Profil</a></li>
						<li><a href="{{ URL::to('logout-user') }}">Logout</a></li>
						@else
						<li><a href="{{ URL::to('login-user') }}">Login</a></li>
						@endif
					</ul>
				</div>
			</div>

			<!-- Store Branches -->
			<div class="col-lg-3 col-md-6 col-sm-12 mb-4">
				<div class="widget">
					<h4 class="widget-title">Cabang Kami</h4>
					@php $cabangKami = getToko(); @endphp
					<ul class="links">
						@foreach ($cabangKami as $valCabang)
						<li><a href="#">{{ $valCabang->cabang }}</a></li>
						@endforeach
					</ul>
				</div>
			</div>

			<!-- Working Hours & Social Media Grouped -->
			<div class="col-lg-3 col-md-6 col-sm-12 mb-4">
				<div class="widget">
					<h4 class="widget-title">Working Days/Hours</h4>
					<ul class="contact-info">
						<li>Mon - Sun / 9:00AM - 8:00PM</li>
					</ul>

					<!-- Social Media Links (Grouped with Work Days) -->
					<span class="social-title">Follow us</span>
					<div class="social-icons">
						<a href="https://instagram.com" class="social-icon" target="_blank">
							<img src="{{ asset('instagram.png') }}" alt="Instagram">
						</a>
						<a href="https://www.tiktok.com" class="social-icon" target="_blank">
							<img src="{{ asset('tiktok.png') }}" alt="TikTok">
						</a>
						<a href="https://shopee.co.id" class="social-icon" target="_blank">
							<img src="{{ asset('shopee.png') }}" alt="Shopee">
						</a>
						<a href="https://wa.me/6287716816892" class="social-icon" target="_blank">
							<img src="{{ asset('whatsapp.png') }}" alt="WhatsApp">
						</a>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer Bottom -->
		<div class="footer-bottom text-center">
			<span class="footer-copyright">Toko Rendy Parfum. © 2024 All Rights Reserved</span>
		</div>
	</div>
</div>

<style>
	.footer-middle {
		background: #232529;
		color: white;
		padding: 40px 0;
	}

	.widget {
		text-align: center;
	}

	.widget-title {
		font-size: 18px;
		font-weight: 600;
		margin-bottom: 15px;
	}

	.contact-info li {
		font-size: 14px;
		margin-bottom: 5px;
	}

	.contact-info a {
		color: #ff7272;
		text-decoration: none;
	}

	.contact-info a:hover {
		text-decoration: underline;
	}

	.links {
		list-style: none;
		padding: 0;
	}

	.links li {
		margin-bottom: 5px;
	}

	.links a {
		color: white;
		text-decoration: none;
	}

	.links a:hover {
		color: #ff7272;
	}

	/* Social Media Section */
	.social-media-section {
		text-align: center;
		margin-top: 25px;
	}

	/* Title for Social Media */
	.social-title {
		font-size: 18px;
		font-weight: bold;
		color: white;
		margin-bottom: 10px;
	}

	/* Social Icons - Ensure One Line Layout */
	.social-icons {
		display: flex;
		justify-content: center;
		margin-top: 10px;
		align-items: center;
		flex-wrap: nowrap;
		gap: 12px;
		overflow: hidden;
	}

	/* Social Icons Styling - No Rounded Borders */
	.social-icon img {
		width: 40px;
		/* Default size for desktop */
		height: auto;
		border-radius: unset !important;
		/* Removes any circular styling */
		background: transparent;
		transition: transform 0.3s ease;
	}

	/* Hover Effect */
	.social-icon img:hover {
		transform: scale(1.1);
	}

	/* Mobile Responsiveness */
	@media (max-width: 768px) {
		.social-icons {
			gap: 8px;
		}

		.social-icon img {
			width: 35px;
			/* Smaller icons on mobile */
		}
	}

	.footer-bottom {
		margin-top: 30px;
		padding: 10px 0;
		border-top: 1px solid #444;
	}

	@media (max-width: 768px) {
		.footer-middle .row {
			text-align: center;
		}

		.social-icons {
			justify-content: center;
		}

		.social-icon img {
			width: 35px;
			/* Adjusted for mobile */
		}
	}
</style>