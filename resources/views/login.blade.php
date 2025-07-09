<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Pengaduan Masyarakat</title>
    <!-- Bulma CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <style>body {
    background: #ffffff url('/images/background.svg') no-repeat center center;
    background-size: cover; /* atau 'contain' jika ingin seluruh gambar terlihat */
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}



        .login-container {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.2);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 35px 70px rgba(0, 0, 0, 0.2);
        }

        .login-header {
            background: linear-gradient(45deg, #3273dc, #209cee);
            color: white;
            padding: 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .login-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transform: rotate(45deg);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }

        .login-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0;
            position: relative;
            z-index: 1;
        }

        .login-header .subtitle {
            margin-top: 0.5rem;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        .login-form {
            padding: 2.5rem;
        }

        .field {
            margin-bottom: 1.5rem;
        }

        .input {
            border-radius: 12px;
            border: 2px solid #e8e8e8;
            padding: 1rem 1rem 1rem 3rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
        }

        .input:focus {
            border-color: #3273dc;
            box-shadow: 0 0 0 3px rgba(50, 115, 220, 0.1);
            background: white;
            transform: translateY(-2px);
        }

        .control.has-icons-left .icon {
            color: #3273dc;
            transition: all 0.3s ease;
        }

        .input:focus + .icon {
            color: #209cee;
            transform: scale(1.1);
        }

        .label {
            font-weight: 600;
            color: #363636;
            margin-bottom: 0.5rem;
        }

        .button.is-primary {
            background: linear-gradient(45deg, #3273dc, #209cee);
            border: none;
            border-radius: 12px;
            padding: 1rem 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(50, 115, 220, 0.3);
        }

        .button.is-primary:hover {
            background: linear-gradient(45deg, #2366d1, #1e8bc3);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(50, 115, 220, 0.4);
        }

        .button.is-primary:active {
            transform: translateY(0);
        }

        .notification.is-danger {
            border-radius: 12px;
            border-left: 4px solid #ff3860;
            background: rgba(255, 56, 96, 0.1);
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .register-link {
            text-align: center;
            padding: 1.5rem;
            background: rgba(248, 249, 250, 0.8);
            border-top: 1px solid rgba(0, 0, 0, 0.05);
        }

        .register-link a {
            color: #3273dc;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .register-link a:hover {
            color: #209cee;
            text-decoration: underline;
        }

        /* Floating animation for decorative elements */
        .floating-shape {
            position: absolute;
            opacity: 0.1;
            animation: float 6s ease-in-out infinite;
        }

        .floating-shape:nth-child(1) {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-shape:nth-child(2) {
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }

        .floating-shape:nth-child(3) {
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .login-container {
                margin: 1rem;
                border-radius: 15px;
            }
            
            .login-header {
                padding: 1.5rem;
            }
            
            .login-header h1 {
                font-size: 2rem;
            }
            
            .login-form {
                padding: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Floating decorative shapes -->
    <div class="floating-shape">
        <i class="fas fa-circle" style="font-size: 60px; color: white;"></i>
    </div>
    <div class="floating-shape">
        <i class="fas fa-square" style="font-size: 40px; color: white;"></i>
    </div>
    <div class="floating-shape">
        <i class="fas fa-triangle" style="font-size: 50px; color: white;"></i>
    </div>

    <section class="section" style="width: 100%;">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-5-tablet is-4-desktop is-4-widescreen">
                    <div class="login-container">
                        <!-- Header Section -->
                        <div class="login-header">
                            <h1 class="title has-text-white">Selamat Datang</h1>
                            <p class="subtitle has-text-white">Sistem Pengaduan Masyarakat</p>
                        </div>

                        <!-- Form Section -->
                        <div class="login-form">
                            {{-- Menampilkan pesan error jika login gagal --}}
                            @if(session('error'))
                                <div class="notification is-danger">
                                    <i class="fas fa-exclamation-triangle"></i>
                                    {{ session('error') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                {{-- Email --}}
                                <div class="field">
                                    <label class="label">
                                        <i class="fas fa-envelope"></i> Alamat Email
                                    </label>
                                    <div class="control has-icons-left">
                                        <input class="input" type="email" name="email" placeholder="Masukkan email Anda" required>
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                    </div>
                                </div>

                                {{-- Password --}}
                                <div class="field">
                                    <label class="label">
                                        <i class="fas fa-lock"></i> Kata Sandi
                                    </label>
                                    <div class="control has-icons-left">
                                        <input class="input" type="password" name="password" placeholder="Masukkan kata sandi" required>
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </div>
                                </div>

                                {{-- Tombol Login --}}
                                <div class="field">
                                    <button type="submit" class="button is-primary is-fullwidth">
                                        <i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;Masuk ke Sistem
                                    </button>
                                </div>
                            </form>
                        </div>
                        {{-- TAUTAN LUPA KATA SANDI INI YANG BENAR UNTUK DI HALAMAN LOGIN --}}
                        <div class="has-text-centered mt-4">
                            <a href="{{ route('password.request') }}">Lupa Kata Sandi?</a>
                        </div>
                        {{-- <div class="field"> --}}
                            {{-- Tautan "Ubah Kata Sandi" dihapus dari sini karena ini untuk user yang sudah login --}}
                            {{-- <a href="{{ route('user.change-password.form') }}">Ubah Kata Sandi</a> --}}
                        {{-- </div> --}}

                        <!-- Register Link Section -->
                        <div class="register-link">
                            <p>Belum memiliki akun? <a href="{{ route('register') }}">
                                <i class="fas fa-user-plus"></i> Daftar Sekarang
                            </a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Font Awesome Icon -->
    <script src="https://kit.fontawesome.com/a2e0e6cfd7.js" crossorigin="anonymous"></script>
</body>
</html>
