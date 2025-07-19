@extends('layouts.app')

@section('title', 'Keranjang Belanja - Beras Kartini')

@section('content')
    <section class="cart-page" style="padding-top: 120px; background-color: var(--latte); min-height: 100vh;">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 40px 20px;">
            <h1 style="color: var(--coklat); text-align: center; margin-bottom: 40px; font-size: 32px;">
                <i class="fas fa-shopping-cart"></i> Keranjang Belanja
            </h1>

            @if(count($cartItems) > 0)
                <div class="cart-content" style="display: grid; grid-template-columns: 2fr 1fr; gap: 40px;">
                    <!-- Cart Items -->
                    <div class="cart-items">
                        <div class="cart-header" style="background: white; padding: 20px; border-radius: 12px 12px 0 0; border-bottom: 2px solid var(--sage);">
                            <div style="display: grid; grid-template-columns: 2fr 1fr 1fr 1fr auto; gap: 20px; align-items: center; font-weight: bold; color: var(--coklat);">
                                <span>Produk</span>
                                <span style="text-align: center;">Harga</span>
                                <span style="text-align: center;">Jumlah</span>
                                <span style="text-align: center;">Total</span>
                                <span style="text-align: center;">Aksi</span>
                            </div>
                        </div>

                        <div class="cart-body" style="background: white; border-radius: 0 0 12px 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                            @foreach($cartItems as $item)
                                <div class="cart-item" data-product-id="{{ $item['id'] }}" style="padding: 25px 20px; border-bottom: 1px solid #f0f0f0; display: grid; grid-template-columns: 2fr 1fr 1fr 1fr auto; gap: 20px; align-items: center;">
                                    <!-- Product Info -->
                                    <div style="display: flex; align-items: center; gap: 15px;">
                                        @if($item['image'])
                                            <img src="{{ asset('images/' . $item['image']) }}" alt="{{ $item['name'] }}" 
                                                 style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                                        @else
                                            <div style="width: 80px; height: 80px; background: var(--sage); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-size: 12px;">
                                                No Image
                                            </div>
                                        @endif
                                        <div>
                                            <h3 style="color: var(--coklat); margin-bottom: 5px; font-size: 18px;">{{ $item['name'] }}</h3>
                                            @if(isset($item['weight']))
                                                <p style="color: var(--sage); font-size: 14px; margin: 0;">Berat: {{ $item['weight'] }}kg</p>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Price -->
                                    <div style="text-align: center;">
                                        <span style="color: var(--hijau); font-weight: bold; font-size: 16px;">
                                            Rp {{ number_format($item['price'], 0, ',', '.') }}
                                        </span>
                                    </div>

                                    <!-- Quantity -->
                                    <div style="text-align: center;">
                                        <div style="display: inline-flex; align-items: center; border: 2px solid var(--sage); border-radius: 8px; overflow: hidden;">
                                            <button onclick="updateQuantity({{ $item['id'] }}, {{ $item['quantity'] - 1 }})" 
                                                    style="background: var(--sage); color: white; border: none; padding: 8px 12px; cursor: pointer; font-size: 16px;"
                                                    {{ $item['quantity'] <= 1 ? 'disabled' : '' }}>-</button>
                                            <span style="padding: 8px 15px; background: white; font-weight: bold; min-width: 50px;">{{ $item['quantity'] }}</span>
                                            <button onclick="updateQuantity({{ $item['id'] }}, {{ $item['quantity'] + 1 }})" 
                                                    style="background: var(--sage); color: white; border: none; padding: 8px 12px; cursor: pointer; font-size: 16px;">+</button>
                                        </div>
                                    </div>

                                    <!-- Item Total -->
                                    <div style="text-align: center;">
                                        <span class="item-total" style="color: var(--hijau); font-weight: bold; font-size: 18px;">
                                            Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                                        </span>
                                    </div>

                                    <!-- Remove Button -->
                                    <div style="text-align: center;">
                                        <button onclick="removeFromCart({{ $item['id'] }})" 
                                                style="background: #dc3545; color: white; border: none; padding: 8px 12px; border-radius: 6px; cursor: pointer;">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Cart Actions -->
                        <div style="margin-top: 20px; display: flex; justify-content: space-between; align-items: center;">
                            <a href="{{ route('products.index') }}" 
                               style="background: var(--sage); color: white; padding: 12px 24px; border-radius: 8px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
                                <i class="fas fa-arrow-left"></i> Lanjut Belanja
                            </a>
                            
                            <button onclick="clearCart()" 
                                    style="background: #dc3545; color: white; border: none; padding: 12px 24px; border-radius: 8px; cursor: pointer; display: inline-flex; align-items: center; gap: 8px;">
                                <i class="fas fa-trash"></i> Kosongkan Keranjang
                            </button>
                        </div>
                    </div>

                    <!-- Cart Summary -->
                    <div class="cart-summary">
                        <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); position: sticky; top: 140px;">
                            <h3 style="color: var(--coklat); margin-bottom: 25px; font-size: 20px; text-align: center;">Ringkasan Pesanan</h3>
                            
                            <div style="border-bottom: 1px solid #f0f0f0; padding-bottom: 20px; margin-bottom: 20px;">
                                <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                                    <span style="color: var(--hijau2);">Subtotal ({{ array_sum(array_column($cartItems, 'quantity')) }} item)</span>
                                    <span class="cart-subtotal" style="font-weight: bold; color: var(--hijau);">Rp {{ number_format($total, 0, ',', '.') }}</span>
                                </div>
                                <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                                    <span style="color: var(--hijau2);">Ongkos Kirim</span>
                                    <span style="color: var(--sage);">Dihitung saat checkout</span>
                                </div>
                            </div>

                            <div style="display: flex; justify-content: space-between; margin-bottom: 25px; font-size: 18px; font-weight: bold;">
                                <span style="color: var(--coklat);">Total</span>
                                <span class="cart-total" style="color: var(--hijau);">Rp {{ number_format($total, 0, ',', '.') }}</span>
                            </div>

                            <button onclick="proceedToCheckout()" 
                                    style="width: 100%; background: var(--hijau); color: white; border: none; padding: 15px; border-radius: 8px; font-size: 16px; font-weight: bold; cursor: pointer; margin-bottom: 15px;">
                                <i class="fas fa-credit-card"></i> Lanjut ke Pembayaran
                            </button>

                            <div style="text-align: center; font-size: 12px; color: var(--sage); line-height: 1.4;">
                                <i class="fas fa-shield-alt"></i> Transaksi aman dan terpercaya<br>
                                <i class="fas fa-truck"></i> Pengiriman ke seluruh Indonesia
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Empty Cart -->
                <div style="text-align: center; padding: 80px 20px;">
                    <div style="background: white; padding: 60px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); max-width: 500px; margin: 0 auto;">
                        <i class="fas fa-shopping-cart" style="font-size: 80px; color: var(--sage); margin-bottom: 30px;"></i>
                        <h2 style="color: var(--coklat); margin-bottom: 15px; font-size: 24px;">Keranjang Kosong</h2>
                        <p style="color: var(--hijau2); margin-bottom: 30px; font-size: 16px; line-height: 1.6;">
                            Belum ada produk di keranjang Anda.<br>
                            Yuk, mulai berbelanja beras berkualitas!
                        </p>
                        <a href="{{ route('products.index') }}" 
                           style="background: var(--hijau); color: white; padding: 15px 30px; border-radius: 8px; text-decoration: none; display: inline-flex; align-items: center; gap: 10px; font-weight: bold;">
                            <i class="fas fa-shopping-bag"></i> Mulai Belanja
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection

