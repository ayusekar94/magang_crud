<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function autentikasi(Request $request){
        //jika username ada
        $user = DB::table('users')->where('NIP', $request->NIP)->first();

        //jika password benar
        if($user){
            if(Hash::check($request->password,$user->password)){
                session([
                    'isLogin' => true,
                    'role' => $request->role,
                    'id' => $user->id,
                    'username' => $user->username,
                    'namaLengkap' => $user->namaLengkap,
                    'jenisKelamin' => $user->jenisKelamin
                    ]);
                // return redirect('/'.$request->role);
                return redirect('/dashboard');
            }
            //jika password salah
            return redirect('/')->with('error_password', 'Password Tidak Cocok');
        }
        
        //jika username tidak ada
        return redirect('/')->with('error_username', 'Username Tidak Ditemukan');
    }
}
