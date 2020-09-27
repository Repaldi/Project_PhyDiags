<?php
use App\PesertaUjian;
use App\PilganJawab;
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
// Pengaturan JS untuk simpan jawaban essay
$("#jawaban_essay").change(function(){
    var jawab_essay  = $("#jawaban_essay").val();
    var essay_id     = $("#essay_id").val();
    var peserta_ujian_id   = $("#peserta_ujian_id").val();
    var siswa_id      = $("#siswa_id").val();
    const ujian_id   = $('#ujian_id').val();

    $.ajax({
        url: "{{ url('store/essay_jawab') }}",
        type: "GET",
        dataType: 'json',
        data: {
            jawab_essay: jawab_essay,
            essay_id: essay_id,
            peserta_ujian_id: peserta_ujian_id,
            siswa_id: siswa_id,
            ujian_id: ujian_id
        },
        success: function(data) {
					  console.log(data);
				}
    });
});

// Pengaturan JS untuk simpan jawaban pilgan
$('input[type=radio][name="pilihan"]').click(function() {
    var jawab_pilgan = document.querySelector('input[name = "pilihan"]:checked').value;
    var pilgan_id    = $("#pilgan_id").val();
    var peserta_ujian_id   = $("#peserta_ujian_id").val();
    var siswa_id      = $("#siswa_id").val();
    const ujian_id   = $('#ujian_id').val();

    var poin        = $("#poin").val();
    var kunci       = $("#kunci").val();
    if ( jawab_pilgan == kunci ) {
        var score  = poin;
        var status = "T";
    } else {
        var score  = 0;
        var status = "F";
    }
    $.ajax({
        url: "{{ url('store/pilgan_jawab') }}",
        type: "GET",
        dataType: 'json',
        data: {
            jawab_pilgan: jawab_pilgan,
            pilgan_id: pilgan_id,
            peserta_ujian_id: peserta_ujian_id,
            siswa_id: siswa_id,
            score: score,
            status: status,
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
