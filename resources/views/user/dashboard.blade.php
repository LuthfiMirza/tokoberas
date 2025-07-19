@extends('layouts.app')

@section('title', 'Dashboard - Beras Kartini')

@section('content')
<section class="dashboard-page" style="padding-top: 120px; background: var(--latte); min-height: 100vh;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 40px 20px;">
        
        <!-- Welcome Header -->
        <div class="dashboard-header" style="background: white; border-radius: 20px; padding: 40px; margin-bottom: 30px; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">
            <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 20px;">
                <div>
                    <h1 style="color: var(--coklat); font-size: 32px; font-weight: 700; margin-bottom: 10px;">
                        Selamat Datang, <span id="userDisplayName">User</span>!
                    </h1>
                    <p style="color: var(--hijau2); font-size: 16px; margin: 0;">
                        Kelola akun dan pesanan Anda dengan mudah
                    </p>
                </div>
                <div class="user-avatar" style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--hijau), var(--hijau2)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 32px;">
                    <i class="fas fa-user"></i>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="stats-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 30px;">
            <div class="stat-card" style="background: white; border-radius: 15px; padding: 25px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-left: 4px solid var(--hijau);">
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <h3 style="color: var(--sage); font-size: 14px; font-weight: 600; margin-bottom: 5px; text-transform: uppercase;">Total Pesanan</h3>
                        <p style="color: var(--coklat); font-size: 28px; font-weight: 700; margin: 0;">0</p>
                    </div>
                    <div style="width: 50px; height: 50px; background: rgba(88, 112, 66, 0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-shopping-bag" style="color: var(--hijau); font-size: 20px;"></i>
                    </div>
                </div>
            </div>

            <div class="stat-card" style="background: white; border-radius: 15px; padding: 25px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-left: 4px solid #ffc107;">
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <h3 style="color: var(--sage); font-size: 14px; font-weight: 600; margin-bottom: 5px; text-transform: uppercase;">Pesanan Pending</h3>
                        <p style="color: var(--coklat); font-size: 28px; font-weight: 700; margin: 0;">0</p>
                    </div>
                    <div style="width: 50px; height: 50px; background: rgba(255, 193, 7, 0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-clock" style="color: #ffc107; font-size: 20px;"></i>
                    </div>
                </div>
            </div>

            <div class="stat-card" style="background: white; border-radius: 15px; padding: 25px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-left: 4px solid #28a745;">
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <h3 style="color: var(--sage); font-size: 14px; font-weight: 600; margin-bottom: 5px; text-transform: uppercase;">Pesanan Selesai</h3>
                        <p style="color: var(--coklat); font-size: 28px; font-weight: 700; margin: 0;">0</p>
                    </div>
                    <div style="width: 50px; height: 50px; background: rgba(40, 167, 69, 0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-check-circle" style="color: #28a745; font-size: 20px;"></i>
                    </div>
                </div>
            </div>

            <div class="stat-card" style="background: white; border-radius: 15px; padding: 25px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-left: 4px solid var(--coklat);">
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <h3 style="color: var(--sage); font-size: 14px; font-weight: 600; margin-bottom: 5px; text-transform: uppercase;">Total Belanja</h3>
                        <p style="color: var(--coklat); font-size: 28px; font-weight: 700; margin: 0;">Rp 0</p>
                    </div>
                    <div style="width: 50px; height: 50px; background: rgba(139, 69, 19, 0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-wallet" style="color: var(--coklat); font-size: 20px;"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="dashboard-grid" style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px;">
            
            <!-- Recent Orders -->
            <div class="recent-orders" style="background: white; border-radius: 20px; padding: 30px; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 25px;">
                    <h2 style="color: var(--coklat); font-size: 24px; font-weight: 700; margin: 0;">
                        <i class="fas fa-history" style="margin-right: 10px;"></i>
                        Pesanan Terbaru
                    </h2>
                    <a href="{{ route('orders.index') }}" style="color: var(--hijau); text-decoration: none; font-weight: 600; font-size: 14px;">
                        Lihat Semua
                    </a>
                </div>

                <div class="orders-list" id="ordersList">
                    <div class="empty-state" style="text-align: center; padding: 40px 20px; color: var(--sage);">
                        <i class="fas fa-shopping-bag" style="font-size: 48px; margin-bottom: 15px; opacity: 0.5;"></i>
                        <h3 style="margin-bottom: 10px; font-size: 18px;">Belum Ada Pesanan</h3>
                        <p style="margin-bottom: 20px;">Mulai berbelanja untuk melihat riwayat pesanan Anda</p>
                        <a href="{{ route('products.index') }}" style="background: var(--hijau); color: white; padding: 12px 24px; border-radius: 25px; text-decoration: none; font-weight: 600;">
                            Mulai Belanja
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions">
                <div style="background: white; border-radius: 20px; padding: 30px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); margin-bottom: 20px;">
                    <h3 style="color: var(--coklat); font-size: 20px; font-weight: 700; margin-bottom: 20px;">
                        <i class="fas fa-bolt" style="margin-right: 10px;"></i>
                        Aksi Cepat
                    </h3>
                    
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        <a href="{{ route('products.index') }}" class="action-btn" style="display: flex; align-items: center; padding: 15px; background: rgba(88, 112, 66, 0.1); border-radius: 12px; text-decoration: none; color: var(--hijau); transition: all 0.3s ease;">
                            <i class="fas fa-shopping-cart" style="margin-right: 12px; font-size: 16px;"></i>
                            <span style="font-weight: 600;">Belanja Sekarang</span>
                        </a>
                        
                        <a href="{{ route('cart.index') }}" class="action-btn" style="display: flex; align-items: center; padding: 15px; background: rgba(255, 193, 7, 0.1); border-radius: 12px; text-decoration: none; color: #ffc107; transition: all 0.3s ease;">
                            <i class="fas fa-shopping-bag" style="margin-right: 12px; font-size: 16px;"></i>
                            <span style="font-weight: 600;">Lihat Keranjang</span>
                        </a>
                        
                        <a href="{{ route('orders.index') }}" class="action-btn" style="display: flex; align-items: center; padding: 15px; background: rgba(40, 167, 69, 0.1); border-radius: 12px; text-decoration: none; color: #28a745; transition: all 0.3s ease;">
                            <i class="fas fa-list-alt" style="margin-right: 12px; font-size: 16px;"></i>
                            <span style="font-weight: 600;">Riwayat Pesanan</span>
                        </a>
                    </div>
                </div>

                <!-- Account Info -->
                <div style="background: white; border-radius: 20px; padding: 30px; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">
                    <h3 style="color: var(--coklat); font-size: 20px; font-weight: 700; margin-bottom: 20px;">
                        <i class="fas fa-user-cog" style="margin-right: 10px;"></i>
                        Informasi Akun
                    </h3>
                    
                    <div style="display: flex; flex-direction: column; gap: 15px;">
                        <div>
                            <label style="color: var(--sage); font-size: 12px; font-weight: 600; text-transform: uppercase; margin-bottom: 5px; display: block;">Email</label>
                            <p id="userEmail" style="color: var(--coklat); font-weight: 600; margin: 0;">Loading...</p>
                        </div>
                        
                        <div>
                            <label style="color: var(--sage); font-size: 12px; font-weight: 600; text-transform: uppercase; margin-bottom: 5px; display: block;">Member Sejak</label>
                            <p id="memberSince" style="color: var(--coklat); font-weight: 600; margin: 0;">Loading...</p>
                        </div>
                        
                        <button onclick="logout()" style="width: 100%; background: #dc3545; color: white; border: none; padding: 12px; border-radius: 8px; font-weight: 600; cursor: pointer; margin-top: 10px; transition: all 0.3s ease;">
                            <i class="fas fa-sign-out-alt" style="margin-right: 8px;"></i>
                            Logout
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.action-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}

