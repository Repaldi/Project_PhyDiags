@extends('layouts.layout_guru')

@section('title')
    <title>PhyDiags | Education</title>
@endsection

@section('content')
<main class="main">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            @if(session('pesan'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('pesan')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-header  pt-3 pb-2 text-center">
                    <strong style="font-size: 18px;">Buat Paket Soal</strong>
                </div>
                <form action="{{route('storePaketSoal')}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="card-body">   
                    <div class="container">
                        <input type="hidden" name="guru_id" value="{{ Auth::user()->guru->id }} ">
                        <div class="form-row mb-0 mt-0 pt-0">
                            <div class="form-group col-md-12">
                                <label for="judul"><b> Nama Paket Soal  : </b></label>
                                <input type="text" class="form-control" id="judul" name="nama_paket_soal" placeholder="Nama paket soal" style="border-radius:10px;  box-shadow: 3px 0px 5px grey;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer justify-content-center " style="border-radius: 0px 0px 20px 20px ">
                    <button type="submit" onclick="alert()" class="btn btn-info" style="width:100px; box-shadow: 3px 2px 5px grey;">Simpan</button> 
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
function alert() {
    swal({
        title: "Paket soal baru berhasil dibuat !",
        icon: "success",
    });
}
</script>
@endsection
