<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Beras Kartini')</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @stack('styles')
</head>
<body>
    @include('partials.header')

    @yield('content')

    @include('partials.footer')

    @include('partials.modals')

    <!-- Firebase Scripts -->
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>

    <script>
        // Inisialisasi Firebase (versi 8)
        var firebaseConfig = {
            apiKey: "AIzaSyBwvS0wDsBboVtjGJ1c4R30J5xrWoMpRvE",
            authDomain: "website-beras-kartini.firebaseapp.com",
            projectId: "website-beras-kartini",
            storageBucket: "website-beras-kartini.appspot.com",
            messagingSenderId: "111531678421",
            appId: "1:111531678421:web:339488ee0a4e0f23b3e05c",
            measurementId: "G-SSZW44QRVX"
        };
        firebase.initializeApp(firebaseConfig);
        var db = firebase.firestore();

        // SIGN UP
        document.getElementById("signupForm").addEventListener("submit", function(e) {
            e.preventDefault();
            const name = document.getElementById("signupName").value;
            const email = document.getElementById("signupEmail").value;
            const password = document.getElementById("signupPassword").value;

            firebase.auth().createUserWithEmailAndPassword(email, password)
            .then((userCredential) => {
                const user = userCredential.user;
                // Update profile
                return user.updateProfile({ displayName: name }).then(() => {
                // Simpan data ke Firestore
                return db.collection("users").doc(user.uid).set({
                    name: name,
                    email: email,
                    uid: user.uid
                });
                });
            })
            .then(() => {
                window.location.href = "{{ route('user.dashboard') }}"; // Redirect setelah sign-up
            })
            .catch((error) => {
                alert("Registrasi gagal: " + error.message);
            });
        });

        // LOGIN
        document.getElementById("loginForm").addEventListener("submit", function(e) {
            e.preventDefault();
            const email = document.getElementById("loginEmail").value;
            const password = document.getElementById("loginPassword").value;

            firebase.auth().signInWithEmailAndPassword(email, password)
            .then((userCredential) => {
                window.location.href = "{{ route('user.dashboard') }}"; // Redirect setelah login
            })
            .catch((error) => {
                alert("Login gagal: " + error.message);
            });
        });
    </script>

    <script>
        const loginModal = document.getElementById("loginModal");
        const signupModal = document.getElementById("signupModal");
        const userBtn = document.getElementById("user-btn");
        const cartBtn = document.getElementById("cart-btn");
        const toSignupBtn = document.getElementById("toSignupModal");

        // Function to show modal with animation
        function showModal(modal) {
            modal.style.display = "flex";
            modal.classList.add("show");
            document.body.style.overflow = "hidden";
        }

        // Function to hide modal with animation
        function hideModal(modal) {
            modal.classList.remove("show");
            setTimeout(() => {
                modal.style.display = "none";
                document.body.style.overflow = "auto";
            }, 300);
        }

        // Buka modal login saat ikon user diklik
        if (userBtn) {
            userBtn.addEventListener("click", () => {
                showModal(loginModal);
            });
        }

        if (cartBtn) {
            cartBtn.addEventListener("click", () => {
                showModal(loginModal);
            });
        }

        // Tombol X menutup modal
        document.querySelectorAll(".auth-close-btn").forEach((btn) => {
            btn.addEventListener("click", () => {
                hideModal(loginModal);
                hideModal(signupModal);
            });
        });

        // Klik overlay menutup modal
        document.querySelectorAll(".auth-modal-overlay").forEach((overlay) => {
            overlay.addEventListener("click", () => {
                hideModal(loginModal);
                hideModal(signupModal);
            });
        });

        // Pindah ke modal sign-up saat tombol "Daftar sekarang" ditekan
        if (toSignupBtn) {
            toSignupBtn.addEventListener("click", () => {
                hideModal(loginModal);
                setTimeout(() => {
                    showModal(signupModal);
                }, 300);
            });
        }

        function openLoginModal() {
            hideModal(signupModal);
            setTimeout(() => {
                showModal(loginModal);
            }, 300);
        }

        // Add loading state to form submissions
        document.getElementById("loginForm").addEventListener("submit", function(e) {
            const submitBtn = this.querySelector('.auth-submit-btn');
            submitBtn.classList.add('loading');
            
            // Remove loading state after a delay (will be removed when redirect happens)
            setTimeout(() => {
                submitBtn.classList.remove('loading');
            }, 3000);
        });

        document.getElementById("signupForm").addEventListener("submit", function(e) {
            const submitBtn = this.querySelector('.auth-submit-btn');
            submitBtn.classList.add('loading');
            
            // Remove loading state after a delay (will be removed when redirect happens)
            setTimeout(() => {
                submitBtn.classList.remove('loading');
            }, 3000);
        });

        function pesanProduk(nama, harga) {
            // Implementasi fungsi pesan produk
            alert(`Memesan ${nama} dengan harga Rp ${harga.toLocaleString()}`);
        }

        // Close modal on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                hideModal(loginModal);
                hideModal(signupModal);
            }
        });
    </script>
    
    <script src="{{ asset('js/script.js') }}"></script>
    @stack('scripts')
</body>
</html>