<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Pengaduan Masyarakat</title>
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
            padding: 1rem 0;
        }

        .register-container {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.2);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            max-width: 500px;
            width: 100%;
        }

        .register-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 35px 70px rgba(0, 0, 0, 0.2);
        }

        .register-header {
            background: linear-gradient(45deg, #48c78e, #00d1b2);
            color: white;
            padding: 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .register-header::before {
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

        .register-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0;
            position: relative;
            z-index: 1;
        }

        .register-header .subtitle {
            margin-top: 0.5rem;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        .register-form {
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
            border-color: #48c78e;
            box-shadow: 0 0 0 3px rgba(72, 199, 142, 0.1);
            background: white;
            transform: translateY(-2px);
        }

        .control.has-icons-left .icon {
            color: #48c78e;
            transition: all 0.3s ease;
        }

        .input:focus + .icon {
            color: #00d1b2;
            transform: scale(1.1);
        }

        .label {
            font-weight: 600;
            color: #363636;
            margin-bottom: 0.5rem;
        }

        .button.is-success {
            background: linear-gradient(45deg, #48c78e, #00d1b2);
            border: none;
            border-radius: 12px;
            padding: 1rem 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(72, 199, 142, 0.3);
        }

        .button.is-success:hover {
            background: linear-gradient(45deg, #3ec487, #00c4a7);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(72, 199, 142, 0.4);
        }

        .button.is-success:active {
            transform: translateY(0);
        }

        .notification.is-danger {
            border-radius: 12px;
            border-left: 4px solid #ff3860;
            background: rgba(255, 56, 96, 0.1);
            animation: slideIn 0.3s ease;
            margin-bottom: 1.5rem;
        }

        .notification.is-danger ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .notification.is-danger li {
            padding: 0.25rem 0;
            position: relative;
            padding-left: 1.5rem;
        }

        .notification.is-danger li::before {
            content: '⚠';
            position: absolute;
            left: 0;
            color: #ff3860;
            font-weight: bold;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-link {
            text-align: center;
            padding: 1.5rem;
            background: rgba(248, 249, 250, 0.8);
            border-top: 1px solid rgba(0, 0, 0, 0.05);
        }

        .login-link a {
            color: #48c78e;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .login-link a:hover {
            color: #00d1b2;
            text-decoration: underline;
        }

        /* Progress indicator */
        .form-progress {
            height: 4px;
            background: rgba(72, 199, 142, 0.2);
            border-radius: 2px;
            margin-bottom: 1rem;
            overflow: hidden;
        }

        .form-progress-bar {
            height: 100%;
            background: linear-gradient(45deg, #48c78e, #00d1b2);
            width: 0%;
            transition: width 0.3s ease;
            border-radius: 2px;
        }

        /* Floating animation for decorative elements */
        .floating-shape {
            position: absolute;
            opacity: 0.1;
            animation: float 6s ease-in-out infinite;
        }

        .floating-shape:nth-child(1) {
            top: 15%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-shape:nth-child(2) {
            top: 70%;
            right: 10%;
            animation-delay: 2s;
        }

        .floating-shape:nth-child(3) {
            bottom: 15%;
            left: 15%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        /* Form field animations */
        .field {
            position: relative;
        }

        .field.is-focused .label {
            color: #48c78e;
            transform: translateY(-2px);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .register-container {
                margin: 1rem;
                border-radius: 15px;
            }
            
            .register-header {
                padding: 1.5rem;
            }
            
            .register-header h1 {
                font-size: 2rem;
            }
            
            .register-form {
                padding: 2rem;
            }
        }

        /* Success state animations */
        .field.is-valid .input {
            border-color: #48c78e;
            background: rgba(72, 199, 142, 0.05);
        }

        .field.is-valid .control::after {
            content: '✓';
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #48c78e;
            font-weight: bold;
            animation: checkmark 0.3s ease;
        }

        @keyframes checkmark {
            0% { opacity: 0; transform: translateY(-50%) scale(0); }
            100% { opacity: 1; transform: translateY(-50%) scale(1); }
        }
    </style>
</head>
<body>
    <!-- Floating decorative shapes -->
    <div class="floating-shape">
        <i class="fas fa-circle" style="font-size: 60px; color: white;"></i>
    </div>
    <div class="floating-shape">
        <i class="fas fa-hexagon" style="font-size: 40px; color: white;"></i>
    </div>
    <div class="floating-shape">
        <i class="fas fa-star" style="font-size: 50px; color: white;"></i>
    </div>

    <section class="section" style="width: 100%;">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-6-tablet is-5-desktop is-4-widescreen">
                    <div class="register-container">
                        <!-- Header Section -->
                        <div class="register-header">
                            <h1 class="title has-text-white">Bergabung</h1>
                            <p class="subtitle has-text-white">Daftar Akun Baru</p>
                        </div>

                        <!-- Form Section -->
                        <div class="register-form">
                            <!-- Progress Indicator -->
                            <div class="form-progress">
                                <div class="form-progress-bar" id="progressBar"></div>
                            </div>

                            {{-- Menampilkan error validasi --}}
                            @if ($errors->any())
                                <div class="notification is-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('register') }}" id="registerForm">
                                @csrf

                                {{-- Nama --}}
                                <div class="field">
                                    <label class="label">
                                        <i class="fas fa-user"></i> Nama Lengkap
                                    </label>
                                    <div class="control has-icons-left">
                                        <input class="input" type="text" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama lengkap" required>
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </div>
                                </div>

                                {{-- Email --}}
                                <div class="field">
                                    <label class="label">
                                        <i class="fas fa-envelope"></i> Alamat Email
                                    </label>
                                    <div class="control has-icons-left">
                                        <input class="input" type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan alamat email" required>
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
                                    <p class="help">Kata sandi minimal 8 karakter</p>
                                </div>

                                {{-- Role (opsional, default masyarakat) --}}
                                <input type="hidden" name="role" value="masyarakat">

                                {{-- Tombol Daftar --}}
                                <div class="field">
                                    <button type="submit" class="button is-success is-fullwidth">
                                        <i class="fas fa-user-plus"></i>&nbsp;&nbsp;Daftar Sekarang
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Login Link Section -->
                        <div class="login-link">
                            <p>Sudah memiliki akun? <a href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt"></i> Masuk di Sini
                            </a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Font Awesome Icon -->
    <script src="https://kit.fontawesome.com/a2e0e6cfd7.js" crossorigin="anonymous"></script>
    
    <script>
        // Form progress indicator
        const form = document.getElementById('registerForm');
        const progressBar = document.getElementById('progressBar');
        const inputs = form.querySelectorAll('input[required]');
        
        function updateProgress() {
            let filledInputs = 0;
            inputs.forEach(input => {
                if (input.value.trim() !== '') {
                    filledInputs++;
                    input.closest('.field').classList.add('is-valid');
                } else {
                    input.closest('.field').classList.remove('is-valid');
                }
            });
            
            const progress = (filledInputs / inputs.length) * 100;
            progressBar.style.width = progress + '%';
        }
        
        // Add event listeners to all inputs
        inputs.forEach(input => {
            input.addEventListener('input', updateProgress);
            input.addEventListener('focus', function() {
                this.closest('.field').classList.add('is-focused');
            });
            input.addEventListener('blur', function() {
                this.closest('.field').classList.remove('is-focused');
            });
        });
        
        // Initial progress check
        updateProgress();
    </script>
</body>
</html>