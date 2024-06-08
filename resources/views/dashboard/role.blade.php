@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">List Role</h1>
</div>
  
        <div class="table-responsive col-lg-8">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($roles as $role)
              <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>  
@endsection