@extends('layouts.app')

@section('header')
  <div>Laporan</div>
@endsection

@section('content')


<div class="containner-fluid">
    <div class="row">
              <div class="col-12">
                
                <div class="card-header">
                        <h3 class="card-title">Data</h3>
                </div> 
                    
                <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                      <thead>
                        <tr>
                          <th>Nama Pelanggan</th>
                          <th>Menu</th>
                          <th>jumlah</th>
                          <th>Total</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($data as $u)
                        <tr>
                          <td>{{ $u->nama_pelanggan }}</td>
                          <td>{{ $u->nama_menu }}</td>
                          <td>{{ $u->jumlah }}</td>
                          <td>{{ $u->total_harga}}</td>
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