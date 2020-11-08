@extends('layouts.layout_guru')

@section('title')
    <title>Unbreakable</title>
@endsection

@section('content')
<main class="main">


    <div class="container-fluid">

        <div class="alert alert-success " role="alert">
            <div class="row">
                <div class="col-md-9">
                    <h5 class="alert-heading"><strong>{{$kelas->nama_kelas}}</strong> </h5> <hr class="mb-1 mt-3"> 
                    <p><strong>Deskripsi Kelas :</strong> {{$kelas->deskripsi}} </p>
                </div>
                <div class="col-md-3">
                    <div class="col-sm-12 offset-md-0">
                        <strong>Kode Akses Kelas :</strong>
                        <div class="input-group mb-3 mt-1">
                            <input type="text" class="form-control" value="{{$kelas->kode_kelas}}" id="kode_kelas" style="background:#f0f5c1" readonly />
                            <div class="input-group-append">
                            <button type="button" class="btn btn-warning" onclick="copy_text()">Salin</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col-md-4">
                <div class="card"  style="box-shadow: 2px 2px 10px rgba(48, 10, 64, 0.5);" >
                    <div class="card-header" >Daftar Siswa</div>
                    <div class="card-body">
                        @if($anggotakelas->count() != 0)
                        <table class="table table-sm table-striped ">
                            <thead class="thead text-center">
                                <tr>
                                    <td width="30px">No</td>
                                    <td>Nama Siswa</td>
                                    <td width="30px"></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; ?>
                                @foreach ($anggotakelas as $item)
                                    <tr>
                                        <td><?php echo $i; $i++?></td>
                                        <td>{{$item->siswa->nama_lengkap}}</td>
                                        <td>
                                            <a href="#">
                                                <button type="button" class="btn btn-sm btn-info"  data-toggle="popover" title="{{$item->siswa->nama_lengkap}} ({{$item->siswa->nomor_induk}})"
                                                data-content="
                                                {{$item->siswa->jk}}">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>
                                        </td>
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

                <a href="{{route('getKelas')}}"><button class="btn btn-warning" style="box-shadow: 3px 2px 5px grey;"><i class="fa fa-reply mr-1" ></i> Kembali</button></a>      
            </div>
            <div class="col-md-8">
                <div class="card pt-3 pr-3 pl-3 "  style="box-shadow: 2px 2px 10px rgba(48, 10, 64, 0.5);" >

                    <ul class="nav nav-tabs" id="myTab" role="tablist" >
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="ujian-tab" data-toggle="tab" href="#ujian" role="tab" aria-controls="ujian" aria-selected="true"><strong> Test </strong> </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <!-- ujian -->
                        <div class="tab-pane table-inside" id="ujian" role="tabpanel" aria-labelledby="ujian-tab">  
                        @if($ujian->count() != 0)                   
                            <table class="table table-striped table-bordered table-sm">
                                <thead class="text-center bg-dark" style="color:white;">
                                    <tr>
                                        <th scope="col" style="width:50px">No</th>
                                        <th scope="col" >Nama Test</th>
                                        <th scope="col" style="width:100px">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; ?>
                                    @foreach ($ujian as $item)
                                    <tr>
                                        <td scope="row" class="text-center"><?php   $i++;  echo $i; ?></td>
                                        <?php $i++; ?>
                                        <td class="text-center">{{ $item->nama_ujian}}</td>
                                        <td class="text-center">
                                            <a href="{{route('showUjian',$item->id)}}"><button class="btn btn-info btn-sm" style="box-shadow: 3px 2px 5px grey;"> <i class="fa fa-eye"></i> Detail</button></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="col-md-12">
                                <div class="alert alert-warning" role="alert">
                                    Belum ada test yang dilaksanakan untuk kelas ini !
                                </div>
                            </div>
                        @endif
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
  });
  function copy_text() {
        document.getElementById("kode_kelas").select();
        document.execCommand("copy");
        swal({
            title: "Kode Akses Kelas Berhasil di Copy !",
            icon: "success",
        });
    }

</script>
@endsection
