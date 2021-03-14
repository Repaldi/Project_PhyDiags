@extends('layouts.layout_guru')

@section('title')
    <title>PhyDiags | Education</title>
@endsection

@section('content')

<main class="main">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">
                <h5 class="alert-heading mb-0"><strong>{{$miskonsepsi->jenis}} ({{$miskonsepsi->deskripsi}})</strong></h5>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Jawaban Miskonsepsi {{$miskonsepsi->jenis}} </div>
                <div class="card-body">
                    <div class="table-inside">
                        <table class="table table-striped table-bordered table-md">
                            <thead class="text-center bg-dark" style="color:white;">
                                <tr>
                                    <th scope="col" width="40px">#</th>
                                    <th scope="col">Nama Siswa</th>
                                    <th>Tier 1</th>
                                    <th>Tier 2</th>
                                    <th>Tier 3</th>
                                    <th>Tier 4</th>
                                    <th width="50px">Kode</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php $i = 0; ?>
                            @foreach ($hasil_ujian as $item)
                                <tr>
                                    <td scope="row" class="text-center"><?php   $i++;  echo $i; ?></td>
                                    <td scope="row" class="text-center">{{$item->peserta_ujian->siswa->nama_lengkap}}</td>
                                    <td>{{$item->jawaban_tk1->jawaban}}</td>
                                    <td>{{$item->jawaban_tk2->jawaban}}</td>
                                    <td>{{$item->jawaban_tk3->jawaban}}</td>
                                    <td>{{$item->jawaban_tk4->jawaban}}</td>
                                    <td>{{$item->hasil}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            <div class="row">

            </div>


            <a href="{{route('showUjian',$ujian_id)}}"><button class="btn btn-warning" style="box-shadow: 3px 2px 5px grey;"><i class="fa fa-reply mr-1" ></i> Kembali</button></a>
        </div>

        {{-- <div class="col-md-4">
            <div class="card justify-content-center">
                <div class="card-header">Grafik Hasil Test Soal No... </div>
                <div class="card-body mr-3 ml-3">
                    <div id="columnchart" style="height: 200px;"></div>
                    <div id="piechart" style="height: 200px;"></div>
                </div>
            </div>
        </div> --}}

    </div> <br>

</div>
</main>
@endsection

@section('chart')
<!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">


</script>

<script type="text/javascript">

</script>
@endsection
