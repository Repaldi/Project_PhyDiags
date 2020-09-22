@extends('layouts.layout_guru')

@section('title')
    <title>Unbreakable</title>
@endsection

@section('content')
<main class="main">


    <div class="container-fluid">

        <div class="alert alert-success " role="alert">
            <div class="row">
                <div class="col-md-8">
                    <h5 class="alert-heading"><strong>{{$kelas->nama_kelas}}</strong> </h5>
                    {{$kelas->deskripsi}}
                </div>
                <div class="col-md-4">
                    <div class="col-sm-9 offset-md-3">
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
                <div class="card mb-3"  style="box-shadow: 2px 2px 10px rgba(48, 10, 64, 0.5);" >
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
            </div>
            <div class="col-md-8">
                <div class="card pt-3 pr-3 pl-3 "  style="box-shadow: 2px 2px 10px rgba(48, 10, 64, 0.5);" >

                    <ul class="nav nav-tabs" id="myTab" role="tablist" >
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pertemuan-tab" data-toggle="tab" href="#ujian" role="tab" aria-controls="pertemuan" aria-selected="true">Ujian</a>
                        </li>
                        <!-- <li class="nav-item" role="presentation">
                            <a class="nav-link" id="kelompok-tab" data-toggle="tab" href="#" role="tab" aria-controls="kelompok" aria-selected="false">Kelompok</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="messages-tab" data-toggle="tab" href="#tugas" role="tab" aria-controls="tugas" aria-selected="false">Tugas </a>
                        </li> -->

                    </ul>

                    <div class="tab-content mr-3 ml-3">
                        <!-- pertemuan -->
                        <div class="tab-pane" id="pertemuan" role="tabpanel" aria-labelledby="pertemuan-tab">

                        </div>
                        <!-- kelompok  -->


                        <!-- tugas -->
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

  function copy_text() {
        document.getElementById("kode_kelas").select();
        document.execCommand("copy");
        swal({
            title: "Kode Akses Kelas Berhasil di Copy !",
            icon: "success",
        });
    }
//edit

</script>
@endsection
<!-- update Modal (paket)-->
