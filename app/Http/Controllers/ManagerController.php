<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Transaksi;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::all();
        return view('manager.menu.index', compact('menu'))
                ->with('i',(request()->input('page',1) - 1)*7);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.menu.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
     
        $store = Menu::create([
            'nama_menu' => $request->nama_menu,
            'harga' => $request->harga,
            'deskripsi'=> $request->deskripsi,
            'ketersediaan' => $request->ketersediaan
        ]);
        if($store){
            return redirect()->route('menu.index')
                    ->with('success','Berhasil nenden');
        }else{
            return back()->with('error','Gagal bre');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Menu= Menu::find($id);
        return view('manager.Menu.edit', compact('Menu'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data= Menu::find($id);
        
        $update= $data->update($request->all());
        if($update){
            return redirect()->route('menu.index')
                    ->with('success','Berhasil ngedit');
        }else{
            return back()->with('error','Gagal bre');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data= Menu::find($id);
        $delete= $data->delete();
        if($delete){
            return redirect()->route('menu.index')
                    ->with('berhasil','Berhasil hapus');
        }else{
            return back()->with('gagal','Gagal bre');
        }   
    }

    public function laporan(Request $request){
        $data = Transaksi::paginate(7);
        
        return view('manager.laporan.index', compact('data'));
        
    }
    public function cari(Request $request){
        $from = $request->from;
        $to = $request->to;
        $data = Transaksi::whereBetween('tanggal',array($from, $to))->paginate(10);

        return view('manager.laporan', compact('data'));
        
    }
}
