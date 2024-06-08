@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit User</h1>
  </div>

  <div class="col-lg-4">
    <form method="POST" action="{{ route('user.update', $user->id) }}">
        {{-- //csrf wajib digunakan untuk form --}}
        @method('PUT')
        @csrf
        <div class="mb-3">
          <label for="fullname" class="form-label">Fullname</label>
          <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname" name="fullname" required value="{{ old('fullname', $user->fullname) }}">
          @error('fullname')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required value="{{ old('username', $user->username) }}">
        @error('username')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}">
            <small>Leave blank if you don't want to change the password</small>
          @error('password')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role User</label>
            <select class="form-select" aria-label="Default select example" name="role" id="role">
                @foreach ($roles as $role)
                @if(old('role', $user->roleId) == $role->id)
                    <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                @else
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mb-5">Edit User</button>
      </form>
  </div>
@endsection