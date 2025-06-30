@extends('layouts.app')

@section('content')
<h1 class="title">Dashboard Admin</h1>

@if(session('success'))
    <div class="notification is-success">
        {{ session('success') }}
    </div>
@endif

<table class="table is-fullwidth is-striped is-bordered">
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
        @foreach($pengaduans as $index => $p)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $p->user->nama }}</td>
            <td>{{ $p->judul }}</td>
            <td>{{ $p->isi }}</td>
            <td>
                @if($p->foto)
                    <img src="{{ asset('storage/' . $p->foto) }}" width="100">
                @else
                    Tidak ada
                @endif
            </td>
            <td><strong>{{ ucfirst($p->status) }}</strong></td>
            <td>
                <form method="POST" action="{{ route('admin.pengaduan.updateStatus', $p->id_pengaduan) }}">
                    @csrf
                    <div class="select">
                        <select name="status" onchange="this.form.submit()">
                            <option value="menunggu" {{ $p->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                            <option value="diproses" {{ $p->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="selesai" {{ $p->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>
                </form>
            </td>
            <td>
                <form method="POST" action="{{ route('admin.pengaduan.destroy', $p->id_pengaduan) }}" onsubmit="return confirm('Hapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="button is-danger is-small" type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
