@extends('layouts.layout_guru')

@section('title')
    <title>Unbreakable</title>
@endsection

@section('content')

<main class="main">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success"> <h5><strong>Paket Soal : {{$paket_soal->nama_paket_soal}}</strong></h5> </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <button type="submit" class="btn btn-info" data-toggle="modal" data-target=".create_soal_satuan"
                    id="create"
                    data-paket_soal_id = "{{ $paket_soal->id }}"> Tambah Soal
            </button>
        </div>
    </div>
    <div class="row justify-content-center">
    @foreach ($soal_satuan as $item)
        <div class="col-md-3">
           <div class="card">
            <div class="card-body"> Soal {{$item->indikator}}
                <a href="{{route('soalTingkat', $item->id)}}"><button class="btn btn-info">Lihat Soal</button></a>
            </div>
           </div>
        </div>
    @endforeach
    </div>
</div>
</main>

@endsection

<!-- Create Modal (soal satuan)-->
    <div class="modal fade create_soal_satuan"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title " id="exampleModalLabel"> Tambah soal baru </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{route('storeSoalSatuan')}}" enctype="multipart/form-data" method="post">
                   @csrf
                    <div class="modal-body">
                        <div class="container">
                            <input type="hidden" name="paket_soal_id" class="paket_soal_id" value="">

                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">No. 1</label>                                
                            </div>

                            <div class="form-group">
                                <label for="indikator"> Indikator Soal</label>
                                <textarea class="form-control" id="indikator" rows="4" name="indikator" placeholder=""> </textarea>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info"  onclick=alertEssay()>Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Penutup Create Modal -->

@section('js')
<script>
    $(document).ready(function(){
        $(document).on('click','#create', function(){
            var paket_soal_id   = $(this).data('paket_soal_id');
            $('.paket_soal_id').val(paket_soal_id);
        });
    });
</script>
@endsection
