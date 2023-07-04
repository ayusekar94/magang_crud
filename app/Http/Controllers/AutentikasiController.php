<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Karyawan;

class AutentikasiController extends Controller
{
    // Buka Halaman Login
    public function index(){
        return view('Autentikasi.login',[
            'title' => 'Halaman Login'
        ]);
    }

    // Buka Halaman Register
    public function create(){
        return view('Autentikasi.register',[
            'title' => 'Halaman Register'
        ]);
    }

    // Auth
    public function store(Request $request){
        $validatedData=$request->validate([
            'NIP' => 'required',
            'password' => 'required'
        ]);

        //jika username ada
        $user = DB::table('karyawans')->where('NIP', $request->NIP)->first();

        //jika password benar
        if($user){
            if(Hash::check($request->password,$user->password)){
                session([
                    'isLogin' => true,
                    'NIP' => $user->NIP,
                    'nama' => $user->nama,
                    'divisi' => $user->divisi
                    ]);
                // return redirect('/'.$request->role);
                return redirect('/dashboard');
            }
            //jika password salah
            return redirect('/b')->with('error_password', 'Password Tidak Cocok');
        }
        
        //jika username tidak ada
        return redirect('/a')->with('error_username', 'Username Tidak Ditemukan');
    }

    public function register(Request $request){
        $validatedData=$request->validate([
            'NIP' => 'required',
            'nama' => 'required|min:5',
            'password' => 'required|min:5|confirmed',
            'divisi' => 'required'
        ]);
        $validatedData['password']=bcrypt($validatedData['password']);

        Karyawan::create($validatedData); //untuk menyimpan data

        // toast('Registration has been successful','success');
        return redirect()->intended('/sukses');
    }

    // Logout
    public function logout(){
        session()->flush();
        return redirect('/');
    }
}
