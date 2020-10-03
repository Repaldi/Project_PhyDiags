@extends('layouts.layout_guru')

@section('title')
    <title>PhyDiags | Education</title>
@endsection

@section('content')

<main class="main">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success"> <h5><strong>Paket Soal : {{$paket_soal->nama_paket_soal}}</strong></h5> </div>
        </div>
    </div>
    <div class="row justify-content-center mb-3">
        <div class="col-md-12">
            <a href="{{route('getPaketSoal')}}"><button class="btn btn-warning mr-3" style="box-shadow: 3px 2px 5px grey;"><i class="fa fa-reply mr-1" ></i> Kembali</button></a>
            <button type="submit" class="btn btn-info" data-toggle="modal" data-target=".create_soal_satuan"
                    id="create"
                    data-paket_soal_id = "{{ $paket_soal->id }}" style="box-shadow: 3px 2px 5px grey;"> <i class="fa fa-plus mr-2"></i>  Tambah Soal
            </button>
        </div>
    </div>
    <div class="row justify-content-center">
    <?php $i = 1; ?>
    @foreach ($soal_satuan as $item)
        <div class="col-md-3">
           <div class="card">
            <div class="card-body"> 
                <h6><strong>Soal No. <?php echo $i; $i++ ; ?></strong></h6> <hr class="mt-1 mb-1">
                <p class="mb-2">{{$item->indikator}}</p> 
                <div class="text-right"> <a href="{{route('soalTingkat', $item->id)}}"><button class="btn btn-info"><i class="fa fa-eye"></i> Lihat Soal</button></a></div>
               
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
