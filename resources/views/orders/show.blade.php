@extends('layouts.app')

@section('title', 'Detail Pesanan #' . $order->order_number . ' - Beras Kartini')

@section('content')
    <section class="order-detail" style="padding-top: 120px; background-color: var(--latte); min-height: 100vh;">
        <div class="container" style="max-width: 1000px; margin: 0 auto; padding: 40px 20px;">
            
            <!-- Header -->
            <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 30px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <div>
                        <h1 style="color: var(--coklat); font-size: 28px; margin-bottom: 5px;">
                            Detail Pesanan #{{ $order->order_number }}
                        </h1>
                        <p style="color: var(--sage); margin: 0;">{{ $order->created_at->format('d M Y, H:i') }}</p>
                    </div>
                    <div style="text-align: right;">
                        <span style="background: {{ $order->status_color }}; color: white; padding: 8px 16px; border-radius: 20px; font-weight: 600; font-size: 14px;">
                            {{ $order->status_label }}
                        </span>
                    </div>
                </div>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
                    <!-- Customer Info -->
                    <div>
                        <h3 style="color: var(--coklat); margin-bottom: 15px; font-size: 18px;">Informasi Pembeli</h3>
                        <div style="color: var(--hijau2); line-height: 1.6;">
                            <strong>{{ $order->customer_name }}</strong><br>
                            {{ $order->customer_email }}<br>
                            {{ $order->customer_phone }}
                        </div>
                    </div>
                    
                    <!-- Shipping Info -->
                    <div>
                        <h3 style="color: var(--coklat); margin-bottom: 15px; font-size: 18px;">Alamat Pengiriman</h3>
                        <div style="color: var(--hijau2); line-height: 1.6;">
                            {{ $order->shipping_address }}<br>
                            {{ $order->shipping_city }}, {{ $order->shipping_postal_code }}<br>
                            {{ $order->shipping_province }}
                        </div>
                    </div>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 350px; gap: 30px;">
                
                <!-- Order Items -->
                <div>
                    <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 30px;">
                        <h3 style="color: var(--coklat); margin-bottom: 25px; font-size: 20px;">Item Pesanan</h3>
                        
                        @foreach($order->items as $item)
                            <div style="display: flex; justify-content: space-between; align-items: center; padding: 20px 0; border-bottom: 1px solid #f0f0f0;">
                                <div>
                                    <h4 style="color: var(--coklat); margin-bottom: 5px; font-size: 16px;">{{ $item->product_name }}</h4>
                                    <p style="color: var(--sage); margin: 0; font-size: 14px;">
                                        {{ $item->quantity }}x Rp {{ number_format($item->price, 0, ',', '.') }}
                                    </p>
                                </div>
                                <div style="text-align: right;">
                                    <span style="color: var(--hijau); font-weight: bold; font-size: 16px;">
                                        Rp {{ number_format($item->total, 0, ',', '.') }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                        
                        <!-- Total -->
                        <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 20px; border-top: 2px solid var(--sage);">
                            <span style="color: var(--coklat); font-size: 18px; font-weight: bold;">Total Pembayaran</span>
                            <span style="color: var(--hijau); font-size: 24px; font-weight: bold;">
                                Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>

                    <!-- Payment Proofs -->
                    @if($order->paymentProofs->count() > 0)
                        <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                            <h3 style="color: var(--coklat); margin-bottom: 25px; font-size: 20px;">Bukti Pembayaran</h3>
                            
                            @foreach($order->paymentProofs as $proof)
                                <div style="border: 1px solid var(--sage); border-radius: 12px; padding: 20px; margin-bottom: 15px;">
                                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                                        <div>
                                            <h4 style="color: var(--coklat); margin-bottom: 5px;">{{ $proof->sender_name }}</h4>
                                            <p style="color: var(--sage); margin: 0; font-size: 14px;">{{ $proof->sender_bank }}</p>
                                        </div>
                                        <span style="background: {{ $proof->status_color }}; color: white; padding: 4px 12px; border-radius: 15px; font-size: 12px; font-weight: 600;">
                                            {{ $proof->status_label }}
                                        </span>
                                    </div>
                                    
                                    @if($proof->notes)
                                        <p style="color: var(--hijau2); font-size: 14px; margin-bottom: 15px; font-style: italic;">
                                            "{{ $proof->notes }}"
                                        </p>
                                    @endif
                                    
                                    <div style="text-align: center;">
                                        <a href="{{ $proof->file_url }}" target="_blank" 
                                           style="background: var(--sage); color: white; padding: 8px 16px; border-radius: 6px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; font-size: 14px;">
                                            <i class="fas fa-eye"></i> Lihat Bukti
                                        </a>
                                    </div>
                                    
                                    <p style="color: var(--sage); font-size: 12px; margin: 10px 0 0 0; text-align: center;">
                                        Dikirim: {{ $proof->created_at->format('d M Y, H:i') }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Order Summary & Actions -->
                <div>
                    <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); position: sticky; top: 140px;">
                        <h3 style="color: var(--coklat); margin-bottom: 20px; font-size: 18px; text-align: center;">Ringkasan</h3>
                        
                        <div style="margin-bottom: 20px;">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                                <span style="color: var(--sage); font-size: 14px;">Subtotal:</span>
                                <span style="color: var(--coklat); font-weight: 600;">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                                <span style="color: var(--sage); font-size: 14px;">Ongkir:</span>
                                <span style="color: var(--sage);">Gratis</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; padding-top: 8px; border-top: 1px solid #f0f0f0; font-weight: bold;">
                                <span style="color: var(--coklat);">Total:</span>
                                <span style="color: var(--hijau); font-size: 18px;">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <!-- Order Notes -->
                        @if($order->order_notes)
                            <div style="background: #f8f9fa; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                                <h4 style="color: var(--coklat); margin-bottom: 8px; font-size: 14px;">Catatan Pesanan:</h4>
                                <p style="color: var(--hijau2); margin: 0; font-size: 13px; line-height: 1.5;">{{ $order->order_notes }}</p>
                            </div>
                        @endif

                        <!-- Actions -->
                        <div style="display: flex; flex-direction: column; gap: 10px;">
                            @if($order->status === 'pending_payment')
                                <a href="{{ route('payment.confirmation', $order->id) }}" 
                                   style="background: var(--hijau); color: white; padding: 12px; border-radius: 8px; text-decoration: none; text-align: center; font-weight: 600;">
                                    <i class="fas fa-credit-card"></i> Bayar Sekarang
                                </a>
                            @endif
                            
                            <a href="https://wa.me/6281394450704?text=Halo,%20saya%20ingin%20menanyakan%20status%20pesanan%20%23{{ $order->order_number }}" 
                               target="_blank"
                               style="background: #25d366; color: white; padding: 12px; border-radius: 8px; text-decoration: none; text-align: center; font-weight: 600;">
                                <i class="fab fa-whatsapp"></i> Hubungi CS
                            </a>
                            
                            <a href="{{ route('products.index') }}" 
                               style="background: var(--sage); color: white; padding: 12px; border-radius: 8px; text-decoration: none; text-align: center; font-weight: 600;">
                                <i class="fas fa-shopping-bag"></i> Belanja Lagi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
@media (max-width: 768px) {
    .container > div:nth-child(2) {
        grid-template-columns: 1fr !important;
    }
    
    .container > div:first-child > div:last-child {
        grid-template-columns: 1fr !important;
        gap: 20px !important;
    }
    
    .container > div:first-child > div:first-child {
        flex-direction: column !important;
        align-items: flex-start !important;
        gap: 15px !important;
    }
    
    .container > div:first-child > div:first-child > div:last-child {
        text-align: left !important;
    }
}
</style>
@endpush