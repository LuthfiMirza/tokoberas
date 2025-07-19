@extends('layouts.app')

@section('title', 'Checkout - Beras Kartini')

@section('content')
    <section class="checkout-page">
        <div class="container">
            <!-- Progress Steps -->
            <div class="checkout-progress">
                <div class="progress-step active">
                    <div class="step-number">1</div>
                    <span>Keranjang</span>
                </div>
                <div class="progress-line active"></div>
                <div class="progress-step active">
                    <div class="step-number">2</div>
                    <span>Checkout</span>
                </div>
                <div class="progress-line"></div>
                <div class="progress-step">
                    <div class="step-number">3</div>
                    <span>Pembayaran</span>
                </div>
            </div>

            <!-- Header -->
            <div class="checkout-header">
                <h1><i class="fas fa-shopping-cart"></i> Checkout</h1>
                <p>Lengkapi informasi untuk menyelesaikan pesanan Anda</p>
            </div>

            <div class="checkout-content">
                <!-- Main Form -->
                <div class="checkout-form">
                    <form id="checkoutForm" action="{{ route('checkout.process') }}" method="POST">
                        @csrf
                        
                        <!-- Customer Information -->
                        <div class="form-card">
                            <div class="card-header">
                                <h3><i class="fas fa-user-circle"></i> Informasi Pembeli</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group">
                                        <label>Nama Lengkap *</label>
                                        <input type="text" name="customer_name" required placeholder="Masukkan nama lengkap">
                                    </div>
                                    <div class="form-group">
                                        <label>Email *</label>
                                        <input type="email" name="customer_email" required placeholder="contoh@email.com">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nomor WhatsApp *</label>
                                    <input type="tel" name="customer_phone" required placeholder="08xxxxxxxxxx">
                                    <small>Nomor ini akan digunakan untuk konfirmasi pesanan</small>
                                </div>
                            </div>
                        </div>

                        <!-- Shipping Information -->
                        <div class="form-card">
                            <div class="card-header">
                                <h3><i class="fas fa-map-marker-alt"></i> Alamat Pengiriman</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Alamat Lengkap *</label>
                                    <textarea name="shipping_address" required rows="3" placeholder="Jalan, Nomor Rumah, RT/RW, Kelurahan"></textarea>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label>Kota/Kabupaten *</label>
                                        <input type="text" name="shipping_city" required placeholder="Contoh: Jakarta Selatan">
                                    </div>
                                    <div class="form-group">
                                        <label>Kode Pos *</label>
                                        <input type="text" name="shipping_postal_code" required placeholder="12345">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Provinsi *</label>
                                    <input type="text" name="shipping_province" required placeholder="Contoh: DKI Jakarta">
                                </div>
                            </div>
                        </div>

                        <!-- Payment Method -->
                        <div class="form-card">
                            <div class="card-header">
                                <h3><i class="fas fa-credit-card"></i> Metode Pembayaran</h3>
                                <p>Pilih metode pembayaran yang Anda inginkan</p>
                            </div>
                            <div class="card-body">
                                <div class="payment-methods">
                                    <!-- Bank Transfer -->
                                    <div class="payment-category">
                                        <h4><i class="fas fa-university"></i> Transfer Bank</h4>
                                        <div class="payment-options">
                                            <label class="payment-option">
                                                <input type="radio" name="payment_method" value="bank_transfer" checked>
                                                <div class="option-content">
                                                    <div class="option-icon">
                                                        <i class="fas fa-university"></i>
                                                    </div>
                                                    <div class="option-details">
                                                        <h5>Transfer Bank</h5>
                                                        <p>BCA, BNI, Mandiri, Jenius</p>
                                                    </div>
                                                    <div class="option-badge">Populer</div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- E-Wallet -->
                                    <div class="payment-category">
                                        <h4><i class="fas fa-mobile-alt"></i> E-Wallet</h4>
                                        <div class="payment-options">
                                            <label class="payment-option">
                                                <input type="radio" name="payment_method" value="ovo">
                                                <div class="option-content">
                                                    <div class="option-icon ovo">
                                                        <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA0MCA0MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjQwIiBoZWlnaHQ9IjQwIiByeD0iOCIgZmlsbD0iIzRGNDdGNyIvPgo8cGF0aCBkPSJNMTIgMTZIMjhWMjRIMTJWMTZaIiBmaWxsPSJ3aGl0ZSIvPgo8L3N2Zz4K" alt="OVO">
                                                    </div>
                                                    <div class="option-details">
                                                        <h5>OVO</h5>
                                                        <p>Bayar dengan OVO</p>
                                                    </div>
                                                </div>
                                            </label>

                                            <label class="payment-option">
                                                <input type="radio" name="payment_method" value="dana">
                                                <div class="option-content">
                                                    <div class="option-icon dana">
                                                        <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA0MCA0MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjQwIiBoZWlnaHQ9IjQwIiByeD0iOCIgZmlsbD0iIzExOEVGRiIvPgo8cGF0aCBkPSJNMTIgMTZIMjhWMjRIMTJWMTZaIiBmaWxsPSJ3aGl0ZSIvPgo8L3N2Zz4K" alt="DANA">
                                                    </div>
                                                    <div class="option-details">
                                                        <h5>DANA</h5>
                                                        <p>Bayar dengan DANA</p>
                                                    </div>
                                                </div>
                                            </label>

                                            <label class="payment-option">
                                                <input type="radio" name="payment_method" value="gopay">
                                                <div class="option-content">
                                                    <div class="option-icon gopay">
                                                        <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA0MCA0MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjQwIiBoZWlnaHQ9IjQwIiByeD0iOCIgZmlsbD0iIzAwQUE1QiIvPgo8cGF0aCBkPSJNMTIgMTZIMjhWMjRIMTJWMTZaIiBmaWxsPSJ3aGl0ZSIvPgo8L3N2Zz4K" alt="GoPay">
                                                    </div>
                                                    <div class="option-details">
                                                        <h5>GoPay</h5>
                                                        <p>Bayar dengan GoPay</p>
                                                    </div>
                                                </div>
                                            </label>

                                            <label class="payment-option">
                                                <input type="radio" name="payment_method" value="shopeepay">
                                                <div class="option-content">
                                                    <div class="option-icon shopeepay">
                                                        <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA0MCA0MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjQwIiBoZWlnaHQ9IjQwIiByeD0iOCIgZmlsbD0iI0VFNEQyRCIvPgo8cGF0aCBkPSJNMTIgMTZIMjhWMjRIMTJWMTZaIiBmaWxsPSJ3aGl0ZSIvPgo8L3N2Zz4K" alt="ShopeePay">
                                                    </div>
                                                    <div class="option-details">
                                                        <h5>ShopeePay</h5>
                                                        <p>Bayar dengan ShopeePay</p>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- QRIS -->
                                    <div class="payment-category">
                                        <h4><i class="fas fa-qrcode"></i> QRIS</h4>
                                        <div class="payment-options">
                                            <label class="payment-option">
                                                <input type="radio" name="payment_method" value="qris">
                                                <div class="option-content">
                                                    <div class="option-icon qris">
                                                        <i class="fas fa-qrcode"></i>
                                                    </div>
                                                    <div class="option-details">
                                                        <h5>QRIS</h5>
                                                        <p>Scan QR untuk bayar</p>
                                                    </div>
                                                    <div class="option-badge new">Baru</div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Order Notes -->
                        <div class="form-card">
                            <div class="card-header">
                                <h3><i class="fas fa-sticky-note"></i> Catatan Pesanan</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <textarea name="order_notes" rows="3" placeholder="Catatan tambahan untuk pesanan (opsional)"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Order Summary Sidebar -->
                <div class="order-summary">
                    <div class="summary-card">
                        <div class="summary-header">
                            <h3><i class="fas fa-receipt"></i> Ringkasan Pesanan</h3>
                        </div>
                        
                        <!-- Cart Items -->
                        <div class="order-items">
                            @foreach($cartItems as $item)
                                <div class="order-item">
                                    <div class="item-image">
                                        @if($item['image'])
                                            <img src="{{ asset('images/' . $item['image']) }}" alt="{{ $item['name'] }}">
                                        @else
                                            <div class="no-image">
                                                <i class="fas fa-image"></i>
                                            </div>
                                        @endif
                                        <span class="item-quantity">{{ $item['quantity'] }}</span>
                                    </div>
                                    <div class="item-details">
                                        <h4>{{ $item['name'] }}</h4>
                                        <p>{{ $item['quantity'] }}x Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                                        <div class="item-total">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pricing -->
                        <div class="pricing-details">
                            <div class="pricing-row">
                                <span>Subtotal</span>
                                <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                            <div class="pricing-row">
                                <span>Ongkos Kirim</span>
                                <span class="free">Gratis</span>
                            </div>
                            <div class="pricing-row total">
                                <span>Total</span>
                                <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <!-- Place Order Button -->
                        <button type="submit" form="checkoutForm" class="place-order-btn">
                            <i class="fas fa-lock"></i>
                            <span>Buat Pesanan</span>
                        </button>

                        <!-- Security Info -->
                        <div class="security-info">
                            <div class="security-item">
                                <i class="fas fa-shield-alt"></i>
                                <span>Transaksi 100% aman</span>
                            </div>
                            <div class="security-item">
                                <i class="fas fa-truck"></i>
                                <span>Pengiriman gratis</span>
                            </div>
                            <div class="security-item">
                                <i class="fas fa-headset"></i>
                                <span>Customer service 24/7</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
