# Admin Panel Beras Kartini - Panduan Penggunaan

## 🚀 Akses Admin Panel

### Login Admin
- **URL**: `http://localhost:8000/admin`
- **Email**: `admin@gmail.com`
- **Password**: `password` (yang Anda set saat membuat user)

## 📊 Dashboard

Dashboard menampilkan statistik penting:
- **Total Produk**: Jumlah produk dan produk aktif
- **Total Pelanggan**: Jumlah pelanggan terdaftar
- **Total Transaksi**: Jumlah transaksi dan yang menunggu konfirmasi
- **Total Pendapatan**: Pendapatan dari transaksi yang sudah lunas
- **Stok Rendah**: Produk dengan stok ≤ 10 (peringatan)
- **Chart Transaksi**: Grafik tren transaksi 6 bulan terakhir

## 🛍️ Manajemen Produk

### Menambah Produk Baru
1. Klik menu **"Produk"** di sidebar
2. Klik tombol **"Tambah"**
3. Isi form dengan informasi:
   - **Nama Produk**: Nama beras (contoh: Shukriya Premium)
   - **Deskripsi**: Deskripsi detail produk
   - **Harga**: Harga dalam Rupiah
   - **Stok**: Jumlah stok tersedia
   - **Berat**: Berat dalam kg (biasanya 25kg)
   - **Kategori**: Pilih kategori (Beras Premium, Organik, Impor, Lokal)
   - **Negara Asal**: Negara asal beras
   - **Gambar**: Upload foto produk
   - **Status**: Aktif/Tidak aktif
4. Klik **"Simpan"**

### Mengedit Produk
1. Di halaman daftar produk, klik ikon **mata** (view) atau **pensil** (edit)
2. Update informasi yang diperlukan
3. Klik **"Simpan"**

### Fitur Produk
- **Filter**: Filter berdasarkan kategori dan status
- **Pencarian**: Cari produk berdasarkan nama
- **Sorting**: Urutkan berdasarkan harga, stok, tanggal
- **Badge Stok**: 
  - 🟢 Hijau: Stok > 10
  - 🟡 Kuning: Stok 5-10
  - 🔴 Merah: Stok < 5

## 🛒 Manajemen Transaksi

### Melihat Transaksi
- Menu **"Transaksi"** menampilkan semua pesanan
- Informasi yang ditampilkan:
  - ID Transaksi (auto-generated)
  - Nama pelanggan
  - Produk yang dipesan
  - Jumlah dan total harga
  - Status pesanan dan pembayaran
  - Tanggal pesanan

### Status Pesanan
1. **Menunggu** (Pending): Pesanan baru masuk
2. **Dikonfirmasi** (Confirmed): Admin sudah konfirmasi
3. **Diproses** (Processing): Sedang disiapkan
4. **Dikirim** (Shipped): Sudah dikirim dengan resi
5. **Diterima** (Delivered): Sudah sampai ke pelanggan
6. **Dibatalkan** (Cancelled): Pesanan dibatalkan

### Status Pembayaran
- **Menunggu** (Pending): Belum bayar
- **Lunas** (Paid): Sudah bayar
- **Gagal** (Failed): Pembayaran gagal
- **Dikembalikan** (Refunded): Dana dikembalikan

### Mengelola Transaksi
1. Klik **"Edit"** pada transaksi
2. Update status sesuai kondisi:
   - Ubah status pesanan saat proses berlangsung
   - Input nomor resi saat barang dikirim
   - Set tanggal pengiriman dan penerimaan
   - Tambahkan catatan jika diperlukan

### Menambah Transaksi Manual
1. Klik **"Tambah"** di halaman transaksi
2. Pilih pelanggan dan produk
3. Sistem otomatis menghitung total harga
4. Isi alamat pengiriman dan informasi lainnya
5. Set status awal (biasanya "Confirmed" untuk pesanan manual)

## 👥 Manajemen Pelanggan

### Melihat Data Pelanggan
- Menu **"Pelanggan"** menampilkan semua customer
- Informasi: nama, email, telepon, alamat, jumlah transaksi

### Menambah Pelanggan
1. Klik **"Tambah"** di halaman pelanggan
2. Isi data lengkap pelanggan
3. Firebase UID bisa dikosongkan (untuk registrasi manual)

## 🔍 Fitur Pencarian & Filter

### Filter Transaksi
- **Status Pesanan**: Filter berdasarkan status
- **Status Pembayaran**: Filter pembayaran
- **Tanggal**: Filter berdasarkan rentang tanggal pesanan

### Pencarian
- Semua tabel mendukung pencarian real-time
- Cari berdasarkan nama, email, ID transaksi, dll.

## 📈 Tracking & Monitoring

### Monitoring Stok
- Dashboard menampilkan produk dengan stok rendah
- Badge warna pada tabel produk untuk indikasi cepat
- Perlu restock jika stok ≤ 10

### Tracking Pengiriman
1. Input nomor resi di form edit transaksi
2. Update status menjadi "Dikirim"
3. Set tanggal pengiriman
4. Pelanggan bisa tracking dengan nomor resi

### Laporan Penjualan
- Chart di dashboard menunjukkan tren transaksi
- Total pendapatan dari transaksi yang sudah lunas
- Data dapat difilter berdasarkan periode

## 🔧 Tips Penggunaan

### Best Practices
1. **Update Status Berkala**: Selalu update status transaksi sesuai progress
2. **Monitor Stok**: Cek stok rendah secara rutin
3. **Input Resi**: Selalu input nomor resi untuk tracking
4. **Backup Data**: Lakukan backup database secara berkala

### Workflow Transaksi
1. Pesanan masuk → Status "Pending"
2. Konfirmasi pembayaran → Status "Confirmed" + Payment "Paid"
3. Siapkan barang → Status "Processing"
4. Kirim barang → Status "Shipped" + Input resi + Tanggal kirim
5. Barang sampai → Status "Delivered" + Tanggal terima

## 🚨 Troubleshooting

### Masalah Umum
- **Gambar tidak muncul**: Pastikan file ada di folder `storage/app/public/products`
- **Total tidak terhitung**: Refresh halaman atau cek koneksi database
- **Filter tidak bekerja**: Clear cache browser

### Kontak Support
Jika ada masalah teknis, hubungi developer atau cek log di `storage/logs/laravel.log`

---

## 📱 Akses Mobile
Admin panel Filament responsive dan bisa diakses via mobile browser untuk monitoring cepat.

**Selamat mengelola toko beras Anda! 🌾**