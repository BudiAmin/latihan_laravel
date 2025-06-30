<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lupa Kata Sandi - Pengaduan Masyarakat</title>
    <!-- Bulma CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container-box {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.2);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .container-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 35px 70px rgba(0, 0, 0, 0.2);
        }

        .header-section {
            background: linear-gradient(45deg, #3273dc, #209cee);
            color: white;
            padding: 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
            border-top-left-radius: 20px; /* Tambahkan ini agar sudut atas melengkung */
            border-top-right-radius: 20px; /* Tambahkan ini agar sudut atas melengkung */
        }

        .header-section::before {
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

        .header-section h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0;
            position: relative;
            z-index: 1;
        }

        .form-section {
            padding: 2.5rem;
        }

        .field {
            margin-bottom: 1.5rem;
        }

        .input {
            border-radius: 12px;
            border: 2px solid #e8e8e8;
            padding: 1rem 1rem 1rem 3rem; /* Sesuaikan padding untuk icon */
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

        .notification.is-success {
            border-radius: 12px;
            border-left: 4px solid #23d160;
            background: rgba(35, 209, 96, 0.1);
            animation: slideIn 0.3s ease;
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

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container-box {
                margin: 1rem;
                border-radius: 15px;
            }
            
            .header-section {
                padding: 1.5rem;
            }
            
            .header-section h1 {
                font-size: 2rem;
            }
            
            .form-section {
                padding: 2rem;
            }
        }
    </style>
</head>
<body>
    <section class="section" style="width: 100%;">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-5-tablet is-4-desktop is-4-widescreen">
                    <div class="container-box">
                        <!-- Header Section -->
                        <div class="header-section">
                            <h1 class="title has-text-white">Lupa Kata Sandi</h1>
                        </div>

                        <!-- Form Section -->
                        <div class="form-section">
                            {{-- Menampilkan pesan sukses dari session (misal: "Link reset password telah dikirim!") --}}
                            @if (session('status'))
                                <div class="notification is-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{-- Menampilkan pesan error validasi --}}
                            @if ($errors->any())
                                <div class="notification is-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                {{-- Email --}}
                                <div class="field">
                                    <label class="label">
                                        <i class="fas fa-envelope"></i> Alamat Email
                                    </label>
                                    <div class="control has-icons-left">
                                        <input class="input" type="email" name="email" placeholder="Masukkan email terdaftar Anda" value="{{ old('email') }}" required autofocus>
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                    </div>
                                    @error('email')
                                        <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Tombol Kirim Link Reset --}}
                                <div class="field">
                                    <button type="submit" class="button is-primary is-fullwidth">
                                        <i class="fas fa-envelope-open-text"></i>&nbsp;&nbsp;Kirim Link Reset Kata Sandi
                                    </button>
                                </div>
                            </form>
                            
                            <div class="has-text-centered mt-4">
                                <a href="{{ route('login') }}">Kembali ke Login</a>
                            </div>
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
