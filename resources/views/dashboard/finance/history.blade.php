@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">History Pengajuan Barang</h1>
</div>

@if (session()->has('success'))
    <div class="alert alert-success col-lg-6" role="alert">
      {{ session('success') }}
    </div>
@endif

      <div class="table-responsive col-lg-12">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama</th>
              <th scope="col">Kode</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Barang</th>
              <th scope="col">Supplier</th>
              <th scope="col">Quantity</th>
              <th scope="col">Satuan</th>
              <th scope="col">Harga</th>
              <th scope="col">Total Harga</th>
              <th scope="col">Manager</th>
              <th scope="col">Status</th>
              <th scope="col">Date Status</th>
              <th scope="col">Bukti</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pembelians as $pb)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $pb->user->fullname }}</td>
              <td>{{ $pb->kd_pembelian }}</td>
              <td>{{ Carbon\Carbon::parse($pb->tanggal)->translatedFormat('d F Y') }}</td>
              <td>{{ $pb->nama_barang }}</td>
              <td>{{ $pb->nama_supplier }}</td>
              <td>{{ $pb->quantity }}</td>
              <td>{{ $pb->satuan }}</td>
              <td>{{ number_format($pb->harga, 0, ',', ',') }}</td>
              <td>{{ number_format($pb->harga * $pb->quantity, 0, ',', ',') }}</td>
              <td>
                <button class="badge bg-success border-0">Approve</button>
              </td>
              <td>
                <button class="badge bg-success border-0">Approve</button>
              </td>
              <td>{{ Carbon\Carbon::parse($pb->date_manager)->translatedFormat('d F Y') }}</td>
              <td>
                <button class="badge bg-primary border-0" data-bs-toggle="modal" data-bs-target="#buktiModal" data-bs-bukti="{{ asset('storage/'.$pb->bukti_beli) }}">Lihat Bukti</button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

@endsection

  <!-- Modal Bukti-->
  <div class="modal fade" id="buktiModal" tabindex="-1" aria-labelledby="buktiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="buktiModalLabel">Bukti Pembelian</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex justify-content-center">
            <img id="buktiImage" src="" alt="bukti-image" class="img-fluid">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        var buktiModal = document.getElementById('buktiModal');
        buktiModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var buktiBeli = button.getAttribute('data-bs-bukti');
            
            var image = buktiModal.querySelector('#buktiImage');
            image.src = buktiBeli;
        });
    });
</script>