@media (max-width: 768px) {
    .dashboard-grid {
        grid-template-columns: 1fr !important;
    }
    
    .dashboard-header > div {
        flex-direction: column;
        text-align: center;
    }
    
    .stats-grid {
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)) !important;
    }
}

@media (max-width: 480px) {
    .container {
        padding: 20px 15px !important;
    }
    
    .dashboard-header,
    .recent-orders,
    .quick-actions > div {
        padding: 20px !important;
    }
    
    .dashboard-header h1 {
        font-size: 24px !important;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Check authentication and load user data
    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
            loadUserData(user);
        } else {
            // Redirect to login if not authenticated
            window.location.href = '{{ route("login") }}';
        }
    });
});

function loadUserData(user) {
    // Update user display name
    const userDisplayName = document.getElementById('userDisplayName');
    const userEmail = document.getElementById('userEmail');
    const memberSince = document.getElementById('memberSince');
    
    if (userDisplayName) {
        userDisplayName.textContent = user.displayName || user.email.split('@')[0];
    }
    
    if (userEmail) {
        userEmail.textContent = user.email;
    }
    
    if (memberSince) {
        const creationTime = new Date(user.metadata.creationTime);
        memberSince.textContent = creationTime.toLocaleDateString('id-ID', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
    }
    
    // Load user orders and stats (you can implement this based on your backend)
    loadUserStats(user.uid);
}

function loadUserStats(userId) {
    // This is where you would fetch user statistics from your backend
    // For now, we'll just show placeholder data
    console.log('Loading stats for user:', userId);
    
    // You can implement API calls here to get real data
    // Example:
    // fetch('/api/user/stats')
    //     .then(response => response.json())
    //     .then(data => updateStats(data));
}

function logout() {
    if (confirm('Apakah Anda yakin ingin logout?')) {
        firebase.auth().signOut().then(() => {
            window.location.href = '{{ route("home") }}';
        }).catch((error) => {
            console.error('Logout error:', error);
            alert('Terjadi kesalahan saat logout');
        });
    }
}
</script>
@endpush