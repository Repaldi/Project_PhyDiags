@extends('layouts.layout_guru')

@section('title')
    <title>Unbreakable</title>
@endsection

@section('content')
<main class="main">

    <div class="container-fluid">
    <div class="alert alert-success pb-1 pt-2" role="alert">
    <h5><strong>Daftar Kelas</strong> </h5>
    </div>
    <!-- @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('success')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif -->
    @if($kelas->count() != 0)

        <div class="row">
            @foreach ($kelas as $item)
            <div class="col-md-4">
            <div class="card mb-3 ">
                <div class="card-body ">
                    <h5 class="card-title">{{$item->nama_kelas}}</h5> <hr class="mb-0 mt-0 pt-0 pb-0">
                    <p class="card-text">{{$item->deskripsi}} {{$item->kode_kelas}}</p>
                    <div class="row">

                        <div class="col-md-7"> <div class="alert alert-sm alert-warning mb-0 mt-0 pb-0 pt-0">
                        Jumlah Siswa :


                         </div> </div>
                        <div class="col-md-5"><div class="text-right"><a href="{{route('showKelas',$item->id)}}" class="btn btn-info"><i class="metismenu-icon pe-7s-monitor mr-1"></i> Masuk</a></div></div>
                    </div>

                </div>
            </div>
            </div>
            @endforeach
        </div>
    @else
    <div class="col-md-12">
        <div class="alert alert-warning" role="alert">
            Belum ada kelas yang dibuat
        </div>
    </div>
    @endif
    </div>
</main>
@endsection
