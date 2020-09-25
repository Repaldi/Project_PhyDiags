@extends('layouts.layout_guru')

@section('title')
    <title>Unbreakable</title>
@endsection

@section('content')
<main class="main">

    <div class="container-fluid ">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
            <div class="card-header">
                <div class="card-title">Buat Kelas Baru</div>
            </div>
            <form action="{{route('storeKelas')}}"  method="post" enctype="multipart/form-data" >
            @csrf
            <div class="card-body">
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">Nama Kelas</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Deskripsi Kelas</label>
                        <div class="col-sm-10">
                        <textarea class="form-control" rows="3" name="deskripsi"></textarea>
                        </div>
                    </div>
            </div>
            <div class="card-footer ">
                <div class="container text-right">
                    <button type="submit"  onclick="alert()"  class="btn btn-info">Simpan</button>
                </div>
            </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</main>
@endsection

@section('js')
<script>
function alert() {
    namakelas = $('#nama_kelas').val();
    swal({
        title: "Kelas baru berhasil di buat !",
        text: namakelas,
        icon: "success",
    });
}
</script>
@endsection