/* Checkout Page Styles */
.checkout-page {
    padding-top: 120px;
    background: var(--latte);
    min-height: 100vh;
}

.container {
    max-width: 1600px;
    margin: 0 auto;
    padding: 40px 20px;
}

/* Progress Steps */
.checkout-progress {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 40px;
    padding: 0 20px;
}

.progress-step {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    position: relative;
}

.step-number {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #e9ecef;
    color: #6c757d;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 16px;
    transition: all 0.3s ease;
}

.progress-step.active .step-number {
    background: var(--hijau);
    color: white;
}

.progress-step span {
    font-size: 14px;
    color: #6c757d;
    font-weight: 500;
}

.progress-step.active span {
    color: var(--hijau);
    font-weight: 600;
}

.progress-line {
    width: 80px;
    height: 2px;
    background: #e9ecef;
    margin: 0 20px;
    transition: all 0.3s ease;
}

.progress-line.active {
    background: var(--hijau);
}

/* Header */
.checkout-header {
    text-align: center;
    margin-bottom: 40px;
}

.checkout-header h1 {
    color: var(--coklat);
    font-size: 32px;
    margin-bottom: 10px;
    font-weight: 700;
}

.checkout-header p {
    color: var(--hijau2);
    font-size: 16px;
    opacity: 0.8;
}

