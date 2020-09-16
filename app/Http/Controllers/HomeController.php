<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Guru;
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
            return view('home_siswa');
        }

    }
    
}
