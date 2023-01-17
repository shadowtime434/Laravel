@extends('layouts.app')

@section('header')
  <div>Menu</div>
@endsection

@section('content')


<div class="containner-fluid">
    <div class="row">
              <div class="col-12">
                
                <div class="card-header">
                        <h3 class="card-title">Data</h3>

                        <div class="card-tools">
                        <a class="bt btn-primary btn-sm" href="{{ route('menu.create')}}">Tambah data</a>
                        </div>
                    </div> 
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
                          <th>Harga</th>
                          <th>Deskripsi</th>
                          <th>ketersediaan</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($menu as $u)
                        <tr>
                          <td>{{ $u->nama_menu }}</td>
                          <td>{{ $u->harga }}</td>
                          <td>{{ $u->deskripsi }}</td>
                          <td>{{ $u->ketersediaan }}</td>
                          <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default">Action</button>
                                <button type="button" class="btn btn-default dropdown-toggle dropdown-icon"
                                    data-toggle="dropdown" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" role="menu" style="">
                                    <a class="dropdown-item"
                                        href="{{ route('menu.edit', $u->id) }}">Edit</a>

                                    <form action="{{ route('menu.destroy', $u->id) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>      
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