@extends('layouts.layout_siswa')
@section('content')
<style>
@media screen and (max-width: 1000px) {
   .card-img{
     max-width: 50px;
     max-height: 45px;
   }

   .namauser,.tekskecil{
     font-size: 10px;
     margin-top: 0px;
   }

   #card-peserta{
     display: flex;
     justify-content: center;

   }
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">
                <h5 class="alert-heading mb-0"><strong>{{$peserta_ujian->ujian->kelas->nama_kelas}} </strong></h5>
            </div>
        </div>
    </div>

<div class="card ">

    <div class="card-header" > 
        Hasil Ujian {{$peserta_ujian->ujian->nama_ujian}}
    </div>

    <div class="card-body text-center">
        <div id="hasil">
                <!-- <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="alert alert-success" role="alert">
                            Keterangan : {{$peserta_ujian->keterangan}}
                        </div>
                    </div>
                </div> -->
            <!-- <h5> <strong>Hasil Ujian Peserta</strong> </h5> -->
            <div class="table-inside">
            <table class="table table-striped table-bordered table-sm">
                <thead class="thead-dark text-center">
                    <tr>
                        <th scope="col" style="width:50px">No</th>
                        <th>Tier 1</th>
                        <th>Tier 2</th>
                        <th>Tier 3</th>
                        <th>Tier 4</th>
                        <th scope="col" >Kategori</th>
                        <th scope="col">FeedBack</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; ?>
                    @foreach ($hasil_ujian as $item)
                    <tr>
                        <td scope="row"><?php  $i++;  echo $i; ?></td>
                        <td>@if($item->jawaban_tk1->jawaban == $item->jawaban_tk1->soal_tk1->kunci) 1 @else 0 @endif</td>
                        <td>@if($item->jawaban_tk2->jawaban == $item->jawaban_tk2->soal_tk2->kunci) 1 @else 0 @endif</td>
                        <td>@if($item->jawaban_tk3->jawaban == $item->jawaban_tk3->soal_tk3->kunci) 1 @else 0 @endif</td>
                        <td>@if($item->jawaban_tk4->jawaban == $item->jawaban_tk4->soal_tk4->kunci) 1 @else 0 @endif</td>
                        <td>{{$item->keterangan}}</td>
                        <td> @if ($item->hasil == 'SC') Anda memahami  @else Anda tidak memahami @endif</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>  
    </div>
     
    </div>
</div>
<a href="{{route('showKelasSiswa',$peserta_ujian->ujian->kelas->id)}}"><button class="btn btn-warning" style="box-shadow: 3px 2px 5px grey;"><i class="fa fa-reply mr-1" ></i> Kembali</button></a>       

</div>
@endsection
