@extends('layouts.layout_ujian')
@section('title')
<title>Ujian</title>
@stop

@section('content')
<div id=fullscreenExam >
  <div class="container">
  <br> <br>

    <div class="row">
      <div class="col-md-12">
        <div class="card pt-3 pl-5 pr-5 pb-3 head_exam">
          <div class="text-center"> <h4 style="color:black;"> <strong>{{ $ujian->nama_ujian }}</strong></h4> </div>
          <div style="color:black; font-weight:bold;" id="teks_durasi"></div>
        </div>
      </div>
    </div>

    <div id="table_data">
      @include('ujian.siswa.pagination_data')
    </div>

    <div class="row">
      <div class="col-md-8"></div>
      <div class="col-md-4">
        <a href=""> <button class="btn btn-danger" onclick="closeFullscreen();" peserta_ujian_id="{{$peserta_ujian->id}}"> Akhiri Ujian </button> </a>
      </div>
    </div>


    <div class="container video">
      <div  class="row">
        <video autoplay="true" id="video-webcam" width="160px" height="122px"> </video>
      </div>
    </div>

  </div>
</div>


<script>
$(document).ready(function(){
  $(document).on('click', '.pagination a',function(event){
      event.preventDefault(); //stop refresh webpage
      var page = $(this).attr('href').split('page=')[1];
      fetch_data(page);
  });
  function fetch_data(page)
  {
      const peserta_ujian_id = $('#peserta_ujian_id').val();
      $.ajax({
          url:"/pagination/fetch_data?page="+page,
          type: "GET",
          data: {
            peserta_ujian_id: peserta_ujian_id
          },
          success: function(soal_satuan)
          {
              $('#table_data').html(soal_satuan);
          }
      });
  }
});
</script>
@endsection
