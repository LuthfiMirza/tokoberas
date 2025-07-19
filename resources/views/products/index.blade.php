@extends('layouts.app')

@section('title', 'Semua Produk - Beras Kartini')

@section('content')
    <!-- Hero Section -->
    <section class="products-hero">
        <div class="hero-content">
            <h1>Koleksi Beras Premium</h1>
            <p>Temukan berbagai jenis beras berkualitas tinggi untuk kebutuhan keluarga Anda</p>
        </div>
    </section>

    <!-- Search and Filter Section -->
    <section class="search-filter-section">
        <div class="container">
            <div class="filter-wrapper">
                <form action="{{ route('products.search') }}" method="GET" class="search-form">
                    <div class="search-input-group">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" name="q" placeholder="Cari produk beras..." value="{{ request('q') }}" class="search-input">
                    </div>
                    
                    <div class="filter-group">
                        <select name="category" class="filter-select">
                            <option value="">Semua Kategori</option>
                            <option value="Beras Premium" {{ request('category') == 'Beras Premium' ? 'selected' : '' }}>Beras Premium</option>
                            <option value="Beras Organik" {{ request('category') == 'Beras Organik' ? 'selected' : '' }}>Beras Organik</option>
                            <option value="Beras Impor" {{ request('category') == 'Beras Impor' ? 'selected' : '' }}>Beras Impor</option>
                            <option value="Beras Lokal" {{ request('category') == 'Beras Lokal' ? 'selected' : '' }}>Beras Lokal</option>
                        </select>
                        
                        <button type="submit" class="search-btn">
                            <i class="fas fa-search"></i>
                            <span>Cari</span>
                        </button>
                    </div>
                </form>

                @if(request('q') || request('category'))
                    <div class="search-results-info">
                        <p>
                            Menampilkan hasil untuk: 
                            @if(request('q')) "<strong>{{ request('q') }}</strong>" @endif
                            @if(request('category')) kategori "<strong>{{ request('category') }}</strong>" @endif
                            <span class="results-count">({{ $products->total() }} produk ditemukan)</span>
                        </p>
                        <a href="{{ route('products.index') }}" class="clear-filters">
                            <i class="fas fa-times"></i> Hapus Filter
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Products Grid -->
    <section class="products-section">
        <div class="container">
            @if($products->count() > 0)
                <div class="products-grid">
                    @foreach($products as $product)
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                @if($product->image)
                                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
                                @else
                                    <div class="no-image-placeholder">
                                        <i class="fas fa-image"></i>
                                        <span>No Image</span>
                                    </div>
                                @endif
                                
                                <div class="product-badges">
                                    @if($product->category)
                                        <span class="category-badge">{{ $product->category }}</span>
                                    @endif
                                    @if($product->stock <= 10)
                                        <span class="stock-badge {{ $product->stock <= 5 ? 'low-stock' : 'medium-stock' }}">
                                            Stok: {{ $product->stock }}
                                        </span>
                                    @endif
                                </div>

                                <div class="product-overlay">
                                    <a href="{{ route('products.show', $product->id) }}" class="quick-view-btn">
                                        <i class="fas fa-eye"></i>
                                        <span>Lihat Detail</span>
                                    </a>
                                </div>
                            </div>

                            <div class="product-info">
                                <!-- Product Header -->
                                <div class="product-header">
                                    <h3 class="product-title">
                                        <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                    </h3>
                                    <div class="product-rating">
                                        <div class="stars">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= 4)
                                                    <i class="fas fa-star"></i>
                                                @elseif($i == 5)
                                                    <i class="fas fa-star-half-alt"></i>
                                                @else
                                                    <i class="far fa-star"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <span class="rating-text">(4.5)</span>
                                    </div>
                                </div>

                                <!-- Product Description -->
                                <div class="product-description-wrapper">
                                    <p class="product-description">{{ Str::limit($product->description, 85) }}</p>
                                </div>

                                <!-- Product Specifications -->
                                <div class="product-specs">
                                    <div class="specs-grid">
                                        @if($product->weight)
                                            <div class="spec-item">
                                                <div class="spec-icon">
                                                    <i class="fas fa-weight-hanging"></i>
                                                </div>
                                                <div class="spec-content">
                                                    <span class="spec-label">Berat</span>
                                                    <span class="spec-value">{{ $product->weight }} kg</span>
                                                </div>
                                            </div>
                                        @endif
                                        
                                        @if($product->origin_country)
                                            <div class="spec-item">
                                                <div class="spec-icon">
                                                    <i class="fas fa-globe-asia"></i>
                                                </div>
                                                <div class="spec-content">
                                                    <span class="spec-label">Asal</span>
                                                    <span class="spec-value">{{ $product->origin_country }}</span>
                                                </div>
                                            </div>
                                        @endif

                                        @if($product->stock > 0)
                                            <div class="spec-item">
                                                <div class="spec-icon">
                                                    <i class="fas fa-boxes"></i>
                                                </div>
                                                <div class="spec-content">
                                                    <span class="spec-label">Stok</span>
                                                    <span class="spec-value {{ $product->stock <= 10 ? 'low-stock-text' : '' }}">
                                                        {{ $product->stock }} tersedia
                                                    </span>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="spec-item">
                                            <div class="spec-icon">
                                                <i class="fas fa-certificate"></i>
                                            </div>
                                            <div class="spec-content">
                                                <span class="spec-label">Kualitas</span>
                                                <span class="spec-value">Premium</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Product Footer with Price and Action -->
                                <div class="product-footer">
                                    <div class="price-section">
                                        <div class="price-main">
                                            <span class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                            <span class="price-unit">per kg</span>
                                        </div>
                                        @if($product->weight)
                                            <div class="price-total">
                                                <span class="total-label">Total {{ $product->weight }}kg:</span>
                                                <span class="total-price">Rp {{ number_format($product->price * $product->weight, 0, ',', '.') }}</span>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <div class="action-section">
                                        @if($product->stock > 0)
                                            <button onclick="addToCart({{ $product->id }}, 1)" class="add-to-cart-btn">
                                                <i class="fas fa-cart-plus"></i>
                                                <span>Tambah ke Keranjang</span>
                                            </button>
                                            <button onclick="quickOrder({{ $product->id }})" class="quick-order-btn">
                                                <i class="fas fa-bolt"></i>
                                                <span>Beli Sekarang</span>
                                            </button>
                                        @else
                                            <button disabled class="out-of-stock-btn">
                                                <i class="fas fa-times-circle"></i>
                                                <span>Stok Habis</span>
                                            </button>
                                            <button onclick="notifyWhenAvailable({{ $product->id }})" class="notify-btn">
                                                <i class="fas fa-bell"></i>
                                                <span>Beritahu Saya</span>
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="pagination-wrapper">
                    {{ $products->appends(request()->query())->links() }}
                </div>
            @else
                <div class="no-products-found">
                    <div class="no-products-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3>Produk Tidak Ditemukan</h3>
                    <p>Maaf, tidak ada produk yang sesuai dengan pencarian Anda.</p>
                    <a href="{{ route('products.index') }}" class="back-to-products-btn">
                        <i class="fas fa-arrow-left"></i>
                        Lihat Semua Produk
                    </a>
                </div>
            @endif
        </div>
    </section>
