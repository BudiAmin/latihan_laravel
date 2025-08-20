<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPADU - Sistem Pengaduan Masyarakat Kecamatan Cimahi Utara</title>
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <img src="{{ asset('images/logo_cimahi.png') }}" alt="Logo Kecamatan Cimahi Utara">
                <span>SIPADU Kecamatan Cimahi Utara</span>
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

    <section id="home" class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title">
                    <span class="gradient-text">SIPADU</span>
                    <br>Sistem Pengaduan Masyarakat
                </h1>
                <p class="hero-subtitle">
                    Platform digital untuk menyampaikan keluhan, saran, dan aspirasi masyarakat Kecamatan Cimahi Utara.
                    Wujudkan Kecamatan Cimahi Utara yang lebih baik bersama-sama.
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
                    <h3>Kecamatan Cimahi Utara</h3>
                    <p>Melayani dengan Hati</p>
                </div>
            </div>
        </div>
        <div class="scroll-indicator">
            <div class="scroll-arrow"></div>
        </div>
    </section>

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

    <section id="layanan" class="services">
        <div class="container">
            <div class="section-header">
                <h2>Layanan Kami</h2>
                <p>Berbagai jenis layanan yang tersedia di Kecamatan Cimahi Utara untuk masyarakat.</p>
            </div>
            <div class="services-grid">
                {{-- Generate 30 service cards --}}
                @php
                    $services = [
                        ['icon' => 'fas fa-id-card', 'title' => 'Pelayanan KTP'],
                        ['icon' => 'fas fa-users', 'title' => 'Pelayanan KK'],
                        ['icon' => 'fas fa-building', 'title' => 'Surat Keterangan Domisili Perusahaan'],
                        ['icon' => 'fas fa-hands-helping', 'title' => 'Surat Keterangan Domisili Yayasan'],
                        ['icon' => 'fas fa-plane-departure', 'title' => 'Surat Pengantar Luar Negeri'],
                        ['icon' => 'fas fa-hammer', 'title' => 'Surat Persetujuan Bangunan (IMB)'],
                        ['icon' => 'fas fa-hand-holding-usd', 'title' => 'Surat Keterangan Tidak Mampu'],
                        ['icon' => 'fas fa-file-invoice-dollar', 'title' => 'Surat Keterangan Bebas PBB'],
                        ['icon' => 'fas fa-user-edit', 'title' => 'Surat Pengantar Perubahan Data Penduduk'],
                        ['icon' => 'fas fa-scroll', 'title' => 'Legalisir KK/KTP'],
                        ['icon' => 'fas fa-map-marked-alt', 'title' => 'Surat Pengantar Pindah Kota'],
                        ['icon' => 'fas fa-house-user', 'title' => 'Surat Keterangan Menetap'],
                        ['icon' => 'fas fa-baby-carriage', 'title' => 'Surat Keterangan Kelahiran'],
                        ['icon' => 'fas fa-users-cog', 'title' => 'Surat Keterangan Ahli Waris'],
                        ['icon' => 'fas fa-money-check-alt', 'title' => 'Pelayanan Akta Jual Beli'],
                        ['icon' => 'fas fa-user-friends', 'title' => 'Surat Keterangan Tanggungan'],
                        ['icon' => 'fas fa-ring', 'title' => 'Surat Keterangan Belum Menikah'],
                        ['icon' => 'fas fa-store', 'title' => 'Surat Keterangan Usaha'],
                        ['icon' => 'fas fa-seedling', 'title' => 'Surat Izin Usaha Mikro'],
                        ['icon' => 'fas fa-theater-masks', 'title' => 'Surat Izin Keramaian'],
                        ['icon' => 'fas fa-hand-point-right', 'title' => 'Surat Keterangan Bersih Diri'],
                        ['icon' => 'fas fa-fingerprint', 'title' => 'Surat Keterangan Catatan Kepolisian'],
                        ['icon' => 'fas fa-sitemap', 'title' => 'Surat Keterangan Domisili Partai'],
                        ['icon' => 'fas fa-mosque', 'title' => 'Surat Keterangan Domisili Haji'],
                        ['icon' => 'fas fa-chart-bar', 'title' => 'Surat Pengajuan Izin Operasional'],
                        ['icon' => 'fas fa-pray', 'title' => 'Surat Rekomendasi Pembangunan Masjid'],
                        ['icon' => 'fas fa-tools', 'title' => 'Surat Rekomendasi Renovasi Masjid'],
                        ['icon' => 'fas fa-calendar-check', 'title' => 'Surat Rekomendasi Kegiatan Masyarakat'],
                        ['icon' => 'fas fa-book-reader', 'title' => 'Surat Keterangan Perpustakaan'],
                        ['icon' => 'fas fa-bullhorn', 'title' => 'Surat Keterangan Pemberitahuan Acara'],
                    ];
                @endphp

                @foreach($services as $service)
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="{{ $service['icon'] }}"></i>
                        </div>
                        <h3>{{ $service['title'] }}</h3>
                        <p>Ajukan permohonan dengan mudah.</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="tentang" class="about">
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <h2>Tentang SIPADU</h2>
                    <p>
                        Sistem Pengaduan Masyarakat (SIPADU) Kecamatan Cimahi Utara adalah platform digital yang
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
                    <img src="{{ asset('images/logo_city.png') }}" alt="Kecamatan Cimahi Utara">
                </div>
            </div>
        </div>
    </section>

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

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="footer-logo">
                        <img src="{{ asset('images/logo_cimahi.png') }}" alt="Logo Kecamatan Cimahi Utara">
                        <h3>SIPADU Kecamatan Cimahi Utara</h3>
                    </div>
                    <p>Sistem Pengaduan Masyarakat Kecamatan Cimahi Utara untuk pelayanan yang lebih baik.</p>
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
                <p>© 2025 Pemerintah Kecamatan Cimahi Utara. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/welcome.js') }}"></script>

    <div id="chatbot-container" style="position: fixed; bottom: 20px; right: 20px; z-index: 1001; background-color: #206b99; border-radius: 50%; width: 60px; height: 60px; display: flex; justify-content: center; align-items: center; cursor: pointer; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); transition: all 0.3s ease;">
        <i class="fas fa-robot" style="color: white; font-size: 28px;"></i>
    </div>

    <div id="chatbot-window" style="display: none; position: fixed; bottom: 90px; right: 20px; z-index: 1002; width: 300px; height: 400px; background-color: white; border-radius: 15px; box-shadow: 0 8px 30px rgba(0, 0, 0, 0.25); overflow: hidden; display: flex; flex-direction: column;">
        <div style="background-color: #206b99; color: white; padding: 15px; font-weight: bold; border-top-left-radius: 15px; border-top-right-radius: 15px; display: flex; justify-content: space-between; align-items: center;">
            <span>SIPADU Chatbot</span>
            <i id="chatbot-close" class="fas fa-times" style="cursor: pointer;"></i>
        </div>
        <div id="chatbot-messages" style="flex-grow: 1; padding: 15px; overflow-y: auto; background-color: #f0f2f5;">
            <div style="background-color: #e0e4eb; padding: 10px; border-radius: 10px; margin-bottom: 10px; align-self: flex-start;">Halo! Ada yang bisa saya bantu?</div>
        </div>
        <div style="padding: 15px; border-top: 1px solid #e0e4eb; display: flex;">
            <input type="text" id="chatbot-input" placeholder="Ketik pesan Anda..." style="flex-grow: 1; padding: 10px; border: 1px solid #ddd; border-radius: 8px; margin-right: 10px;">
            <button id="chatbot-send" style="background-color: #206b99; color: white; border: none; padding: 10px 15px; border-radius: 8px; cursor: pointer;">Kirim</button>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const chatbotContainer = document.getElementById('chatbot-container');
            const chatbotWindow = document.getElementById('chatbot-window');
            const chatbotClose = document.getElementById('chatbot-close');
            const chatbotInput = document.getElementById('chatbot-input');
            const chatbotSend = document.getElementById('chatbot-send');
            const chatbotMessages = document.getElementById('chatbot-messages');

            chatbotContainer.addEventListener('click', function() {
                chatbotWindow.style.display = 'flex';
                chatbotContainer.style.display = 'none';
            });

            chatbotClose.addEventListener('click', function() {
                chatbotWindow.style.display = 'none';
                chatbotContainer.style.display = 'flex';
            });

            chatbotSend.addEventListener('click', sendMessage);
            chatbotInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    sendMessage();
                }
            });

            function sendMessage() {
                const messageText = chatbotInput.value.trim();
                if (messageText !== '') {
                    const userMessageDiv = document.createElement('div');
                    userMessageDiv.style.cssText = 'background-color: #d1fae5; padding: 10px; border-radius: 10px; margin-bottom: 10px; align-self: flex-end; text-align: right;';
                    userMessageDiv.textContent = messageText;
                    chatbotMessages.appendChild(userMessageDiv);
                    chatbotInput.value = '';
                    chatbotMessages.scrollTop = chatbotMessages.scrollHeight; // Gulir ke bawah
                    setTimeout(() => {
                        const botMessageDiv = document.createElement('div');
                        botMessageDiv.style.cssText = 'background-color: #e0e4eb; padding: 10px; border-radius: 10px; margin-bottom: 10px; align-self: flex-start;';
                        
                        let botResponse = "Maaf, saya tidak mengerti. Bisakah Anda mengulanginya?";
                        const lowerCaseMessage = messageText.toLowerCase();

                        if (lowerCaseMessage.includes("halo") || lowerCaseMessage.includes("hi")) {
                            botResponse = "Halo! Ada yang bisa saya bantu terkait layanan di Kecamatan Cimahi Utara?";
                        } else if (lowerCaseMessage.includes("layanan")) {
                            botResponse = "Kecamatan Cimahi Utara menyediakan berbagai layanan seperti Pelayanan KTP, KK, Surat Keterangan Domisili, IMB, dan banyak lagi. Anda bisa melihat daftar lengkapnya di bagian 'Layanan' di atas.";
                        } else if (lowerCaseMessage.includes("kontak")) {
                            botResponse = "Anda bisa menghubungi kami di (022) 6631638 atau email pengaduan@cimahikota.go.id.";
                        } else if (lowerCaseMessage.includes("terima kasih") || lowerCaseMessage.includes("mksh")) {
                            botResponse = "Sama-sama! Senang bisa membantu.";
                        } else if (lowerCaseMessage.includes("jam pelayanan")) {
                            botResponse = "Jam pelayanan kami adalah Senin - Jumat: 08:00 - 16:00 WIB. Sabtu dan Minggu tutup.";
                        }

                        botMessageDiv.textContent = botResponse;
                        chatbotMessages.appendChild(botMessageDiv);
                        chatbotMessages.scrollTop = chatbotMessages.scrollHeight; // Gulir ke bawah
                    }, 1000);
                }
            }
        });
    </script>
</body>
</html>