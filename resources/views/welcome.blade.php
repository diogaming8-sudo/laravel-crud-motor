<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Data Sepeda Motor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow border-0 rounded-4 overflow-hidden">
            <div class="card-header bg-gradient bg-primary text-white d-flex justify-content-between align-items-center py-3 px-4">
                <h4 class="mb-0 fw-bold">🏍️ Katalog Data Sepeda Motor</h4>
                <button type="button" class="btn btn-light btn-sm fw-bold text-primary px-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#tambahModal">
                    + Tambah Motor
                </button>
            </div>
            
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-dark text-uppercase fs-7">
                            <tr>
                                <th scope="col" class="text-center py-3" style="width: 5%;">No.</th>
                                <th scope="col" class="py-3" style="width: 15%;">Foto</th>
                                <th scope="col" class="py-3" style="width: 35%;">Nama Produk</th>
                                <th scope="col" class="py-3" style="width: 20%;">Harga</th>
                                <th scope="col" class="text-center py-3" style="width: 10%;">Qty</th>
                                <th scope="col" class="text-center py-3" style="width: 15%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($motors as $index => $motor)
                            <tr>
                                <td class="text-center fw-bold text-secondary">{{ $index + 1 }}</td>
                                <td>
                                    <img src="{{ $motor->gambar }}" alt="{{ $motor->nama_produk }}" class="rounded shadow-sm" style="width: 70px; height: 50px; object-fit: cover;">
                                </td>
                                <td class="fw-bold text-dark">{{ $motor->nama_produk }}</td>
                                <td class="text-success fw-semibold">Rp {{ number_format($motor->harga, 0, ',', '.') }}</td>
                                <td class="text-center">
                                    <span class="badge bg-secondary rounded-pill px-3 py-2">{{ $motor->qty }} Unit</span>
                                </td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-warning btn-sm text-dark fw-bold px-3 shadow-sm">Ubah</a>
                                    <form action="{{ route('motor.destroy', $motor->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm fw-bold shadow-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">Belum ada data sepeda motor. Silakan tambah data baru.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Motor -->
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('motor.store') }}" method="POST">
                @csrf
                <div class="modal-content border-0 shadow-lg rounded-4">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title fw-bold" id="tambahModalLabel">Tambah Data Motor Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control" placeholder="Contoh: Honda Vario" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Harga (Angka)</label>
                            <input type="number" name="harga" class="form-control" placeholder="Contoh: 25000000" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Qty (Jumlah)</label>
                            <input type="number" name="qty" class="form-control" placeholder="Contoh: 3" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Link Foto Motor (URL)</label>
                            <input type="url" name="gambar" class="form-control" placeholder="https://contoh.com/gambar-motor.jpg">
                            <div class="form-text">Opsional. Jika kosong, akan memakai gambar bawaan.</div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light px-4 py-3">
                        <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary px-4">Simpan Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>