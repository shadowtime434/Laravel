<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('admin.index', compact('user'))
                ->with('i',(request()->input('page',1) - 1)*7);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'user_name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'role'=>'required',
        ]);
        $request['password'] = bcrypt($request['password']);
        $store = User::create([
            'name' => $request->name,
            'user_name' => $request->user_name,
            'email'=> $request->email,
            'password' => $request->password,
            'role' => $request->role,
            
        ]);
        if($store){
            return redirect()->route('admin.index')
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
        $User= User::find($id);
        return view('admin.edit', compact('User'));

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
        $data= User::find($id);
        
        $update= $data->update($request->all());
        if($update){
            return redirect()->route('admin.index')
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
        return $id;
        $data= User::find($id);
        $delete= $data->delete();
        if($delete){
            return redirect()->route('admin.index')
                    ->with('berhasil','Berhasil hapus');
        }else{
            return back()->with('gagal','Gagal bre');
        }
    }
}