@extends('layouts.layout_admin')

@section('title')
    <title>PhyDiags | Education</title>
@endsection

@section('content')


<main class="main">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Panduan Guru</div>
                <div class="card-body">
                    <form  method="POST" enctype="multipart/form-data" class="register-form" action="{{ route('userguruStore') }}"> 
                    @csrf
                    <!-- untuk guru = 0 -->
                    <input type="hidden" name="isfor" value="0"> 
                    <div class="form-group">
                    <label for="exampleInputEmail1">Nama Panduan</label>
                    <input type="text" name="nama_panduan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input"  name="dokumen" aria-describedby="inputGroupFileAddon03">
                        <label class="custom-file-label" for="dokumen">Pilih Dokumen ...</label>
                    </div>
                    <div class="form-group">
                    <label for="deskripsi"> Keterangan </label>
                    <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi" placeholder=""> </textarea>
                    </div>
                    
                   
                    <div class="custom-file">
                        <input type="file" class="custom-file-input"  name="gambar" aria-describedby="inputGroupFileAddon03">
                        <label class="custom-file-label" for="gambar">Pilih Gambar ...</label>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Link Video</label>
                    <input type="text" name="nama_panduan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                
                   

                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>    
        </div>
    </div>
</div>

</main> 

@endsection
