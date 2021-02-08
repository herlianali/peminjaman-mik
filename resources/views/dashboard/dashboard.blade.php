@extends('layout.layout')
@section('header', 'Dashboard')
@section('isi')
<div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>150</h3>

            <p>Jumlah Mahasiswa</p>
          </div>
          <div class="icon">
              <i class="fas fa-user"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>53<sup style="font-size: 20px">%</sup></h3>

            <p>Data Laboratorium</p>
          </div>
          <div class="icon">
              <i class="fas fa-laptop-medical"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>@php($Talat === 0) ? 0 : echo $Talat @endphp</h3>

            <p>Peralatan Laboratorium</p>
          </div>
          <div class="icon">
              <i class="fas fa-tools"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>65</h3>

            <p>Data Pengguna Lab</p>
          </div>
          <div class="icon">
              <i class="far fa-address-book"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Lab Yang Di Pinjam</h3>
    
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
                    <th>Jam Pinjam</th>
                    <th>Jam Kembali</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Algoritma Pemrograman</td>
                    <td>Angga Rif </td>
                    <td>141080200123</td>
                    <td>praktikum</td>
                    <td>23.59</td>
                    <td>00.00</td>
                    <td>proses</td>
                    <td><button class="btn btn-block bg-gradient-success btn-sm">selesai</button></td>
                  </tr>
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
                    <td><a class="btn btn-block bg-gradient-success btn-sm" href="{{ url('/selesai') }}/{{$value->id_pinjamL}}">selesai</a></td>
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