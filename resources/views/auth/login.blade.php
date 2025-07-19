@extends('layouts.app')

@section('title', 'Masuk - Beras Kartini')

@section('content')
<section class="auth-page">
    <div class="auth-container">
        
        <!-- Header -->
        <div class="auth-header">
            <div class="logo-section">
                <h1 class="brand-logo">
                    <i class="fas fa-seedling"></i> 
                    Beras Kartini
                </h1>
                <p class="brand-tagline">Beras Berkualitas untuk Keluarga Indonesia</p>
            </div>
            
            <div class="page-title">
                <h2>Masuk ke Akun Anda</h2>
                <p>Selamat datang kembali! Silakan masuk untuk melanjutkan berbelanja</p>
            </div>
        </div>

        <!-- Login Form Card -->
        <div class="auth-card">
            
            <!-- Alert Messages -->
            <div id="alertMessage" class="alert-message" style="display: none;">
                <i class="alert-icon"></i>
                <span class="alert-text"></span>
            </div>

            <form id="loginForm" class="auth-form">
                <div class="form-group">
                    <label for="loginEmail" class="form-label">
                        <i class="fas fa-envelope"></i>
                        Email Address
                    </label>
                    <div class="input-wrapper">
                        <input type="email" 
                               id="loginEmail" 
                               class="form-input"
                               placeholder="Masukkan email Anda" 
                               required 
                               autocomplete="email" />
                        <div class="input-border"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="loginPassword" class="form-label">
                        <i class="fas fa-lock"></i>
                        Password
                    </label>
                    <div class="input-wrapper">
                        <input type="password" 
                               id="loginPassword" 
                               class="form-input password-input"
                               placeholder="Masukkan password Anda" 
                               required 
                               autocomplete="current-password" />
                        <button type="button" 
                                class="password-toggle" 
                                onclick="togglePassword('loginPassword')"
                                aria-label="Toggle password visibility">
                            <i class="fas fa-eye"></i>
                        </button>
                        <div class="input-border"></div>
                    </div>
                </div>

                <div class="form-options">
                    <label class="checkbox-wrapper">
                        <input type="checkbox" id="rememberMe">
                        <span class="checkmark">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="checkbox-text">Ingat saya</span>
                    </label>
                    <a href="#" class="forgot-password">
                        Lupa password?
                    </a>
                </div>

                <button type="submit" class="auth-submit-btn">
                    <span class="btn-text">
                        <i class="fas fa-sign-in-alt"></i>
                        Masuk
                    </span>
                    <div class="btn-loader">
                        <div class="spinner"></div>
                    </div>
                </button>
            </form>
        </div>

        <!-- Register Link -->
        <div class="auth-footer">
            <p>
                Belum punya akun? 
                <a href="{{ route('register') }}" class="auth-switch-link">
                    Daftar sekarang
                </a>
            </p>
        </div>

        <!-- Back to Home -->
        <div class="back-to-home">
            <a href="{{ route('home') }}" class="back-link">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Beranda
            </a>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
