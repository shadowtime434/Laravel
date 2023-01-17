@extends('layouts.app')

@section('content')

    
    <div class="container-fluid">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Masukan pesanan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('kasir.store')}}" method="post">
                  @csrf
                <div class="card-body">
                 <div class="form-group">
                    <label for="name">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="name" placeholder="" name="nama_pelanggan">
                 </div>
                   
                        <div class="form-group">
                            <label for="menu">Nama Menu</label> 
                            
                            <select name="nama_menu" id="menu" class="form-control">
                              @foreach($data as $d)
                              @if($d->ketersediaan >0)
                              <option value="{{$d->nama_menu}}">{{$d->nama_menu}}</option>
                              @endif
                              @endforeach
                            </select> 
                           
                        </div>
                  <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" placeholder="" name="jumlah">
                  </div>
                  <div class="form-group">
                    <label for="nama_pegawai">Nama Pegawai</label>
                    <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai">
                  </div>
                  
                  
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
        </div>          
    </div>

@endsection 