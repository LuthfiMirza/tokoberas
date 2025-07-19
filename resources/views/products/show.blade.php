@extends('layouts.app')

@section('title', $product->name . ' - Beras Kartini')

@section('content')
    <!-- Product Detail Section -->
    <section class="product-detail" style="padding-top: 120px; background-color: var(--latte); min-height: 100vh;">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 40px 20px;">
            <!-- Breadcrumb -->
            <nav style="margin-bottom: 30px;">
                <a href="{{ route('home') }}" style="color: var(--hijau); text-decoration: none;">Beranda</a>
                <span style="margin: 0 10px; color: var(--sage);">/</span>
                <a href="{{ route('products.index') }}" style="color: var(--hijau); text-decoration: none;">Produk</a>
                <span style="margin: 0 10px; color: var(--sage);">/</span>
                <span style="color: var(--hijau2);">{{ $product->name }}</span>
            </nav>

            <div class="product-content" style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; margin-bottom: 60px;">
                <!-- Product Image -->
                <div class="product-image-section">
                    <div class="main-image" style="position: relative; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 8px 25px rgba(0,0,0,0.1);">
                        @if($product->image)
                            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" 
                                 style="width: 100%; height: 500px; object-fit: cover;">
                        @else
                            <div style="width: 100%; height: 500px; background: var(--sage); display: flex; align-items: center; justify-content: center; color: white; font-size: 24px;">
                                No Image Available
                            </div>
                        @endif
                        
                        @if($product->category)
                            <span class="category-badge" style="position: absolute; top: 20px; left: 20px; background: var(--hijau); color: white; padding: 8px 16px; border-radius: 20px; font-size: 14px; font-weight: bold;">
                                {{ $product->category }}
                            </span>
                        @endif

                        @if($product->stock <= 10)
                            <span class="stock-badge" style="position: absolute; top: 20px; right: 20px; background: {{ $product->stock <= 5 ? '#dc3545' : '#ffc107' }}; color: white; padding: 8px 16px; border-radius: 20px; font-size: 14px; font-weight: bold;">
                                Stok: {{ $product->stock }}
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Product Info -->
                <div class="product-info-section">
                    <h1 style="color: var(--coklat); font-size: 36px; font-weight: bold; margin-bottom: 20px;">
                        {{ $product->name }}
                    </h1>

                    <div class="rating" style="margin-bottom: 20px;">
                        <div class="stars" style="display: flex; align-items: center; gap: 5px;">
                            <i class="fas fa-star" style="color: #ffc107; font-size: 18px;"></i>
                            <i class="fas fa-star" style="color: #ffc107; font-size: 18px;"></i>
                            <i class="fas fa-star" style="color: #ffc107; font-size: 18px;"></i>
                            <i class="fas fa-star" style="color: #ffc107; font-size: 18px;"></i>
                            <i class="fas fa-star-half-alt" style="color: #ffc107; font-size: 18px;"></i>
                            <span style="margin-left: 10px; color: var(--sage); font-size: 16px;">(4.5/5)</span>
                        </div>
                    </div>

                    <div class="price" style="margin-bottom: 30px;">
                        <span style="color: var(--hijau); font-size: 32px; font-weight: bold;">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </span>
                        <span style="color: var(--sage); font-size: 16px; margin-left: 10px;">per karung</span>
                    </div>

                    <div class="product-specs" style="background: white; padding: 25px; border-radius: 12px; margin-bottom: 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
                        <h3 style="color: var(--coklat); margin-bottom: 15px; font-size: 18px;">Spesifikasi Produk</h3>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                            @if($product->weight)
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <i class="fas fa-weight-hanging" style="color: var(--sage); width: 20px;"></i>
                                    <span style="color: var(--hijau2);">Berat: <strong>{{ $product->weight }}kg</strong></span>
                                </div>
                            @endif
                            @if($product->origin_country)
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <i class="fas fa-globe" style="color: var(--sage); width: 20px;"></i>
                                    <span style="color: var(--hijau2);">Asal: <strong>{{ $product->origin_country }}</strong></span>
                                </div>
                            @endif
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <i class="fas fa-boxes" style="color: var(--sage); width: 20px;"></i>
                                <span style="color: var(--hijau2);">Stok: <strong>{{ $product->stock }} karung</strong></span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <i class="fas fa-tag" style="color: var(--sage); width: 20px;"></i>
                                <span style="color: var(--hijau2);">Kategori: <strong>{{ $product->category }}</strong></span>
                            </div>
                        </div>
                    </div>

                    @if($product->description)
                        <div class="description" style="margin-bottom: 30px;">
                            <h3 style="color: var(--coklat); margin-bottom: 15px; font-size: 18px;">Deskripsi</h3>
                            <p style="color: var(--hijau2); line-height: 1.8; font-size: 16px;">
                                {{ $product->description }}
                            </p>
                        </div>
                    @endif

                    <!-- Add to Cart Section -->
                    @if($product->stock > 0)
                        <div class="add-to-cart" style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
                            <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 20px;">
                                <label style="color: var(--coklat); font-weight: bold; font-size: 16px;">Jumlah:</label>
                                <div style="display: flex; align-items: center; border: 2px solid var(--sage); border-radius: 8px; overflow: hidden;">
                                    <button onclick="decreaseQuantity()" style="background: var(--sage); color: white; border: none; padding: 10px 15px; cursor: pointer; font-size: 18px;">-</button>
                                    <input type="number" id="quantity" value="1" min="1" max="{{ $product->stock }}" 
                                           style="border: none; padding: 10px 20px; text-align: center; width: 80px; font-size: 16px;">
                                    <button onclick="increaseQuantity()" style="background: var(--sage); color: white; border: none; padding: 10px 15px; cursor: pointer; font-size: 18px;">+</button>
                                </div>
                                <span style="color: var(--sage); font-size: 14px;">Maksimal {{ $product->stock }} karung</span>
                            </div>

                            <div style="display: flex; gap: 15px;">
                                <button onclick="addToCart({{ $product->id }})" 
                                        style="flex: 1; background: var(--hijau); color: white; border: none; padding: 15px 30px; border-radius: 8px; font-size: 16px; font-weight: bold; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 10px;">
                                    <i class="fas fa-cart-plus"></i>
                                    Tambah ke Keranjang
                                </button>
                                
                                <button onclick="buyNow({{ $product->id }})" 
                                        style="flex: 1; background: var(--coklat); color: white; border: none; padding: 15px 30px; border-radius: 8px; font-size: 16px; font-weight: bold; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 10px;">
                                    <i class="fas fa-shopping-bag"></i>
                                    Beli Sekarang
                                </button>
                            </div>
                        </div>
                    @else
                        <div class="out-of-stock" style="background: #f8d7da; color: #721c24; padding: 20px; border-radius: 8px; text-align: center;">
                            <i class="fas fa-exclamation-triangle" style="font-size: 24px; margin-bottom: 10px;"></i>
                            <h3>Produk Habis</h3>
                            <p>Maaf, produk ini sedang tidak tersedia. Silakan hubungi kami untuk informasi restock.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Related Products -->
            @if($relatedProducts->count() > 0)
                <div class="related-products">
                    <h2 style="color: var(--coklat); text-align: center; margin-bottom: 40px; font-size: 28px;">Produk Serupa</h2>
                    
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px;">
                        @foreach($relatedProducts as $relatedProduct)
                            <div class="product-card" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease;">
                                <div style="height: 200px; overflow: hidden;">
                                    @if($relatedProduct->image)
                                        <img src="{{ asset('images/' . $relatedProduct->image) }}" alt="{{ $relatedProduct->name }}" 
                                             style="width: 100%; height: 100%; object-fit: cover;">
                                    @else
                                        <div style="width: 100%; height: 100%; background: var(--sage); display: flex; align-items: center; justify-content: center; color: white;">
                                            No Image
                                        </div>
                                    @endif
                                </div>
                                
                                <div style="padding: 20px;">
                                    <h3 style="color: var(--coklat); margin-bottom: 10px; font-size: 16px;">
                                        <a href="{{ route('products.show', $relatedProduct->id) }}" style="text-decoration: none; color: inherit;">
                                            {{ $relatedProduct->name }}
                                        </a>
                                    </h3>
                                    <div style="color: var(--hijau); font-size: 18px; font-weight: bold; margin-bottom: 15px;">
                                        Rp {{ number_format($relatedProduct->price, 0, ',', '.') }}
                                    </div>
                                    <a href="{{ route('products.show', $relatedProduct->id) }}" 
                                       style="display: block; background: var(--sage); color: white; padding: 10px; text-align: center; border-radius: 6px; text-decoration: none;">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection

