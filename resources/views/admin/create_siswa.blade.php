@extends('layouts.layout_admin')

@section('title')
    <title>Unbreakable</title>
@endsection

@section('content')


<main class="main">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Tambah Siswa</div>
                <div class="card-body">
                    <form  method="POST" class="register-form" action="{{ route('usersiswaStore') }}"> 
                    @csrf
                    <input type="hidden" name="role" value="2">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="name" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
              
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>    
        </div>
    </div>
</div>

</main> 

@endsection
