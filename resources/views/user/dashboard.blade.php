@extends('layouts.app')

@section('title', 'Dashboard - Beras Kartini')

@section('content')
    <section class="home" id="home">
        <div class="content">
            <h2>Selamat Datang di Dashboard Anda!</h2>
            <p>Terima kasih telah bergabung dengan Toko Beras Kartini. Dari sini Anda dapat mengelola pesanan, melihat riwayat pembelian, dan mengakses fitur-fitur lainnya.</p>
            
            <div style="margin-top: 30px;">
                <a href="{{ route('home') }}" class="btn">Kembali ke Beranda</a>
            </div>
        </div>
        <div class="image">
            <img src="{{ asset('images/Homeberas2.jpg') }}" alt="Dashboard">
        </div>
    </section>

    <section class="about" id="features">
        <div class="content">
            <h3 class="sub-heading">Fitur Dashboard</h3>
            <h1 class="heading">Apa yang Bisa Anda Lakukan?</h1>
            <ul style="font-size: 18px; color: var(--hijau2); line-height: 2;">
                <li>✓ Melihat dan mengelola pesanan</li>
                <li>✓ Riwayat pembelian</li>
                <li>✓ Update profil</li>
                <li>✓ Tracking pengiriman</li>
                <li>✓ Wishlist produk favorit</li>
            </ul>
        </div>
        <div class="image">
            <img src="{{ asset('images/Homeberas3.jpg') }}" alt="Fitur Dashboard">
        </div>
    </section>
@endsection