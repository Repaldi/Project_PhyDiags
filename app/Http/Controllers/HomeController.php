<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\PesertaUjian;
use App\AnggotaKelas;
use App\Siswa;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 0){
            return view('home_admin');
        }elseif (Auth::user()->role == 1) {
            return view('home_guru');
        }else{
            if(Siswa::Where('user_id', auth()->user()->id)->count() != 0){
                
                $anggota_kelas_id = auth()->user()->siswa->anggota_kelas()->value('id');
               
                $peserta_ujian = PesertaUjian::where('anggota_kelas_id',$anggota_kelas_id)->get();
                //dd($peserta_ujian);
    
                return view('home_siswa',compact(['peserta_ujian']));
               
            }else{
                return view('home_siswa'); 

            }

           
        }

    }



}
