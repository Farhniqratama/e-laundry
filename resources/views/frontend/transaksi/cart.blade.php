@extends('frontend.layouts.default')
@section('title', __( 'Cart' ))
@section('content')

<div class="container-fluid mt-7">
    <div class="row">
        <div class="col-lg-12">
            <div class="cart-table-container">
                <table class="table table-cart">
                    <thead>
                        <tr>
                            <th class="thumbnail-col"></th>
                            <th class="product-col">Produk</th>
                            <th class="price-col">Harga</th>
                            <th class="qty-col">Quantity</th>
                            <th class="text-right">Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach($dataCart as $key => $value)
                        @php $total+= $value->harga * $value->qty; @endphp
                        <tr class="product-row">
                            <td>
                                <figure class="product-image-container">
                                    <a href="{{ URL::to('produk-detail/'.$value->produk_id) }}" class="product-image">
                                        <img src="{{ asset('upload/produk/'.$value->gambar) }}" alt="product" style="width:100px;">
                                    </a>

                                    <a href="{{ URL::to('delete-cart/'.$value->id) }}" class="btn-remove icon-cancel" title="Remove Product"></a>
                                </figure>
                            </td>
                            <td class="product-col" style="align-content: center;">
                                <h5 class="product-title">
                                    <a href="{{ URL::to('produk-detail/'.$value->produk_id) }}">{{ $value->nama_produk }}</a>
                                </h5>
                            </td>
                            <td style="align-content: center;">
                                <span class="amount" data-id="{{ $value->id }}" data-price="{{ $value->harga }}">
                                    <bdi><span>Rp </span>{{ number_format($value->harga) }}</bdi>
                                </span>
                            </td>
                            <td style="align-content: center;">
                            <div class="quantity">
                                <button class="quantity-minus qty-btn" data-id="{{ $value->id }}">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <input type="number" class="qty-input" value="{{ $value->qty }}" min="1" max="99" data-id="{{ $value->id }}" readonly>
                                <button class="quantity-plus qty-btn" data-id="{{ $value->id }}">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                            </td>
                            <td class="text-right" style="align-content: center;">
                                <span class="total-payment" data-id="{{ $value->id }}"><bdi><span>Rp </span>{{ number_format($value->harga * $value->qty,2) }}</bdi></span>
                            </td>
                            <td class="text-right" style="align-content: center;">
                                <a href="{{ URL::to('delete-cart/'.$value->id) }}" ><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- End .cart-table-container -->

            <div class="checkout-methods mb-6" style="width: max-content;float: right;">
                <a href="{{ URL::to('checkout') }}" class="btn btn-block btn-dark">Proceed to Checkout
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div><!-- End .col-lg-8 -->
    </div><!-- End .row -->
</div><!-- End .container -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> 
<script>
    $(document).ready(function () {
        $(".quantity-minus").off("click").on("click", function (event) {
            event.preventDefault();

            const id = $(this).data("id");
            const input = $(`.qty-input[data-id="${id}"]`);
            let qty = parseInt(input.val()) || 0; 

            if (qty > 1) {
                qty -= 1; 
            }
            input.val(qty);
            const price = parseFloat($(`.amount[data-id="${id}"]`).data("price")) || 0;
            const newTotal = price * qty;
            $(`.total-payment[data-id="${id}"]`).text(formatRupiah(newTotal));
            updateQty(id, qty, newTotal);
        });

        $(".quantity-plus").off("click").on("click", function (event) {
            event.preventDefault();

            const id = $(this).data("id");
            const input = $(`.qty-input[data-id="${id}"]`);
            let qty = parseInt(input.val()) || 0; 
            if (qty < 99) {
                qty += 1; 
            }
            input.val(qty); 
            const price = parseFloat($(`.amount[data-id="${id}"]`).data("price")) || 0;

            const newTotal = price * qty;

            $(`.total-payment[data-id="${id}"]`).text(formatRupiah(newTotal));

            updateQty(id, qty, newTotal);
        });

        function updateQty(id, qty, total) {
            $.ajax({
                url: "{{ URL::to('update-quantity') }}", 
                method: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr("content"),
                    id: id,
                    qty: qty,
                    total: total
                },
                success: function (response) {
                    console.log("Quantity and total updated successfully!", response);
                },
                error: function (xhr) {
                    console.error("Error updating quantity", xhr.responseText);
                }
            });
        }

        function formatRupiah(angka) {
            return angka.toLocaleString("id-ID", { style: "currency", currency: "IDR" }).replace("IDR", "Rp ");
        }
    });



</script>
@endsection