<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPADU - Sistem Pengaduan Masyarakat Kota Cimahi</title>
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <img src="{{ asset('images/logo_cimahi.png') }}" alt="Logo Cimahi">
                <span>SIPADU Cimahi</span>
            </div>
            <div class="nav-menu">
                <a href="#home" class="nav-link">Beranda</a>
                <a href="#layanan" class="nav-link">Layanan</a>
                <a href="#tentang" class="nav-link">Tentang</a>
                <a href="#kontak" class="nav-link">Kontak</a>
                <a href="{{ route('login') }}" class="btn-login">Masuk</a>
            </div>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title">
                    <span class="gradient-text">SIPADU</span>
                    <br>Sistem Pengaduan Masyarakat
                </h1>
                <p class="hero-subtitle">
                    Platform digital untuk menyampaikan keluhan, saran, dan aspirasi masyarakat Kota Cimahi.
                    Wujudkan Cimahi yang lebih baik bersama-sama.
                </p>
                {{-- <div class="hero-buttons">
                    <a href="{{ route('pengaduan.create') }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i>
                        Buat Pengaduan
                    </a>
                    <a href="{{ route('pengaduan.cek') }}" class="btn btn-secondary">
                        <i class="fas fa-search"></i>
                        Cek Status
                    </a>
                </div> --}}
            </div>
            <div class="hero-image">
                <div class="floating-card">
                    <i class="fas fa-city"></i>
                    <h3>Kota Cimahi</h3>
                    <p>Melayani dengan Hati</p>
                </div>
            </div>
        </div>
        <div class="scroll-indicator">
            <div class="scroll-arrow"></div>
        </div>
    </section>

   <!-- Stats Section -->
<section class="stats">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="stat-number" data-target="{{ $totalPengaduan }}">{{ $totalPengaduan }}</div>
                <div class="stat-label">Total Pengaduan</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-number" data-target="{{ $pengaduanSelesai }}">{{ $pengaduanSelesai }}</div>
                <div class="stat-label">Pengaduan Selesai</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-number" data-target="{{ $pengaduanDiproses }}">{{ $pengaduanDiproses }}</div>
                <div class="stat-label">Sedang Diproses</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-number" data-target="{{ $penggunaAktif }}">{{ $penggunaAktif }}</div>
                <div class="stat-label">Pengguna Aktif</div>
            </div>
        </div>
    </div>
</section>


    <!-- About Section -->
    <section id="tentang" class="about">
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <h2>Tentang SIPADU</h2>
                    <p>
                        Sistem Pengaduan Masyarakat (SIPADU) Kota Cimahi adalah platform digital yang 
                        memungkinkan masyarakat untuk menyampaikan keluhan, saran, dan aspirasi secara 
                        online dengan mudah dan transparan.
                    </p>
                    <div class="features">
                        <div class="feature">
                            <i class="fas fa-clock"></i>
                            <div>
                                <h4>24/7 Tersedia</h4>
                                <p>Layanan dapat diakses kapan saja</p>
                            </div>
                        </div>
                        <div class="feature">
                            <i class="fas fa-eye"></i>
                            <div>
                                <h4>Transparan</h4>
                                <p>Proses penanganan dapat dipantau</p>
                            </div>
                        </div>
                        <div class="feature">
                            <i class="fas fa-mobile-alt"></i>
                            <div>
                                <h4>Mudah Digunakan</h4>
                                <p>Interface yang user-friendly</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="about-image">
                    <img src="{{ asset('images/logo_citra.png') }}" alt="Kota Cimahi">
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="how-it-works">
        <div class="container">
            <div class="section-header">
                <h2>Cara Menggunakan SIPADU</h2>
                <p>Proses sederhana untuk menyampaikan pengaduan Anda</p>
            </div>
            <div class="steps">
                <div class="step">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h3>Buat Pengaduan</h3>
                        <p>Isi formulir pengaduan dengan lengkap dan detail</p>
                    </div>
                </div>
                <div class="step-connector"></div>
                <div class="step">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h3>Verifikasi</h3>
                        <p>Tim kami akan memverifikasi pengaduan yang masuk</p>
                    </div>
                </div>
                <div class="step-connector"></div>
                <div class="step">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h3>Tindak Lanjut</h3>
                        <p>Pengaduan ditindaklanjuti oleh instansi terkait</p>
                    </div>
                </div>
                <div class="step-connector"></div>
                <div class="step">
                    <div class="step-number">4</div>
                    <div class="step-content">
                        <h3>Selesai</h3>
                        <p>Anda akan mendapat notifikasi penyelesaian</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="kontak" class="contact">
        <div class="container">
            <div class="contact-content">
                <div class="contact-info">
                    <h2>Hubungi Kami</h2>
                    <p>Butuh bantuan atau memiliki pertanyaan? Jangan ragu untuk menghubungi kami.</p>
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h4>Alamat</h4>
                            <p> Jl. Jati Serut No.12, Cibabat, Kec. Cimahi Utara, Kota Cimahi, Jawa Barat 40513</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <h4>Telepon</h4>
                            <p>(022) 6631638</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h4>Email</h4>
                            <p>pengaduan@cimahikota.go.id</p>
                        </div>
                    </div>
                </div>
               <div class="contact-form">
            <form action="send_email.php" method="POST">
                <div class="form-group">
                    <input type="text" name="nama" placeholder="Nama Lengkap" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <textarea name="pesan" placeholder="Pesan Anda" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-paper-plane"></i>
                    Kirim Pesan
                </button>
             </form>
        </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="footer-logo">
                        <img src="{{ asset('images/logo_cimahi.png') }}" alt="Logo Cimahi">
                        <h3>SIPADU Cimahi</h3>
                    </div>
                    <p>Sistem Pengaduan Masyarakat Kota Cimahi untuk pelayanan yang lebih baik.</p>
                    <div class="social-links">
                        {{-- <a href="#"><i class="fab fa-facebook"></i></a> --}}
                        <a href="https://www.tiktok.com/@kec.cimahi.utara"><i class="fab fa-tiktok"></i></a>
                        <a href="https://www.instagram.com/keccimahiutara/"><i class="fab fa-instagram"></i></a>
                        <a href="https://youtube.com/@kecamatancimahiutara5780?feature=shared"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-section">
                    <h4>Link Cepat</h4>
                    <ul>
                        <li><a href="#home">Beranda</a></li>
                        <li><a href="#layanan">Layanan</a></li>
                        <li><a href="#tentang">Tentang</a></li>
                        <li><a href="#kontak">Kontak</a></li>
                    </ul>
                </div>
                {{-- <div class="footer-section"> --}}
                    {{-- <h4>Layanan</h4> --}}
                    {{-- <ul>
                        <li><a href="{{ route('pengaduan.create') }}">Buat Pengaduan</a></li>
                        <li><a href="{{ route('pengaduan.cek') }}">Cek Status</a></li>
                        <li><a href="{{ route('faq') }}">FAQ</a></li>
                        <li><a href="{{ route('panduan') }}">Panduan</a></li>
                    </ul> --}}
                {{-- </div> --}}
                <div class="footer-section">
                    <h4>Jam Pelayanan</h4>
                    <div class="schedule">
                        <p><strong>Senin - Jumat:</strong><br>08:00 - 16:00 WIB</p>
                        <p><strong>Sabtu - Minggu:</strong><br>Tutup</p>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Pemerintah Kota Cimahi. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/welcome.js') }}"></script>
</body>
</html>