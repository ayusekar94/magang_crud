<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

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
            'image' => 'required|image|mimes:png,jpg|max:2040'
        ]);

        //upload image 
        $image = $request->image; 
        $slug = ($image->getClientOriginalName());
        $new_image = time() .'_'. $slug.'.' . $image->getClientOriginalExtension();
        $image->move('uploads/kegiatan/' ,$new_image);
        // dd($request->image);
        $validatedData['image'] = 'uploads/kegiatan/'.$new_image;
        Kegiatan::create($validatedData); //untuk menyimpan data
        // $kegiatan = new Kegiatan();
        // $kegiatan->image = 'uploads/kegiatan/'.$new_image;
        // $kegiatan->name= $request->name;
        // $kegiatan->tgl= $request->tgl;
        // $kegiatan->kegiatan= $request->kegiatan;
        // $kegiatan->karyawan_nip= $request->karyawan_nip;
        // $kegiatan->save();
        
        // toast('Registration has been successful','success');
        return redirect('/kegiatan');
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
            'name-edit' => 'required',
            'tgl-edit' => 'required',
            'kegiatan-edit' => 'required',
            'karyawan_nip-edit' => 'required',
        ]);

        $kegiatans= Kegiatan::find($id);

        if($request->hasFile('image-edit')){
            $request->validate([
                'image-edit' => 'required|image|mimes:png,jpg|max:2040'
            ]);

            // Detele gbr lama
            if(File::exists($kegiatans->image)) {
                File::delete($kegiatans->image);
            }
        
            $image = $request->file('image-edit');
            $slug = Str::slug($image->getClientOriginalName());
            $new_image = time() .'_'. $slug.'.' . $image->getClientOriginalExtension();;
            $image->move('uploads/kegiatan/', $new_image);
            $kegiatans->image = 'uploads/kegiatan/'.$new_image;
            // dd($kegiatan->image);
        }

        
        $kegiatans->name= $validatedData['name-edit'];
        $kegiatans->tgl= $validatedData['tgl-edit'];
        $kegiatans->kegiatan= $validatedData['kegiatan-edit'];
        $kegiatans->karyawan_nip= $validatedData['karyawan_nip-edit'];
        $kegiatans->save();
    	
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
        $kegiatans= Kegiatan::find($id);
        $image_path =$kegiatans->image;  // Value is not URL but directory file paths
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        Kegiatan::destroy($id);

    	return redirect('/kegiatan');
    }
}
