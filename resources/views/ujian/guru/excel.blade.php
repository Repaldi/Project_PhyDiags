<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      use App\HasilUjian;
      use App\PesertaUjian;
     ?>
    @foreach($ujian->paket_soal->soal_satuan as $soal)
    <div class="">
      <h3>No. {{$loop->iteration}}</h3>
      <p>{{$soal->indikator}}</p>
      <table border="1">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tier 1</th>
            <th>Tier 2</th>
            <th>Tier 3</th>
            <th>Tier 4</th>
            <th>Kategori</th>
          </tr>
        </thead>
        <tbody>
          @foreach($peserta_ujian as $peserta)
            <?php
              $hasil_ujian = HasilUjian::where('peserta_ujian_id',$peserta->id)->where('soal_satuan_id',$soal->id)->first();
             ?>
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$peserta->siswa->nama_lengkap}}</td>
              <td>@if($hasil_ujian->jawaban_tk1->jawaban == $hasil_ujian->jawaban_tk1->soal_tk1->kunci) 1 @else 0 @endif</td>
              <td>@if($hasil_ujian->jawaban_tk2->jawaban == $hasil_ujian->jawaban_tk2->soal_tk2->kunci) 1 @else 0 @endif</td>
              <td>@if($hasil_ujian->jawaban_tk3->jawaban == $hasil_ujian->jawaban_tk3->soal_tk3->kunci) 1 @else 0 @endif</td>
              <td>@if($hasil_ujian->jawaban_tk4->jawaban == $hasil_ujian->jawaban_tk4->soal_tk4->kunci) 1 @else 0 @endif</td>
              <td>{{$hasil_ujian->keterangan}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @endforeach
  </body>
</html>
