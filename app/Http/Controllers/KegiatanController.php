<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Auth;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('login');
    }

    public function index()
    {

    	return view('pages.kegiatan', [
            'kegiatan' => Kegiatan::with('karyawan')->get(),
            'judul' => 'Halaman Kegiatan',
            'menu' => 'Kegiatan',
            'sub_menu' => 'Daftar kegiatan'
            // 'kegiatan' => 'aaa'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData=$request->validate([
            'name' => 'required',
            'tgl' => 'required',
            'kegiatan' => 'required',
            'karyawan_nip' => 'required',
        ]);
        Kegiatan::create($validatedData); //untuk menyimpan data
        
        // toast('Registration has been successful','success');
        return redirect()->intended('/kegiatan');
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
        // return view('',[
        //     'item' => Kegiatan::find($id),
        // ]);
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
        $validatedData=$request->validate([
            'name' => 'required',
            'tgl' => 'required',
            'kegiatan' => 'required',
            'karyawan_nip' => 'required',
        ]);

        // Menyimpan update
    	$user = Kegiatan::find($id);
    	$user->name = $validatedData['name'];
        $user->tgl = $validatedData['tgl'];
        $user->kegiatan = $validatedData['kegiatan'];
    	$user->save();
    	
        // toast('Your data has been saved!','success');
    	return redirect('/kegiatan'); // untuk diarahkan kemana
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kegiatan::destroy($id);

    	return redirect('/kegiatan'); 
    }
}
