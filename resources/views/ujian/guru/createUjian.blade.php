@extends('layouts.layout_guru')

@section('title')
    <title>Unbreakable</title>
@endsection

@section('content')

<main class="main">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><strong style="font-size: 18px;">Buat Ujian</strong></div>
                <form action="{{route('storeUjian')}}" enctype="multipart/form-data" method="post"> @csrf
                <div class="card-body">
                    <div class="container">
                        <div class="form-group row">
                            <label for="nama_ujian" class="col-sm-3 col-form-label">
                                <table><tr><td width="100%"><strong>Nama Ujian</strong> </td><td> : </td></tr> </table>
                            </label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_ujian" name="nama_ujian" style="border-radius:10px;  box-shadow: 2px 0px 3px grey;">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kelas" class="col-sm-3 col-form-label"> <table><tr><td width="100%"><strong>Pilih Kelas</strong> </td><td> : </td></tr> </table> </label>
                            <div class="col-sm-9">
                                <select class="form-control" name="kelas_id" style="border-radius:10px;  box-shadow: 2px 0px 3px grey;">
                                    <option disabled selected>Pilih ...</option>
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
                                    <option disabled selected>Pilih ...</option>
                                    @foreach($paket_soal as $item)
                                    <option value="{{$item->id}}">{{$item->nama_paket_soal}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deskripsi" class="col-sm-3 col-form-label"><table><tr><td width="100%"><strong>Deskripsi Ujian</strong> </td><td> : </td></tr> </table></label>
                            <div class="col-sm-9">
                            <textarea class="form-control" id="deskripsi" rows="2" name="deskripsi" style="border-radius:10px;  box-shadow: 2px 0px 3px grey;"> </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer justify-content-center " style="border-radius: 0px 0px 20px 20px ">
                    <button type="submit" class="btn btn-info" style="width:100px; box-shadow: 3px 2px 5px grey;">Simpan</button> 
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</main>

@endsection