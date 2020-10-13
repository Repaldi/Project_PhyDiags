<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    // KELOLA AKUN GURU
    public function createGuru()
    {
        return view('admin.create_guru');
    }

    public function storeGuru(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        $guru = User::where('role',1)->get();
        return redirect()->route('userguruData', compact('guru'));
    }
    public function dataGuru()
    {
        $guru = User::where('role',1)->get();
        $pass = User::where('role',1)->value('password');
        $decrypt= Hash::decrypt('pass');   
        return view('admin.data_guru', compact('guru'));
    }



    // KELOLA AKUN SISWA
    public function createSiswa()
    {
        return view('admin.create_siswa');
    }
    public function storeSiswa(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);
        $siswa = User::where('role',2)->get();
        return redirect()->route('usersiswaData', compact('siswa'));
    }
    public function dataSiswa()
    {
        $siswa = User::where('role',2)->get();
        return view('admin.data_siswa', compact('siswa'));
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function logout()
    {
      auth()->logout();

      return redirect()->route('login')->with('alert','Anda tidak boleh memasuki halaman tersebut');//->route('login')
    }
}