/* Main Content */
.checkout-content {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 50px;
    align-items: start;
    max-width: 1400px;
    margin: 0 auto;
}

/* Form Cards */
.form-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 6px 25px rgba(0,0,0,0.08);
    margin-bottom: 30px;
    overflow: hidden;
    transition: all 0.3s ease;
    border: 1px solid rgba(169, 180, 148, 0.1);
}

.form-card:hover {
    box-shadow: 0 10px 35px rgba(0,0,0,0.12);
    transform: translateY(-2px);
}

.card-header {
    padding: 35px 40px 25px;
    border-bottom: 2px solid rgba(169, 180, 148, 0.15);
    background: linear-gradient(135deg, #fafafa, #f5f5f5);
}

.card-header h3 {
    color: var(--coklat);
    font-size: 24px;
    font-weight: 700;
    margin: 0 0 8px 0;
    display: flex;
    align-items: center;
    gap: 12px;
}

.card-header h3 i {
    font-size: 22px;
    color: var(--hijau);
}

.card-header p {
    color: var(--sage);
    font-size: 15px;
    margin: 0;
    opacity: 0.8;
}

.card-body {
    padding: 40px;
}

/* Form Elements */
.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 25px;
    margin-bottom: 25px;
}

.form-group {
    margin-bottom: 25px;
}

