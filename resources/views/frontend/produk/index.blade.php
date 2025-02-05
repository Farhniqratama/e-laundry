@extends('frontend.layouts.default')
@section('title', __( 'Produk' ))
@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Produk</a></li>
        </ol>
    </nav>
    <div class="products-section pt-0">
        <h2 class="section-title">Produk Kami</h2>
        <div class="products">
            <div class="row">
            @foreach ($produk as $valProduk)
                <div class="product-default inner-icon col-lg-3">
                    <figure>
                        <a href="{{ URl::to('produk-detail/'.$valProduk->id) }}">
                            <img src="{{ asset('upload/produk/'.$valProduk->gambar) }}" width="400" height="400" alt="product" />
                        </a>
                        <div class="btn-icon-group">
                            <a href="{{ URL::to('add-to-cart/'.$valProduk->id) }}" class="btn-icon product-type-simple"><i class="icon-shopping-cart"></i></a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <div class="category-wrap">
                            <div class="category-list">
                            </div>
                        </div>
                        <h3 class="product-title">
                            <a href="{{ URl::to('produk-detail/'.$valProduk->id) }}">{{ $valProduk->nama_produk }}</a>
                        </h3>
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
        </div>

        {{ $produk->links('vendor.pagination.bootstrap-4') }}
        <!-- End .products-slider -->
    </div>
    <!-- End .products-section -->
</div>

@endsection