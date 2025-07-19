@extends('layouts.app')

@section('title', 'Beras Kartini - Toko Beras Terpercaya')

@section('content')
    <!-- Home Section -->
    <section class="home" id="home">
        <div class="content">
            <h2>Selamat Datang di Toko Beras Kartini!</h2>
            <p>Kami menghadirkan beragam pilihan beras terbaik dari mancanegara, dipilih secara ketat untuk memastikan kualitas unggul di setiap butirnya. 
                Komitmen kami adalah menyediakan beras impor berkualitas tinggi untuk memenuhi kebutuhan rumah tangga, usaha kuliner, hingga kebutuhan grosir. 
                Dengan proses seleksi dan distribusi yang terjaga, setiap beras yang kami kirimkan bersih, sehat, dan layak konsumsi. 
                Dapatkan beras favorit Anda dengan harga kompetitif dan pelayanan terpercaya hanya di Pusat Beras Nusantara.</p>
        </div>
        <div class="image">
            <img src="{{ asset('images/Homeberas1.jpg') }}" alt="Beras Kartini">
        </div>
    </section>

    <!-- About Section -->
    <section class="about" id="about">
        <div class="content">
            <h3 class="sub-heading">Beras Kartini</h3>
            <h1 class="heading">Kenapa Memilih Kami?</h1>
            <p>
                Kami menyediakan beras impor berkualitas tinggi, dengan stok yang selalu lengkap dan siap kirim kapan saja. 
                Keunggulan kami terletak pada pemilihan beras yang ketat, harga yang kompetitif, serta pelayanan ramah dan cepat. 
                Dengan jaringan distribusi yang efisien dan pengalaman di bidang pangan, kami memastikan setiap pelanggan mendapatkan beras terbaik dengan harga terjangkau tanpa mengorbankan mutu. 
                Pilih Toko Beras Kartini, karena kualitas dan ketersediaan adalah prioritas kami.
            </p>
        </div>
        <div class="image">
            <img src="{{ asset('images/about-img.png') }}" alt="Tentang Kami">
        </div>
    </section>

    <!-- Products Section -->
    <section class="produk" id="produk">
        <h3 class="sub-heading">Produk</h3>
        <h1 class="heading">Beras Terlaris Kami</h1>

        <div class="box-container">
            @foreach($products as $product)
                <div class="box">
                    <div class="image">
                        <img src="{{ asset('images/' . $product['image']) }}" alt="{{ $product['name'] }}" />
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <div class="action-bar">
                            <a href="{{ route('products.show', $loop->index + 1) }}" class="pesan-btn" style="text-decoration: none; color: white; display: inline-block; text-align: center;">Lihat Detail</a>
                            <span class="price">Rp {{ number_format($product['price'], 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div style="text-align: center; margin-top: 40px;">
            <a href="{{ route('products.index') }}" class="btn" style="background: var(--hijau); color: white; padding: 15px 30px; border-radius: 8px; text-decoration: none; font-size: 16px; font-weight: bold; display: inline-flex; align-items: center; gap: 10px;">
                <i class="fas fa-eye"></i> Lihat Semua Produk
            </a>
        </div>
    </section>
@endsection