<!-- Modal Login -->
<div id="loginModal" class="auth-modal">
    <div class="auth-modal-overlay"></div>
    <div class="auth-modal-content">
        <div class="auth-modal-header">
            <h2>Masuk ke Akun Anda</h2>
            <p>Selamat datang kembali! Silakan masuk untuk melanjutkan</p>
            <button class="auth-close-btn">&times;</button>
        </div>
        
        <form id="loginForm" class="auth-form">
            <div class="form-group">
                <label for="loginEmail">Email</label>
                <div class="input-wrapper">
                    <i class="fas fa-envelope input-icon"></i>
                    <input type="email" id="loginEmail" placeholder="Masukkan email Anda" required />
                </div>
            </div>

            <div class="form-group">
                <label for="loginPassword">Password</label>
                <div class="input-wrapper">
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password" id="loginPassword" placeholder="Masukkan password Anda" required />
                    <button type="button" class="password-toggle" onclick="togglePassword('loginPassword')">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>

            <div class="form-options">
                <label class="checkbox-wrapper">
                    <input type="checkbox" id="rememberMe">
                    <span class="checkmark"></span>
                    Ingat saya
                </label>
                <a href="#" class="forgot-password">Lupa password?</a>
            </div>

            <button type="submit" class="auth-submit-btn">
                <span class="btn-text">Masuk</span>
                <div class="btn-loader" style="display: none;">
                    <i class="fas fa-spinner fa-spin"></i>
                </div>
            </button>
        </form>

        <div class="auth-divider">
            <span>atau</span>
        </div>

        <div class="auth-footer">
            <p>Belum punya akun? 
                <button type="button" id="toSignupModal" class="auth-switch-btn">Daftar sekarang</button>
            </p>
        </div>
    </div>
</div>

<!-- Modal Sign Up -->
<div id="signupModal" class="auth-modal">
    <div class="auth-modal-overlay"></div>
    <div class="auth-modal-content">
        <div class="auth-modal-header">
            <h2>Buat Akun Baru</h2>
            <p>Bergabunglah dengan kami untuk pengalaman berbelanja yang lebih baik</p>
            <button class="auth-close-btn">&times;</button>
        </div>
        
        <form id="signupForm" class="auth-form">
            <div class="form-group">
                <label for="signupName">Nama Lengkap</label>
                <div class="input-wrapper">
                    <i class="fas fa-user input-icon"></i>
                    <input type="text" id="signupName" placeholder="Masukkan nama lengkap Anda" required />
                </div>
            </div>

            <div class="form-group">
                <label for="signupEmail">Email</label>
                <div class="input-wrapper">
                    <i class="fas fa-envelope input-icon"></i>
                    <input type="email" id="signupEmail" placeholder="Masukkan email Anda" required />
                </div>
            </div>

            <div class="form-group">
                <label for="signupPassword">Password</label>
                <div class="input-wrapper">
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password" id="signupPassword" placeholder="Buat password yang kuat" required />
                    <button type="button" class="password-toggle" onclick="togglePassword('signupPassword')">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                <div class="password-strength">
                    <div class="strength-bar">
                        <div class="strength-fill"></div>
                    </div>
                    <span class="strength-text">Kekuatan password</span>
                </div>
            </div>

            <div class="form-group">
                <label class="checkbox-wrapper">
                    <input type="checkbox" id="agreeTerms" required>
                    <span class="checkmark"></span>
                    Saya setuju dengan <a href="#" class="terms-link">Syarat & Ketentuan</a> dan <a href="#" class="terms-link">Kebijakan Privasi</a>
                </label>
            </div>

            <button type="submit" class="auth-submit-btn">
                <span class="btn-text">Daftar</span>
                <div class="btn-loader" style="display: none;">
                    <i class="fas fa-spinner fa-spin"></i>
                </div>
            </button>
        </form>

        <div class="auth-divider">
            <span>atau</span>
        </div>

        <div class="auth-footer">
            <p>Sudah punya akun? 
                <button type="button" onclick="openLoginModal()" class="auth-switch-btn">Masuk sekarang</button>
            </p>
        </div>
    </div>
</div>

<style>
/* Auth Modal Styles */
.auth-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    animation: fadeIn 0.3s ease;
}

.auth-modal.show {
    display: flex;
    align-items: center;
    justify-content: center;
}

.auth-modal-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    backdrop-filter: blur(5px);
}

.auth-modal-content {
    position: relative;
    background: white;
    border-radius: 20px;
    width: 90%;
    max-width: 450px;
    max-height: 90vh;
    overflow-y: auto;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    animation: slideUp 0.3s ease;
}

.auth-modal-header {
    padding: 40px 40px 20px;
    text-align: center;
    position: relative;
    background: linear-gradient(135deg, var(--hijau) 0%, var(--hijau2) 100%);
    color: white;
    border-radius: 20px 20px 0 0;
}

.auth-modal-header h2 {
    font-size: 28px;
    font-weight: 700;
    margin: 0 0 10px 0;
    color: white;
}

.auth-modal-header p {
    font-size: 16px;
    opacity: 0.9;
    margin: 0;
    line-height: 1.5;
}

.auth-close-btn {
    position: absolute;
    top: 20px;
    right: 20px;
    background: rgba(255, 255, 255, 0.2);
    border: none;
    color: white;
    font-size: 24px;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.auth-close-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: rotate(90deg);
}

.auth-form {
    padding: 40px;
}

.form-group {
    margin-bottom: 25px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: var(--coklat);
    font-size: 14px;
}

.input-wrapper {
    position: relative;
}

