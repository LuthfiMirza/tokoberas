<header>
    <a href="{{ route('home') }}" class="logo">Beras Kartini</a>

    <nav class="navbar">
        <a href="{{ route('home') }}#home" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
        <a href="{{ route('home') }}#about">Tentang Kami</a>
        <a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.*') ? 'active' : '' }}">Produk</a>
    </nav>

    <div class="icons">
        <i class="fas fa-bars" id="menu-bars"></i>
        <i class="fas fa-solid fa-user" id="user-btn" onclick="openLoginModal()"></i>
        <div class="cart-icon-container" style="position: relative; display: inline-block;">
            <a href="{{ route('cart.index') }}" style="color: inherit; text-decoration: none;">
                <i class="fas fa-shopping-cart" id="cart-btn"></i>
                <span class="cart-count" style="position: absolute; top: -8px; right: -8px; background: #dc3545; color: white; border-radius: 50%; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: bold;">0</span>
            </a>
        </div>
    </div>
</header>

<script>
// Update cart count on page load
document.addEventListener('DOMContentLoaded', function() {
    updateCartCount();
});

function updateCartCount() {
    fetch('{{ route("cart.count") }}')
        .then(response => response.json())
        .then(data => {
            const cartCountElement = document.querySelector('.cart-count');
            if (cartCountElement) {
                cartCountElement.textContent = data.count;
                cartCountElement.style.display = data.count > 0 ? 'flex' : 'none';
            }
        })
        .catch(error => {
            console.error('Error updating cart count:', error);
        });
}
</script>