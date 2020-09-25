@extends('layouts.layout_siswa')


@section('title')
    <title>Unbreakable</title>
@endsection

@section('content')

<main class="main">
    
    <index-component></index-component>
    <div class="container-fluid">
      <div class="card bg-heavy-rain " >
        <div class="card-body" >
         <div class="media">
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
                        <td width="30%">Instansi</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="30%">Alamat</td>
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

             
            </div>
            
        </div>
          
  </div>
</div>
</div>

<?php
    
    use App\Siswa;
    $siswa = Siswa::where('user_id',auth()->user()->id)->first();

?>

@if( $siswa == null)
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
@endif
<div class="card">
    <div class="card-header"  style="border-radius:20px 20px 0px 0px; ">
        <strong style="font-size:18px;">Ujian yang akan dikerjakan</strong>
    </div>
    <div class="card-body">
        <div class="table-inside">
            <table class="table table-striped table-bordered table-sm">
                <thead class="thead-dark text-center">
                    <tr>
                        <th scope="col" style="width:50px">No</th>
                        <th scope="col" >Nama Ujian </th>
                        <th scope="col" >Keterangan </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; ?>
                    @foreach ($peserta_ujian as $item)
                    <tr>
                        <td scope="row" class="text-center"><?php  $i++;  echo $i; ?></td>
                        <td >{{$item->ujian->nama_ujian}}</td>
                        @if($item->ujian->status == 0)
                        <td class="text-center"><a href="">
                              <button type="button" class="btn btn-warning btn-sm" disabled="true">
                                    <i class="fa fa-edit fa-sm"></i> Belum Dimulai
                                </button> </a>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
                       



  </main>

@endsection