.input-icon {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--sage);
    font-size: 16px;
}

.input-wrapper input {
    width: 100%;
    padding: 15px 15px 15px 45px;
    border: 2px solid #e1e5e9;
    border-radius: 12px;
    font-size: 16px;
    transition: all 0.3s ease;
    background: #f8f9fa;
}

.input-wrapper input:focus {
    outline: none;
    border-color: var(--hijau);
    background: white;
    box-shadow: 0 0 0 4px rgba(88, 112, 66, 0.1);
}

.password-toggle {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: var(--sage);
    cursor: pointer;
    font-size: 16px;
    transition: color 0.3s ease;
}

.password-toggle:hover {
    color: var(--hijau);
}

.password-strength {
    margin-top: 8px;
}

.strength-bar {
    height: 4px;
    background: #e1e5e9;
    border-radius: 2px;
    overflow: hidden;
    margin-bottom: 5px;
}

.strength-fill {
    height: 100%;
    width: 0%;
    background: #dc3545;
    transition: all 0.3s ease;
    border-radius: 2px;
}

.strength-text {
    font-size: 12px;
    color: var(--sage);
}

.form-options {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    flex-wrap: wrap;
    gap: 10px;
}

.checkbox-wrapper {
    display: flex;
    align-items: center;
    cursor: pointer;
    font-size: 14px;
    color: var(--hijau2);
}

.checkbox-wrapper input {
    display: none;
}

.checkmark {
    width: 18px;
    height: 18px;
    border: 2px solid var(--sage);
    border-radius: 4px;
    margin-right: 8px;
    position: relative;
    transition: all 0.3s ease;
}

.checkbox-wrapper input:checked + .checkmark {
    background: var(--hijau);
    border-color: var(--hijau);
}

.checkbox-wrapper input:checked + .checkmark::after {
    content: '✓';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 12px;
    font-weight: bold;
}

.forgot-password {
    color: var(--hijau);
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    transition: color 0.3s ease;
}

.forgot-password:hover {
    color: var(--hijau2);
    text-decoration: underline;
}

.auth-submit-btn {
    width: 100%;
    padding: 15px;
    background: linear-gradient(135deg, var(--hijau) 0%, var(--hijau2) 100%);
    color: white;
    border: none;
    border-radius: 12px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.auth-submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(88, 112, 66, 0.3);
}

.auth-submit-btn:active {
    transform: translateY(0);
}

.auth-submit-btn.loading .btn-text {
    opacity: 0;
}

.auth-submit-btn.loading .btn-loader {
    display: flex !important;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.auth-divider {
    text-align: center;
    margin: 30px 40px;
    position: relative;
}

.auth-divider::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 1px;
    background: #e1e5e9;
}

.auth-divider span {
    background: white;
    padding: 0 20px;
    color: var(--sage);
    font-size: 14px;
    position: relative;
}

.auth-footer {
    padding: 0 40px 40px;
    text-align: center;
}

.auth-footer p {
    color: var(--hijau2);
    font-size: 14px;
    margin: 0;
}

.auth-switch-btn {
    background: none;
    border: none;
    color: var(--hijau);
    font-weight: 600;
    cursor: pointer;
    text-decoration: underline;
    font-size: 14px;
    transition: color 0.3s ease;
}

.auth-switch-btn:hover {
    color: var(--hijau2);
}

.terms-link {
    color: var(--hijau);
    text-decoration: none;
    font-weight: 500;
}

.terms-link:hover {
    text-decoration: underline;
}

/* Animations */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(50px) scale(0.9);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

/* Responsive */
@media (max-width: 768px) {
    .auth-modal-content {
        width: 95%;
        margin: 20px;
    }
    
    .auth-modal-header,
    .auth-form,
    .auth-divider,
    .auth-footer {
        padding-left: 25px;
        padding-right: 25px;
    }
    
    .auth-modal-header {
        padding-top: 30px;
        padding-bottom: 15px;
    }
    
    .auth-modal-header h2 {
        font-size: 24px;
    }
    
    .auth-form {
        padding-top: 30px;
        padding-bottom: 30px;
    }
    
    .form-options {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
    }
}

@media (max-width: 480px) {
    .auth-modal-header h2 {
        font-size: 22px;
    }
    
    .auth-modal-header p {
        font-size: 14px;
    }
    
    .input-wrapper input {
        padding: 12px 12px 12px 40px;
        font-size: 14px;
    }
    
    .input-icon {
        font-size: 14px;
        left: 12px;
    }
    
    .password-toggle {
        right: 12px;
        font-size: 14px;
    }
}
</style>

<script>
function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    const toggle = input.nextElementSibling;
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

// Password strength checker
document.getElementById('signupPassword').addEventListener('input', function(e) {
    const password = e.target.value;
    const strengthBar = document.querySelector('.strength-fill');
    const strengthText = document.querySelector('.strength-text');
    
    let strength = 0;
    let text = 'Lemah';
    let color = '#dc3545';
    
    if (password.length >= 8) strength += 25;
    if (/[a-z]/.test(password)) strength += 25;
    if (/[A-Z]/.test(password)) strength += 25;
    if (/[0-9]/.test(password)) strength += 25;
    
    if (strength >= 75) {
        text = 'Kuat';
        color = '#28a745';
    } else if (strength >= 50) {
        text = 'Sedang';
        color = '#ffc107';
    } else if (strength >= 25) {
        text = 'Lemah';
        color = '#fd7e14';
    }
    
    strengthBar.style.width = strength + '%';
    strengthBar.style.background = color;
    strengthText.textContent = text;
    strengthText.style.color = color;
});
</script>