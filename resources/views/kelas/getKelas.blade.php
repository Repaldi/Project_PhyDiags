@extends('layouts.layout_guru')

@section('title')
    <title>PhyDiags | Education</title>
@endsection

@section('content')
<main class="main">

    <div class="container-fluid">
    <div class="alert alert-success pb-1 pt-2" role="alert">
    <h5><strong>Daftar Kelas</strong> </h5>
    </div>
    @if($kelas->count() != 0)

        <div class="row">
            @foreach ($kelas as $item)
            <div class="col-md-4">
            <div class="card mb-3 ">
                <div class="card-header">
                    {{$item->nama_kelas}}
                </div>
                <div class="card-body "> 
                    <p class="card-text">{{$item->deskripsi}} </p>
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