@push('styles')
<style>
@media (max-width: 768px) {
    .cart-content {
        grid-template-columns: 1fr !important;
    }
    
    .cart-header,
    .cart-item {
        grid-template-columns: 1fr !important;
        gap: 15px !important;
    }
    
    .cart-header {
        display: none !important;
    }
    
    .cart-item {
        flex-direction: column !important;
        align-items: flex-start !important;
        text-align: left !important;
    }
    
    .cart-item > div {
        width: 100% !important;
        text-align: left !important;
    }
    
    .cart-item > div:nth-child(3),
    .cart-item > div:nth-child(4),
    .cart-item > div:nth-child(5) {
        display: flex !important;
        justify-content: space-between !important;
        align-items: center !important;
    }
    
    .cart-item > div:nth-child(3)::before {
        content: "Jumlah: ";
        font-weight: bold;
        color: var(--coklat);
    }
    
    .cart-item > div:nth-child(4)::before {
        content: "Total: ";
        font-weight: bold;
        color: var(--coklat);
    }
}
</style>
@endpush

@push('scripts')
<script>
function updateQuantity(productId, newQuantity) {
    if (newQuantity < 1) return;
    
    fetch('{{ route("cart.update") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            product_id: productId,
            quantity: newQuantity
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update the quantity display
            const cartItem = document.querySelector(`[data-product-id="${productId}"]`);
            const quantitySpan = cartItem.querySelector('span');
            quantitySpan.textContent = newQuantity;
            
            // Update item total
            const itemTotal = cartItem.querySelector('.item-total');
            itemTotal.textContent = 'Rp ' + data.item_total;
            
            // Update cart total
            document.querySelector('.cart-total').textContent = 'Rp ' + data.cart_total;
            document.querySelector('.cart-subtotal').textContent = 'Rp ' + data.cart_total;
            
            // Update cart count
            updateCartCount(data.cart_count);
            
            showNotification('Jumlah produk berhasil diperbarui', 'success');
        } else {
            showNotification(data.message, 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Terjadi kesalahan', 'error');
    });
}

