@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Welcome Back, {{ auth()->user()->fullname }}</h1>
</div>

{{-- <div>
  <h4>Read Me</h4>
  <br>
  <h6>Manage Role</h6>
  <p>Manage role merupakan hak akses bagi user dengan fitur sebagai berikut: </p>
  <ul>
    <li>Manage role hanya dapat diakses oleh admin</li>
    <li>Manage role hanya dapat melihat data</li>
  </ul>
  <h6>Manage User</h6>
  <p>Manage user merupakan data semua user dengan fitur sebagai berikut: </p>
  <ul>
    <li>Manage user hanya dapat diakses oleh admin</li>
    <li>Manage user dapat melihat data</li>
    <li>Manage user dapat menambahkan data</li>
    <li>Manage user dapat merubah data</li>
    <li>Manage user dapat menghapus data</li>
  </ul>
  <h6>Pengejuan Barang Office Menu</h6>
  <p>Pengejuan Barang Office Menu merupakan data semua user dengan fitur sebagai berikut: </p>
  <ul>
    <li>Manage user hanya dapat diakses oleh admin</li>
    <li>Manage user dapat melihat data</li>
    <li>Manage user dapat menambahkan data</li>
    <li>Manage user dapat merubah data</li>
    <li>Manage user dapat menghapus data</li>
  </ul>
</div> --}}

@endsection