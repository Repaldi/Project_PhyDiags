@extends('layouts.layout_admin')

@section('title')
    <title>Unbreakable</title>
@endsection

@section('content')


<main class="main">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Daftar Guru</div>
                    <div class="card-body">
                        <div class="table-inside">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($guru as $item)
                                <tr>
                                    <td></td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->password}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
