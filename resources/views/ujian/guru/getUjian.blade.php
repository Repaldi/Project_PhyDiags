@extends('layouts.layout_guru')

@section('title')
    <title>PhyDiags | Education</title>
@endsection

@section('content')

<main class="main">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong style="font-size: 18px;">Daftar Riwayat Test</strong>
                </div>
                <div class="card-body">
                @if($ujian->count() != 0)
                <div class="table-inside">
                    <table class="table table-striped table-bordered table-md">
                        <thead class="text-center bg-dark" style="color:white;">
                            <tr>
                                <th scope="col" style="width:50px">No</th>
                                <th scope="col" >Nama Test </th>
                                <th scope="col" >Kelas </th>
                                <th scope="col" style="width:180px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php $i = 0; ?>
                            @foreach ($ujian as $item)
                            <tr>
                                <td scope="row" class="text-center"><?php   $i++;  echo $i; ?></td>
                                <td >{{ $item->nama_ujian}}</td>
                                <td class="text-center">{{ $item->kelas->nama_kelas}}</td>
                                <td class="text-center">
                                    <!-- <a href="{{route('showUjian',$item->id)}}"><button class="btn btn-warning btn-sm" style="box-shadow: 3px 2px 5px grey;"><i class="fa fa-eye"></i>  Detail</button></a> -->
                                    <button type="button" class="btn btn-info btn-sm"  data-toggle="modal" data-target=".show_modal_ujian"  style="box-shadow: 3px 2px 5px grey;"
                                    id="showujian" 
                                    data-nama_ujian="{{$item->nama_ujian}}"
                                    data-nama_kelas="{{$item->kelas->nama_kelas}}"
                                    data-paket_soal="{{ $item->paket_soal->nama_paket_soal}}"
                                    data-deskripsi="{{ $item->deskripsi}}"
                                    ><i class="fa fa-eye"></i></button>

                                    <!-- <button type="button" class="btn btn-warning btn-sm"  data-toggle="modal" data-target=".update_modal_ujian"  style="box-shadow: 3px 2px 5px grey;"
                                    id="updateujian" 
                                    data-ujian_id="{{$item->id}}" 
                                    data-nama_ujian="{{$item->nama_ujian}}"
                                    data-kelas_id="{{$item->kelas_id}}"
                                    data-paket_soal_id="{{$item->paket_soal_id}}"
                                    data-nama_kelas="{{$item->kelas->nama_kelas}}"
                                    data-paket_soal="{{ $item->paket_soal->nama_paket_soal}}"
                                    data-deskripsi="{{ $item->deskripsi}}"
                                    ><i class="fa fa-edit"></i></button>

                                    <a href="{{route('deleteUjian',$item->id)}}"><button class="btn btn-danger btn-sm" style="box-shadow: 3px 2px 5px grey;"> <i class="fa fa-trash"></i></button></a> -->
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$ujian->links()}}
                </div>
                @else
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong> Belum ada test yang di buat. Silahkan buat test baru!</strong>
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

@section('js')
<script>
    $(document).on('click','#showujian', function(){
        var nama_ujian  = $(this).data('nama_ujian');
        var nama_kelas  = $(this).data('nama_kelas');
        var paket_soal  = $(this).data('paket_soal');
        var deskripsi   = $(this).data('deskripsi');
        $('.nama_ujian').text(nama_ujian);
        $('.nama_kelas').text(nama_kelas);
        $('.paket_soal').text(paket_soal);
        $('.deskripsi').text(deskripsi);
    });

    $(document).on('click','#updateujian', function(){
        var ujian_id    = $(this).data('ujian_id');
        var nama_ujian  = $(this).data('nama_ujian');
        var kelas_id    = $(this).data('kelas_id');
        var paket_soal_id = $(this).data('paket_soal_id');
        var nama_kelas  = $(this).data('nama_kelas');
        var paket_soal  = $(this).data('paket_soal');
        var deskripsi   = $(this).data('deskripsi');
        $('#ujian_id').val(ujian_id);
        $('#nama_ujian').val(nama_ujian);
        $('#kelas_id').val(kelas_id);
        $('#paket_soal_id').val(paket_soal_id);
        $('#nama_kelas').val(nama_kelas);
        $('#paket_soal').val(paket_soal);
        $('#deskripsi').val(deskripsi);
    });

</script>
@endsection

 <!-- Update Modal (Ujian)-->
 <div class="modal fade show_modal_ujian"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title " id="exampleModalLabel"> Detail Test</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
               
                    <table class="table table-hover table-sm">
                        <tr>
                            <td col width="100px"><b> Nama Test </b> </td>
                            <td> : </td>
                            <td><span class="nama_ujian"></span></td>
                        </tr>
                        <tr>
                            <td col><b> Nama Kelas </b> </td>
                            <td> : </td>
                            <td><span class="nama_kelas"></span></td>
                        </tr>
                        <tr>
                            <td col><b> Paket Soal</b> </td>
                            <td> : </td>
                            <td><span class="paket_soal"></span></td>
                        </tr>
                        <tr>
                            <td col><b> Deskripsi</b> </td>
                            <td> : </td>
                            <td><span class="deskripsi"></span></td>
                        </tr>
                    </table>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                
            </div>
        </div>
    </div>

<!-- Penutup Detail Modal -->

 <!-- Update Modal (Ujian)-->
 <div class="modal fade update_modal_ujian"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title " id="exampleModalLabel"> Update Test </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{route('updateUjian')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                    <div class="container">
                    <input type="hidden" name="id" id="ujian_id"value="">
                        <div class="form-group row">
                            <label for="nama_ujian" class="col-sm-3 col-form-label">
                                <table><tr><td width="100%"><strong>Nama Test</strong> </td><td> : </td></tr> </table>
                            </label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_ujian" name="nama_ujian" style="border-radius:10px;  box-shadow: 2px 0px 3px grey;">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kelas" class="col-sm-3 col-form-label"> <table><tr><td width="100%"><strong>Pilih Kelas</strong> </td><td> : </td></tr> </table> </label>
                            <div class="col-sm-9">
                                <select class="form-control" name="kelas_id" style="border-radius:10px;  box-shadow: 2px 0px 3px grey;">
                                    <option disabled selected id="kelas_id" value="">Pilih ...</option>
                                    @foreach($kelas as $item)
                                    <option value="{{$item->id}}">{{$item->nama_kelas}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="paket_soal" class="col-sm-3 col-form-label"> <table><tr><td width="100%"><strong>Pilih Paket Soal</strong> </td><td> : </td></tr> </table> </label>
                            <div class="col-sm-9">
                                <select class="form-control" name="paket_soal_id" style="border-radius:10px;  box-shadow: 2px 0px 3px grey;">
                                    <option disabled selected  id="paket_soal_id" value="">Pilih ...</option>
                                    @foreach($paket_soal as $item)
                                    <option value="{{$item->id}}">{{$item->nama_paket_soal}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deskripsi" class="col-sm-3 col-form-label"><table><tr><td width="100%"><strong>Deskripsi Test</strong> </td><td> : </td></tr> </table></label>
                            <div class="col-sm-9">
                            <textarea class="form-control" id="deskripsi" rows="2" name="deskripsi" style="border-radius:10px;  box-shadow: 2px 0px 3px grey;"> </textarea>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info" onclick=alertUpdate()>Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- Penutup Update Modal Ujian -->