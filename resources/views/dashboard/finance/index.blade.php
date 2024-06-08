@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">List Pengajuan Barang</h1>
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
              <th scope="col">Action</th>
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
                <button class="badge bg-primary border-0">Pending</button>
            </td>
              <td>
                <button class="badge bg-success border-0" data-bs-toggle="modal" data-bs-target="#approveModal" data-id="{{ $pb->id }}">Approve</button>
                <button class="badge bg-danger border-0" data-bs-toggle="modal" data-bs-target="#rejectModal" data-id="{{ $pb->id }}">Reject</button>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

@endsection


  <!-- Modal Reject-->
  <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="rejectModalLabel">Keterangan Reject</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="/dashboard/pengajuan-finance/{{'ID_PLACEHOLDER'}}">
                {{-- //csrf wajib digunakan untuk form --}}
                @method('PUT')
                @csrf
                <div class="mb-3">
                  <input type="text" class="form-control" id="keterangan" name="keterangan" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Approve-->
  <div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="approveModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="approveModalLabel">Form Approve</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="/dashboard/pengajuan-finance/approve/{{'ID_PLACEHOLDER'}}" enctype="multipart/form-data">
                {{-- //csrf wajib digunakan untuk form --}}
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="bukti" class="form-label">Upload Bukti Pembelian</label>
                    <input type="file" class="form-control @error('bukti') is-invalid @enderror" id="bukti" name="bukti" required>
                    @error('bukti')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var rejectModal = document.getElementById('rejectModal');
      var approveModal = document.getElementById('approveModal');
      rejectModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;
        var pembelianId = button.getAttribute('data-id');
        
        var form = rejectModal.querySelector('form');
        form.action = form.action.replace('ID_PLACEHOLDER', pembelianId);
      });
      approveModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;
        var pembelianId = button.getAttribute('data-id');
        
        var form = approveModal.querySelector('form');
        form.action = form.action.replace('ID_PLACEHOLDER', pembelianId);
      });
    });
  </script>