.form-group label {
    display: block;
    margin-bottom: 10px;
    font-weight: 600;
    color: var(--coklat);
    font-size: 15px;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 16px 20px;
    border: 2px solid #e9ecef;
    border-radius: 14px;
    font-size: 16px;
    transition: all 0.3s ease;
    background: #f8f9fa;
    font-family: inherit;
}

.form-group input:focus,
.form-group textarea:focus {
    outline: none;
    border-color: var(--hijau);
    background: white;
    box-shadow: 0 0 0 4px rgba(88, 112, 66, 0.1);
    transform: translateY(-1px);
}

.form-group small {
    display: block;
    margin-top: 8px;
    color: var(--sage);
    font-size: 13px;
    font-style: italic;
}

.form-group textarea {
    resize: vertical;
    min-height: 100px;
    line-height: 1.6;
}

/* Payment Methods */
.payment-methods {
    display: flex;
    flex-direction: column;
    gap: 25px;
}

.payment-category h4 {
    color: var(--coklat);
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.payment-options {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.payment-option {
    display: block;
    cursor: pointer;
    transition: all 0.3s ease;
}

.payment-option input[type="radio"] {
    display: none;
}

.option-content {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 16px 20px;
    border: 2px solid #e9ecef;
    border-radius: 12px;
    background: #f8f9fa;
    transition: all 0.3s ease;
    position: relative;
}

.payment-option:hover .option-content {
    border-color: var(--sage);
    background: white;
}

.payment-option input:checked + .option-content {
    border-color: var(--hijau);
    background: rgba(88, 112, 66, 0.05);
    box-shadow: 0 0 0 4px rgba(88, 112, 66, 0.1);
}

.option-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--sage);
    color: white;
    font-size: 20px;
    flex-shrink: 0;
}

.option-icon img {
    width: 32px;
    height: 32px;
    border-radius: 6px;
}

.option-icon.ovo {
    background: #4F47F7;
}

.option-icon.dana {
    background: #118EFF;
}

.option-icon.gopay {
    background: #00AA5B;
}

.option-icon.shopeepay {
    background: #EE4D2D;
}

.option-icon.qris {
    background: linear-gradient(135deg, #FF6B6B, #4ECDC4);
}

.option-details {
    flex: 1;
}

.option-details h5 {
    color: var(--coklat);
    font-size: 16px;
    font-weight: 600;
    margin: 0 0 4px 0;
}

.option-details p {
    color: var(--sage);
    font-size: 14px;
    margin: 0;
}

.option-badge {
    position: absolute;
    top: -8px;
    right: 15px;
    background: var(--hijau);
    color: white;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 10px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.option-badge.new {
    background: #ff6b6b;
}

/* Order Summary */
.order-summary {
    position: sticky;
    top: 140px;
}

.summary-card {
    background: white;
    border-radius: 16px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    overflow: hidden;
}

.summary-header {
    padding: 25px 25px 20px;
    border-bottom: 1px solid rgba(169, 180, 148, 0.2);
}

.summary-header h3 {
    color: var(--coklat);
    font-size: 18px;
    font-weight: 700;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 8px;
}

/* Order Items */
.order-items {
    padding: 20px 25px;
    max-height: 300px;
    overflow-y: auto;
}

.order-item {
    display: flex;
    gap: 15px;
    padding: 15px 0;
    border-bottom: 1px solid #f0f0f0;
}

.order-item:last-child {
    border-bottom: none;
}

.item-image {
    position: relative;
    flex-shrink: 0;
}

.item-image img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 8px;
}

.no-image {
    width: 60px;
    height: 60px;
    background: var(--sage);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 20px;
}

.item-quantity {
    position: absolute;
    top: -8px;
    right: -8px;
    background: var(--hijau);
    color: white;
    width: 24px;
    height: 24px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: bold;
}

.item-details {
    flex: 1;
}

.item-details h4 {
    color: var(--coklat);
    font-size: 14px;
    font-weight: 600;
    margin: 0 0 5px 0;
    line-height: 1.3;
}

.item-details p {
    color: var(--sage);
    font-size: 12px;
    margin: 0 0 8px 0;
}

.item-total {
    color: var(--hijau);
    font-size: 14px;
    font-weight: 700;
}

/* Pricing Details */
.pricing-details {
    padding: 20px 25px;
    border-top: 1px solid rgba(169, 180, 148, 0.2);
}

.pricing-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 12px;
    font-size: 14px;
}

