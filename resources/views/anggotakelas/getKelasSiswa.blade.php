@extends('layouts.layout_siswa')

@section('title')
    <title>PhyDiags | Education</title>
@endsection

@section('content')

<main class="main">
    @if(session('pesan'))
      <div class="alert alert-warning" role="alert">
        {{session('pesan')}}
      </div>
    @endif

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12" >

                <div class="card" >
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12">
                                <strong style="font-size:18px"> Daftar Kelas </strong>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-md-8">
                                @if($anggotaKelas->count() == 0)
                                    <div class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
                                        <strong> Anda belum tergabung dalam kelas manapun. Silahkan gabung kedalam kelas!</strong>
                                        <button type="button"   class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                                        <strong>{{ session('success') }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-4 " >
                                <form method="POST" action="{{ route('gabungKelasSiswa') }}">
                                @csrf
                                    <div class="input-group">
                                    <input type="kode_kelas" id="kode_kelas" name="kode_kelas" required
                                    placeholder="Masukkan Kode Kelas" class="form-control" autocomplete="off"  style="box-shadow: 3px 2px 5px grey;">
                                        <div class="input-group-append">
                                            <button type="submit"  onclick="alert()" class="btn btn-info"  style="box-shadow: 3px 2px 5px grey;"><i class="fa fa-plus mr-2"></i> <strong> Gabung</strong></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr/>
                        @if($anggotaKelas->count() != 0)
                        <div class="row">
                            @foreach ($anggotaKelas as $item)
                                <div class="col-md-4">
                                    <div class="alert alert-success mb-3">
                                        <h5 class="card-title">{{$item->kelas->nama_kelas}}</h5> <hr class="mb-0 mt-0">
                                        <p class="mb-0">{{$item->kelas->deskripsi}}</p>
                                        <p class="mb-2">Pengajar : {{$item->kelas->guru->nama_lengkap}}</p>
                                        <div class="text-right"><a href="{{route('showKelasSiswa',$item->kelas->id)}}" class="btn btn-info">Masuk</a></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
@endsection

@section('js')
<script>
function alert() {
    swal({
        title: "Berhasil gabung ke dalam kelas !",
        icon: "success",
    });
}
</script>
@endsection
