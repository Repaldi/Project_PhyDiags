@extends('layouts.layout_siswa')

@section('title')
    <title>PhyDiags | Education</title>
@endsection

@section('content')
<main class="main">
    <div class="container-fluid">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif


        <div class="alert alert-success" role="alert">
            <h5 class="alert-heading"><strong>{{$kelas->nama_kelas}}</strong> </h5>
            <p>{{$kelas->deskripsi}}</p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-header">Daftar Siswa</div>
                    <div class="card-body">
                        @if($anggotakelas->count() != 0)
                        <table class="table table-striped table-sm">
                            <thead class="thead-dark thead text-center" style="background-color:#393A3C; color:white; font-weight:bold">
                                <tr>
                                    <td width="40px">No</td>
                                    <td>Nama Siswa</td>
                                    <td width="30px"></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; ?>
                                @foreach ($anggotakelas as $item)
                                    <tr>
                                        <td class="text-center"><?php echo $i; $i++?></td>
                                        <td>{{$item->siswa->nama_lengkap}}</td>
                                        <td><a href=""><button class="btn btn-sm btn-info"><i class="fa fa-eye"></i></button></a> </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <div class="col-md-12">
                            <div class="alert alert-warning" role="alert">
                                Belum ada siswa yang mengikuti kelas ini
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card pt-3 pr-3 pl-3 pb-0">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item active" role="presentation">
                            <a class="nav-link" id="hasil-ujian-tab" data-toggle="tab" href="#hasil-ujian" role="tab" aria-controls="hasil-ujian" aria-selected="false">Hasil Ujian</a>
                        </li>
                    </ul>

                    <div class="tab-content mr-3 ml-3">   
                        <!-- hasil ujian  -->
                        <div class="tab-pane active" id="hasil-ujian" role="tabpanel" aria-labelledby="hasil-ujian-tab">
                            <div class="row table-inside">
                            @if($hasil_ujian->count() != 0)
                                <table class="table table-striped table-sm" >
                                    <thead class="thead text-center" style="background-color:#393A3C; color:white; font-weight:bold">
                                        <tr>
                                            <th scope="col" style="width:50px">No</th>
                                            <th scope="col" >Nama Ujian </th>
                                            <th scope="col" >Tanggal Ujian </th>
                                            <th scope="col" >Nilai Ujian </th>
                                            <th scope="col" >Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        @foreach ($hasil_ujian as $item)
                                        <tr>
                                            <td scope="row" class="text-center"><?php echo $i; $i++; ?></td>
                                            <?php $i++; ?>
                                            <td >{{$item->ujian->nama_ujian}}</td>
                                            <td class="text-center"> {{date("d-m-Y",strtotime($item->ujian->waktu_mulai))}} </td>
                                            <td class="text-center">  </td>
                                            <td class="text-center">
                                                <a href="{{route('hasilUjian',$item->id)}}">
                                                    <button type="button" class="btn btn-info btn-sm">
                                                        <i class="fa fa-eye fa-sm"></i> Detail
                                                    </button>
                                                </a>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                    <div class="row">
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong> Belum ada hasil ujian </strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    </div>
                                @endif
                                </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>



    </div>
</main>



<script>
  $(function () {
    $('#myTab li:first-child a').tab('show')
  })
  $("#start").hide();



</script>
@endsection