.pricing-row:last-child {
    margin-bottom: 0;
}

.pricing-row span:first-child {
    color: var(--hijau2);
}

.pricing-row span:last-child {
    color: var(--coklat);
    font-weight: 600;
}

.pricing-row.total {
    padding-top: 12px;
    border-top: 1px solid #f0f0f0;
    font-size: 18px;
    font-weight: 700;
}

.pricing-row.total span:last-child {
    color: var(--hijau);
}

.pricing-row .free {
    color: var(--hijau);
    font-weight: 600;
}

/* Place Order Button */
.place-order-btn {
    width: 100%;
    background: linear-gradient(135deg, var(--hijau), var(--hijau2));
    color: white;
    border: none;
    padding: 16px 20px;
    border-radius: 12px;
    font-size: 16px;
    font-weight: 700;
    cursor: pointer;
    margin: 20px 25px 25px;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.place-order-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(88, 112, 66, 0.4);
}

/* Security Info */
.security-info {
    padding: 20px 25px 25px;
    border-top: 1px solid rgba(169, 180, 148, 0.2);
}

.security-item {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 8px;
    font-size: 12px;
    color: var(--sage);
}

.security-item:last-child {
    margin-bottom: 0;
}

.security-item i {
    font-size: 14px;
    color: var(--hijau);
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        padding: 20px 15px;
    }
    
    .checkout-progress {
        margin-bottom: 30px;
    }
    
    .progress-line {
        width: 40px;
        margin: 0 10px;
    }
    
    .checkout-header h1 {
        font-size: 24px;
    }
    
    .checkout-content {
        grid-template-columns: 1fr;
        gap: 25px;
    }
    
    .order-summary {
        order: -1;
        position: static;
    }
    
    .form-row {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .card-body {
        padding: 20px;
    }
    
    .place-order-btn {
        margin: 15px 20px 20px;
    }
    
    .security-info {
        padding: 15px 20px 20px;
    }
}

@media (max-width: 480px) {
    .checkout-header h1 {
        font-size: 20px;
    }
    
    .card-header {
        padding: 20px 20px 15px;
    }
    
    .card-header h3 {
        font-size: 18px;
    }
    
    .option-content {
        padding: 12px 15px;
    }
    
    .option-icon {
        width: 40px;
        height: 40px;
        font-size: 18px;
    }
    
    .option-details h5 {
        font-size: 14px;
    }
    
    .option-details p {
        font-size: 12px;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.getElementById('checkoutForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Validate form
    const requiredFields = this.querySelectorAll('[required]');
    let isValid = true;
    
    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            isValid = false;
            field.style.borderColor = '#dc3545';
        } else {
            field.style.borderColor = 'var(--sage)';
        }
    });
    
    if (!isValid) {
        showNotification('Mohon lengkapi semua field yang wajib diisi', 'error');
        return;
    }
    
    // Submit form
    const formData = new FormData(this);
    
    fetch(this.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = data.redirect_url;
        } else {
            showNotification(data.message || 'Terjadi kesalahan', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Terjadi kesalahan saat memproses pesanan', 'error');
    });
});

function showNotification(message, type) {
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.textContent = message;
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 15px 20px;
        border-radius: 8px;
        color: white;
        font-weight: bold;
        z-index: 9999;
        animation: slideIn 0.3s ease;
        ${type === 'success' ? 'background: #28a745;' : 'background: #dc3545;'}
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.remove();
    }, 3000);
}

// Add CSS for notification animation
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
`;
document.head.appendChild(style);
</script>
@endpush