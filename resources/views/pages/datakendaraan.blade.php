@extends('layouts.backend')

@section('css')
  <!-- Page JS Plugins CSS -->
  <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
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
          Data User
        </h1>
      </div>
      <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-alt">
          <li class="breadcrumb-item">
            <a class="link-fx" href="/dashboard">Dashboard</a>
          </li>
          <li class="breadcrumb-item" aria-current="page">
            DataTables
          </li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<!-- Show Data -->
<div class="content">
  <div class="block block-rounded"> 
    <div class="block-header block-header-default">
      <h3 class="block-title">Data Table Full</h3>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Tambah">
        <class="text-white">Tambah Data +
      </button>
    </div>
    <div class="block-content block-content-full">
      <table class="table table-bordered table-striped table-vcenter js-dataTable-full fs-sm">
        <thead>
          <tr>
            <th class="text-center" style="width: 80px;">No</th>
            <th>nama</th>
            <th>No Polisi</th>
            <th class="d-none d-sm-table-cell" style="width: 25%;">gambar</th>
            <th style="width: 10%;">jenis kendaraan</th>
            <th style="width: 10%;">harga sewa</th>
            <th style="width: 10%;">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data_unit as $row)
            <tr>
              <td class="text-center">{{  $loop->iteration }}</td>
              <td class="fw-semibold">
                <a href="javascript:void(0)">{{ $row->nama }}</a>
              </td>
              <td class="fw-semibold">
                <a href="javascript:void(0)">{{ $row->no_polisi}}</a>
              </td>
              <td class="fw-semibold">
                <img src="{{ $row->gambar }}" alt="" width="40%" height="40%">
              </td>
              <td class="fw-semibold">
                <a href="javascript:void(0)">{{ $row->jeniskendaraan }}</a>
              </td>
              <td class="fw-semibold">
                <a href="javascript:void(0)">{{ $row->hargasewa }}</a>
              </td>
              <td>
                <a class="btn btn-primary btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#Edit" role="button">
                  <i class="bi bi-pencil-square"></i>
                </a>
                <a href="datakendaraan.destroy" class="btn btn-danger btn-sm" role="button">
                  <i class="bi bi-trash"></i>
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>    
  </div>
</div>
<!-- END Show data -->

<!-- Form Tambah -->
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card card-plain">
                    <div class="card-header pb-0 text-left">
                        <h3 class="font-weight-bolder text-primary text-gradient">Tambah Data Kendaraan</h3>
                    </div>
                    <div class="card-body pb-3">
                        <form id="form-datakendaraan" method="POST" enctype="multipart/form-data" action="{{ route('datakendaraan.store') }}">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nama">Nama Kendaraan</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Kendaraan" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_polisi">No Polisi</label>
                                    <input type="text" class="form-control" id="no_polisi" name="no_polisi" placeholder="GQ 2170" required>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Link Gambar</label>
                                    <input type="text" class="form-control" id="gambar" name="gambar" placeholder="Link Gambar" required>
                                </div>
                                <div class="form-group">
                                    <label for="jeniskendaraan">Jenis Kendaraan</label>
                                    <input type="text" class="form-control" id="jeniskendaraan" name="jeniskendaraan" placeholder="Jenis Kendaraan" required>
                                </div>
                                <div class="form-group">
                                    <label for="hargasewa">Harga Sewa</label>
                                    <input type="text" class="form-control" id="hargasewa" name="hargasewa" placeholder="Harga Sewa" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-alt-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <!-- End Form Tambah -->




  <!-- END Page Content -->
@endsection

 
