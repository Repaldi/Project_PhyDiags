@extends('layouts.layout_guru')

@section('title')
    <title>Unbreakable</title>
@endsection

@section('content')

<main class="main">

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Buat Ujian</div>
                <div class="card-body">
                    <form action="{{route('storeUjian')}}" enctype="multipart/form-data" method="post"> @csrf
                        <div class="form-group row">
                            <label for="nama_ujian" class="col-sm-2 col-form-label">Nama Ujian</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_ujian" name="nama_ujian">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kelas" class="col-sm-2 col-form-label"> <strong>Pilih Kelas</strong> </label>
                            <div class="col-sm-10">
                                <select class="form-control" name="kelas_id">
                                    <option disabled selected>Pilih ...</option>
                                    @foreach($kelas as $item)
                                    <option value="{{$item->id}}">{{$item->nama_kelas}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="paket_soal" class="col-sm-2 col-form-label"> <strong>Pilih Paket Soal</strong> </label>
                            <div class="col-sm-10">
                                <select class="form-control" name="paket_soal_id">
                                    <option disabled selected>Pilih ...</option>
                                    @foreach($paket_soal as $item)
                                    <option value="{{$item->id}}">{{$item->nama_paket_soal}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                            <textarea class="form-control" id="deskripsi" rows="2" name="deskripsi" > </textarea>
                            </div>
                        </div>
                        <div class="row"><div class="col-md-12 text-right"><button type="submit" class="btn btn-info">Simpan</button></div></div>    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>

@endsection