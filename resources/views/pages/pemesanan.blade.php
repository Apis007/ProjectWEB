@extends('layouts.backend')

@section('css')
  <!-- Page JS Plugins CSS -->
  <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
@endsection

@section('js')
  <!-- jQuery (required for DataTables plugin) -->
  <script src="{{ asset('js/lib/jquery.min.js') }}"></script>

  <!-- Page JS Plugins -->
  <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>

  <!-- Page JS Code -->
  @vite(['resources/js/pages/datatables.js'])
@endsection

@section('content')
  <!-- Hero -->
  <div class="bg-body-light">
    <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
        <div class="flex-grow-1">
          <h1 class="h3 fw-bold mb-2">
            Data Transaksi
          </h1>
        </div>
        <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item">
              <a class="link-fx" href="/dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
              Data Transaksi
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- END Hero -->

  <!-- Page Content -->
  <div class="content">
    <!-- Info -->

    <!-- END Info -->

    <!-- Dynamic Table Full -->
    <div class="block block-rounded">
      <div class="block-header block-header-default">
        <h3 class="block-title">
            <a href="#addPemesananModal" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addPemesananModal">Tambah Pesanan Baru</a>
        </h3>
      </div>
      <div class="block-content block-content-full">
        <div class="table-responsive">
        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons fs-sm">
          <thead>
            <tr>
              <th class="text-center">ID</th>
              <th>ID User</th>
              <th>ID Unit</th>
              <th>Plat Nomor</th>
              <th>Tanggal Pemesanan</th>
              <th>Harga Sewa</th>
              <th>Tanggal Pengembalian</th>
              <th>Denda</th>
              <th>Status Kendaraan</th>
              <th style="width: 80px;">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pemesanans as $data)
              <tr>
                <td>{{ $data->id_pemesanan }}</td>
                <td>{{ $data->user->username ?? '' }}</td>
                <td>{{ $data->unit->nama }}</td>
                <td>{{ $data->platnomor}}</td>
                <td>{{ $data->tanggal_pemesanan -> format('d M Y')}}</td>
                <td>{{ number_format($data->hargatotal, 0, ',', '.') }}</td>
                <td>{{$data->tanggal_pengembalian -> format('d M Y')}}</td>

                <td>{{ number_format($data->denda, 0, ',', '.')}}</td>

                <td>{{$data->status}}</td>
                <td>
                    <form action="{{ route('pemesanan.destroy', ['id_pemesanan' => $data->id_pemesanan]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        <div class="d-flex">
                        <a href="{{ route('pemesanan.edit', ['id_pemesanan' => $data->id_pemesanan]) }}" class="btn btn-primary btn-sm mr-2" role="button">
                                <i class="bi bi-pencil-square"></i>
                        </a>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data unit ini?')">
                                <i class="bi bi-trash"></i>
                        </button>
                    </div>
                    </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        </div>
      </div>
    </div>
    <!-- END Dynamic Table Full -->

    <!-- Modal -->
    <div class="modal fade" id="addPemesananModal" tabindex="-1" aria-labelledby="addPemesananModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPemesananModalLabel">Tambah Pesanan Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pemesanan.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="idUser" class="form-label">Nama User</label>
                            <select class="form-control" id="idUser" name="id_user">
                                <option value="" selected disabled>Pilih Nama User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id_user }}">{{ $user->username }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="idUnit" class="form-label">Nama Unit</label>
                            <select class="form-control" id="idUnit" name="id_unit" required>
                                <option value="" selected disabled>Pilih Unit</option>
                                @foreach ($dataUnits as $unit)
                                    <option value="{{ $unit->id_unit }}">{{ $unit->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="platNomor" class="form-label">Plat Nomor</label>
                            <input type="text" class="form-control" id="platNomor" name="platnomor" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggalPemesanan" class="form-label">Tanggal Pemesanan</label>
                            <input type="date" class="form-control" id="tanggalPemesanan" name="tanggal_pemesanan" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggalPengembalian" class="form-label">Tanggal Pengembalian</label>
                            <input type="date" class="form-control" id="tanggalPengembalian" name="tanggal_pengembalian" required>
                        </div>
                        <div class="mb-3">
                            <label for="jumlahHari" class="form-label">Jumlah Hari</label>
                            <input type="number" class="form-control" id="jumlahHari" name="jumlah_hari" required>
                        </div>

                        <div class="mb-3">
                            <label for="hargasewa" class="form-label">Harga Sewa per Hari</label>
                            <input type="number" class="form-control" id="hargasewa" name="hargasewa" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="hargaTotal" class="form-label">Harga Total</label>
                            <input type="number" class="form-control" id="hargaTotal" name="hargatotal" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="denda" class="form-label">Denda</label>
                            <input type="number" class="form-control" id="denda" name="denda">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status Kendaraan</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="Sedang disewa">Sedang disewa</option>
                                <option value="Telah dikembalikan">Telah dikembalikan</option>
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
