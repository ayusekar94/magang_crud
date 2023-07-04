<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kegiatan;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.obat',[
            'item' => DB::table('kegiatans')->paginate(10),
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
        $validatedData=$request->validate([
            'nama' => 'required',
            'tgl' => 'required|min:10',
            'kegiatan' => 'required',
        ]);
        Kegiatan::create($validatedData); //untuk menyimpan data
        
        // toast('Registration has been successful','success');
        return redirect()->intended('');
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
        return view('',[
            'title' => 'User - Edit Obat',
            'item' => Kegiatan::find($id),
        ]);
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
            'nama' => 'required',
            'tgl' => 'required',
            'kegiatan' => 'required',
        ]);

        // Menyimpan update
    	$user = Kegiatan::find($id);
    	$user->nama = $validatedData['nama'];
        $user->tgl = $validatedData['tgl'];
        $user->kegiatan = $validatedData['kegiatan'];
    	$user->save();
    	
        // toast('Your data has been saved!','success');
    	return redirect(''); // untuk diarahkan kemana
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

    	return redirect("/obat"); 
    }
}