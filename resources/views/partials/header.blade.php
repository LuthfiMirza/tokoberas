<header class="main-header">
    <!-- Logo -->
    <div class="header-logo">
        <a href="{{ route('home') }}" class="logo">
            <i class="fas fa-seedling"></i>
            Beras Kartini
        </a>
    </div>

    <!-- Navigation Menu -->
    <nav class="header-nav">
        <ul class="nav-menu" id="navMenu">
            <li><a href="{{ route('home') }}#home" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a></li>
            <li><a href="{{ route('home') }}#about">Tentang Kami</a></li>
            <li><a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.*') ? 'active' : '' }}">Produk</a></li>
        </ul>
    </nav>

    <!-- Header Actions -->
    <div class="header-actions">
        <!-- Mobile Menu Toggle -->
        <button class="mobile-menu-toggle" id="mobileMenuToggle">
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
        </button>

        <!-- Authentication Section -->
        <div class="auth-section">
            <!-- Guest State -->
            <div class="guest-auth" id="guestAuth">
                <a href="{{ route('login') }}" class="auth-link login-link">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Masuk</span>
                </a>
                <a href="{{ route('register') }}" class="auth-link register-link">
                    <i class="fas fa-user-plus"></i>
                    <span>Daftar</span>
                </a>
            </div>

            <!-- Authenticated State -->
            <div class="user-auth" id="userAuth" style="display: none;">
                <div class="user-menu">
                    <button class="user-toggle" id="userToggle">
                        <div class="user-avatar">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <span class="user-name" id="userName">User</span>
                        <i class="fas fa-chevron-down dropdown-arrow"></i>
                    </button>
                    
                    <div class="user-dropdown" id="userDropdown">
                        <div class="dropdown-header">
                            <div class="user-info">
                                <div class="user-avatar-large">
                                    <i class="fas fa-user-circle"></i>
                                </div>
                                <div class="user-details">
                                    <span class="user-display-name" id="userDisplayName">User</span>
                                    <span class="user-email" id="userEmail">user@example.com</span>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-menu">
                            <a href="{{ route('user.dashboard') }}" class="dropdown-item">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            </a>
                            <a href="{{ route('orders.index') }}" class="dropdown-item">
                                <i class="fas fa-shopping-bag"></i>
                                <span>Pesanan Saya</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <button onclick="handleLogout()" class="dropdown-item logout-item">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cart -->
        <div class="cart-section">
            <a href="{{ route('cart.index') }}" class="cart-button">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-badge" id="cartBadge">0</span>
            </a>
        </div>
    </div>
</header>

<style>
/* Reset and Base Styles */
.main-header * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Main Header */
.main-header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    background: var(--hijau);
    padding: 0 7%;
    height: 8rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    z-index: 1000;
    box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

/* Logo Section */
.header-logo .logo {
    display: flex;
    align-items: center;
    gap: 1rem;
    color: var(--latte);
    font-size: 2.5rem;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.3s ease;
}

.header-logo .logo:hover {
    color: #fff;
    transform: scale(1.05);
}

.header-logo .logo i {
    font-size: 2.8rem;
    color: var(--latte);
}

/* Navigation */
.header-nav {
    flex: 1;
    display: flex;
    justify-content: center;
    margin: 0 2rem;
}

.nav-menu {
    display: flex;
    list-style: none;
    gap: 2rem;
    margin: 0;
    padding: 0;
}

.nav-menu li a {
    color: var(--latte);
    text-decoration: none;
    font-size: 1.6rem;
    font-weight: 500;
    padding: 1rem 1.5rem;
    border-radius: 0.8rem;
    transition: all 0.3s ease;
    position: relative;
    display: block;
}

.nav-menu li a:hover,
.nav-menu li a.active {
    color: #fff;
    background: rgba(255, 255, 255, 0.1);
    transform: translateY(-2px);
}

