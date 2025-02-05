@extends('frontend.layouts.default')
@section('title', __( 'Home' ))
@section('content')

<div class="home-slider-container">
	<div class="home-slider owl-carousel owl-theme dot-inside slide-animate" data-owl-options="{
		'dots': true,
		'nav': false
	}">
		@foreach ($banner as $key => $valBanner)
		<div class="home-slide home-slide-{{ $key + 1 }} banner banner-h-100 banner-md-vw-small">
			<img class="slide-bg h-100" src="{{ asset('uploads/banner/'.$valBanner->banner) }}" style="background-color: #ccc;" width="1903" height="969" alt="Home Banner" />
			<!-- End .home-slide-content -->
		</div>
		@endforeach
		
	</div>
	<!-- End .home-slider -->
</div>

<div class="half-section">
	<div class="d-flex flex-wrap">
		<div class="col-md-12 title-group text-center mb-2 mt-4 p-t-3">
			<h2 class="section-title text-uppercase ls-n-10">Produk Terbaru</h2>
		</div>
		<div class="col-md-6 col-12 order-md-last half-img banner banner-md-vw-small banner-5 bg-img d-flex align-items-center appear-animate" data-animation-duration="1200">
			<div class="banner-content">
				<h3 class="ls-n-10 m-b-3 text-left">PARFUME<br />COLLECTION</h3>
				<p class="line-height-1 m-b-4 text-left">Check out this week's new parfume.</p>
				<div class="mb-0">
					<a href="{{ URL::to('list-produk') }}" class="btn btn-borders btn-lg btn-outline-dark ls-10">
						BELANJA SEKARANG
					</a>
				</div>
			</div>
		</div>
		<!-- End .col-md-6 -->
		<div class="col-md-6 col-12 half-content d-flex align-items-center justify-content-center">
			<div class="products-slider owl-carousel owl-theme" data-owl-options="{
					'items': 2,
					'nav': true,
					'responsive' : {
						'576' : {
							'items' : 2
						},
						'992' : {
							'items' : 2
						}
					}
				}">
				@foreach ($produk as $valProduk)
				<div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInRightShorter">
					<figure>
						<a href="{{ URl::to('produk-detail/'.$valProduk->id) }}">
							<img src="{{ asset('upload/produk/'.$valProduk->gambar) }}" alt="product" width="400" height="400" />
						</a>
						<div class="btn-icon-group">
                            <a href="{{ URL::to('add-to-cart/'.$valProduk->id) }}" class="btn-icon product-type-simple"><i class="icon-shopping-cart"></i></a>
                        </div>
					</figure>
					<div class="product-details">
						<div class="category-wrap">
							<div class="category-list">
								<a href="{{ URL::to('produk-detail/'.$valProduk->id) }}" class="product-category">{{ $valProduk->kategori }}</a>
							</div>
						</div>
						<h3 class="product-title"> <a href="{{ URl::to('produk-detail/'.$valProduk->id) }}">{{ $valProduk->nama_produk }}</a> </h3>
						<div class="ratings-container">
							<div class="product-ratings">
								<span class="ratings" style="width:0%"></span>
								<!-- End .ratings -->
								<span class="tooltiptext tooltip-top"></span>
							</div>
							<!-- End .product-ratings -->
						</div>
						<!-- End .product-container -->
						<div class="price-box">
							<span class="product-price">{{ number_format($valProduk->harga) }} (ml)</span>
						</div>
						<!-- End .price-box -->
					</div>
					<!-- End .product-details -->
				</div>
				@endforeach
			</div>
			<!-- End .products-slider -->
		</div>
		<!-- End .col-md-6 -->
	</div>
	<!-- End .no-gutters -->
