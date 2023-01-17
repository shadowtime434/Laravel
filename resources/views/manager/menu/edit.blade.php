@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('menu.update', $Menu->id) }}" method="post">
                  @csrf
                  @method('PUT')
                <div class="card-body">
                 <div class="form-group">
                    <label for="Nama_menu">Nama</label>
                    <input type="text" class="form-control" id="Nama_menu" value="{{$Menu->nama_menu}}" name="nama_menu">
                  </div>
                  <div class="form-group">
                    <label for="harga">harga</label>
                    <input type="text" class="form-control" id="harga" value="{{$Menu->harga}}" name="harga">
                  </div> 
                  <div class="form-group">
                    <label for="deskripsi">deskripsi</label>
                    <input type="text" class="form-control" id="deskripsi" value="{{$Menu->deskripsi}}" name="deskripsi">
                  </div> 
                  <div class="form-group">
                    <label for="ketersediaan">ketersediaan</label>
                    <input type="text" class="form-control" id="ketersediaan" value="{{$Menu->ketersediaan}}" name="ketersediaan">
                  </div>                  
                  
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
        </div>          
    </div>

@endsection 