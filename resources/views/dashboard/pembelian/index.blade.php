@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">List Pembelian</h1>
</div>

@if (session()->has('success'))
    <div class="alert alert-success col-lg-6" role="alert">
      {{ session('success') }}
    </div>
@endif

      <div class="table-responsive col-lg-12">
        <a href="pengajuan-barang/create" class="btn btn-success mb-3"> Create Pembelian</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Kode Pembelian</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Barang</th>
              <th scope="col">Supplier</th>
              <th scope="col">Quantity</th>
              <th scope="col">Satuan</th>
              <th scope="col">Harga</th>
              <th scope="col">Total Harga</th>
              <th scope="col">Acc Manager</th>
              <th scope="col">Acc Finance</th>
              <th scope="col">Keterangan</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pembelians as $pb)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $pb->kd_pembelian }}</td>
              <td>{{ Carbon\Carbon::parse($pb->tanggal)->translatedFormat('d F Y') }}</td>
              <td>{{ $pb->nama_barang }}</td>
              <td>{{ $pb->nama_supplier }}</td>
              <td>{{ $pb->quantity }}</td>
              <td>{{ $pb->satuan }}</td>
              <td>{{ number_format($pb->harga, 0, ',', ',') }}</td>
              <td>{{ number_format($pb->harga * $pb->quantity, 0, ',', ',') }}</td>
              <td>
                @if($pb->status_manager === 1)
                <button class="badge bg-primary border-0">Pending</button>
                @elseIf($pb->status_manager === 2)
                <button class="badge bg-success border-0">Approve</button>
                @else
                <button class="badge bg-danger border-0">Reject</button>
                @endif
            </td>
            <td>
              @if($pb->status_finance === 1)
              <button class="badge bg-primary border-0">Pending</button>
              @elseIf($pb->status_finance === 2)
              <button class="badge bg-success border-0">Approve</button>
              @else
              <button class="badge bg-danger border-0">Reject</button>
              @endif
          </td>
          <td>{{ $pb->keterangan }}</td>
              <td>
                @if($pb->status_manager === 1)
                <a href="{{ route('pengajuan-barang.edit', $pb->id) }}" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="{{ route('pengajuan-barang.destroy', $pb->id) }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                </form>
                @endif
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

@endsection