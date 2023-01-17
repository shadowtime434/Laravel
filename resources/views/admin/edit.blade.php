@extends('layouts.app')

@section('content')
    <div class="">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('admin.update', $User->id) }}" method="post">
                  @csrf
                  @method('PUT')
                <div class="card-body">
                 <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" value="{{$User->name}}" name="name">
                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" value="{{$User->user_name}}" name="user_name">
                  </div>
                  <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control">
                      <option >PILIH ROLE!</option>
                      <option value="admin">Admin</option>
                      <option value="manager">Manager</option>
                      <option value="kasir">Kasir</option>
                    </select>
                  </div>
                  
                  
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
        </div>          
    </div>

@endsection 