@extends('layouts.layout_guru')

@section('title')
    <title>PhyDiags | Education</title>
@endsection

@section('content')
<main class="main">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success"> <h5><strong>Paket Soal : {{$soal_satuan->paket_soal->nama_paket_soal}}</strong></h5> </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Soal No. </div>
                <div class="card-body">
                    <strong>Indikator Soal :</strong>
                    <p>{!! $soal_satuan->indikator !!}</p>
                </div>
            </div>  
            <a href="{{route('soalSatuan',$soal_satuan->paket_soal->id)}}"> <button class="btn btn-info">Kembali</button> </a>     
        </div>
        <div class="col-md-8 ">
            <ul class="nav nav-pills mb-3  justify-content-center " id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pills-tk1-tab" data-toggle="pill" href="#pills-tk1" role="tab" aria-controls="pills-tk1" aria-selected="true"> <strong> Soal Tingkat 1</strong></a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-tk2-tab" data-toggle="pill" href="#pills-tk2" role="tab" aria-controls="pills-tk2" aria-selected="false"><strong> Soal Tingkat 2</strong></a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-tk3-tab" data-toggle="pill" href="#pills-tk3" role="tab" aria-controls="pills-tk3" aria-selected="false"><strong> Soal Tingkat 3</strong></a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-tk4-tab" data-toggle="pill" href="#pills-tk4" role="tab" aria-controls="pills-tk4" aria-selected="false"><strong> Soal Tingkat 4</strong></a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <!-- soal tingkat 1 -->
                <div class="tab-pane fade show active" id="pills-tk1" role="tabpanel" aria-labelledby="pills-tk1-tab">
                    <div class="card">
                        <div class="card-body">
                        @if ( $soal_tk1 != null )
                            <p> <strong>Pertanyaan :</strong>  {!! $soal_tk1->pertanyaan !!} </p>
                            <p> <strong>Pilihan Jawaban : </strong></p>
                            <p> <strong>Kunci Jawaban : {!! $soal_tk1->kunci !!} </strong></p>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target=".update_modal_soaltk1"
                                    id="updatesoaltk1"
                                    data-soal_tk1_id_update="{{ $soal_tk1->id }}"
                                    data-soal_satuan_id_tk1_update="{{ $soal_tk1->soal_satuan_id }}"
                                    data-pertanyaan_tk1_update="{{ $soal_tk1->pertanyaan }}"
                                    data-pil_a_tk1_update="{{ $soal_tk1->pil_a }}"
                                    data-pil_b_tk1_update="{{ $soal_tk1->pil_b }}"
                                    data-pil_c_tk1_update="{{ $soal_tk1->pil_c }}"
                                    data-pil_d_tk1_update="{{ $soal_tk1->pil_d }}"
                                    data-gambar_tk1_update="{{ $soal_tk1->gambar }}"
                                    data-kunci_tk1_update="{{ $soal_tk1->kunci }}"
                                    title="Edit">Edit</button>
                                </div>
                            </div>
                        @else
                            <form action="{{route('storeSoalTk1')}}" enctype="multipart/form-data" method="post">
                                @csrf
                                <input type="hidden" name="soal_satuan_id" id="soal_satuan_id" value="{{$soal_satuan->id}}">
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="alamat"> Pertanyaan </label>
                                        <textarea class="form-control" id="pertanyaan" rows="3" name="pertanyaan" placeholder=""> </textarea>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Jawaban Benar</label>
                                        <select class="custom-select my-1 mr-sm-2" name="kunci" >
                                            <option selected>Choose...</option>
                                            <option value="A" >A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                        </select>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="gambar" name="gambar" aria-describedby="inputGroupFileAddon03">
                                            <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                                        </div>
                                    </div>
                                </div>
                          
                                <div class="form-group">
                                    <!-- Pilihan A-->
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend" style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                            <span class="input-group-text" > A </span>
                                        </div>
                                        <input type="text" name="pil_a" id="pil_a" class="form-control" >
                                    </div>
                                    <!-- Pilihan B-->
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend" style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                            <span class="input-group-text"> B </span>
                                        </div>
                                        <input type="text" name="pil_b" id="pil_b"  class="form-control" >
                                    </div>
                                        <!-- Pilihan C-->
                                        <div class="input-group mb-2">
                                        <div class="input-group-prepend" style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                            <span class="input-group-text" > C </span>
                                        </div>
                                        <input type="text" name="pil_c" id="pil_c"  class="form-control" >
                                    </div>
                                        <!-- Pilihan D-->
                                        <div class="input-group mb-2">
                                        <div class="input-group-prepend" style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                            <span class="input-group-text"> D </span>
                                        </div>
                                        <input type="text" name="pil_d" id="pil_d"  class="form-control" >
                                    </div>
                                </div>
                                <div class="row"><div class="col-md-12 text-right"><button type="submit" class="btn btn-info">Simpan</button></div></div>
                            
                            </form>
                        @endif
                        </div>
                    </div>
                </div>
                <!-- soal tingkat 2 -->
                <div class="tab-pane fade" id="pills-tk2" role="tabpanel" aria-labelledby="pills-tk2-tab">
                    <div class="card">
                        <div class="card-body">
                        @if ( $soal_tk2 != null )
                            <p> <strong>Pertanyaan :</strong>  {!! $soal_tk2->pertanyaan !!} </p>
                            <p> <strong>Pilihan Jawaban : </strong></p>
                            <p> <strong>Kunci Jawaban : {!! $soal_tk2->kunci !!} </strong></p>
                        @else
                            <form action="{{route('storeSoalTk2')}}" enctype="multipart/form-data" method="post">
                            @csrf
                                <input type="hidden" name="soal_satuan_id" id="soal_satuan_id" value="{{$soal_satuan->id}}">
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="alamat"> Pertanyaan </label>
                                        <textarea class="form-control" id="pertanyaan" rows="2" name="pertanyaan" >Apakah anda yakin dengan jawaban yang diberikan sebelumnya ? </textarea>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Jawaban Benar</label>
                                        <select class="custom-select my-1 mr-sm-2" name="kunci" >
                                            <option selected>Choose...</option>
                                            <option value="A" >A</option>
                                            <option value="B" >B</option>
                                        </select>
                                    </div>
                                </div>
                          
                                <div class="form-group">
                                    <!-- Pilihan A-->
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend" style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                            <span class="input-group-text" > A </span>
                                        </div>
                                        <input type="text" name="pil_a" id="pil_a" class="form-control" value="Yakin" placeholder="Yakin" >
                                    </div>
                                    <!-- Pilihan B-->
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend" style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                            <span class="input-group-text"> B </span>
                                        </div>
                                        <input type="text" name="pil_b" id="pil_b" class="form-control" value="Tidak Yakin" placeholder="Tidak Yakin" >
                                    </div>
                                </div>
                                <div class="row"><div class="col-md-12 text-right"><button type="submit" class="btn btn-info">Simpan</button></div></div>    
                            </form>
                        @endif
                        </div>
                    </div>
                </div>
                <!-- soal tingkat 3 -->
                <div class="tab-pane fade" id="pills-tk3" role="tabpanel" aria-labelledby="pills-tk3-tab">
                <div class="card">
                        <div class="card-body">
                        @if ( $soal_tk3 != null )
                            <p> <strong>Pertanyaan :</strong>  {!! $soal_tk1->pertanyaan !!} </p>
                            <p> <strong>Pilihan Jawaban : </strong></p>
                            <p> <strong>Kunci Jawaban : {!! $soal_tk1->kunci !!} </strong></p>
                        @else
                            <form action="{{route('storeSoalTk3')}}" enctype="multipart/form-data" method="post">
                                @csrf
                                <input type="hidden" name="soal_satuan_id" id="soal_satuan_id" value="{{$soal_satuan->id}}">
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="alamat"> Pertanyaan </label>
                                        <textarea class="form-control" id="pertanyaan" rows="3" name="pertanyaan" placeholder=""> </textarea>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Jawaban Benar</label>
                                        <select class="custom-select my-1 mr-sm-2" name="kunci" >
                                            <option selected>Choose...</option>
                                            <option value="A" >A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                        </select>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="gambar" name="gambar" aria-describedby="inputGroupFileAddon03">
                                            <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                                        </div>
                                    </div>
                                </div>
                          
                                <div class="form-group">
                                    <!-- Pilihan A-->
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend" style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                            <span class="input-group-text" > A </span>
                                        </div>
                                        <input type="text" name="pil_a" id="pil_a" class="form-control" >
                                    </div>
                                    <!-- Pilihan B-->
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend" style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                            <span class="input-group-text"> B </span>
                                        </div>
                                        <input type="text" name="pil_b" id="pil_b"  class="form-control" >
                                    </div>
                                        <!-- Pilihan C-->
                                        <div class="input-group mb-2">
                                        <div class="input-group-prepend" style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                            <span class="input-group-text" > C </span>
                                        </div>
                                        <input type="text" name="pil_c" id="pil_c"  class="form-control" >
                                    </div>
                                        <!-- Pilihan D-->
                                        <div class="input-group mb-2">
                                        <div class="input-group-prepend" style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                            <span class="input-group-text"> D </span>
                                        </div>
                                        <input type="text" name="pil_d" id="pil_d"  class="form-control" >
                                    </div>
                                </div>
                                <div class="row"><div class="col-md-12 text-right"><button type="submit" class="btn btn-info">Simpan</button></div></div>
                            
                            </form>
                        @endif
                        </div>
                    </div>
                </div>
                <!-- soal tingkat 4 -->
                <div class="tab-pane fade" id="pills-tk4" role="tabpanel" aria-labelledby="pills-tk4-tab">
                    <div class="card">
                        <div class="card-body">
                        @if ( $soal_tk4 != null )
                            <p> <strong>Pertanyaan :</strong>  {!! $soal_tk4->pertanyaan !!} </p>
                            <p> <strong>Pilihan Jawaban : </strong></p>
                            <p> <strong>Kunci Jawaban : {!! $soal_tk4->kunci !!} </strong></p>
                        @else
                            <form action="{{route('storeSoalTk4')}}" enctype="multipart/form-data" method="post">
                            @csrf
                                <input type="hidden" name="soal_satuan_id" id="soal_satuan_id" value="{{$soal_satuan->id}}">
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="alamat"> Pertanyaan </label>
                                        <textarea class="form-control" id="pertanyaan" rows="2" name="pertanyaan" placeholder=""> Apakah anda yakin dengan jawaban yang diberikan sebelumnya ?  </textarea>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Jawaban Benar</label>
                                        <select class="custom-select my-1 mr-sm-2" name="kunci" >
                                            <option selected>Choose...</option>
                                            <option value="A" >A</option>
                                            <option value="B">B</option>
                                        </select>
                                    </div>
                                </div>
                          
                                <div class="form-group">
                                    <!-- Pilihan A-->
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend" style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                            <span class="input-group-text" > A </span>
                                        </div>
                                        <input type="text" name="pil_a" id="pil_a" class="form-control" value="Yakin"  placeholder="Yakin" >
                                    </div>
                                    <!-- Pilihan B-->
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend" style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                            <span class="input-group-text"> B </span>
                                        </div>
                                        <input type="text" name="pil_b" id="pil_b"  class="form-control" value="Tidak Yakin"  placeholder="Tidak Yakin" >
                                    </div>
                                </div>
                                <div class="row"><div class="col-md-12 text-right"><button type="submit" class="btn btn-info">Simpan</button></div></div>    
                            </form>
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