@push('styles')
<style>
.product-card:hover {
    transform: translateY(-5px);
}

@media (max-width: 768px) {
    .product-content {
        grid-template-columns: 1fr !important;
        gap: 30px !important;
    }
    
    .add-to-cart > div:first-child {
        flex-direction: column !important;
        align-items: flex-start !important;
        gap: 15px !important;
    }
    
    .add-to-cart > div:last-child {
        flex-direction: column !important;
    }
}
</style>
@endpush

@push('scripts')
<script>
function increaseQuantity() {
    const quantityInput = document.getElementById('quantity');
    const currentValue = parseInt(quantityInput.value);
    const maxValue = parseInt(quantityInput.max);
    
    if (currentValue < maxValue) {
        quantityInput.value = currentValue + 1;
    }
}

function decreaseQuantity() {
    const quantityInput = document.getElementById('quantity');
    const currentValue = parseInt(quantityInput.value);
    
    if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
    }
}

function addToCart(productId) {
    const quantity = parseInt(document.getElementById('quantity').value);
    
    fetch('{{ route("cart.add") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            product_id: productId,
            quantity: quantity
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showNotification(data.message, 'success');
            updateCartCount(data.cart_count);
        } else {
            showNotification(data.message, 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Terjadi kesalahan saat menambahkan produk', 'error');
    });
}

function buyNow(productId) {
    const quantity = parseInt(document.getElementById('quantity').value);
    
    // Add to cart first
    fetch('{{ route("cart.add") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            product_id: productId,
            quantity: quantity
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Redirect to cart
            window.location.href = '{{ route("cart.index") }}';
        } else {
            showNotification(data.message, 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Terjadi kesalahan', 'error');
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
        ${type === 'success' ? 'background: #28a745;' : 'background: #dc3545;'}
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