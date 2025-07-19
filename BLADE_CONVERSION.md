# Konversi HTML ke Laravel Blade - Toko Beras Kartini

## Deskripsi
Proyek ini adalah konversi dari template HTML statis menjadi aplikasi Laravel dengan Blade templating untuk toko beras online "Beras Kartini".

## Struktur File yang Dibuat

### 1. Layout dan Partials
- `resources/views/layouts/app.blade.php` - Layout utama aplikasi
- `resources/views/partials/header.blade.php` - Header dengan navigasi
- `resources/views/partials/footer.blade.php` - Footer dengan informasi kontak
- `resources/views/partials/modals.blade.php` - Modal login dan registrasi

### 2. Halaman Utama
- `resources/views/home.blade.php` - Halaman beranda dengan produk
- `resources/views/user/dashboard.blade.php` - Dashboard pengguna

### 3. Controller
- `app/Http/Controllers/HomeController.php` - Controller untuk halaman utama

### 4. Assets
- `public/css/styles.css` - Stylesheet utama
- `public/js/script.js` - JavaScript untuk interaksi
- `public/images/` - Folder gambar produk dan aset lainnya

### 5. Routes
- `routes/web.php` - Routing aplikasi

## Fitur yang Diimplementasi

### Frontend
- ✅ Responsive design dengan CSS Grid dan Flexbox
- ✅ Navigasi sticky header
- ✅ Section beranda dengan hero content
- ✅ Section tentang kami
- ✅ Section produk dengan grid layout
- ✅ Footer dengan informasi kontak
- ✅ Modal login dan registrasi
- ✅ Integrasi Firebase Authentication

### Backend (Laravel)
- ✅ Blade templating system
- ✅ Component-based structure (layouts, partials)
- ✅ Controller untuk data management
- ✅ Route management
- ✅ Asset management dengan Laravel Mix

## Cara Menjalankan

1. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

2. **Setup Environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Compile Assets**
   ```bash
   npm run dev
   # atau untuk production
   npm run build
   ```

4. **Jalankan Server**
   ```bash
   php artisan serve
   ```

5. **Akses Aplikasi**
   Buka browser dan kunjungi: `http://localhost:8000`

## Struktur Produk

Data produk saat ini disimpan dalam array di controller. Produk yang tersedia:

1. **Shukriya** - Rp 200.000
2. **Aura** - Rp 195.000
3. **JabalNur** - Rp 170.000
4. **IndiaFeast** - Rp 200.000
5. **DaawatSella** - Rp 195.000
6. **Alishaan** - Rp 200.000
7. **Shukriya2** - Rp 220.000
8. **Aura Premium** - Rp 255.000
9. **India Saalam** - Rp 255.000

## Integrasi Firebase

Aplikasi menggunakan Firebase untuk:
- Authentication (login/register)
- Firestore untuk penyimpanan data user

### Konfigurasi Firebase
```javascript
var firebaseConfig = {
    apiKey: "AIzaSyBwvS0wDsBboVtjGJ1c4R30J5xrWoMpRvE",
    authDomain: "website-beras-kartini.firebaseapp.com",
    projectId: "website-beras-kartini",
    // ... konfigurasi lainnya
};
```

## Pengembangan Selanjutnya

### Rekomendasi Fitur Tambahan:
1. **Database Integration**
   - Migrasi data produk ke database
   - Model untuk Product, User, Order

2. **Shopping Cart**
   - Implementasi keranjang belanja
   - Session management

3. **Payment Gateway**
   - Integrasi dengan payment provider
   - Order management system

4. **Admin Panel**
   - CRUD produk
   - Order management
   - User management

5. **API Development**
   - RESTful API untuk mobile app
   - API documentation

## Teknologi yang Digunakan

- **Backend**: Laravel 10.x
- **Frontend**: Blade Templates, CSS3, JavaScript ES6
- **Authentication**: Firebase Auth
- **Database**: Firebase Firestore
- **Icons**: Font Awesome 5.15.3
- **Fonts**: Google Fonts (Nunito)

## Catatan Penting

1. **Asset Management**: Semua aset (CSS, JS, images) telah dipindahkan ke folder `public/`
2. **Responsive Design**: Layout sudah responsive untuk desktop, tablet, dan mobile
3. **SEO Friendly**: Struktur HTML semantik dan meta tags
4. **Security**: CSRF protection dan input validation siap diimplementasi
5. **Performance**: Asset optimization dan lazy loading dapat ditambahkan

## Kontak

Untuk pertanyaan atau dukungan teknis, hubungi:
- Email: kartinitokoberas@gmail.com
- Instagram: @beraskartini
- Phone: 081394450704