</div>
<!-- End .half-section -->
<div class="container-fluid m-b-5 p-b-3">
	<div class="products-section pt-0">
		<h2 class="section-title">Produk Terlaris</h2>

		<div class="products-slider owl-carousel owl-theme dots-top dots-small">
			@foreach ($otherProduk as $valProdukLainya)
			<div class="product-default">
				<figure>
					<a href="{{ URl::to('produk-detail/'.$valProdukLainya->id) }}">
						<img src="{{ asset('upload/produk/'.$valProdukLainya->gambar) }}" width="280" height="280" alt="product">
						<img src="{{ asset('upload/produk/'.$valProdukLainya->gambar) }}" width="280" height="280" alt="product">
					</a>
				</figure>
				
				<div class="product-details">
					<div class="category-list">
						<a href="#" class="product-category">{{ $valProdukLainya->kategori }}</a>
					</div>
					<h3 class="product-title">
						<a href="{{ URl::to('produk-detail/'.$valProdukLainya->id) }}">{{ $valProdukLainya->nama_produk }}</a>
					</h3>
					<div class="ratings-container">
						<div class="product-ratings">
							<span class="ratings" style="width:80%"></span>
							<!-- End .ratings -->
							<span class="tooltiptext tooltip-top"></span>
						</div>
						<!-- End .product-ratings -->
					</div>
					<!-- End .product-container -->
					<div class="price-box">
						<span class="product-price">{{ number_format($valProdukLainya->harga) }}/ml</span>
					</div>
					<!-- End .price-box -->
					<div class="product-action">
						<a href="{{ URL::to('add-to-cart/'.$valProdukLainya->id) }}" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i><span>ADD TO CART</span></a>
					</div>
				</div>
				<!-- End .product-details -->
			</div>
			@endforeach
		</div>
		<!-- End .products-slider -->
	</div>
</div>
<div class="container-fluid m-b-5 p-b-3">
	<div class="feature-boxes-container pb-3">
		<div class="row mt-7 mb-1">
			<div class="col-xl-3 col-sm-6 appear-animate" data-animation-delay="500" data-animation-name="fadeInRightShorter">
				<div class="feature-box px-sm-5 px-md-5 mx-sm-5 mx-md-3 feature-box-simple feature-rounded text-center">
					<i class="icon-earphones-alt bg-secondary text-white m-b-3"></i>

					<div class="feature-box-content p-0">
						<h3 class="m-b-1">Customer Support</h3>
						<h5 class="font-weight-normal line-height-1 m-b-3">Need Assistance?</h5>

						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
					</div>
					<!-- End .feature-box-content -->
				</div>
				<!-- End .feature-box -->
			</div>
			<!-- End .col-md-4 -->
			<div class="col-xl-3 col-sm-6 appear-animate" data-animation-name="fadeInRightShorter">
				<div class="feature-box px-sm-5 px-md-5 mx-sm-5 mx-md-3 feature-box-simple feature-rounded text-center">
					<i class="icon-credit-card  bg-secondary text-white m-b-3"></i>

					<div class="feature-box-content p-0">
						<h3 class="m-b-1">Secured Payment</h3>
						<h5 class="font-weight-normal line-height-1 m-b-3">Safe &amp; Fast</h5>

						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapibus lacus. Lorem ipsum dolor sit amet.</p>
					</div>
					<!-- End .feature-box-content -->
				</div>
				<!-- End .feature-box -->
			</div>
			<!-- End .col-md-4 -->
			<div class="col-xl-3 col-sm-6 appear-animate" data-animation-name="fadeInLeftShorter">
				<div class="feature-box px-sm-5 px-md-5 mx-sm-5 mx-md-3 feature-box-simple feature-rounded text-center">
					<i class="icon-action-undo  bg-secondary text-white m-b-3"></i>

					<div class="feature-box-content p-0">
						<h3 class="m-b-1">FREE RETURNS</h3>
						<h5 class="font-weight-normal line-height-1 m-b-3">Easy &amp; Free</h5>

						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
					</div>
					<!-- End .feature-box-content -->
				</div>
				<!-- End .feature-box -->
			</div>
			<!-- End .col-md-4 -->
			<div class="col-xl-3 col-sm-6 appear-animate" data-animation-delay="500" data-animation-name="fadeInLeftShorter">
				<div class="feature-box px-sm-5 px-md-5 mx-sm-5 mx-md-3 feature-box-simple feature-rounded text-center">
					<i class="icon-shipping bg-secondary text-white m-b-3"></i>

					<div class="feature-box-content p-0">
						<h3 class="m-b-1">FREE SHIPPING</h3>
						
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
					</div>
					<!-- End .feature-box-content -->
				</div>
				<!-- End .feature-box -->
			</div>
			<!-- End .col-md-4 -->
		</div>
		<!-- End .feature-boxes-container.row -->
	</div>
</div>
<!-- End .container-fluid -->

@endsection