/* Auth Page Styles */
.auth-page {
    min-height: 100vh;
    background: linear-gradient(135deg, var(--latte) 0%, #f8f9fa 100%);
    padding: 150px 20px 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.auth-container {
    width: 100%;
    max-width: 480px;
    margin: 0 auto;
}

/* Header Styles */
.auth-header {
    text-align: center;
    margin-bottom: 40px;
}

.logo-section {
    margin-bottom: 30px;
}

.brand-logo {
    color: var(--hijau);
    font-size: 2.8rem;
    font-weight: 700;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
}

.brand-logo i {
    font-size: 3rem;
    color: var(--hijau);
}

.brand-tagline {
    color: var(--sage);
    font-size: 16px;
    margin: 0;
    font-weight: 500;
}

.page-title h2 {
    color: var(--coklat);
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 10px;
}

.page-title p {
    color: var(--hijau2);
    font-size: 16px;
    margin: 0;
    line-height: 1.5;
    opacity: 0.9;
}

/* Card Styles */
.auth-card {
    background: white;
    border-radius: 24px;
    padding: 40px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
    margin-bottom: 30px;
    border: 1px solid rgba(88, 112, 66, 0.1);
}

/* Alert Styles */
.alert-message {
    padding: 16px 20px;
    border-radius: 12px;
    margin-bottom: 25px;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 14px;
    animation: slideDown 0.3s ease;
}

.alert-message.success {
    background: linear-gradient(135deg, #d4edda, #c3e6cb);
    color: #155724;
    border: 1px solid #c3e6cb;
}

.alert-message.error {
    background: linear-gradient(135deg, #f8d7da, #f5c6cb);
    color: #721c24;
    border: 1px solid #f5c6cb;
}

.alert-icon {
    font-size: 16px;
}

/* Form Styles */
.auth-form {
    display: flex;
    flex-direction: column;
    gap: 28px;
}

.form-group {
    position: relative;
    width: 100%;
}

.form-label {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 14px;
    font-weight: 600;
    color: var(--coklat);
    font-size: 15px;
    text-transform: none;
}

.form-label i {
    font-size: 15px;
    color: var(--sage);
    width: 16px;
}

/* Enhanced Input Wrapper */
.input-wrapper {
    position: relative;
    width: 100%;
    min-height: 64px;
    display: block;
}

.form-input {
    width: 100%;
    height: 64px;
    padding: 20px 24px;
    border: 2px solid #e8ecf0;
    border-radius: 16px;
    font-size: 16px;
    line-height: 1.4;
    background: #f8f9fa;
    transition: all 0.3s ease;
    font-family: inherit;
    color: var(--coklat);
    box-sizing: border-box;
    display: block;
}

/* Password input with toggle button */
.password-input {
    padding-right: 64px !important; /* Extra space for password toggle */
}

.form-input:focus {
    outline: none;
    border-color: var(--hijau);
    background: white;
    box-shadow: 0 0 0 4px rgba(88, 112, 66, 0.1);
    transform: translateY(-1px);
}

.form-input::placeholder {
    color: var(--sage);
    opacity: 0.8;
    font-size: 15px;
}

/* Password Toggle Button */
.password-toggle {
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: var(--sage);
    cursor: pointer;
    font-size: 18px;
    padding: 12px;
    border-radius: 10px;
    transition: all 0.3s ease;
    width: 44px;
    height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 2;
}

.password-toggle:hover {
    color: var(--hijau);
    background: rgba(88, 112, 66, 0.1);
}

.password-toggle:active {
    transform: translateY(-50%) scale(0.95);
}

.input-border {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 2px;
    background: var(--hijau);
    transition: width 0.3s ease;
    border-radius: 1px;
}

.form-input:focus + .password-toggle + .input-border,
.form-input:focus + .input-border {
    width: 100%;
}

/* Form Options */
.form-options {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
    margin-top: 5px;
}

.checkbox-wrapper {
    display: flex;
    align-items: center;
    cursor: pointer;
    font-size: 15px;
    color: var(--hijau2);
    gap: 12px;
}

.checkbox-wrapper input {
    display: none;
}

.checkmark {
    width: 22px;
    height: 22px;
    border: 2px solid var(--sage);
    border-radius: 6px;
    position: relative;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.checkmark i {
    font-size: 12px;
    color: white;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.checkbox-wrapper input:checked + .checkmark {
    background: var(--hijau);
    border-color: var(--hijau);
    transform: scale(1.1);
}

.checkbox-wrapper input:checked + .checkmark i {
    opacity: 1;
}

.checkbox-text {
    font-weight: 500;
}

.forgot-password {
    color: var(--hijau);
    text-decoration: none;
    font-size: 15px;
    font-weight: 600;
    transition: all 0.3s ease;
    padding: 6px 10px;
    border-radius: 8px;
}

.forgot-password:hover {
    color: var(--hijau2);
    background: rgba(88, 112, 66, 0.1);
}

/* Submit Button */
.auth-submit-btn {
    width: 100%;
    height: 56px;
    padding: 0 24px;
    background: linear-gradient(135deg, var(--hijau) 0%, var(--hijau2) 100%);
    color: white;
    border: none;
    border-radius: 16px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    margin-top: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.auth-submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 30px rgba(88, 112, 66, 0.3);
}

.auth-submit-btn:active {
    transform: translateY(0);
}

.btn-text {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    transition: opacity 0.3s ease;
}

.btn-loader {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.auth-submit-btn.loading .btn-text {
    opacity: 0;
}

.auth-submit-btn.loading .btn-loader {
    opacity: 1;
}

.spinner {
    width: 22px;
    height: 22px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-top: 2px solid white;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

/* Footer Styles */
.auth-footer {
    text-align: center;
    background: white;
    padding: 28px;
    border-radius: 16px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
    border: 1px solid rgba(88, 112, 66, 0.1);
}

.auth-footer p {
    color: var(--hijau2);
    font-size: 15px;
    margin: 0;
    font-weight: 500;
}

.auth-switch-link {
    color: var(--hijau);
    font-weight: 700;
    text-decoration: none;
    transition: all 0.3s ease;
    padding: 6px 10px;
    border-radius: 8px;
}

.auth-switch-link:hover {
    color: var(--hijau2);
    background: rgba(88, 112, 66, 0.1);
}

/* Back to Home */
.back-to-home {
    text-align: center;
    margin-top: 30px;
}

.back-link {
    color: var(--sage);
    text-decoration: none;
    font-size: 15px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    padding: 10px 18px;
    border-radius: 10px;
    font-weight: 500;
}

.back-link:hover {
    color: var(--hijau);
    background: rgba(88, 112, 66, 0.1);
}

/* Animations */
@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Responsive Design */
@media (max-width: 768px) {
    .auth-page {
        padding: 120px 15px 30px;
    }
    
    .auth-card {
        padding: 32px 28px;
    }
    
    .form-options {
        flex-direction: column;
        align-items: flex-start;
        gap: 18px;
    }
    
    .brand-logo {
        font-size: 2.4rem;
    }
    
    .brand-logo i {
        font-size: 2.6rem;
    }
    
    .form-input {
        height: 58px;
        padding: 18px 20px;
        font-size: 15px;
    }
    
    .password-input {
        padding-right: 58px !important;
    }
    
    .password-toggle {
        right: 16px;
        width: 40px;
        height: 40px;
        font-size: 16px;
    }
}

@media (max-width: 480px) {
    .auth-page {
        padding: 100px 10px 20px;
    }
    
    .auth-card {
        padding: 28px 24px;
    }
    
    .page-title h2 {
        font-size: 24px;
    }
    
    .form-input {
        height: 56px;
        padding: 16px 18px;
        font-size: 14px;
    }
    
    .password-input {
        padding-right: 54px !important;
    }
    
    .password-toggle {
        right: 14px;
        width: 38px;
        height: 38px;
        font-size: 15px;
    }
    
    .auth-submit-btn {
        height: 52px;
        font-size: 15px;
    }
}
</style>
@endpush

@push('scripts')
<script>
function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    const toggle = input.parentElement.querySelector('.password-toggle');
    const icon = toggle.querySelector('i');
    
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

function showAlert(message, type) {
    const alertDiv = document.getElementById('alertMessage');
    const alertText = alertDiv.querySelector('.alert-text');
    const alertIcon = alertDiv.querySelector('.alert-icon');
    
    alertText.textContent = message;
    alertDiv.className = `alert-message ${type}`;
    
    // Set appropriate icon
    if (type === 'success') {
        alertIcon.className = 'alert-icon fas fa-check-circle';
    } else {
        alertIcon.className = 'alert-icon fas fa-exclamation-circle';
    }
    
    alertDiv.style.display = 'flex';
    
    // Auto hide after 5 seconds
    setTimeout(() => {
        alertDiv.style.display = 'none';
    }, 5000);
}

// Handle form submission
document.getElementById("loginForm").addEventListener("submit", function(e) {
    e.preventDefault();
    
    const submitBtn = this.querySelector('.auth-submit-btn');
    const email = document.getElementById("loginEmail").value;
    const password = document.getElementById("loginPassword").value;
    
    // Basic validation
    if (!email || !password) {
        showAlert('Mohon lengkapi semua field.', 'error');
        return;
    }
    
    // Show loading state
    submitBtn.classList.add('loading');
    
    // Firebase login
    firebase.auth().signInWithEmailAndPassword(email, password)
    .then((userCredential) => {
        showAlert('Login berhasil! Mengalihkan...', 'success');
        setTimeout(() => {
            window.location.href = "{{ route('user.dashboard') }}";
        }, 1500);
    })
    .catch((error) => {
        submitBtn.classList.remove('loading');
        let errorMessage = 'Login gagal. Silakan coba lagi.';
        
        switch(error.code) {
            case 'auth/user-not-found':
                errorMessage = 'Email tidak terdaftar.';
                break;
            case 'auth/wrong-password':
                errorMessage = 'Password salah.';
                break;
            case 'auth/invalid-email':
                errorMessage = 'Format email tidak valid.';
                break;
            case 'auth/too-many-requests':
                errorMessage = 'Terlalu banyak percobaan. Coba lagi nanti.';
                break;
            case 'auth/user-disabled':
                errorMessage = 'Akun telah dinonaktifkan.';
                break;
        }
        
        showAlert(errorMessage, 'error');
    });
});

// Enhanced form interactions
document.addEventListener('DOMContentLoaded', function() {
    // Add focus effects to inputs
    const inputs = document.querySelectorAll('.form-input');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
        });
    });
    
    // Auto-focus first input
    const firstInput = document.getElementById('loginEmail');
    if (firstInput) {
        setTimeout(() => firstInput.focus(), 500);
    }
});
</script>
@endpush