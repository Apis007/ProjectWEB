@extends('layouts.backend')

@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">Edit Pesanan</h1>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="/dashboard">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="{{ route('users.index') }}">DataTables</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Edit Pesanan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Pesanan</h3>
            </div>
            <div class="block-content block-content-full">
                <form method="POST" action="{{ route('pemesanan.update', ['id_pemesanan' => $pemesanan->id_pemesanan]) }}">

                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="idUser" class="form-label">Nama User</label>
                        <select class="form-control" id="idUser" name="id_user">
                            <option value="" selected disabled>Pilih Nama User</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id_user }}" {{ $user->id_user == $pemesanan->id_user ? 'selected' : '' }}>
                                    {{ $user->username }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="idUnit" class="form-label">Nama Unit</label>
                        <select class="form-control" id="idUnit" name="id_unit" required>
                            <option value="" selected disabled>Pilih Unit</option>
                            @foreach ($dataUnits as $unit)
                                <option value="{{ $unit->id_unit }}" {{ $unit->id_unit == $pemesanan->id_unit ? 'selected' : '' }}>
                                    {{ $unit->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="platNomor" class="form-label">Plat Nomor</label>
                        <input type="text" class="form-control" id="platNomor" name="platnomor" value="{{ $pemesanan->platnomor }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggalPemesanan" class="form-label">Tanggal Pemesanan</label>
                        <input type="date" class="form-control" id="tanggalPemesanan" name="tanggal_pemesanan"
                            value="{{ $pemesanan->tanggal_pemesanan ? $pemesanan->tanggal_pemesanan->format('Y-m-d') : '' }}" readonly required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggalPengembalian" class="form-label">Tanggal Pengembalian</label>
                        <input type="date" class="form-control" id="tanggalPengembalian" name="tanggal_pengembalian"
                            value="{{ $pemesanan->tanggal_pengembalian ? $pemesanan->tanggal_pengembalian->format('Y-m-d') : '' }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="jumlahHari" class="form-label">Jumlah Hari</label>
                        <input type="number" class="form-control" id="jumlahHari" name="jumlah_hari"
                            value="{{ $pemesanan->jumlah_hari }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="hargasewa" class="form-label">Harga Sewa per Hari</label>
                        <input type="number" class="form-control" id="hargasewa" name="hargasewa"
                            value="{{ $pemesanan->unit->hargasewa }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="hargaTotal" class="form-label">Harga Total</label>
                        <input type="number" class="form-control" id="hargaTotal" name="hargatotal"
                            value="{{ $pemesanan->hargatotal }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="denda" class="form-label">Denda</label>
                        <input type="number" class="form-control" id="denda" name="denda" value="{{ $pemesanan->denda }}">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status Kendaraan</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Sedang disewa" {{ $pemesanan->status == 'Sedang disewa' ? 'selected' : '' }}>Sedang
                                disewa</option>
                            <option value="Telah dikembalikan"
                                {{ $pemesanan->status == 'Telah dikembalikan' ? 'selected' : '' }}>Telah dikembalikan</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // Ambil harga sewa per unit dari database atau sumber lainnya
        var hargaSewaPerUnit = {
            @foreach ($dataUnits as $unit)
            "{{ $unit->id_unit }}": "{{ $unit->hargasewa }}",
            @endforeach
        };

        // Update harga sewa dan harga total saat ID Unit berubah
        document.getElementById('idUnit').addEventListener('input', function() {
            var idUnit = this.value;
            var hargaSewa = hargaSewaPerUnit[idUnit];
            document.getElementById('hargasewa').value = hargaSewa;
            hitungHargaTotal();
        });

        // Hitung harga total saat jumlah hari berubah
        document.getElementById('jumlahHari').addEventListener('input', function() {
            hitungHargaTotal();
        });

        // Fungsi untuk menghitung harga total
        function hitungHargaTotal() {
            var hargaSewa = document.getElementById('hargasewa').value;
            var jumlahHari = document.getElementById('jumlahHari').value;
            var hargaTotal = hargaSewa * jumlahHari;
            document.getElementById('hargaTotal').value = hargaTotal;
        }
    </script>

@endsection
