@extends('layout.layoutMahasiswa')
@section('header', 'Pinjam Alat')
@section('isi')
<!-- general form elements -->
<div class="card card-danger">
  <div class="card-header">
    <h3 class="card-title">Peralatan Apa Yang Ingin Di Pinjam</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form role="form" method="POST" action="{{ url('/pinjamAlat/simpan') }}">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="alat">Peralatan</label>
        @foreach ($peralatan as $p)
        <input type="text" class="form-control" id="alat" name="alat" value="{{$p['nama_alat']}}">
        @endforeach
      </div>
      <div class="form-group">
        <label for="peminjam">Peminjam</label>
        <input type="text" class="form-control" id="peminjam" name="peminjam" value="{{}}">
      </div>
      <div class="form-group">
        <label for="keperlan">Keperluan</label>
        <input type="text" class="form-control" id="keperlan" name="keperlan">
      </div>
      <div class="form-group">
        <label for="keperlan">Jumlah</label>
        <input type="text" class="form-control" id="jumlah" name="jumlah">
      </div>
      <div class="form-group">
        <label for="jam_pinjam">Jam Pinjam</label>
        <input type="text" class="form-control" id="jam_pinjam" name="jam_pinjam">
      </div>
      <div class="form-group">
        <label for="jam_kembali">Jam Kembali</label>
        <input type="text" class="form-control" id="jam_kembali" name="jam_kembali">
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Pinjam</button>
    </div>
  </form>
</div>
  <!-- /.card -->
@endsection