@endsection

@push('styles')
<style>
/* Products Hero Section */
.products-hero {
    background: linear-gradient(135deg, var(--hijau) 0%, var(--hijau2) 100%);
    padding: 140px 0 80px;
    text-align: center;
    color: white;
    position: relative;
    overflow: hidden;
}

.products-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" patternUnits="userSpaceOnUse" width="100" height="100"><circle cx="50" cy="50" r="2" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    opacity: 0.3;
}

.hero-content {
    position: relative;
    z-index: 2;
    max-width: 800px;
    margin: 0 auto;
    padding: 0 20px;
}

.hero-content h1 {
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
}

.hero-content p {
    font-size: 1.3rem;
    opacity: 0.9;
    line-height: 1.6;
}

/* Search and Filter Section */
.search-filter-section {
    background: var(--latte);
    padding: 40px 0;
    border-bottom: 1px solid rgba(169, 180, 148, 0.2);
}

.filter-wrapper {
    max-width: 1000px;
    margin: 0 auto;
    padding: 0 20px;
}

.search-form {
    display: flex;
    gap: 20px;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    margin-bottom: 30px;
}

.search-input-group {
    position: relative;
    flex: 1;
    max-width: 400px;
}

.search-icon {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--sage);
    font-size: 16px;
}

.search-input {
    width: 100%;
    padding: 15px 15px 15px 45px;
    border: 2px solid var(--sage);
    border-radius: 12px;
    font-size: 16px;
    background: white;
    transition: all 0.3s ease;
}

.search-input:focus {
    outline: none;
    border-color: var(--hijau);
    box-shadow: 0 0 0 4px rgba(88, 112, 66, 0.1);
}

.filter-group {
    display: flex;
    gap: 15px;
    align-items: center;
}

.filter-select {
    padding: 15px 20px;
    border: 2px solid var(--sage);
    border-radius: 12px;
    font-size: 16px;
    background: white;
    cursor: pointer;
    transition: all 0.3s ease;
    min-width: 180px;
}

