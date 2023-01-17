@extends('layouts.app')

@section('content')

    
    <div class="container-fluid">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('menu.store')}}" method="post">
                  @csrf
                <div class="card-body">
                 <div class="form-group">
                    <label for="name_menu">Nama Menu</label>
                    <input type="text" class="form-control" id="nama_menu" placeholder="" name="nama_menu">
                  </div>
                  <div class="form-group">
                    <label for="Harga">Harga</label>
                    <input type="text" class="form-control" id="Harga" placeholder="" name="harga">
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">deskripsi</label>
                    <input type="deskripsi" class="form-control" id="deskripsi" placeholder="" name="deskripsi">
                  </div>
                  <div class="form-group">
                    <label for="ketersediaan">ketersediaan</label>
                    <input type="ketersediaan" class="form-control" id="ketersediaan" name="ketersediaan">
                  </div>
                  
                  
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
        </div>          
    </div>

@endsection 