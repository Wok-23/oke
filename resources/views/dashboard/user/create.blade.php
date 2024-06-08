@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New User</h1>
  </div>

  <div class="col-lg-4">
    <form method="POST" action="{{ route('user.store') }}">
        {{-- //csrf wajib digunakan untuk form --}}
        @csrf
        <div class="mb-3">
          <label for="fullname" class="form-label">Fullname</label>
          <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname" name="fullname" required value="{{ old('fullname') }}">
          @error('fullname')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required value="{{ old('username') }}">
        @error('username')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required value="{{ old('password') }}">
          @error('password')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role User</label>
            <select class="form-select" aria-label="Default select example" name="role" id="role">
                @foreach ($roles as $role)
                @if(old('role') == $role->id)
                    <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                @else
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mb-5">Create User</button>
      </form>
  </div>
@endsection