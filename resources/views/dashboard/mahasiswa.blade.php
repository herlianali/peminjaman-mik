@extends('layout.layoutMahasiswa')
@section('header', 'Dashboard')
@section('isi')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Lab Yang Sudah Di Pinjam {{ session('role') }}</h3>
              
              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
    
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
              <table class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Laboratorium</th>
                    <th>Peminjam</th>
                    <th>nim</th>
                    <th>Keperluan</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($datas as $no => $value)
                  <tr>
                    <td>{{++$no + ($datas->currentPage()-1) * $datas->perPage()}}</td>
                    <td>{{$value->nama_lab}}</td>
                    <td>{{$value->nama_peminjam}}</td>
                    <td>{{$value->nim}}</td>
                    <td>{{$value->keperluan}}</td>
                    <td>{{$value->tgl_pinjam}}</td>
                    <td>{{$value->tgl_kembali}}</td>
                    <td>{{$value->status}}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
  </div>
@endsection