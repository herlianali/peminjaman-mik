@extends('layout.layout')
@section('name')
    
@endsection
@section('isi')
<!-- general form elements -->
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Laboratorium Mana Yang di Pinjam</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" action="{{url('/pinjamLab/simpan')}}" method="POST">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="laboratorium">Laboratorium</label>
          @foreach ($data as $d)   
          <input type="text" class="form-control" id="laboratorium" name="laboratorium" value="{{$d['nama_lab']}}">
          @endforeach
        </div>
        <div class="form-group">
          <label for="peminjam">Peminjam</label>
          <input type="text" class="form-control" id="peminjam" name="peminjam">
        </div>
        <div class="form-group">
          <label for="nim">NIM</label>
          <input type="text" class="form-control" id="nim" name="nim">
        </div>
        <div class="form-group">
          <label for="keperlan">Keperluan</label>
          <input type="text" class="form-control" id="keperluan" name="keperluan">
        </div>
        <div class="form-group">
          <label for="jam_pinjam">Jam Pinjam</label>
          <input type="text" class="form-control" id="jam_pinjam" name="jam_pinjam" value="{{date("h:i:sa")}}">
        </div>
        <div class="form-group">
          <label for="jam_kembali">Jam Kembali</label>
          <input type="text" class="form-control" id="jam_kembali" name="jam_kembali">
        </div>
        <div class="form-group">
          <label for="tgl_pinjam">tgl Pinjam</label>
          <input type="text" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="{{date("d-m-Y")}}">
        </div>
        <div class="form-group">
          <label for="tgl_kembali">tgl Kembali</label>
          <input type="text" class="form-control" id="tgl_kembali" name="tgl_kembali">
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