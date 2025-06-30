<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Pengaduan Masyarakat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --success-gradient: linear-gradient(45deg, #48c78e, #00d1b2);
            --warning-gradient: linear-gradient(45deg, #ffdd57, #ff9a00);
            --danger-gradient: linear-gradient(45deg, #ff3860, #ff1744);
        }

        body {
            background: var(--primary-gradient);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .main-container {
            padding: 2rem 0;
            min-height: 100vh;
        }

        .dashboard-header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
        }

        .dashboard-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary-gradient);
        }

        .welcome-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .welcome-text {
            flex: 1;
        }

        .welcome-text h1 {
            font-size: 2.5rem;
            font-weight: 700;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .welcome-text .subtitle {
            color: #666;
            font-size: 1.1rem;
        }

        .header-actions {
            display: flex;
            gap: 1rem;
        }

        .notification {
            border-radius: 12px;
            border-left: 4px solid;
            animation: slideIn 0.3s ease;
            margin-bottom: 1.5rem;
        }

        .notification.is-success {
            border-left-color: #48c78e;
            background: rgba(72, 199, 142, 0.1);
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: transform 0.3s ease;
        }

        .form-container:hover {
            transform: translateY(-5px);
        }

        .section-title {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: #363636;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--success-gradient);
            border-radius: 2px;
        }

        .field {
            margin-bottom: 1.5rem;
        }

        .label {
            font-weight: 600;
            color: #363636;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .input, .textarea {
            border-radius: 12px;
            border: 2px solid #e8e8e8;
            padding: 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
        }

        .input:focus, .textarea:focus {
            border-color: #48c78e;
            box-shadow: 0 0 0 3px rgba(72, 199, 142, 0.1);
            background: white;
            transform: translateY(-2px);
        }

        .file-input {
            border: 2px dashed #e8e8e8;
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            background: rgba(248, 249, 250, 0.5);
        }

        .file-input:hover {
            border-color: #48c78e;
            background: rgba(72, 199, 142, 0.05);
        }

        .file-input.has-file {
            border-color: #48c78e;
            background: rgba(72, 199, 142, 0.1);
        }

        .button {
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            position: relative;
            overflow: hidden;
        }

        .button.is-primary {
            background: var(--success-gradient);
            color: white;
            box-shadow: 0 4px 15px rgba(72, 199, 142, 0.3);
        }

        .button.is-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(72, 199, 142, 0.4);
        }

        .button.is-danger {
            background: var(--danger-gradient);
            color: white;
            box-shadow: 0 4px 15px rgba(255, 56, 96, 0.3);
        }

        .button.is-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 56, 96, 0.4);
        }

        .history-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .complaint-card {
            background: linear-gradient(145deg, #ffffff, #f8f9fa);
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .complaint-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .complaint-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary-gradient);
        }

        .complaint-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .complaint-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #363636;
            margin: 0;
            flex: 1;
        }

        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-pending {
            background: rgba(255, 221, 87, 0.2);
            color: #ff9a00;
            border: 1px solid rgba(255, 221, 87, 0.5);
        }

        .status-proses {
            background: rgba(50, 115, 220, 0.2);
            color: #3273dc;
            border: 1px solid rgba(50, 115, 220, 0.5);
        }

        .status-selesai {
            background: rgba(72, 199, 142, 0.2);
            color: #48c78e;
            border: 1px solid rgba(72, 199, 142, 0.5);
        }

        .complaint-content {
            margin-bottom: 1rem;
            line-height: 1.6;
            color: #4a4a4a;
        }

        .complaint-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 1rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .complaint-image {
            max-width: 200px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .complaint-image:hover {
            transform: scale(1.05);
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #666;
        }

        .empty-state i {
            font-size: 3rem;
            color: #ddd;
            margin-bottom: 1rem;
        }

        .logout-section {
            text-align: center;
            margin-top: 2rem;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .main-container {
                padding: 1rem;
            }
            
            .welcome-section {
                flex-direction: column;
                text-align: center;
            }
            
            .welcome-text h1 {
                font-size: 2rem;
            }
            
            .form-container, .history-container, .dashboard-header {
                padding: 1.5rem;
                margin-bottom: 1rem;
            }
            
            .complaint-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .complaint-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }
        }

        /* Loading animation */
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        .loading {
            animation: pulse 1.5s infinite;
        }

        /* Image modal */
        .image-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(5px);
        }

        .image-modal img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 90%;
            max-height: 90%;
            border-radius: 10px;
        }

        .image-modal .close {
            position: absolute;
            top: 20px;
            right: 30px;
            color: white;
            font-size: 2rem;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="container">
            <!-- Dashboard Header -->
            <div class="dashboard-header">
                <div class="welcome-section">
                    <div class="welcome-text">
                        <h1>Halo, {{ Auth::user()->nama }}</h1>
                        <p class="subtitle">Selamat datang di Sistem Pengaduan Masyarakat</p>
                    </div>
                    <div class="header-actions">
                        <div class="has-text-right">
                            <p class="has-text-weight-semibold">{{ date('d F Y') }}</p>
                            <p class="has-text-grey">{{ date('H:i') }} WIB</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Success Notification -->
            @if(session('success'))
                <div class="notification is-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            <!-- Form Section -->
            <div class="form-container">
                <h2 class="section-title">
                    <i class="fas fa-plus-circle"></i>
                    Buat Pengaduan Baru
                </h2>

                <form method="POST" action="{{ route('pengaduan.store') }}" enctype="multipart/form-data" id="complaintForm">
                    @csrf

                    <div class="field">
                        <label class="label">
                            <i class="fas fa-heading"></i>
                            Judul Pengaduan
                        </label>
                        <div class="control">
                            <input class="input" type="text" name="judul" placeholder="Masukkan judul pengaduan..." required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">
                            <i class="fas fa-file-alt"></i>
                            Isi Pengaduan
                        </label>
                        <div class="control">
                            <textarea class="textarea" name="isi" rows="5" placeholder="Jelaskan detail pengaduan Anda..." required></textarea>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">
                            <i class="fas fa-map-marker-alt"></i>
                            Lokasi Kejadian
                        </label>
                        <div class="control">
                            <input class="input" type="text" name="lokasi" placeholder="Contoh: Jl. Sudirman No. 123, Jakarta">
                        </div>
                    </div>
                      <div class="field">
                            <label class="label">Foto (opsional)</label>
                            <div class="control">
                                <div class="file has-name is-boxed is-success">
                                    <label class="file-label">
                                        <input class="file-input" type="file" name="foto" id="fileInput" accept="image/*" onchange="updateFileName()">
                                        <span class="file-cta">
                                            <span class="file-icon">
                                                <i class="fas fa-upload"></i>
                                            </span>
                                            <span class="file-label">
                                                Pilih Foto
                                            </span>
                                        </span>
                                        <span class="file-name" id="fileName" style="max-width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                            Belum ada file dipilih
                                        </span>
                                    </label>
                                </div>
                            <p class="help">Format: JPG, PNG, maksimal 2MB</p>
                        </div>
                    </div>
                    <div class="field">
                        <button type="submit" class="button is-primary is-large">
                            <i class="fas fa-paper-plane"></i>&nbsp;&nbsp;
                            Kirim Pengaduan
                        </button>
                    </div>
                </form>
            </div>

            <!-- History Section -->
            <div class="history-container">
                <h2 class="section-title">
                    <i class="fas fa-history"></i>
                    Riwayat Pengaduan Anda
                </h2>

                @forelse($pengaduan as $item)
                    <div class="complaint-card">
                        <div class="complaint-header">
                            <h3 class="complaint-title">{{ $item->judul }}</h3>
                            <span class="status-badge status-{{ strtolower($item->status) }}">
                                {{ $item->status }}
                            </span>
                        </div>
                        
                        <div class="complaint-content">
                            <p>{{ $item->isi }}</p>
                            @if($item->lokasi)
                                <p><i class="fas fa-map-marker-alt"></i> <strong>Lokasi:</strong> {{ $item->lokasi }}</p>
                            @endif
                        </div>
                        
                        <div class="complaint-meta">
                            <span><i class="fas fa-calendar"></i> {{ date('d F Y', strtotime($item->tanggal_pengaduan)) }}</span>
                            <span><i class="fas fa-clock"></i> {{ date('H:i', strtotime($item->tanggal_pengaduan)) }} WIB</span>
                        </div>
                        
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" class="complaint-image" onclick="openImageModal(this.src)" alt="Foto pengaduan">
                        @endif
                    </div>
                @empty
                    <div class="empty-state">
                        <i class="fas fa-inbox"></i>
                        <h3>Belum ada pengaduan</h3>
                        <p>Anda belum membuat pengaduan apapun. Gunakan form di atas untuk membuat pengaduan baru.</p>
                    </div>
                @endforelse
            </div>

            <!-- Logout Section -->
            <div class="logout-section">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="button is-danger">
                        <i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;
                        Keluar dari Sistem
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Image Modal -->
    <div class="image-modal" id="imageModal" onclick="closeImageModal()">
        <span class="close">&times;</span>
        <img id="modalImage" src="" alt="Foto pengaduan">
    </div>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a2e0e6cfd7.js" crossorigin="anonymous"></script>
    
    <script>
        // File input handler
        document.getElementById('fileInput').addEventListener('change', function(e) {
            const fileInput = e.target;
            const fileName = document.getElementById('fileName');
            const fileInputContainer = document.querySelector('.file-input');
            
            if (fileInput.files.length > 0) {
                fileName.textContent = 'Dipilih: ' + fileInput.files[0].name;
                fileName.style.display = 'block';
                fileInputContainer.classList.add('has-file');
            } else {
                fileName.style.display = 'none';
                fileInputContainer.classList.remove('has-file');
            }
        });

        // Image modal functions
        function openImageModal(src) {
            const modal = document.getElementById('imageModal');
            const modalImg = document.getElementById('modalImage');
            modal.style.display = 'block';
            modalImg.src = src;
        }

        function closeImageModal() {
            document.getElementById('imageModal').style.display = 'none';
        }

        // Form validation and enhancement
        const form = document.getElementById('complaintForm');
        const inputs = form.querySelectorAll('.input, .textarea');
        
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.closest('.field').style.transform = 'translateY(-2px)';
            });
            
            input.addEventListener('blur', function() {
                this.closest('.field').style.transform = 'translateY(0)';
            });
        });

        // Auto-resize textarea
        document.querySelector('textarea').addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });

        // Smooth scrolling for form submission
        form.addEventListener('submit', function(e) {
            const button = form.querySelector('button[type="submit"]');
            button.classList.add('loading');
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i>&nbsp;&nbsp;Mengirim...';
        });
    </script>
</body>
</html>