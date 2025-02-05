<div class="header-middle sticky-header">
	<div class="container-fluid">
		<div class="header-left flex-1 d-none d-xl-flex">
			<nav class="main-nav w-100">
				<ul class="menu ls-n-10">
					<li><a href="{{ URL::to('/') }}" class="pl-4">Home</a></li>
					<li><a href="{{ URL::to('list-produk') }}">Produk</a></li>
					<li class="">
						<a href="#" class="sf-with-ul">Kategori</a>
						@php $dataCategories = getKategori(); @endphp
						<ul style="display: none;">
							@foreach ($dataCategories as $dc)
							<li><a href="{{ URL::to('produk-by-kategori/'.$dc->id) }}">{{ $dc->nama_kategori }}</a></li>
							@endforeach
						</ul>
					</li>
					@if(!empty(session('auth_user')))
					<li><a href="{{ URL::to('histori-transaksi') }}">Pesanan</a></li>
					@endif
				</ul>
			</nav>
		</div>
		<!-- End .header-left -->

		<div class="ml-0 ml-xl-auto">
			<a href="{{ URL::to('/') }}" class="logo logo-transition">
				<h2>RENDY PARFUME</h2>
			</a>
		</div>
		<!-- End .header-center -->

		<div class="header-right flex-1 justify-content-end">
			<button class="mobile-menu-toggler" type="button">
				<i class="fas fa-bars"></i>
			</button>

			<div class="header-dropdowns d-none d-xl-flex">
				<div class="header-dropdown">
					@if(!empty(session('auth_user')))
					<a href="{{ URL::to('profil') }}" class="">PROFIL</a>
					<a href="{{ URL::to('logout-user') }}" class="">LOGOUT</a>
					@else
					<a href="{{ URL::to('login-user') }}" class="">LOGIN</a>
					@endif
					<!-- End .header-menu -->
				</div>
				<!-- End .header-dropown -->
			</div>
			<!-- End .header-dropdowns -->
			<div class="dropdown cart-dropdown">
				<a href="#" class="dropdown-toggle dropdown-arrow cart-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
					<i class="icon-cart-thick"></i>
					<span class="cart-count badge-circle"></span>
				</a>

				<div class="cart-overlay"></div>

				<div class="dropdown-menu mobile-cart">
					<a href="#" title="Close (Esc)" class="btn-close">×</a>

					<div class="dropdownmenu-wrapper custom-scrollbar">
						<div class="dropdown-cart-header">Keranjang</div>
						<!-- End .dropdown-cart-header -->
						@if(!empty(session('auth_user')))
						@php $dataCartNya = getCart(session('auth_user')['pelanggan_id']); @endphp
						@else
						@php $dataCartNya = []; @endphp
						@endif
						@php $total = 0; @endphp
						@foreach ($dataCartNya as $valCartNya)
						@php $total += $valCartNya->harga * $valCartNya->qty; @endphp
						<div class="dropdown-cart-products">
							<div class="product">
								<div class="product-details">
									<h4 class="product-title">
										<a href="{{ URL::to('produk-detail/'.$valCartNya->produk_id) }}">{{ $valCartNya->nama_produk }}</a>
									</h4>

									<span class="cart-product-info">
										<span class="cart-product-qty">{{ $valCartNya->qty }}</span> × {{ $valCartNya->harga }}
									</span>
								</div>
								<!-- End .product-details -->

								<figure class="product-image-container">
									<a href="{{ URL::to('produk-detail/'.$valCartNya->produk_id) }}" class="product-image">
										<img src="{{ asset('upload/produk/'.$valCartNya->gambar) }}" alt="product" width="80" height="80">
									</a>

									<a href="{{ URL::to('delete-cart/'.$valCartNya->id) }}" class="btn-remove" title="Remove Product"><span>×</span></a>
								</figure>
							</div>
							<!-- End .product -->
						</div>
						@endforeach
						
						<!-- End .cart-product -->

						<div class="dropdown-cart-total">
							<span>SUBTOTAL:</span>

							<span class="cart-total-price float-right">{{ number_format($total,2) }}</span>
						</div>
						<!-- End .dropdown-cart-total -->

						<div class="dropdown-cart-action">
							<a href="{{ URL::to('cart') }}" class="btn btn-gray btn-block view-cart">View
								Cart</a>
							<a href="{{ URL::to('checkout') }}" class="btn btn-dark btn-block">Checkout</a>
						</div>
						<!-- End .dropdown-cart-total -->
						
					</div>
					<!-- End .dropdownmenu-wrapper -->
				</div>
				<!-- End .dropdown-menu -->
			</div>
		</div>
		<!-- End .header-right -->
	</div>
	<!-- End .container-fluid -->
</div>
<!-- End .header-middle -->