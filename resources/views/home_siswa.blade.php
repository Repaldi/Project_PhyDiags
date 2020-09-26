@extends('layouts.layout_siswa')

<?php  
use App\Siswa;
    $siswa = Siswa::where('user_id', Auth::user()->id )->first();
   
?>
@section('title')
    <title>PhyDiags | Education</title>
@endsection

@section('content')

<main class="main">
    
<index-component></index-component>
    <div class="container-fluid">
      <div class="card bg-heavy-rain " >
        <div class="card-body" >
         <div class="media">
            @if( $siswa != null )
                <img style="width: 150px; display: block;  margin: auto;" src="/images/{{$siswa->foto}}" alt="">
           
            <div class="media-body ml-4">
                <h5 class="mt-0 text-uppercase font-weight-bold">Selamat Datang : {{auth()->user()->name}} </h5>
               
                 <table width="80%" style="font-size:16px; ">
                    
                    <tr>
                        <td width="30%">Nomor Induk</td>
                        <td>:</td>
                        <td>{{auth()->user()->siswa->nomor_induk}}</td>
                    </tr>
                    <tr>
                        <td width="30%">Nama</td>
                        <td>:</td>
                        <td class="text-uppercase font-weight-bold">{{auth()->user()->siswa->nama_lengkap}}</td>
                    </tr>
                    <tr>
                        <td width="30%">Jenis Kelamin</td>
                        <td>:</td>
                        <td>{{auth()->user()->siswa->jk}}</td>
                    </tr>
                    <tr>
                        <td width="30%">Email</td>
                        <td>:</td>
                        <td>{{auth()->user()->email}}</td>
                    </tr>
                 
                    </tbody>
                </table>
                @else
                <img style="width: 150px; height: 150px; display: block;  margin: auto;" src="assets/images/1.png" alt="">
           
                <div class="media-body ml-4">
                <h5 class="mt-0 text-uppercase font-weight-bold">Selamat Datang : {{auth()->user()->name}} </h5>
                <table width="80%" style="font-size:16px; ">
                    
                    <tr>
                        <td width="30%">Nomor Induk</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="30%">Nama</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="30%">Jenis Kelamin</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="30%">Email</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                 
                    </tbody>
                </table>

                @endif
            </div>
            
        </div>
          
  </div>
</div>
@if($siswa != null)
                            

@else
                    <div class="row">
                            <div class="col-md-12 ">
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Silahkan Lengkapi Profil Anda!</strong> Klik pada bagian profil
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div>
                        </div>
                       


@endif
</div>
  </main>

@endsection
