@extends('layouts.layout_guru')

@section('title')
    <title>Unbreakable</title>
@endsection

@section('content')

<main class="main">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong style="font-size: 18px;">Daftar Riwayat Ujian</strong>
                </div>
                <div class="card-body">
                @if($ujian->count() != 0)
                <div class="table-inside">
                    <table class="table table-striped table-bordered table-md">
                        <thead class="text-center bg-dark" style="color:white;">
                            <tr>
                                <th scope="col" style="width:50px">No</th>
                                <th scope="col" >Nama Ujian </th>
                                <th scope="col" >Kelas </th>
                                <th scope="col" >Paket Soal </th>
                                <th scope="col" style="width:180px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; ?>
                            @foreach ($ujian as $item)
                            <tr>
                                <td scope="row" class="text-center"><?php   $i++;  echo $i; ?></td>
                                <?php $i++; ?>
                                <td >{{ $item->nama_ujian}}</td>
                                <td class="text-center">{{ $item->kelas->nama_kelas}}</td>
                                <td class="text-center">{{ $item->paket_soal->nama_paket_soal}}</td>
                                <td class="text-center">
                                    <a href="{{route('showUjian',$item->id)}}"><button class="btn btn-warning btn-sm" style="box-shadow: 3px 2px 5px grey;"><i class="fa fa-eye"></i>  Detail</button></a>
                                    <a href="{{route('deleteUjian',$item->id)}}"><button class="btn btn-danger btn-sm" style="box-shadow: 3px 2px 5px grey;"> <i class="fa fa-trash"></i> Hapus</button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$ujian->links()}}
                </div>
                @else
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong> Belum ada ujian yang di buat. Silahkan buat ujian baru!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                </div>
            </div>
        </div>
    </div>
</div>
</main>

@endsection