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
                <button class="badge bg-primary border-0">Pending</button>
            </td>
              <td>
                <form action="/dashboard/pengajuan-manager/approve/{{ $pb->id }}" method="POST" class="d-inline">
                    @method('PUT')
                    @csrf
                    <button class="badge bg-success border-0" type="submit">Approve</button>
                </form>
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
            <form method="POST" action="/dashboard/pengajuan-manager/{{'ID_PLACEHOLDER'}}">
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

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var rejectModal = document.getElementById('rejectModal');
      rejectModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;
        var pembelianId = button.getAttribute('data-id');
        
        var form = rejectModal.querySelector('form');
        form.action = form.action.replace('ID_PLACEHOLDER', pembelianId);
      });
    });
  </script>