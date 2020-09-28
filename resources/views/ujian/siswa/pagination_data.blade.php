<?php
use App\PesertaUjian;
use App\PilganJawab;
use App\SoalSatuan;
use App\SoalTk1;
use App\SoalTk2;
use App\SoalTk3;
use App\SoalTk4;

 ?>

<div class="row">
      <div class="col-md-8">
        <div class="card" style=" border-radius: 0px 0px 20px 20px;">
          <div class="card-header" style=" border-radius: 0px 0px 0px 0px;">Soal Ujian</div>
          <div class="card-body " >
            <?php $i=1; ?>
            @foreach($soal_satuan as $item)
                <div class=" container row" >
                    <div class="col-md-3"><h6>Soal No. {{$soal_satuan ->perPage()*($soal_satuan->currentPage()-1)+$i}}   </h6></div>
                    <div class="col-md-8 text-right"><h6>Poin : </h6></div>
                </div>
                <div class="container" >
                <table >
                  <th>{{$item->indikator}}</th>
                </table>
                </div>
                <hr>
                
                <div class="row">
                  <div class="container">
                    <table>
                      @if($item->soal_tk1->gambar != null)
                      <tr>
                        <img src="{{asset('images/soal'.$item->soal_tk1->gambar)}}" alt="">
                      </tr>
                      @endif
                      <tr>
                          <td><b> 1.1 </b> :<br/> <p>{{$item->soal_tk1->pertanyaan}} </p> </td>
                      </tr>
                      <tr>
                          <td>
                            <input type="radio" class="pilihan" name="pilihan_tk1" value="A"> A . {{$item->soal_tk1->pil_a}}  <br>
                            <input type="radio" class="pilihan" name="pilihan_tk1" value="B" > B . {{$item->soal_tk1->pil_b}}  <br>
                            <input type="radio" class="pilihan" name="pilihan_tk1" value="C" > C . {{$item->soal_tk1->pil_c}}  <br>
                            <input type="radio" class="pilihan" name="pilihan_tk1" value="D" > D . {{$item->soal_tk1->pil_d}}  <br>
                          </td>
                      </tr>
                      <input type="hidden" id="soal_tk1_id" value="{{$item->soal_tk1->id}}">
                      <input type="hidden" id="kunci" value="{{$item->soal_tk1->kunci}}">

                    </table>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="container">
                    <table>
                      <tr>
                          <td><b> 1.2 </b> :<br/> <p>{{$item->soal_tk2->pertanyaan}} </p> </td>
                      </tr>
                      <tr>
                          <td>
                            <input type="radio" class="pilihan" name="pilihan_tk2" value="A"> A . {{$item->soal_tk2->pil_a}}  <br>
                            <input type="radio" class="pilihan" name="pilihan_tk2" value="B" > B . {{$item->soal_tk2->pil_b}}  <br>
                          </td>
                      </tr>
                      <input type="hidden" id="soal_tk2_id" value="{{$item->soal_tk2->id}}">
                      <input type="hidden" id="kunci" value="{{$item->soal_tk2->kunci}}">
                    </table>
                  </div>
                </div>

                <div class="row mt-3">
                  <div class="container">
                    <table>
                      <tr>
                          <td><b> 1.3 </b> :<br/> <p>{{$item->soal_tk3->pertanyaan}} </p> </td>
                      </tr>
                      <tr>
                          <td>
                            <input type="radio" class="pilihan" name="pilihan_tk3" value="A"> A . {{$item->soal_tk3->pil_a}}  <br>
                            <input type="radio" class="pilihan" name="pilihan_tk3" value="B" > B . {{$item->soal_tk3->pil_b}}  <br>
                            <input type="radio" class="pilihan" name="pilihan_tk3" value="C" > C . {{$item->soal_tk3->pil_c}}  <br>
                            <input type="radio" class="pilihan" name="pilihan_tk3" value="D" > D . {{$item->soal_tk3->pil_d}}  <br>
                          </td>
                      </tr>
                      <input type="hidden" id="soal_tk3_id" value="{{$item->soal_tk3->id}}">
                      <input type="hidden" id="kunci" value="{{$item->soal_tk1->kunci}}">
                    </table>
                  </div>
                </div>

                <div class="row mt-3">
                  <div class="container">
                    <table>
                      <tr>
                          <td><b> 1.4 </b> :<br/> <p>{{$item->soal_tk4->pertanyaan}} </p> </td>
                      </tr>
                      <tr>
                          <td>
                            <input type="radio" class="pilihan" name="pilihan_tk4" value="A"> A . {{$item->soal_tk4->pil_a}}  <br>
                            <input type="radio" class="pilihan" name="pilihan_tk4" value="B" > B . {{$item->soal_tk4->pil_b}}  <br>
                          </td>
                      </tr>
                      <input type="hidden" id="soal_tk4_id" value="{{$item->soal_tk4->id}}">
                      <input type="hidden" id="kunci" value="{{$item->soal_tk1->kunci}}">
                    </table>
                  </div>
                </div>

            @endforeach

          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card" style=" border-radius: 0px 0px 20px 20px;">
          <div class="card-header"  style="border-radius: 0px 0px 0px 0px;">Navigasi</div>
          <div class="card-body">
            <div class="row ">
              <div class="col-12 text-center " style=" overflow: Auto;">
              {!! $soal_satuan->links() !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <input type="hidden" value="{{ $ujian->id }}" id="ujian_id">
    <input type="hidden" name="peserta_ujian_id" value="{{ $peserta_ujian->id }}" id="peserta_ujian_id">

<script>

var peserta_ujian_id  = $("#peserta_ujian_id").val();
const ujian_id        = $('#ujian_id').val();

// Pengaturan JS untuk simpan jawaban soal tingkat 1
$('input[type=radio][name="pilihan_tk1"]').click(function() {
    var jawab_tk1         = document.querySelector('input[name = "pilihan_tk1"]:checked').value;
    var soal_tk1_id       = $("#soal_tk1_id").val();
    var kunci             = $("#kunci").val();

    if ( jawab_tk1 == kunci ) {
        var kode  = 1;
    } else {
        var kode  = 0;
    }
    $.ajax({
        url: "{{ url('store/jawaban_tk1') }}",
        type: "GET",
        dataType: 'json',
        data: {
            jawab_tk1: jawab_tk1,
            soal_tk1_id: soal_tk1_id,
            peserta_ujian_id: peserta_ujian_id,
            kode: kode,
            ujian_id: ujian_id
        },
        error: function(xhr, status, error) {
          var err = eval("(" + xhr.responseText + ")");
          console.log(err.Message);
        },
        success: function(data) {
					  console.log(data);
				}
    });
});


// Pengaturan JS untuk simpan jawaban soal tingkat 2
$('input[type=radio][name="pilihan_tk2"]').click(function() {
    var jawab_tk2         = document.querySelector('input[name = "pilihan_tk2"]:checked').value;
    var soal_tk2_id       = $("#soal_tk2_id").val();
    var kunci             = $("#kunci").val();
 
    if ( jawab_tk2 == kunci ) {
        var kode  = 1;
    } else {
        var kode  = 0;
    }
    $.ajax({
        url: "{{ url('store/jawaban_tk2') }}",
        type: "GET",
        dataType: 'json',
        data: {
            jawab_tk2: jawab_tk2,
            soal_tk2_id: soal_tk2_id,
            peserta_ujian_id: peserta_ujian_id,
            kode: kode,
            ujian_id: ujian_id
        },
        error: function(xhr, status, error) {
          var err = eval("(" + xhr.responseText + ")");
          console.log(err.Message);
        },
        success: function(data) {
					  console.log(data);
				}
    });
});


// Pengaturan JS untuk simpan jawaban soal tingkat 3
$('input[type=radio][name="pilihan_tk3"]').click(function() {
    var jawab_tk3         = document.querySelector('input[name = "pilihan_tk3"]:checked').value;
    var soal_tk3_id       = $("#soal_tk3_id").val();
    var kunci             = $("#kunci").val();
 
    if ( jawab_tk3 == kunci ) {
        var kode  = 1;
    } else {
        var kode  = 0;
    }
    $.ajax({
        url: "{{ url('store/jawaban_tk3') }}",
        type: "GET",
        dataType: 'json',
        data: {
            jawab_tk3: jawab_tk3,
            soal_tk3_id: soal_tk3_id,
            peserta_ujian_id: peserta_ujian_id,
            kode: kode,
            ujian_id: ujian_id
        },
        error: function(xhr, status, error) {
          var err = eval("(" + xhr.responseText + ")");
          console.log(err.Message);
        },
        success: function(data) {
					  console.log(data);
				}
    });
});


// Pengaturan JS untuk simpan jawaban soal tingkat 4
$('input[type=radio][name="pilihan_tk4"]').click(function() {
    var jawab_tk4         = document.querySelector('input[name = "pilihan_tk4"]:checked').value;
    var soal_tk4_id       = $("#soal_tk4_id").val();
    var kunci             = $("#kunci").val();
 
    if ( jawab_tk4 == kunci ) {
        var kode  = 1;
    } else {
        var kode  = 0;
    }
    $.ajax({
        url: "{{ url('store/jawaban_tk4') }}",
        type: "GET",
        dataType: 'json',
        data: {
            jawab_tk4: jawab_tk4,
            soal_tk4_id: soal_tk4_id,
            peserta_ujian_id: peserta_ujian_id,
            kode: kode,
            ujian_id: ujian_id
        },
        error: function(xhr, status, error) {
          var err = eval("(" + xhr.responseText + ")");
          console.log(err.Message);
        },
        success: function(data) {
					  console.log(data);
				}
    });
});
</script>
