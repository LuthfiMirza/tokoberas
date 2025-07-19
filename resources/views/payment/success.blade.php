@extends('layouts.app')

@section('title', 'Pembayaran Berhasil - Beras Kartini')

@section('content')
    <section class="payment-success" style="padding-top: 120px; background-color: var(--latte); min-height: 100vh;">
        <div class="container" style="max-width: 800px; margin: 0 auto; padding: 40px 20px; text-align: center;">
            
            <!-- Success Message -->
            <div style="background: white; padding: 60px 40px; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); margin-bottom: 30px;">
                <div style="margin-bottom: 30px;">
                    <i class="fas fa-check-circle" style="font-size: 80px; color: #28a745; margin-bottom: 20px;"></i>
                    <h1 style="color: var(--coklat); font-size: 32px; margin-bottom: 15px;">Pembayaran Berhasil!</h1>
                    <p style="color: var(--hijau2); font-size: 18px; margin-bottom: 20px;">
                        Terima kasih atas pembayaran Anda. Pesanan sedang diproses.
                    </p>
                </div>

                <!-- Order Details -->
                <div style="background: rgba(88, 112, 66, 0.1); padding: 25px; border-radius: 12px; margin-bottom: 30px; text-align: left;">
                    <h3 style="color: var(--coklat); margin-bottom: 20px; text-align: center;">Detail Pesanan</h3>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 20px;">
                        <div>
                            <strong style="color: var(--sage);">Nomor Pesanan:</strong><br>
                            <span style="color: var(--coklat); font-weight: bold;">#{{ $order->order_number }}</span>
                        </div>
                        <div>
                            <strong style="color: var(--sage);">Total Pembayaran:</strong><br>
                            <span style="color: var(--hijau); font-weight: bold; font-size: 18px;">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                        </div>
                        <div>
                            <strong style="color: var(--sage);">Status:</strong><br>
                            <span style="color: {{ $order->status_color }}; font-weight: bold;">{{ $order->status_label }}</span>
                        </div>
                        <div>
                            <strong style="color: var(--sage);">Tanggal:</strong><br>
                            <span style="color: var(--coklat);">{{ $order->created_at->format('d M Y, H:i') }}</span>
                        </div>
                    </div>

                    <div style="border-top: 1px solid rgba(169, 180, 148, 0.3); padding-top: 15px;">
                        <strong style="color: var(--sage);">Alamat Pengiriman:</strong><br>
                        <span style="color: var(--coklat);">
                            {{ $order->shipping_address }}<br>
                            {{ $order->shipping_city }}, {{ $order->shipping_postal_code }}<br>
                            {{ $order->shipping_province }}
                        </span>
                    </div>
                </div>

                <!-- Next Steps -->
                <div style="background: #e8f5e8; padding: 20px; border-radius: 12px; margin-bottom: 30px; border-left: 4px solid #28a745;">
                    <h4 style="color: var(--coklat); margin-bottom: 15px;">Langkah Selanjutnya:</h4>
                    <ul style="text-align: left; color: var(--hijau2); line-height: 1.8; margin: 0; padding-left: 20px;">
                        <li>Tim kami akan memverifikasi pembayaran Anda dalam 1-2 jam kerja</li>
                        <li>Setelah terverifikasi, pesanan akan segera diproses</li>
                        <li>Anda akan menerima notifikasi WhatsApp untuk update status pesanan</li>
                        <li>Estimasi pengiriman 2-3 hari kerja</li>
                    </ul>
                </div>

                <!-- Action Buttons -->
                <div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
                    <a href="{{ route('orders.show', $order->id) }}" 
                       style="background: var(--hijau); color: white; padding: 12px 24px; border-radius: 8px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; font-weight: 600;">
                        <i class="fas fa-receipt"></i> Lihat Detail Pesanan
                    </a>
                    
                    <a href="{{ route('products.index') }}" 
                       style="background: var(--sage); color: white; padding: 12px 24px; border-radius: 8px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; font-weight: 600;">
                        <i class="fas fa-shopping-bag"></i> Belanja Lagi
                    </a>
                </div>
            </div>

            <!-- WhatsApp Contact -->
            <div style="background: linear-gradient(135deg, #25d366, #128c7e); padding: 25px; border-radius: 12px; color: white;">
                <h3 style="margin-bottom: 15px; font-size: 18px;">
                    <i class="fab fa-whatsapp"></i> Butuh Bantuan?
                </h3>
                <p style="margin-bottom: 20px; font-size: 14px; opacity: 0.9;">
                    Hubungi customer service kami jika ada pertanyaan
                </p>
                <a href="https://wa.me/6281394450704?text=Halo,%20saya%20memiliki%20pertanyaan%20tentang%20pesanan%20%23{{ $order->order_number }}" 
                   target="_blank"
                   style="background: white; color: #25d366; padding: 12px 24px; border-radius: 25px; text-decoration: none; font-weight: bold; display: inline-flex; align-items: center; gap: 8px; transition: all 0.3s ease;">
                    <i class="fab fa-whatsapp"></i> Hubungi CS
                </a>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
@media (max-width: 768px) {
    .container {
        padding: 20px 15px !important;
    }
    
    .container > div:first-child {
        padding: 40px 25px !important;
    }
    
    .container h1 {
        font-size: 24px !important;
    }
    
    .container > div:first-child > div:nth-child(2) {
        grid-template-columns: 1fr !important;
        gap: 10px !important;
    }
    
    .container > div:first-child > div:last-child {
        flex-direction: column !important;
    }
}
</style>
@endpush