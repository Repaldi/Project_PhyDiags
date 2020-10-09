@extends('layouts.layout_guru')

@section('title')
    <title>Unbreakable</title>
@endsection

@section('content')

<main class="main">

<div class="container">
    <div class="alert alert-success" role="alert">
        <h5 class="alert-heading mb-0"><strong>{{$ujian->kelas->nama_kelas}} </strong></h5>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Daftar Hasil {{$ujian->nama_ujian}}
                </div>
                <div class="card-body">
                @if($peserta_ujian->count() != 0)
                <div class="table-inside">
                    <table class="table table-striped table-bordered table-md">
                        <thead class="text-center bg-dark" style="color:white;">
                            <tr>
                                <th scope="col" style="width:50px">No</th>
                                <th scope="col" >Nama Siswa </th>
                                <th scope="col" >Status</th>
                                <th>SC</th>
                                <th>FP</th>
                                <th>LK</th>
                                <th>FN</th>
                                <th>MSC</th>
                                <th scope="col" style="width:150px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; ?>
                            @foreach ($peserta_ujian as $item)
                            <tr>
                                <td scope="row" class="text-center"><?php   $i++;  echo $i; ?></td>
                                <?php $i++; ?>
                                <td >{{ $item->siswa->nama_lengkap}}</td>
                                <td >@if ($item->status == 0) Belum dikerjakan @else Telah dikerjakan @endif</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-center">
                                <a href="{{route('showHasilUjian',$item->id)}}"><button type="button" class="btn btn-info btn-sm" style="box-shadow: 3px 2px 5px grey;" ><i class="fa fa-eye"></i> Detail Hasil </button> </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$peserta_ujian->links()}}
                </div>
                @else
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong> Belum ada siswa yang mengikuti ujian ini!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="alert alert-success" role="alert">
                <p class="mb-0"></p>
            </div>
        </div>
    </div>
    <a href="{{route('showKelas',$ujian->kelas->id)}}"><button class="btn btn-warning" style="box-shadow: 3px 2px 5px grey;"><i class="fa fa-reply mr-1" ></i> Kembali</button></a>
    <a href="{{route('exportExcelHasil',$ujian->id)}}"><button class="btn btn-primary" style="box-shadow: 3px 2px 5px grey;"><i class="fa fa-download mr-1" ></i> Excel</button></a>

</div>
</main>

@endsection
