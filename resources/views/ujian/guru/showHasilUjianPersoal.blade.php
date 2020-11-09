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
                <h5 class="alert-heading mb-0"><strong>{{$ujian->kelas->nama_kelas}} </strong></h5>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Hasil Test Soal No... </div>
                <div class="card-body">
                    <div class="table-inside">
                        <table class="table table-striped table-bordered table-md">
                            <thead class="text-center bg-dark" style="color:white;">
                                <tr>
                                    <th scope="col" width="40px">No.</th>
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
                                    <td>@if($item->jawaban_tk1->jawaban == $item->jawaban_tk1->soal_tk1->kunci) 1 @else 0 @endif</td>
                                    <td>@if($item->jawaban_tk2->jawaban == $item->jawaban_tk2->soal_tk2->kunci) 1 @else 0 @endif</td>
                                    <td>@if($item->jawaban_tk3->jawaban == $item->jawaban_tk3->soal_tk3->kunci) 1 @else 0 @endif</td>
                                    <td>@if($item->jawaban_tk4->jawaban == $item->jawaban_tk4->soal_tk4->kunci) 1 @else 0 @endif</td>
                                    <td>{{$item->hasil}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                   
                </div>
            </div>   
            
            <div class="row">
                <div class="col-md-5">
                    <div class="alert alert-success" role="alert">
                        <h5 class="alert-heading"><strong>Indikator Soal</strong></h5>
                        <p>{{$soal_satuan->indikator}}</p>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="alert alert-success" role="alert">
                        <h5 class="alert-heading"><strong>Akumulasi Hasil</strong></h5>
                        <table class="table table-sm table-hover">
                            <tr><td><li>Scientific Conception (SC) </li></td><td>:</td><td> {{$sc}} siswa </td></tr>
                            <tr><td><li>False Positive (FP) </li></td><td>:</td><td> {{$fp}} siswa </td></tr>
                            <tr><td><li>Lack of Knowledge (LK)</li></td><td>:</td><td> {{$lk}} siswa </td></tr>
                            <tr><td><li>False Negative (FN) </li></td><td>:</td><td> {{$fn}} siswa </td></tr>
                            <tr><td><li>Misconception (MSC) </li></td><td>:</td><td> {{$msc}} siswa </td></tr>
                        </table>
                        <hr>
                        <p class="mb-0"><strong> Keterangan :</strong> 1 = Benar (T) --- 0 = Salah (F)</p>
                    </div>
                </div>
            </div>
            
        
            <a href="{{route('showUjian',$ujian->id)}}"><button class="btn btn-warning" style="box-shadow: 3px 2px 5px grey;"><i class="fa fa-reply mr-1" ></i> Kembali</button></a>       
        </div>

        <div class="col-md-4">
            <div class="card justify-content-center">
                <div class="card-header">Grafik Hasil Test Soal No... </div>
                <div class="card-body mr-3 ml-3">
                    <div id="columnchart" style="height: 200px;"></div>
                    <div id="piechart" style="height: 200px;"></div>
                </div>
            </div>      
        </div>

    </div> <br>
  
</div>
</main>
@endsection

@section('chart')
<!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
    var array_column = <?php echo $array_column; ?>;
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = new google.visualization.arrayToDataTable(array_column);    
        var options = {
            chart: {
                title: '',      
            }
            };
        var chart = new google.charts.Bar(document.getElementById('columnchart'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }

</script>

<script type="text/javascript">
    var array_pie = <?php echo $array_pie; ?>;
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = new google.visualization.arrayToDataTable(array_pie);    
        var options = {
          title: '',
          is3D: true,
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>
@endsection