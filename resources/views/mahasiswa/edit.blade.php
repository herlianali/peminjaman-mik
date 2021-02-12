@extends('layout.layout')
@section('header', 'Edit Mahasiswa')

@section('isi')
<div class="container">
    <div class="card card-danger">
        <div class="card-header">
          <h3 class="card-title">Edit mahasiswa</h3>
        </div>
        <form role="form" method="POST" action="{{ route('mahasiswa.update', $mhs->id) }}">
            @method('PUT')
            @csrf
        <div class="card-body">
            <div class="form-group">
              <label for="nama_mahasiswa">Nama Mahasiswa</label>
              <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" value="{{ $mhs->nama }}">
            </div>
            <div class="form-group">
              <label for="kelas">Kelas</label>
              <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $mhs->kelas }}">
            </div>
            <div class="form-group">
              <label for="nim">Nim</label>
              <input type="text" class="form-control" id="nim" name="nim" value="{{ $mhs->nim }}">
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" value="{{ $mhs->username }}">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="{{ $mhs->password }}">
              </div>
        </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Edit</button>
          </div>
        </form>
    </div>
</div>

@endsection