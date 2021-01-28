@extends('layouts.layout_guru')

@section('title')
    <title>PhyDiags | Education</title>
@endsection

@section('content')

<main class="main">

<div class="container">
    <div class="alert alert-success" role="alert">
        <h5 class="alert-heading mb-0"><strong>{{$ujian->kelas->nama_kelas}} </strong></h5>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-persoal" role="tabpanel" aria-labelledby="pills-persoal-tab">
                <div class="card">
                        <div class="card-header">
                            Daftar Hasil {{$ujian->nama_ujian}}
                        </div>
                        <div class="card-body">
                        @if($soal_satuan->count() != 0)
                        <div class="table-inside">
                            <table class="table table-striped table-bordered table-md">
                                <thead class="text-center bg-dark" style="color:white;">
                                    <tr>
                                        <th scope="col">Nomor Soal</th>
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
                                    @foreach ($soal_satuan as $item)
                                    <tr>
                                        <?php $i++; ?>
                                        <td scope="row" class="text-center">{{$i}}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-center">
                                        <a href="{{route('showHasilUjianPersoal',['id'=> $item->id, 'ujian_id' => $ujian->id,'nomor' => $i])}}"><button type="button" class="btn btn-info btn-sm" style="box-shadow: 3px 2px 5px grey;" ><i class="fa fa-eye"></i> Detail Hasil </button> </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                        @endif

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-persiswa" role="tabpanel" aria-labelledby="pills-persiswa-tab">
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
                                    @foreach ($peserta_ujian as $item)
                                    <tr>
                                        <td scope="row" class="text-center">{{$loop->iteration}}</td>
                                        <td >{{ $item->siswa->nama_lengkap}}</td>
                                        <td >@if ($item->status == 0) Belum dikerjakan @else Telah dikerjakan @endif</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-center">
                                        <a href="{{route('showHasilUjianPersiswa',$item->id)}}"><button type="button" class="btn btn-info btn-sm" style="box-shadow: 3px 2px 5px grey;" ><i class="fa fa-eye"></i> Detail Hasil </button> </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        @else
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong> Belum ada siswa yang mengikuti test ini!</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-permiskonsepsi" role="tabpanel" aria-labelledby="pills-permiskonsepsi-tab">
                <div class="card">
                        <div class="card-header">
                            Daftar Hasil {{$ujian->nama_ujian}}
                        </div>
                        <div class="card-body">
                        @if($miskonsepsi->count() != 0)

                            <div class="table-inside">
                                <table class="table table-striped table-bordered table-md">
                                    <thead class="text-center bg-dark" style="color:white;">
                                        <tr>
                                            <th scope="col" style="width:50px">Jenis Miskonsepsi</th>
                                            <th scope="col" style="width:150px">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($miskonsepsi as $item)
                                        <tr>
                                            <td scope="row" class="text-center">{{$item->jenis}}</td>
                                            <td class="text-center">
                                                <a href="{{route('detailMiskonsepsi',['id'=>$ujian->id,'miskonsepsi_id'=>$item->id])}}" class="btn btn-info btn-sm">Detail</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>



                        @else

                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong> Belum ada siswa yang mengikuti test ini!</strong>
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

        <div class="col-md-2">
            <div class="alert alert-success text-center" role="alert">
                <p class="mb-0"><strong>Hasil</strong> </p> <hr>
                <ul class="nav flex-column nav-pills mb-3 nav-justified" id="pills-tab" >
                    <li class="nav-item " role="presentation">
                        <a class="nav-link active " id="pills-persoal-tab" data-toggle="pill" href="#pills-persoal" role="tab" aria-controls="pills-persoal" aria-selected="true">Per Soal</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-persiswa-tab" data-toggle="pill" href="#pills-persiswa" role="tab" aria-controls="pills-persiswa" aria-selected="false">Per Siswa</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-permiskonsepsi-tab" data-toggle="pill" href="#pills-permiskonsepsi" role="tab" aria-controls="pills-permiskonsepsi" aria-selected="false">Per Miskonsepsi</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <div id="grafik_miskonsepsi">

    </div>
    <a href="{{route('showKelas',$ujian->kelas->id)}}"><button class="btn btn-warning" style="box-shadow: 3px 2px 5px grey;"><i class="fa fa-reply mr-1" ></i> Kembali</button></a>
    <a href="{{route('exportExcelHasil',$ujian->id)}}"><button class="btn btn-primary" style="box-shadow: 3px 2px 5px grey;"><i class="fa fa-download mr-1" ></i> Excel</button></a>
</div>
</main>

@endsection

@section('chart')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    var array_column = <?php echo $array_grafik_miskonsepsi; ?>;
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = new google.visualization.arrayToDataTable(array_column);
        var options = {
            chart: {
                title: '',
            }
            };
        var chart = new google.charts.Bar(document.getElementById('grafik_miskonsepsi'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }

</script>
@endsection
