@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create Pembelian Barang</h1>
  </div>

  <div class="col-lg-4">
    <form method="POST" action="{{ route('pengajuan-barang.store') }}">
        {{-- //csrf wajib digunakan untuk form --}}
        @csrf
        <div class="mb-3">
          <label for="kode" class="form-label">Kode Pembelian</label>
          <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" required value="{{ old('kode') }}">
          @error('kode')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" required value="{{ old('nama_barang') }}">
          @error('nama_barang')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="nama_supplier" class="form-label">Nama Supplier</label>
            <input type="text" class="form-control @error('nama_supplier') is-invalid @enderror" id="nama_supplier" name="nama_supplier" required value="{{ old('nama_supplier') }}">
          @error('nama_supplier')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" required value="{{ old('quantity', 0) }}">
          @error('quantity')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="satuan" class="form-label">Satuan</label>
            <input type="text" class="form-control @error('satuan') is-invalid @enderror" id="satuan" name="satuan" required value="{{ old('satuan') }}">
          @error('satuan')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" required value="{{ old('harga', 0) }}">
          @error('harga')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary mb-5">Create Pembelian</button>
      </form>
  </div>
@endsection