.nav-menu li a.active::after {
    content: '';
    position: absolute;
    bottom: 0.5rem;
    left: 50%;
    transform: translateX(-50%);
    width: 0.4rem;
    height: 0.4rem;
    background: #fff;
    border-radius: 50%;
}

/* Header Actions */
.header-actions {
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

/* Mobile Menu Toggle */
.mobile-menu-toggle {
    display: none;
    flex-direction: column;
    justify-content: space-around;
    width: 3rem;
    height: 3rem;
    background: transparent;
    border: none;
    cursor: pointer;
    padding: 0;
    z-index: 10;
}

.hamburger-line {
    width: 100%;
    height: 0.3rem;
    background: var(--latte);
    border-radius: 0.2rem;
    transition: all 0.3s ease;
    transform-origin: 1px;
}

.mobile-menu-toggle.active .hamburger-line:nth-child(1) {
    transform: rotate(45deg);
}

.mobile-menu-toggle.active .hamburger-line:nth-child(2) {
    opacity: 0;
}

.mobile-menu-toggle.active .hamburger-line:nth-child(3) {
    transform: rotate(-45deg);
}

/* Authentication Section */
.auth-section {
    position: relative;
}

.guest-auth {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.auth-link {
    display: flex;
    align-items: center;
    gap: 0.8rem;
    padding: 1rem 1.8rem;
    border-radius: 2.5rem;
    text-decoration: none;
    font-size: 1.4rem;
    font-weight: 600;
    transition: all 0.3s ease;
    white-space: nowrap;
}

.login-link {
    color: var(--latte);
    border: 2px solid var(--latte);
    background: transparent;
}

.login-link:hover {
    background: var(--latte);
    color: var(--hijau);
    transform: translateY(-2px);
    box-shadow: 0 0.5rem 1.5rem rgba(255, 255, 255, 0.2);
}

.register-link {
    background: var(--latte);
    color: var(--hijau);
    border: 2px solid var(--latte);
}

.register-link:hover {
    background: #fff;
    border-color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 0.5rem 1.5rem rgba(255, 255, 255, 0.3);
}

/* User Menu */
.user-menu {
    position: relative;
}

.user-toggle {
    display: flex;
    align-items: center;
    gap: 1rem;
    background: rgba(255, 255, 255, 0.1);
    border: 2px solid var(--latte);
    color: var(--latte);
    padding: 0.8rem 1.5rem;
    border-radius: 2.5rem;
    cursor: pointer;
    font-size: 1.4rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.user-toggle:hover {
    background: var(--latte);
    color: var(--hijau);
    transform: translateY(-2px);
}

.user-avatar i {
    font-size: 2rem;
}

.dropdown-arrow {
    font-size: 1.2rem;
    transition: transform 0.3s ease;
}

.user-toggle.active .dropdown-arrow {
    transform: rotate(180deg);
}

/* User Dropdown */
.user-dropdown {
    position: absolute;
    top: calc(100% + 1.5rem);
    right: 0;
    background: #fff;
    border-radius: 1.5rem;
    box-shadow: 0 2rem 4rem rgba(0, 0, 0, 0.15);
    min-width: 28rem;
    z-index: 1000;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-1rem);
    transition: all 0.3s ease;
    overflow: hidden;
}

.user-dropdown.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.dropdown-header {
    padding: 2rem;
    background: linear-gradient(135deg, var(--hijau), var(--hijau2));
    color: white;
}

.user-info {
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

.user-avatar-large i {
    font-size: 4rem;
}

.user-details {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.user-display-name {
    font-size: 1.6rem;
    font-weight: 700;
}

.user-email {
    font-size: 1.3rem;
    opacity: 0.9;
}

.dropdown-menu {
    padding: 1rem 0;
}

.dropdown-item {
    display: flex;
    align-items: center;
    gap: 1.5rem;
    padding: 1.2rem 2rem;
    color: var(--hijau2);
    text-decoration: none;
    font-size: 1.4rem;
    font-weight: 500;
    border: none;
    background: none;
    width: 100%;
    text-align: left;
    cursor: pointer;
    transition: all 0.3s ease;
}

.dropdown-item:hover {
    background: #f8f9fa;
    color: var(--hijau);
}

.dropdown-item i {
    font-size: 1.6rem;
    width: 2rem;
}

.dropdown-divider {
    height: 1px;
    background: #e9ecef;
    margin: 1rem 0;
}

.logout-item {
    color: #dc3545;
}

.logout-item:hover {
    background: #fff5f5;
    color: #dc3545;
}

/* Cart Section */
.cart-button {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 5rem;
    height: 5rem;
    background: rgba(255, 255, 255, 0.1);
    border: 2px solid var(--latte);
    border-radius: 50%;
    color: var(--latte);
    text-decoration: none;
    font-size: 2rem;
    transition: all 0.3s ease;
}

.cart-button:hover {
    background: var(--latte);
    color: var(--hijau);
    transform: scale(1.1);
}

.cart-badge {
    position: absolute;
    top: -0.5rem;
    right: -0.5rem;
    background: #dc3545;
    color: white;
    border-radius: 50%;
    width: 2.2rem;
    height: 2.2rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    font-weight: 700;
    min-width: 2.2rem;
    border: 2px solid var(--hijau);
}

/* Mobile Responsive */
@media (max-width: 991px) {
    .main-header {
        padding: 0 5%;
        height: 7rem;
    }

    .mobile-menu-toggle {
        display: flex;
        order: -1;
    }

    .header-nav {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: var(--hijau);
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        transform: translateY(-100%);
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        margin: 0;
    }

    .header-nav.active {
        transform: translateY(0);
        opacity: 1;
        visibility: visible;
    }

    .nav-menu {
        flex-direction: column;
        padding: 2rem;
        gap: 0;
    }

    .nav-menu li a {
        padding: 1.5rem 2rem;
        font-size: 1.8rem;
        border-radius: 1rem;
        margin-bottom: 1rem;
        background: rgba(255, 255, 255, 0.05);
    }

    .guest-auth {
        flex-direction: column;
        gap: 1rem;
        position: absolute;
        top: 100%;
        right: 0;
        background: var(--hijau);
        padding: 2rem;
        border-radius: 0 0 1.5rem 1.5rem;
        box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.1);
        min-width: 20rem;
        transform: translateY(-100%);
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }

    .guest-auth.active {
        transform: translateY(0);
        opacity: 1;
        visibility: visible;
    }

    .auth-link {
        width: 100%;
        justify-content: center;
        padding: 1.2rem 2rem;
        font-size: 1.6rem;
    }

    .user-dropdown {
        right: -2rem;
        min-width: 25rem;
    }
}

@media (max-width: 768px) {
    .main-header {
        padding: 0 3%;
        height: 6rem;
    }

    .header-logo .logo {
        font-size: 2rem;
    }

    .header-logo .logo i {
        font-size: 2.2rem;
    }

    .auth-link span {
        display: none;
    }

    .auth-link {
        width: 4.5rem;
        height: 4.5rem;
        border-radius: 50%;
        padding: 0;
        justify-content: center;
    }

    .user-name {
        display: none;
    }

    .user-toggle {
        padding: 0.8rem 1.2rem;
    }

    .cart-button {
        width: 4.5rem;
        height: 4.5rem;
        font-size: 1.8rem;
    }
}

@media (max-width: 480px) {
    .main-header {
        padding: 0 2%;
        height: 5.5rem;
    }

    .header-logo .logo {
        font-size: 1.8rem;
    }

    .header-actions {
        gap: 1rem;
    }

    .user-dropdown {
        right: -1rem;
        min-width: 22rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    initializeHeader();
    updateCartCount();
    checkAuthState();
});

function initializeHeader() {
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const navMenu = document.getElementById('navMenu');
    const guestAuth = document.getElementById('guestAuth');
    const userToggle = document.getElementById('userToggle');
    const userDropdown = document.getElementById('userDropdown');

    // Mobile menu toggle
    if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            this.classList.toggle('active');
            navMenu.classList.toggle('active');
            
            // Also toggle guest auth on mobile
            if (window.innerWidth <= 991 && guestAuth) {
                guestAuth.classList.toggle('active');
            }
        });
    }

    // User dropdown toggle
    if (userToggle) {
        userToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            this.classList.toggle('active');
            userDropdown.classList.toggle('show');
        });
    }

    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.main-header')) {
            // Close mobile menu
            if (mobileMenuToggle) {
                mobileMenuToggle.classList.remove('active');
            }
            if (navMenu) {
                navMenu.classList.remove('active');
            }
            if (guestAuth) {
                guestAuth.classList.remove('active');
            }
            
            // Close user dropdown
            if (userToggle) {
                userToggle.classList.remove('active');
            }
            if (userDropdown) {
                userDropdown.classList.remove('show');
            }
        }
    });

    // Close mobile menu on scroll
    window.addEventListener('scroll', function() {
        if (mobileMenuToggle) {
            mobileMenuToggle.classList.remove('active');
        }
        if (navMenu) {
            navMenu.classList.remove('active');
        }
        if (guestAuth) {
            guestAuth.classList.remove('active');
        }
    });

    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 991) {
            // Reset mobile menu on desktop
            if (mobileMenuToggle) {
                mobileMenuToggle.classList.remove('active');
            }
            if (navMenu) {
                navMenu.classList.remove('active');
            }
            if (guestAuth) {
                guestAuth.classList.remove('active');
            }
        }
    });
}

