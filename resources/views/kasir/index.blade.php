@extends('layouts.app')

@section('header')
  <div>Transaksi</div>
@endsection

@section('content')


<div class="containner-fluid">
    <div class="row">
              <div class="col-12">
                
                <div class="card-header">
                        <h3 class="card-title">Data</h3>

                        <div class="card-tools">
                        <a class=" btn-primary btn" href="{{ route('kasir.create')}}">Pesan</a>
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
                          <th>Nama Menu</th>
                          <th>Harga</th>
                          <th>Deskripsi</th>
                          <th>ketersediaan</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($data as $u)
                        <tr>
                        @if($u->ketersediaan > 0 )
                          <td>{{ $u->nama_menu }}</td>
                          <td>{{ $u->harga }}</td>
                          <td>{{ $u->deskripsi }}</td>
                    
                          <td>{{ $u->ketersediaan }}</td>
                        @endif
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