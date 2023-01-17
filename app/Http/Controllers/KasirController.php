<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Transaksi;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Menu::all();
        return view('kasir.index', compact('data'))
                ->with('i',(request()->input('page',1) - 1)*7);
            

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data  = Menu::all();
        return view('kasir.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now',new DateTimeZone($timezone));
        $tanggal = $date->format('y-m-d');

        $menu = Menu::whereNamaMenu($request->nama_menu)->first();
        $request->validate([
            'nama_pelanggan'=> 'required',
            'nama_menu'=> 'required',
            'jumlah'=> 'required',
            'nama_pegawai'=> 'required',
        ]);
        if($menu->ketersediaan < $request->jumlah){
            return back()->with('Kureng','Maaf '.$request->nama_menu.' beak');
        }else{
        Transaksi::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'nama_menu' => $request->nama_menu,
            'jumlah' => $request->jumlah,
            'total_harga' => $request->jumlah * $menu->harga,
            'nama_pegawai' => $request->nama_pegawai,
            'tanggal'=> $tanggal,
        ]);
        $menu->update([
            'ketersediaan' => $menu->ketersediaan - $request->jumlah,
        ]);

        return redirect()->route('kasir.index')
                    ->with('success','Berhasil');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(transaksi $transaksi)
    {
        //
    }
}
