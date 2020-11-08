<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\PesertaUjian;
use App\AnggotaKelas;
use App\Siswa;
use App\Guru;
use App\Kelas;

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
            // return view('home_guru');
                if (Guru::where('user_id',auth()->user()->id)->count() != 0) {
                    //dd("oke");
                    $guru_id = Guru::where('id',auth()->user()->guru->id)->value('id');
                    $guru = Guru::find($guru_id);
                    if (Kelas::where('guru_id',$guru_id)->count() != 0) {
                        $kelas_guru = Kelas::where('guru_id',$guru_id)->get();
                        $siswaku = AnggotaKelas::whereIn('kelas_id',$kelas_guru)->count();
                        //dd($anggota_kelas);
                        return view('home_guru',compact(['kelas_guru','siswaku']));
                    }else{
                        return view('home_guru',compact(['guru']));
                    }
    
                }else{
                    return view('home_guru');
                }

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
