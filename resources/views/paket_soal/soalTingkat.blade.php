@extends('layouts.layout_guru')

@section('title')
    <title>Unbreakable</title>
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
                    <p>{!! $soal_satuan->indikator !!}</p>
                </div>
            </div>        
        </div>
        <div class="col-md-8 ">
            <ul class="nav nav-pills mb-3 nav-justified " id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pills-tk1-tab" data-toggle="pill" href="#pills-tk1" role="tab" aria-controls="pills-tk1" aria-selected="true">Soal Tingkat 1</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-tk2-tab" data-toggle="pill" href="#pills-tk2" role="tab" aria-controls="pills-tk2" aria-selected="false">Soal Tingkat 2</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-tk3-tab" data-toggle="pill" href="#pills-tk3" role="tab" aria-controls="pills-tk3" aria-selected="false">Soal Tingkat 3</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-tk4-tab" data-toggle="pill" href="#pills-tk4" role="tab" aria-controls="pills-tk4" aria-selected="false">Soal Tingkat 4</a>
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
                                        <textarea class="form-control" id="pertanyaan" rows="2" name="pertanyaan" placeholder=""> </textarea>
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
                                        <input type="text" name="pil_a" id="pil_a" class="form-control" >
                                    </div>
                                    <!-- Pilihan B-->
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend" style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                            <span class="input-group-text"> B </span>
                                        </div>
                                        <input type="text" name="pil_b" id="pil_b"  class="form-control" >
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
                            <p> <strong>Pertanyaan :</strong>  {!! $soal_tk2->pertanyaan !!} </p>
                            <p> <strong>Pilihan Jawaban : </strong></p>
                            <p> <strong>Kunci Jawaban : {!! $soal_tk2->kunci !!} </strong></p>
                        @else
                            <form action="{{route('storeSoalTk4')}}" enctype="multipart/form-data" method="post">
                            @csrf
                                <input type="hidden" name="soal_satuan_id" id="soal_satuan_id" value="{{$soal_satuan->id}}">
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="alamat"> Pertanyaan </label>
                                        <textarea class="form-control" id="pertanyaan" rows="2" name="pertanyaan" placeholder=""> </textarea>
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
                                        <input type="text" name="pil_a" id="pil_a" class="form-control" >
                                    </div>
                                    <!-- Pilihan B-->
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend" style="border-radius:10px; border-color:#c4cdcf; box-shadow: 3px 3px 5px grey;">
                                            <span class="input-group-text"> B </span>
                                        </div>
                                        <input type="text" name="pil_b" id="pil_b"  class="form-control" >
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
@endsection