function removeFromCart(productId) {
    if (!confirm('Apakah Anda yakin ingin menghapus produk ini dari keranjang?')) {
        return;
    }
    
    fetch('{{ route("cart.remove") }}', {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            product_id: productId
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Remove the item from DOM
            const cartItem = document.querySelector(`[data-product-id="${productId}"]`);
            cartItem.remove();
            
            // Update totals
            document.querySelector('.cart-total').textContent = 'Rp ' + data.cart_total;
            document.querySelector('.cart-subtotal').textContent = 'Rp ' + data.cart_total;
            
            // Update cart count
            updateCartCount(data.cart_count);
            
            // Check if cart is empty
            if (data.cart_count === 0) {
                location.reload();
            }
            
            showNotification(data.message, 'success');
        } else {
            showNotification(data.message, 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Terjadi kesalahan', 'error');
    });
}

function clearCart() {
    if (!confirm('Apakah Anda yakin ingin mengosongkan keranjang?')) {
        return;
    }
    
    fetch('{{ route("cart.clear") }}', {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            showNotification('Terjadi kesalahan', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Terjadi kesalahan', 'error');
    });
}

function proceedToCheckout() {
    // Check if user is logged in
    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
            // User is logged in, proceed to checkout
            window.location.href = '{{ route("checkout.index") }}';
        } else {
            // User is not logged in, show login modal
            showNotification('Silakan login terlebih dahulu untuk melanjutkan ke pembayaran', 'error');
            setTimeout(() => {
                openLoginModal();
            }, 1000);
        }
    });
}

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
        ${type === 'success' ? 'background: #28a745;' : 
          type === 'error' ? 'background: #dc3545;' : 'background: #17a2b8;'}
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.remove();
    }, 3000);
}

function updateCartCount(count) {
    const cartCountElement = document.querySelector('.cart-count');
    if (cartCountElement) {
        cartCountElement.textContent = count;
    }
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