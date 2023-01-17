@extends('layouts.app')

@section('name')
  <div>Albani Zaidan</div>
@endsection
@section('header')
  <div>Admin</div>
@endsection

@section('content')


<div class="containner-fluid">
    <div class="row">
              <div class="col-12">
                <a href="{{ route('admin.create')}}">Tambah data</a>
                @if ($message = Session::get('berhasil'))
                <div class="alert alert-success">
                <p>{{ $message }}</p>
                </div>
                @endif
                @if ($message = Session::get('gagal'))
                <div class="alert alert-danger">
                <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($user as $u)
                        <tr>
                          <td>{{ $u->name }}</td>
                          <td>{{ $u->user_name }}</td>
                          <td>{{ $u->email }}</td>
                          <td>{{ $u->role }}</td>
                          <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default">Action</button>
                                <button type="button" class="btn btn-default dropdown-toggle dropdown-icon"
                                    data-toggle="dropdown" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" role="menu" style="">
                                    <a class="dropdown-item"
                                        href="{{ route('admin.edit', $u->id) }}">Edit</a>
                                    <form action="{{ route('admin.destroy', $u->id) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
            </div>
   </div>
@endsection 