function updateCartCount() {
    fetch('{{ route("cart.count") }}')
        .then(response => response.json())
        .then(data => {
            const cartBadge = document.getElementById('cartBadge');
            if (cartBadge) {
                cartBadge.textContent = data.count;
                cartBadge.style.display = data.count > 0 ? 'flex' : 'none';
            }
        })
        .catch(error => {
            console.error('Error updating cart count:', error);
        });
}

function checkAuthState() {
    if (typeof firebase !== 'undefined' && firebase.auth) {
        firebase.auth().onAuthStateChanged(function(user) {
            const guestAuth = document.getElementById('guestAuth');
            const userAuth = document.getElementById('userAuth');
            const userName = document.getElementById('userName');
            const userDisplayName = document.getElementById('userDisplayName');
            const userEmail = document.getElementById('userEmail');
            
            if (user) {
                // User is logged in
                if (guestAuth) guestAuth.style.display = 'none';
                if (userAuth) userAuth.style.display = 'block';
                
                const displayName = user.displayName || user.email.split('@')[0];
                if (userName) userName.textContent = displayName;
                if (userDisplayName) userDisplayName.textContent = displayName;
                if (userEmail) userEmail.textContent = user.email;
            } else {
                // User is not logged in
                if (guestAuth) guestAuth.style.display = 'flex';
                if (userAuth) userAuth.style.display = 'none';
            }
        });
    }
}

function handleLogout() {
    if (confirm('Apakah Anda yakin ingin logout?')) {
        if (typeof firebase !== 'undefined' && firebase.auth) {
            firebase.auth().signOut().then(() => {
                localStorage.clear();
                sessionStorage.clear();
                window.location.href = '{{ route("home") }}';
            }).catch((error) => {
                console.error('Logout error:', error);
                alert('Terjadi kesalahan saat logout');
            });
        } else {
            window.location.href = '{{ route("home") }}';
        }
    }
}

// Global functions for backward compatibility
window.updateCartCount = updateCartCount;
window.openLoginModal = function() {
    window.location.href = '{{ route("login") }}';
};
</script>