$(document).ready(function(){
    $(document).on('click','#updatesoaltk1', function(){
        var soal_tk1_id_update          = $(this).data('soal_tk1_id_update');
        var soal_satuan_id_tk1_update        = $(this).data('soal_satuan_id_tk1_update');
        var pertanyaan_update           = $(this).data('pertanyaan_tk1_update');
        var pil_a_update                = $(this).data('pil_a_tk1_update');
        var pil_b_update                = $(this).data('pil_b_tk1_update');
        var pil_c_update                = $(this).data('pil_c_tk1_update');
        var pil_d_update                = $(this).data('pil_d_tk1_update');
        var pil_e_update                = $(this).data('pil_e_tk1_update');
        var gambar_tk1_update           = $(this).data('gambar_tk1_update');
        var kunci_update                = $(this).data('kunci_tk1_update');
        $('#soal_tk1_id_update ').val(soal_tk1_id_update );
        $('#soal_satuan_id_tk1_update').val(soal_satuan_id_tk1_update);
        $('#pertanyaan_tk1_update').val(pertanyaan_tk1_update); 
        $('#pil_a_tk1_update').val(pil_a_tk1_update);
        $('#pil_b_tk1_update').val(pil_b_tk1_update);
        $('#pil_c_tk1_update').val(pil_c_tk1_update);
        $('#pil_d_tk1_update').val(pil_d_tk1_update);
        $('#pil_e_tk1_update').val(pil_e_tk1_update);
        $('#gambar_tk1_update').val(gambar_tk1_update);
        $('#kunci_tk1_update').val(kunci_tk1_update);
    });
});
</script>
<!-- Alert -->
<script>
function alertUpdate() {
    swal({
        title: "Soal berhasil diubah !",
        icon: "success",
    });
}
</script>
@endsection

 <!-- Update Modal (SoalTK1)-->
 <div class="modal fade update_modal_soaltk1"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title " id="exampleModalLabel"> Soal No. </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{route('updateSoalTk1',$soal_satuan->paket_soal->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                     <div class="modal-body">
                        <div class="container">
                      
                            <input type="hidden" name="id" id="soal_tk1_id_update" value="">
                            <input type="hidden" name="soal_satuan_id" id="soal_satuan_id_tk1_update" value="">
                            <div class="form-group">
                          
                          
                            <input type="file" id="gambar_tk1_update" name="gambar" value="" class="form-control">
                            <p><strong>Biarkan kosong jika tidak ingin menambah gambar</strong></p>
                          
                            </div>
                            <div class="form-group">
                                <label for="alamat"> Pertanyaan </label>
                                <textarea class="form-control" id="pertanyaan_tk1_update" rows="2" name="pertanyaan" placeholder=""> </textarea>
                            </div>
                            <div class="form-group" >
                                <!-- Pilihan A-->
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend" style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                        <span class="input-group-text" > A </span>
                                    </div>
                                    <input type="text" name="pil_a" id="pil_a_tk1_update" class="form-control" >
                                </div>
                                <!-- Pilihan B-->
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend" style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                        <span class="input-group-text"> B </span>
                                    </div>
                                    <input type="text" name="pil_b" id="pil_b_tk1_update"  class="form-control" >
                                </div>
                                 <!-- Pilihan C-->
                                 <div class="input-group mb-2">
                                    <div class="input-group-prepend" style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                        <span class="input-group-text" > C </span>
                                    </div>
                                    <input type="text" name="pil_c" id="pil_c_tk1_update"  class="form-control" >
                                </div>
                                 <!-- Pilihan D-->
                                 <div class="input-group mb-2">
                                    <div class="input-group-prepend" style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                        <span class="input-group-text"> D </span>
                                    </div>
                                    <input type="text" name="pil_d" id="pil_d_tk1_update"  class="form-control" >
                                </div>
                                <div class="input-group-inline">
                                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Jawaban Benar</label>
                                        <select class="custom-select my-1 mr-sm-2" name="kunci" id="kunci_tk1_update" >
                                            <option selected id="kunci_tk1_update"></option>
                                            <option value="A" >A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                        </select>
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

<!-- Penutup Update Modal -->
