@extends('layouts.layout_guru')

@section('title')
    <title>PhyDiags | Education</title>
@endsection
<?php  use App\Guru;
    $guru = Guru::where('user_id', Auth::user()->id )->first();
?>

@section('content')


<main class="main">
  
    
<div class="container-fluid"> 
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading"><b>Selamat Datang, {{auth()->user()->name}} !</b></h4>
        <p>Selamat datang di aplikasi PhyDiags (Physics Diagnostic).  <br>
        PhyDiags merupakan aplikasi yang digunakan untuk mengembangkan tes diagnostik dalam bentuk four-tier yang berguna dalam mengidentifikasi profil konsepsi siswa sma pada materi Fluida Statis. Mengidentifikasi profil konsepsi siswa tentang Fluida Statis penting dilakukan untuk mendukung siswa dalam proses pembelajaran di dalam kelas, agar nantinya guru dapat memberikan treatment dalam proses pembelajaran kepada siswa yang berbeda dengan hasil yang telah di peroleh dari website ini.
        </p>
         <hr>
        
        <p class="mb-0">Anda telah mendaftar sebagai <b>GURU</b> </p>
    </div>
    @if(auth()->user()->profil != null)
        <div class="row">
            <div class="col-md-12 ">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Silahkan Lengkapi Profil Anda!</strong> Klik pada bagian profil
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            </div>
        </div>
    @else
    @endif
        <div class="divider mt-0" style="margin-bottom: 10px;">&nbsp;</div>
            <div class="row">
                <div class="col-lg-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-heavy-rain">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="widget-heading">Jumlah Kelas</div>
                                <div class="widget-subheading">Jumlah kelas yang di ajar</div>
                            </div>
                            <div class="widget-content-right">
                            @if(auth()->user()->guru != null)
                                <div class="widget-numbers "><span>{{auth()->user()->guru->jumlah_kelas()}}</span></div>
                            @else
                                <div class="widget-numbers "><span>0</span></div>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-heavy-rain ">
                        <div class="widget-content-wrapper ">
                            <div class="widget-content-left">
                                <div class="widget-heading">Jumlah Siswa</div>
                                <div class="widget-subheading">Total siswa yang di ajar</div>
                            </div>
                            <!-- jumlah siswa masih salah -->
                            <div class="widget-content-right">
                            @if(auth()->user()->guru != null)
                                <div class="widget-numbers "><span>{{$siswaku}}</span></div>
                            @else
                                <div class="widget-numbers "><span>0</span></div>
                            @endif
                            </div>
                            <!-- jumlah siswa masih salah -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-heavy-rain ">
                        <div class="widget-content-wrapper ">
                            <div class="widget-content-left">
                                <div class="widget-heading">Jumlah Test</div>
                                <div class="widget-subheading">Total test yang di buat</div>
                            </div>
                            <div class="widget-content-right">
                            @if(auth()->user()->guru != null)
                                <div class="widget-numbers "><span>{{auth()->user()->guru->jumlah_ujian()}}</span></div>
                            @else
                                <div class="widget-numbers "><span>0</span></div>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
  
</div>

</main>

@endsection