@extends('layout.layout')
@section('header', 'Edit Alat')
@section('isi')
<div class="card card-danger">
    <div class="card-header">
      <h3 class="card-title">Edit Peralatan Yang Sudah Ada</h3>
    </div>
    
    <form role="form" method="POST" action="{{ route('peralatan.update', $alat->id_alat) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="nama_alat">Nama Alat</label>
          <input type="text" class="form-control" id="nama_alat" name="nama_alat" value="{{ $alat->nama_alat}}">
        </div>
        <div class="form-group">
          <label for="jumlah">Jumlah</label>
          <input type="text" class="form-control" id="jumlah" name="jumlah" value="{{ $alat->jumlah }}">
        </div>
        <div class="form-group">
          <label for="keterangan">Keterangan</label>
          <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $alat->keterangan }}">
        </div>
        <div class="form-group">
          <label for="tempat">Tempat</label>
          <input type="text" class="form-control" id="tempat" name="tempat" value="{{ $alat->tempat }}">
        </div>
        <div class="form-group">
          <label for="">Upload Gambar</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="images">
              <label for="pilih_gambar" class="custom-file-label">Gambar</label>
            </div>
          </div>
        </div>
        </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Edit</button>
      </div>
    </form>
</div>
@endsection