.filter-select:focus {
    outline: none;
    border-color: var(--hijau);
    box-shadow: 0 0 0 4px rgba(88, 112, 66, 0.1);
}

.search-btn {
    padding: 15px 30px;
    background: var(--hijau);
    color: white;
    border: none;
    border-radius: 12px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
}

.search-btn:hover {
    background: var(--hijau2);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(88, 112, 66, 0.3);
}

.search-results-info {
    text-align: center;
    padding: 20px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.search-results-info p {
    color: var(--hijau2);
    margin: 0;
    font-size: 16px;
}

.results-count {
    color: var(--sage);
    font-weight: 600;
}

.clear-filters {
    color: var(--hijau);
    text-decoration: none;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 5px;
    padding: 8px 16px;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.clear-filters:hover {
    background: var(--hijau);
    color: white;
}

/* Products Section */
.products-section {
    background: var(--latte);
    padding: 60px 0;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-bottom: 50px;
}

.product-card {
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    position: relative;
}

.product-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.15);
}

.product-image-wrapper {
    position: relative;
    height: 250px;
    overflow: hidden;
}

.product-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.product-card:hover .product-image {
    transform: scale(1.05);
}

.no-image-placeholder {
    width: 100%;
    height: 100%;
    background: var(--sage);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 18px;
}

.no-image-placeholder i {
    font-size: 48px;
    margin-bottom: 10px;
    opacity: 0.7;
}

.product-badges {
    position: absolute;
    top: 15px;
    left: 15px;
    right: 15px;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}

