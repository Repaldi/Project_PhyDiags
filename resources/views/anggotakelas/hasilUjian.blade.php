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
<div class="card ">

    <div class="card-header" > 
        <strong style="font-size:18px">Hasil Ujian Peserta</strong>
        <!-- <div class="col-md-10 text-right">
          Download HASIL 
        </div> -->
       

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
                        <th scope="col" style="width:400px">Kategori</th>
                        <th scope="col" style="width:150px">FeedBack</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; ?>
                    @foreach ($hasil_ujian as $item)
                    <tr>
                        <td scope="row"><?php  $i++;  echo $i; ?></td>
                        <td>{{$item->keterangan}}</td>
                        <td> @if ($item->hasil == 'SC') Anda memahami blabla @else Anda tidak memahami blabla @endif</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>  
    </div>
     
    </div>
</div>
</div>
@endsection
