@extends('layout.layout')
@section('header', 'Tambah Alat')
@section('isi')
<div class="card card-danger">
    <div class="card-header">
      <h3 class="card-title">Peralatan Apa Yang Ingin Di Pinjam</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="POST" action="{{ url('/peralatan/simpan') }}" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="nama_alat">Nama Alat</label>
          <input type="text" class="form-control" id="nama_alat" name="nama_alat">
        </div>
        <div class="form-group">
          <label for="jumlah">Jumlah</label>
          <input type="text" class="form-control" id="jumlah" name="jumlah">
        </div>
        <div class="form-group">
          <label for="keterangan">Keterangan</label>
          <input type="text" class="form-control" id="keterangan" name="keterangan">
        </div>
        <div class="form-group">
          <label for="tempat">Tempat</label>
          <input type="text" class="form-control" id="tempat" name="tempat">
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
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
    </form>
</div>
@endsection