.category-badge {
    background: var(--hijau);
    color: white;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.stock-badge {
    color: white;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
}

.stock-badge.low-stock {
    background: #dc3545;
}

.stock-badge.medium-stock {
    background: #ffc107;
}

.product-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(88, 112, 66, 0.9);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.product-card:hover .product-overlay {
    opacity: 1;
}

.quick-view-btn {
    background: white;
    color: var(--hijau);
    padding: 12px 24px;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.quick-view-btn:hover {
    background: var(--latte);
    transform: scale(1.05);
}

/* Product Info Section - Completely Reorganized */
.product-info {
    padding: 25px;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

/* Product Header */
.product-header {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.product-title {
    margin: 0;
    font-size: 20px;
    font-weight: 700;
    line-height: 1.3;
}

.product-title a {
    color: var(--coklat);
    text-decoration: none;
    transition: color 0.3s ease;
}

.product-title a:hover {
    color: var(--hijau);
}

.product-rating {
    display: flex;
    align-items: center;
    gap: 8px;
}

.stars {
    display: flex;
    gap: 2px;
}

.stars i {
    color: #ffc107;
    font-size: 14px;
}

.rating-text {
    color: var(--sage);
    font-size: 13px;
    font-weight: 500;
}

/* Product Description */
.product-description-wrapper {
    margin: 0;
}

.product-description {
    color: var(--hijau2);
    font-size: 14px;
    line-height: 1.6;
    margin: 0;
    opacity: 0.85;
}

/* Product Specifications */
.product-specs {
    background: #f8f9fa;
    border-radius: 12px;
    padding: 16px;
    border: 1px solid rgba(169, 180, 148, 0.2);
}

.specs-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
    gap: 12px;
}

.spec-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 8px;
    background: white;
    border-radius: 8px;
    border: 1px solid rgba(169, 180, 148, 0.15);
    transition: all 0.3s ease;
}

.spec-item:hover {
    border-color: var(--sage);
    box-shadow: 0 2px 8px rgba(169, 180, 148, 0.2);
}

.spec-icon {
    width: 32px;
    height: 32px;
    background: linear-gradient(135deg, var(--sage), var(--hijau));
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 14px;
    flex-shrink: 0;
}

.spec-content {
    display: flex;
    flex-direction: column;
    gap: 2px;
    min-width: 0;
}

.spec-label {
    font-size: 11px;
    color: var(--sage);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.spec-value {
    font-size: 13px;
    color: var(--coklat);
    font-weight: 600;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.low-stock-text {
    color: #dc3545 !important;
}

/* Product Footer */
.product-footer {
    margin-top: auto;
    padding-top: 20px;
    border-top: 2px solid rgba(169, 180, 148, 0.1);
}

.price-section {
    margin-bottom: 15px;
}

.price-main {
    display: flex;
    align-items: baseline;
    gap: 6px;
    margin-bottom: 5px;
}

.price {
    color: var(--hijau);
    font-size: 24px;
    font-weight: 700;
}

.price-unit {
    color: var(--sage);
    font-size: 14px;
    font-weight: 500;
}

.price-total {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 6px 12px;
    background: rgba(88, 112, 66, 0.1);
    border-radius: 6px;
    border-left: 3px solid var(--hijau);
}

.total-label {
    font-size: 12px;
    color: var(--sage);
    font-weight: 500;
}

.total-price {
    font-size: 14px;
    color: var(--hijau);
    font-weight: 700;
}

/* Action Section */
.action-section {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.add-to-cart-btn {
    background: linear-gradient(135deg, var(--hijau), var(--hijau2));
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 12px;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: all 0.3s ease;
    font-size: 14px;
}

.add-to-cart-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(88, 112, 66, 0.4);
}

.quick-order-btn {
    background: white;
    color: var(--hijau);
    border: 2px solid var(--hijau);
    padding: 10px 20px;
    border-radius: 12px;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: all 0.3s ease;
    font-size: 14px;
}

.quick-order-btn:hover {
    background: var(--hijau);
    color: white;
    transform: translateY(-1px);
    box-shadow: 0 4px 15px rgba(88, 112, 66, 0.3);
}

.out-of-stock-btn {
    background: #e9ecef;
    color: #6c757d;
    border: 2px solid #dee2e6;
    padding: 12px 20px;
    border-radius: 12px;
    font-weight: 600;
    cursor: not-allowed;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    font-size: 14px;
}

.notify-btn {
    background: white;
    color: var(--sage);
    border: 2px solid var(--sage);
    padding: 10px 20px;
    border-radius: 12px;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: all 0.3s ease;
    font-size: 14px;
}

.notify-btn:hover {
    background: var(--sage);
    color: white;
    transform: translateY(-1px);
    box-shadow: 0 4px 15px rgba(169, 180, 148, 0.3);
}

/* No Products Found */
.no-products-found {
    text-align: center;
    padding: 80px 20px;
    background: white;
    border-radius: 16px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
}

.no-products-icon {
    font-size: 80px;
    color: var(--sage);
    margin-bottom: 30px;
    opacity: 0.7;
}

.no-products-found h3 {
    color: var(--coklat);
    font-size: 28px;
    margin-bottom: 15px;
    font-weight: 700;
}

.no-products-found p {
    color: var(--hijau2);
    font-size: 16px;
    margin-bottom: 30px;
    opacity: 0.8;
}

.back-to-products-btn {
    background: var(--hijau);
    color: white;
    padding: 15px 30px;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.back-to-products-btn:hover {
    background: var(--hijau2);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(88, 112, 66, 0.3);
}

/* Pagination */
.pagination-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 50px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-content h1 {
        font-size: 2.5rem;
    }
    
    .hero-content p {
        font-size: 1.1rem;
    }
    
    .search-form {
        flex-direction: column;
        align-items: stretch;
    }
    
    .search-input-group,
    .filter-group {
        width: 100%;
    }
    
    .filter-group {
        flex-direction: column;
        gap: 15px;
    }
    
    .filter-select,
    .search-btn {
        width: 100%;
    }
    
    .search-results-info {
        flex-direction: column;
        text-align: center;
    }
    
    .products-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .product-footer {
        flex-direction: column;
        gap: 15px;
        align-items: stretch;
    }
    
    .add-to-cart-btn,
    .out-of-stock-btn {
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .products-hero {
        padding: 120px 0 60px;
    }
    
    .hero-content h1 {
        font-size: 2rem;
    }
    
    .product-info {
        padding: 20px;
    }
    
    .price {
        font-size: 20px;
    }
}
</style>
@endpush

@push('scripts')
<script>
function addToCart(productId, quantity = 1) {
    // Check if user is logged in
    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
            // User is logged in, proceed with adding to cart
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
        } else {
            // User is not logged in, show login modal
            showNotification('Silakan login terlebih dahulu untuk menambahkan produk ke keranjang', 'error');
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
        ${type === 'success' ? 'background: #28a745;' : 'background: #dc3545;'}
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.remove();
    }, 3000);
}

function updateCartCount(count) {
    // Update cart count in header if exists
    const cartCountElement = document.querySelector('.cart-count');
    if (cartCountElement) {
        cartCountElement.textContent = count;
    }
}

function quickOrder(productId) {
    // Check if user is logged in
    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
            // User is logged in, proceed with quick order
            showNotification('Mengarahkan ke halaman produk...', 'success');
            setTimeout(() => {
                window.location.href = `/products/${productId}`;
            }, 1000);
        } else {
            // User is not logged in, show login modal
            showNotification('Silakan login terlebih dahulu untuk melakukan pembelian', 'error');
            setTimeout(() => {
                openLoginModal();
            }, 1000);
        }
    });
}

function notifyWhenAvailable(productId) {
    // Notify when product is available
    showNotification('Anda akan diberitahu ketika produk tersedia kembali', 'success');
    // You can implement notification subscription logic here
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