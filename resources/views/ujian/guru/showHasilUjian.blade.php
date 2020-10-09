@extends('layouts.layout_guru')

@section('title')
    <title>PhyDiags</title>
@endsection

@section('content')

<main class="main">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">
                <h5 class="alert-heading mb-0"><strong>{{$peserta_ujian->ujian->kelas->nama_kelas}} </strong></h5>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Hasil Ujian {{$peserta_ujian->siswa->nama_lengkap}}</div>
                <div class="card-body">
                    <div class="table-inside">
                        <table class="table table-striped table-bordered table-md">
                            <thead class="text-center bg-dark" style="color:white;">
                                <tr>
                                    <th scope="col" width="80px">No. Soal</th>
                                    <th>Tier 1</th>
                                    <th>Tier 2</th>
                                    <th>Tier 3</th>
                                    <th>Tier 4</th>
                                    <th width="50px">Kode</th>
                                    <th>Keterangan Hasil</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php $i = 0; ?>
                                @foreach ($hasil_ujian as $item)
                                <tr>
                                    <td scope="row" class="text-center"><?php   $i++;  echo $i; ?></td>
                                    <td>@if($item->jawaban_tk1->jawaban == $item->jawaban_tk1->soal_tk1->kunci) 1 @else 0 @endif</td>
                                    <td>@if($item->jawaban_tk2->jawaban == $item->jawaban_tk2->soal_tk2->kunci) 1 @else 0 @endif</td>
                                    <td>@if($item->jawaban_tk3->jawaban == $item->jawaban_tk3->soal_tk3->kunci) 1 @else 0 @endif</td>
                                    <td>@if($item->jawaban_tk4->jawaban == $item->jawaban_tk4->soal_tk4->kunci) 1 @else 0 @endif</td>
                                    <td>{{$item->hasil}}</td>
                                    <td>{{$item->keterangan}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$hasil_ujian->links()}}
                </div>
            </div>
            <a href="{{route('showUjian',$peserta_ujian->ujian->id)}}"><button class="btn btn-warning" style="box-shadow: 3px 2px 5px grey;"><i class="fa fa-reply mr-1" ></i> Kembali</button></a>

        </div>

        <div class="col-md-4">
            <div class="alert alert-success" role="alert">
                <h5 class="alert-heading"><strong>Akumulasi Hasil</strong></h5>
                <table class="table table-sm table-hover">
                    <tr><td><li>Scientific Conception (SC) </li></td><td>:</td><td> - </td></tr>
                    <tr><td><li>False Positive (FP) </li></td><td>:</td><td> - </td></tr>
                    <tr><td><li>Lack of Knowledge (LK)</li></td><td>:</td><td> - </td></tr>
                    <tr><td><li>False Negative (FN) </li></td><td>:</td><td> - </td></tr>
                    <tr><td><li>Misconception (MSC) </li></td><td>:</td><td> - </td></tr>
                </table>
                <hr>
                <p class="mb-0"><strong> Keterangan :</strong> 1 = Benar (T) --- 0 = Salah (F)</p>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
