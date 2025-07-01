<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - SIPADU</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <script src="https://kit.fontawesome.com/a2e0e6cfd7.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #3b82f6;
            --primary-hover: #2563eb;
            --primary-light: #dbeafe;
            --success-color: #10b981;
            --danger-color: #ef4444;
            --warning-color: #f59e0b;
            --info-color: #06b6d4;
            --background-gradient: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            --sidebar-bg: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
            --sidebar-item-hover: rgba(59, 130, 246, 0.1);
            --sidebar-active: #3b82f6;
            --text-light: #f8fafc;
            --text-muted: #94a3b8;
            --border-color: #e2e8f0;
            --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --card-shadow-hover: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: var(--background-gradient);
            color: #334155;
            line-height: 1.6;
            overflow-x: hidden;
        }

        .admin-layout {
            display: flex;
            min-height: 100vh;
        }

        .admin-sidebar {
            width: 280px;
            background: var(--sidebar-bg);
            color: var(--text-light);
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 1000;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }

        .admin-sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .admin-sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }

        .admin-sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 3px;
        }

        .sidebar-header {
            padding: 2rem 1.5rem;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.05);
        }

        .sidebar-header .logo {
            width: 70px;
            height: 70px;
            border-radius: 16px;
            background: linear-gradient(135deg, var(--primary-color), #8b5cf6);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
            margin: 0 auto 1rem;
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
        }

        .sidebar-header .title {
            color: var(--text-light);
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .sidebar-header .subtitle {
            color: var(--text-muted);
            font-size: 0.875rem;
        }

        .sidebar-menu {
            padding: 1.5rem 1rem;
        }

        .menu-section {
            margin-bottom: 2rem;
        }

        .menu-label {
            color: var(--text-muted);
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.75rem;
            padding-left: 1rem;
        }

        .sidebar-menu ul {
            list-style: none;
            padding: 0;
        }

        .sidebar-menu li {
            margin-bottom: 0.25rem;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 0.875rem 1rem;
            color: var(--text-muted);
            text-decoration: none;
            border-radius: 12px;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 500;
            position: relative;
        }

        .sidebar-menu a:hover {
            background-color: var(--sidebar-item-hover);
            color: var(--text-light);
            transform: translateX(4px);
        }

        .sidebar-menu a.is-active {
            background: linear-gradient(135deg, var(--sidebar-active), #8b5cf6);
            color: white;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .sidebar-menu a .icon {
            margin-right: 0.875rem;
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        .logout-section {
            padding: 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: auto;
        }

        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 2rem;
            transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .page-header {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--card-shadow);
            border: 1px solid var(--border-color);
        }

        .page-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            color: var(--text-muted);
            font-size: 1rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: var(--card-shadow);
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--card-shadow-hover);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), #8b5cf6);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .stat-icon.primary { background: linear-gradient(135deg, var(--primary-color), #8b5cf6); }
        .stat-icon.success { background: linear-gradient(135deg, var(--success-color), #06b6d4); }
        .stat-icon.warning { background: linear-gradient(135deg, var(--warning-color), #f97316); }
        .stat-icon.danger { background: linear-gradient(135deg, var(--danger-color), #dc2626); }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: #1e293b;
        }

        .stat-label {
            color: var(--text-muted);
            font-size: 0.875rem;
            font-weight: 500;
        }

        .content-card {
            background: white;
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            margin-bottom: 2rem;
            border: 1px solid var(--border-color);
            overflow: hidden;
        }

        .card-header {
            padding: 1.5rem 2rem;
            border-bottom: 1px solid var(--border-color);
            background: #fafbfc;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.25rem;
        }

        .card-subtitle {
            color: var(--text-muted);
            font-size: 0.875rem;
        }

        .card-content {
            padding: 2rem;
        }

        .action-buttons {
            display: flex;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .table-container {
            overflow-x: auto;
            border-radius: 12px;
            border: 1px solid var(--border-color);
        }

        .table {
            margin: 0;
            background: white;
        }

        .table thead th {
            background: #f8fafc;
            color: #475569;
            font-weight: 600;
            border: none;
            padding: 1rem;
            font-size: 0.875rem;
        }

        .table tbody td {
            padding: 1rem;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background-color: #f8fafc;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.375rem 0.875rem;
            border-radius: 9999px;
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.025em;
        }

        .status-menunggu { 
            background-color: #fef3c7; 
            color: #92400e;
            border: 1px solid #fcd34d;
        }
        
        .status-diproses { 
            background-color: #dbeafe; 
            color: #1e40af;
            border: 1px solid #93c5fd;
        }
        
        .status-selesai { 
            background-color: #d1fae5; 
            color: #065f46;
            border: 1px solid #6ee7b7;
        }

        .button {
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.2s ease;
            font-size: 0.875rem;
        }

        .button.is-primary {
            background: linear-gradient(135deg, var(--primary-color), #8b5cf6);
            border: none;
            color: white;
        }

        .button.is-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .button.is-danger {
            background: var(--danger-color);
            border: none;
            color: white;
        }

        .button.is-danger:hover {
            background: #dc2626;
            transform: translateY(-1px);
        }

        .button.is-info {
            background: var(--info-color);
            border: none;
            color: white;
        }

        .button.is-warning {
            background: var(--warning-color);
            border: none;
            color: white;
        }

        .button.is-fullwidth {
            background: linear-gradient(135deg, var(--danger-color), #dc2626);
            font-weight: 600;
        }

        .notification {
            border-radius: 12px;
            border: none;
            font-weight: 500;
        }

        .notification.is-success {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            color: #065f46;
            border-left: 4px solid var(--success-color);
        }

        .notification.is-danger {
            background: linear-gradient(135deg, #fee2e2, #fecaca);
            color: #991b1b;
            border-left: 4px solid var(--danger-color);
        }

        .select select {
            border-radius: 8px;
            border: 1px solid var(--border-color);
        }

        .tag.is-info {
            background: var(--primary-light);
            color: var(--primary-color);
            font-weight: 500;
        }

        /* Mobile Responsiveness */
        @media (max-width: 1024px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }

            .admin-sidebar.is-active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .main-content {
                padding: 1rem;
            }

            .page-header {
                padding: 1.5rem;
            }

            .card-content {
                padding: 1.5rem;
            }

            .action-buttons {
                flex-direction: column;
            }

            .button {
                width: 100%;
                justify-content: center;
            }
        }

        /* Loading Animation */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .loading-overlay.is-active {
            opacity: 1;
            visibility: visible;
        }

        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid #f3f4f6;
            border-top: 4px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Custom scrollbar for main content */
        .main-content::-webkit-scrollbar {
            width: 8px;
        }

        .main-content::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        .main-content::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        .main-content::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>
<body>
    <div class="loading-overlay" id="loadingOverlay">
        <div class="spinner"></div>
    </div>

    <div class="admin-layout">
        <div class="admin-sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <p class="title">SIPADU Admin</p>
                {{-- <p class="subtitle">Welcome, {{ Auth::user()->nama }}</p> --}}
            </div>
            
            <nav class="sidebar-menu">
                <div class="menu-section">
                    <p class="menu-label">Main Menu</p>
                    <ul class="menu-list">
                        <li><a href="#dashboard" class="menu-item is-active" data-section="dashboard">
                            <span class="icon"><i class="fas fa-tachometer-alt"></i></span> 
                            Dashboard
                        </a></li>
                        <li><a href="#pengaduan-section" class="menu-item" data-section="pengaduan">
                            <span class="icon"><i class="fas fa-file-alt"></i></span> 
                            Pengaduan
                        </a></li>
                        <li><a href="#users-section" class="menu-item" data-section="users">
                            <span class="icon"><i class="fas fa-users"></i></span> 
                            Users
                        </a></li>
                        <li><a href="#tanggapan-section" class="menu-item" data-section="tanggapan">
                            <span class="icon"><i class="fas fa-comments"></i></span> 
                            Tanggapan
                        </a></li>
                    </ul>
                </div>

                <div class="menu-section">
                    <p class="menu-label">System</p>
                    <ul class="menu-list">
                        <li><a href="#password-reset-section" class="menu-item" data-section="password-reset">
                            <span class="icon"><i class="fas fa-key"></i></span> 
                            Password Resets
                        </a></li>
                    </ul>
                </div>
            </nav>

            <div class="logout-section">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="button is-danger is-fullwidth">
                        <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>

        <main class="main-content">
            <div class="page-header">
                <h1 class="page-title">Admin Dashboard</h1>
                <p class="page-subtitle">Manage your SIPADU system efficiently</p>
            </div>

            @if(session('success'))
                <div class="notification is-success">
                    <button class="delete"></button>
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="notification is-danger">
                    <button class="delete"></button>
                    {{ session('error') }}
                </div>
            @endif

            <!-- Statistics Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon primary">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div>
                            <div class="stat-value">{{ $pengaduans->count() }}</div>
                            <div class="stat-label">Total Pengaduan</div>
                        </div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon success">
                            <i class="fas fa-users"></i>
                        </div>
                        <div>
                            <div class="stat-value">{{ $users->count() }}</div>
                            <div class="stat-label">Total Users</div>
                        </div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon warning">
                            <i class="fas fa-comments"></i>
                        </div>
                        <div>
                            <div class="stat-value">{{ $tanggapans->count() }}</div>
                            <div class="stat-label">Total Tanggapan</div>
                        </div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon danger">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div>
                            <div class="stat-value">{{ $pengaduans->where('status', 'menunggu')->count() }}</div>
                            <div class="stat-label">Menunggu Proses</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pengaduan Section -->
            <div id="pengaduan-section" class="content-card">
                <div class="card-header">
                    <h2 class="card-title">Daftar Pengaduan</h2>
                    {{-- <p class="card-subtitle">Kelola semua pengaduan yang masuk ke sistem</p> --}}
                </div>
                <div class="card-content">
                    <div class="table-container">
                        <table class="table is-fullwidth is-striped is-hoverable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pengadu</th>
                                    <th>Judul</th>
                                    <th>Isi</th>
                                    <th>Foto</th>
                                    <th>Status</th>
                                    <th>Ubah Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pengaduans as $index => $p)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><strong>{{ $p->user->nama }}</strong></td>
                                    <td>{{ $p->judul }}</td>
                                    <td>{{ Str::limit($p->isi, 50) }}</td>
                                    <td>
                                        @if($p->foto)
                                            <img src="{{ asset('storage/' . $p->foto) }}" width="60" height="60" alt="Foto Pengaduan" style="border-radius: 8px; object-fit: cover;">
                                        @else
                                            <span class="has-text-grey">Tidak ada</span>
                                        @endif
                                    </td>
                                    <td><span class="status-badge status-{{ strtolower($p->status) }}">{{ ucfirst($p->status) }}</span></td>
                                    <td>
                                        <form method="POST" action="{{ route('admin.pengaduan.updateStatus', $p->id_pengaduan) }}">
                                            @csrf
                                            <div class="select is-small">
                                                <select name="status" onchange="this.form.submit()">
                                                    <option value="menunggu" {{ $p->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                                    <option value="diproses" {{ $p->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                                    <option value="selesai" {{ $p->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                                </select>
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        {{-- <div class="buttons">
                                            <a href="{{ route('admin.pengaduan.show', $p->id_pengaduan) }}" class="button is-info is-small">
                                                <span class="icon"><i class="fas fa-eye"></i></span>
                                            </a> --}}
                                        <form method="POST" action="{{ route('admin.pengaduan.destroy', $p->id_pengaduan) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengaduan ini?')" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="button is-danger is-small" type="submit">
                                                <span class="icon"><i class="fas fa-trash"></i></span>
                                                <span>Hapus</span>
                                            </button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="has-text-centered has-text-grey">
                                        <i class="fas fa-inbox fa-2x mb-3"></i><br>
                                        Tidak ada data pengaduan.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Users Section -->
            <div id="users-section" class="content-card">
                <div class="card-header">
                    <h2 class="card-title">Manajemen Pengguna</h2>
                    {{-- <p class="card-subtitle">Kelola akun pengguna dan administrator</p> --}}
                </div>
                <div class="card-content">
                    <div class="action-buttons">
                        <a href="{{ route('admin.users.create') }}" class="button is-primary">
                            <span class="icon"><i class="fas fa-plus"></i></span>
                            <span>Tambah Pengguna Baru</span>
                        </a>
                    </div>
                    <div class="table-container">
                        <table class="table is-fullwidth is-striped is-hoverable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $index => $user)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><strong>{{ $user->nama }}</strong></td>
                                    <td>{{ $user->email }}</td>
                                    <td><span class="tag is-info">{{ ucfirst($user->role) }}</span></td>
                                    <td>
                                      <div class="buttons">
                                {{-- Tombol Edit --}}
                                    <a href="{{ route('admin.users.edit', $user->id_user) }}" class="button is-warning is-small">
                                        <span class="icon">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                        <span>Edit</span>
                                    </a>

                                    {{-- Tombol Hapus --}}
                                    <form method="POST"
                                        action="{{ route('admin.users.destroy', $user->id_user) }}"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="button is-danger is-small" type="submit">
                                            <span class="icon">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span>Hapus</span>
                                        </button>
                                    </form>
                                </div>

                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="has-text-centered has-text-grey">
                                        <i class="fas fa-users fa-2x mb-3"></i><br>
                                        Tidak ada data pengguna.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Tanggapan Section -->
            <div id="tanggapan-section" class="content-card">
                <div class="card-header">
                    <h2 class="card-title">Manajemen Tanggapan</h2>
                    {{-- <p class="card-subtitle">Kelola tanggapan terhadap pengaduan</p> --}}
                </div>
                <div class="card-content">
                    <div class="action-buttons">
                        <a href="{{ route('admin.tanggapans.create') }}" class="button is-primary">
                            <span class="icon"><i class="fas fa-plus"></i></span>
                            <span>Tambah Tanggapan Baru</span>
                        </a>
                    </div>
                    <div class="table-container">
                        <table class="table is-fullwidth is-striped is-hoverable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Pengaduan</th>
                                    <th>Admin</th>
                                    <th>Isi Tanggapan</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tanggapans as $index => $tanggapan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><span class="tag is-primary">#{{ $tanggapan->id_pengaduan }}</span></td>
                                    <td><strong>{{ $tanggapan->admin->nama ?? 'N/A' }}</strong></td>
                                    <td>{{ Str::limit($tanggapan->isi_tanggapan, 50) }}</td>
                                    <td>{{ $tanggapan->tanggal_tanggapan->translatedFormat('d M Y, H:i') }}</td>
                                    <td>
                                        <div class="buttons">
                                            <a href="{{ route('admin.tanggapans.edit', $tanggapan->id_tanggapan) }}" class="button is-warning is-small">
                                                <span class="icon"><i class="fas fa-edit"></i></span>
                                            </a>
                                            <form method="POST" action="{{ route('admin.tanggapans.destroy', $tanggapan->id_tanggapan) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus tanggapan ini?')" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="button is-danger is-small" type="submit">
                                                    <span class="icon"><i class="fas fa-trash"></i></span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="has-text-centered has-text-grey">
                                        <i class="fas fa-comments fa-2x mb-3"></i><br>
                                        Tidak ada data tanggapan.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Password Reset Tokens Section -->
            <div id="password-reset-section" class="content-card">
                <div class="card-header">
                    <h2 class="card-title">Password Reset Tokens</h2>
                    {{-- <p class="card-subtitle">Kelola token reset kata sandi pengguna</p> --}}
                </div>
                <div class="card-content">
                    <div class="table-container">
                        <table class="table is-fullwidth is-striped is-hoverable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Email</th>
                                    <th>Token</th>
                                    <th>Dibuat Pada</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($passwordResets as $index => $pr)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><strong>{{ $pr->email }}</strong></td>
                                    <td><code style="background: #f1f5f9; padding: 0.25rem 0.5rem; border-radius: 4px;">{{ Str::limit($pr->token, 20) }}</code></td>
                                    <td>{{ $pr->created_at->translatedFormat('d M Y, H:i') }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('admin.password_resets.destroy', $pr->email) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus token reset password ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="button is-danger is-small" type="submit">
                                                <span class="icon"><i class="fas fa-trash"></i></span>
                                                <span>Hapus</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="has-text-centered has-text-grey">
                                        <i class="fas fa-key fa-2x mb-3"></i><br>
                                        Tidak ada token reset password.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Loading overlay
        window.addEventListener('load', function() {
            const loadingOverlay = document.getElementById('loadingOverlay');
            setTimeout(() => {
                loadingOverlay.classList.remove('is-active');
            }, 500);
        });

        // Smooth scrolling for menu items
        document.querySelectorAll('.menu-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all menu items
                document.querySelectorAll('.menu-item').forEach(menuItem => {
                    menuItem.classList.remove('is-active');
                });
                
                // Add active class to clicked item
                this.classList.add('is-active');
                
                // Get target section
                const targetSection = this.getAttribute('href');
                const section = document.querySelector(targetSection);
                
                if (section) {
                    section.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Auto-hide notifications
        document.querySelectorAll('.notification .delete').forEach(deleteBtn => {
            deleteBtn.addEventListener('click', function() {
                this.parentElement.style.opacity = '0';
                this.parentElement.style.transform = 'translateY(-20px)';
                setTimeout(() => {
                    this.parentElement.remove();
                }, 300);
            });
        });

        // Auto-hide notifications after 5 seconds
        setTimeout(() => {
            document.querySelectorAll('.notification').forEach(notification => {
                notification.style.opacity = '0';
                notification.style.transform = 'translateY(-20px)';
                setTimeout(() => {
                    notification.remove();
                }, 300);
            });
        }, 5000);

        // Mobile sidebar toggle (if you want to add mobile menu button)
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('is-active');
        }

        // Table row hover effects
        document.querySelectorAll('.table tbody tr').forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.01)';
            });
            
            row.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
        });

        // Form submission loading states
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function() {
                const submitButton = form.querySelector('button[type="submit"]');
                if (submitButton) {
                    submitButton.classList.add('is-loading');
                    submitButton.disabled = true;
                }
            });
        });

        // Status badge animations
        document.querySelectorAll('.status-badge').forEach(badge => {
            badge.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.05)';
            });
            
            badge.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
        });

        // Card hover animations
        document.querySelectorAll('.stat-card, .content-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        // Search functionality (if you want to add search)
        function filterTable(tableId, searchValue) {
            const table = document.getElementById(tableId);
            const rows = table.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if (text.includes(searchValue.toLowerCase())) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        // Intersection Observer for scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all content cards
        document.querySelectorAll('.content-card, .stat-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Alt + 1-5 for quick navigation
            if (e.altKey) {
                switch(e.key) {
                    case '1':
                        document.querySelector('[data-section="dashboard"]').click();
                        break;
                    case '2':
                        document.querySelector('[data-section="pengaduan"]').click();
                        break;
                    case '3':
                        document.querySelector('[data-section="users"]').click();
                        break;
                    case '4':
                        document.querySelector('[data-section="tanggapan"]').click();
                        break;
                    case '5':
                        document.querySelector('[data-section="password-reset"]').click();
                        break;
                }
            }
        });

        // Add tooltips to buttons
        document.querySelectorAll('.button').forEach(button => {
            const icon = button.querySelector('.icon i');
            if (icon) {
                let tooltipText = '';
                if (icon.classList.contains('fa-eye')) tooltipText = 'Lihat Detail';
                if (icon.classList.contains('fa-edit')) tooltipText = 'Edit';
                if (icon.classList.contains('fa-trash')) tooltipText = 'Hapus';
                if (icon.classList.contains('fa-plus')) tooltipText = 'Tambah Baru';
                
                if (tooltipText) {
                    button.setAttribute('title', tooltipText);
                }
            }
        });

        // Real-time clock (optional)
        function updateClock() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('id-ID');
            const dateString = now.toLocaleDateString('id-ID', { 
                weekday: 'long', 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric' 
            });
            
            // If you want to add a clock to the header
            const clockElement = document.getElementById('current-time');
            if (clockElement) {
                clockElement.textContent = `${dateString} - ${timeString}`;
            }
        }

        // Update clock every second
        setInterval(updateClock, 1000);
        updateClock(); // Initial call

        // Performance monitoring
        if ('performance' in window) {
            window.addEventListener('load', function() {
                setTimeout(() => {
                    const perfData = performance.getEntriesByType('navigation')[0];
                    console.log(`Page loaded in ${Math.round(perfData.loadEventEnd - perfData.fetchStart)}ms`);
                }, 0);
            });
        }

        // Prevent accidental form submissions
        let isSubmitting = false;
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(e) {
                if (isSubmitting) {
                    e.preventDefault();
                    return false;
                }
                isSubmitting = true;
                
                // Reset flag after 3 seconds
                setTimeout(() => {
                    isSubmitting = false;
                }, 3000);
            });
        });
    </script>
</body>
</html>