@extends('layouts.layout_guru')

@section('title')
    <title>PhyDiags | Education</title>
@endsection

@section('content')
<main class="main">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" >
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <strong style="font-size:18px"> Daftar Paket Soal </strong>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                @endif
                @if(session('pesan'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{session('pesan')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if($paket_soal->count() != 0)
                <div class="table-inside">
                    <table class="table table-striped table-bordered table-sm">
                        <thead class="text-center bg-dark" style="color:white;">
                            <tr>
                                <th scope="col" style="width:50px">No</th>
                                <th scope="col" >Nama Paket Soal </th>
                                <th scope="col" style="width:130px">Jumlah Soal </th>
                                <!-- <th scope="col" style="width:150px">Download </th> -->
                                <th scope="col" style="width:150px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; ?>
                            @foreach ($paket_soal as $item)
                            <tr>
                                <td scope="row" class="text-center"><?php   $i++;  echo $i; ?></td>
                                <?php $i++; ?>
                                <td >{{ $item->nama_paket_soal }}</td>

                                <td class="text-center">#</td>
                                <td class="text-center">
                                    <a href="{{route('soalSatuan',$item->id)}}"><button class="btn btn-warning">Detail Soal</button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$paket_soal->links()}}
                </div>
                @else
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong> Belum ada paket soal yang di buat. Silahkan buat paket soal baru!</strong>
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


@endsection
