@extends('layouts.layout_siswa')

@section('title')
    <title>Unbreakable</title>
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
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-4 ml-auto  text-right" >
                            <form method="POST" action="{{ route('gabungKelas') }}">
                            @csrf
                                <div class="input-group">
                                <input type="kode_kelas" id="kode_kelas" name="kode_kelas" required
                                placeholder="Masukkan Kode Kelas" class="form-control" autocomplete="off">
                                    <div class="input-group-append">
                                        <button type="submit"  onclick="alert()" class="btn btn-secondary"><i class="fa fa-plus mr-2"></i> <strong> Gabung</strong></button>
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
                                        <h5 class="card-title">{{$item->kelas->nama_kelas}}</h5>
                                        <p >{{$item->kelas->deskripsi}}</p>
                                        <p>Pengajar : {{$item->kelas->guru->nama_lengkap}}</p>
                                        <div class="text-right"><a href="#" class="btn btn-info">Masuk</a></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @else
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong> Anda belum tergabung dalam kelas manapun. Silahkan gabung kedalam kelas!</strong>
                                <button type="button"   class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
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
// function alert() {
//     swal({
//         title: "Berhasil gabung ke dalam kelas !",
//         icon: "success",
//     });
// }
</script>
@endsection
