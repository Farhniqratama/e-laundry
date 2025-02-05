<?php use App\Models\VendorBid; ?>
@extends('layouts.default')
@section('title', __( 'Home' ))
@section('content')
	
<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold;">SELAMAT DATANG DI TOKO RENDY PARFUM!</h5>
                        <p class="mb-4">Toko Rendy Radyt Parfum Refill yang berlokasi di Kecamatan Kemayoran, Jakarta Pusat merupakan usaha yang menyediakan produk berupa parfum. Saat ini, proses pengelolaan data transaksi di toko tersebut masih dilakukan secara manual yaitu menggunakan buku catatan.</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold;">Total Customer</h5>
                        <p class="mb-4">{{ $countP }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold;">Total Produk</h5>
                        <p class="mb-4">{{ $countProd }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold;">Pendapatan Bulan Ini</h5>
                        <p class="mb-4">{{ number_format($sumTrans) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection