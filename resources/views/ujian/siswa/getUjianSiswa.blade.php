@extends('layouts.layout_siswa')

@section('title')
    <title>Unbreakable</title>
@endsection

@section('content')

<main class="main">

<div class="container">
    <div class="row">
        @foreach ($ujian_saya as $item)
           <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{$item->ujian->nama_ujian}}</div>
                    <div class="card-body">
                        {{$item->ujian->kelas->nama_kelas}}
                        {{$item->ujian->deskripsi}}

                        <a href="{{route('runUjian',$item->id)}}"><button class="btn btn-info mt-2">Kerjakan Ujian</button></a>
                    </div>
                </div>
           </div>
        @endforeach
    </div>
</div>
</main>

@endsection
