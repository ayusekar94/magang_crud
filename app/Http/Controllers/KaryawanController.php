<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Autentikasi.my-account', [
            'karyawan' => Karyawan::where('NIP', session('NIP'))->first(),
            'judul' => 'Edit Profile',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'NIP' => 'required',
            'nama' => 'required',
            'password' => 'required',
            'divisi' => 'required',
            'jabatan' => 'required',
            'departemen' => 'required'

        ]);

        Karyawan::create([
            'NIP' => $validated['NIP'],
            'nama' => $validated['nama'],
            'password' => $validated['password'],
            'divisi' => $validated['divisi'],
            'jabatan' => $validated['jabatan'],
            'departemen' => $validated['departemen']
        ]);

        return redirect('/karyawan');
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
        //
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
        $this->validate($request, [
            
        ]);

    	$karyawan = Karyawan::where('id', session('NIP'))->first();
    	$karyawan->NIP = $request->NIP;
        $karyawan->nama = $request->nama;
    	$karyawan->password = $request->password;
    	$karyawan->divisi = $request->divisi;
    	$karyawan->jabatan = $request->jabatan;
        $karyawan->departemen = $request->departemen;
    	
    	$karyawan->update();

        return redirect('/karyawan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Karyawan::destroy($id);

    	return redirect('/karyawan'); 
    }
}
