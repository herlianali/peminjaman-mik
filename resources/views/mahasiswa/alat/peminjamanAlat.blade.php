@extends('layout.layoutMahasiswa')
  {{-- @section('header', 'Peminjaman Alat Laboratorium') --}}
@section('isi')
<!-- general form elements -->
<div class="row">
  <div class="col-md-2"></div>
  <div class="card card-danger col-md-8">
    <div class="card-header">
      <h3 class="card-title">Lengkapi Data Dibawah Untuk Meminjam Alat</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="POST" action="{{ url('/pinjamAlat/simpan') }}">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="alat">Peralatan</label>
          @foreach ($peralatan as $p)
          <input type="text" class="form-control" id="alat" name="alat" value="{{$p['nama_alat']}}" readonly>
          @endforeach
        </div>
        <div class="form-group">
          <label for="peminjam">Peminjam</label>
          <input type="text" class="form-control" id="peminjam" name="peminjam">
        </div>
        <div class="form-group">
          <label for="keperlan">Keperluan</label>
          <input type="text" class="form-control" id="keperluan" name="keperluan">
        </div>
        <div class="form-group">
          <label for="keperlan">Jumlah</label>
          <input type="text" class="form-control" id="jumlah" name="jumlah">
        </div>
        <div class="row">
          <div class="form-group col-md-6">
            <label for="jam_pinjam">Jam Pinjam</label>
            <input type="date" class="form-control" id="tglPinjam" name="tglPinjam">
          </div>
          <div class="form-group col-md-6">
            <label for="jam_kembali">Jam Kembali</label>
            <input type="date" class="form-control" id="tglK  embali" name="tglKembali">
          </div>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Pinjam</button>
      </div>
    </form>
  </div>
</div>
  <!-- /.card -->
@endsection