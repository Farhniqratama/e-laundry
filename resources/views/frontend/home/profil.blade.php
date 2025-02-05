@extends('frontend.layouts.default')
@section('title', __( 'Home' ))
@section('content')

<div class="container-fluid">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Profil</a></li>
        </ol>
    </nav>
</div>
<div class="container account-container custom-account-container">

    @include('frontend.layouts.partials.notification')
    <div class="row">
        <div class="sidebar widget widget-dashboard mb-lg-0 mb-3 col-lg-3 order-0">
            <h2 class="text-uppercase">Profil</h2>
            <ul class="nav nav-tabs list flex-column mb-0" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab"
                        aria-controls="edit" aria-selected="false">Akun Saya</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab"
                        aria-controls="address" aria-selected="false">Alamat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ URL::to('logout-user') }}">Logout</a>
                </li>
            </ul>
        </div>
        <div class="col-lg-9 order-lg-last order-1 tab-content">
        <div class="tab-pane fade show active" id="edit" role="tabpanel">
                <h3 class="account-sub-title d-none d-md-block mt-0 pt-1 ml-1"><i
                        class="icon-user-2 align-middle mr-3 pr-1"></i>Profil Saya</h3>
                <div class="account-content">
                    <form action="{{ URL::to('update-profile') }}" method="post">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="acc-text">Nama Lengkap <span class="required">*</span></label>
                            <input type="text" class="form-control" id="acc-text" name="nama" placeholder="Nama Lengkap" value="{{ $detailData->nama }}" required />
                        </div>
                        <div class="form-group mb-2">
                            <label for="acc-email">Email <span class="required">*</span></label>
                            <input type="email" class="form-control" id="acc-email" name="email" placeholder="example@gmail.com" value="{{ $detailData->email }}" required />
                        </div>
                        <div class="form-group mb-4">
                            <label for="acc-email">No Telepon <span class="required">*</span></label>
                            <input type="number" class="form-control" id="acc-email" name="no_telp" placeholder="example@gmail.com" value="{{ $detailData->no_telp }}" required />
                        </div>

                        <div class="change-password">
                            <h3 class="text-uppercase mb-2">Rubah Password</h3>

                            <div class="form-group">
                                <label for="acc-password">Kata Sandi Saat Ini (biarkan kosong agar tidak berubah)</label>
                                <input type="password" class="form-control" id="acc-password"
                                    name="acc-password" />
                            </div>

                            <div class="form-group">
                                <label for="acc-password">Kata Sandi Baru (biarkan kosong agar tidak berubah)</label>
                                <input type="password" class="form-control" id="acc-new-password"
                                    name="newPassword" />
                            </div>

                            <div class="form-group">
                                <label for="acc-password">Konfirmasi Kata Sandi Baru</label>
                                <input type="password" class="form-control" id="acc-confirm-password"
                                    name="confirmNewPassword" />
                            </div>
                        </div>

                        <div class="form-footer mt-3 mb-0">
                            <button type="submit" class="btn btn-dark mr-0">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div><!-- End .tab-pane -->
            <div class="tab-pane fade" id="address" role="tabpanel">
                <h3 class="account-sub-title d-none d-md-block mb-1"><i
                        class="sicon-location-pin align-middle mr-3"></i>Alamat</h3>
                <div class="addresses-content">
                    <form class="mb-2" action="{{ URL::to('update-alamat-profile') }}" method="post">
                        @csrf
                        <div class="select-custom">
                            <label>Provinsi <span class="required">*</span></label>
                            <select name="provinsi_id" id="provinsi_id" class="form-control" required>
                                <option value="">-- Pilih Provinsi --</option>
                                @foreach($provinsi as $kp => $vp)
                                <option value="{{ $vp->id }}" @if(!empty($alamat)) @if($alamat->provinsi_id == $vp->id) selected @endif @endif>{{ $vp->province_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="select-custom">
                            <label>Kabupaten/Kota <span class="required">*</span></label>
                            <select id="city" name="kota_id" class="form-control" required>
                                <option value="">-- Pilih Kabupaten/Kota --</option>
                                @if(!empty($alamat))
                                @foreach($kota as $kp => $vp)
                                <option value="{{ $vp->id }}" @if(!empty($alamat)) @if($alamat->kota_id == $vp->id) selected @endif @endif>{{ $vp->city_name }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Alamat Lengkap <span class="required">*</span></label>
                            <input type="text" class="form-control" name="alamat_lengkap" value="@if(!empty($alamat)) {{ $alamat->alamat_lengkap }} @endif" placeholder="Alamat Lengkap" required />
                        </div>

                        <div class="form-group">
                            <label>Kode Pos <span class="required">*</span></label>
                            <input type="text" class="form-control" name="kode_pos" value="@if(!empty($alamat)) {{ $alamat->kode_pos }} @endif" required />
                        </div>

                        <div class="form-footer mb-0">
                            <div class="form-footer-right">
                                <button type="submit" class="btn btn-dark py-4">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- End .tab-pane -->
        </div><!-- End .tab-content -->
    </div><!-- End .row -->
</div><!-- End .container -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#provinsi_id').on('change', function() {
            var provinceID = $(this).val();
            if(provinceID) {
                $.ajax({
                    url: "{{ URL::to('getCity/') }}/" + provinceID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#city').empty();
                        $('#city').append('<option value="">-- Pilih Kota --</option>');
                        $.each(data, function(key, value) {
                            $('#city').append('<option value="'+ value.id +'">'+ value.city_name +'</option>');
                        });
                    }
                });
            } else {
                $('#city').empty();
                $('#city').append('<option value="">Pilih Kota</option>');
            }
        });
    });
</script>
@endsection