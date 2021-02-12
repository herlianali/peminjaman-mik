@extends('layout.layout')
@section('header', 'Dashboard')
@section('isi')
<div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $Tmhs }} Mahasiswa</h3>

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
            <h3>{{ $Tlab }} Lab</sup></h3>

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
            <h3> {{ $Talat }} Alat</h3>

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
            <h3>{{ $Tpinjam }} Pengguna</h3>

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
              <h3 class="card-title">List Peminjaman Laboratorium</h3>
    
              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  {{-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
    
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div> --}}
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
                    <th>Aksi</th>
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
                    <td>
                      <form action="{{ route('statusL', $value->id_pinjamL) }}" method="POST">
                        @method('PUT')
                        @csrf
                        @if ($value->status == 'Menunggu')
                          <input type="hidden" name="status" value="Terpinjam">
                          <button type="submit" class="btn bg-gradient-warning btn-sm">Menyetujui</button>
                        @endif
                        @if($value->status == 'Terpinjam')
                          <input type="hidden" name="status" value="Selesai">
                          <button type="submit" class="btn bg-gradient-success btn-sm">Selesai</button>
                        @endif
                        @if($value->status == 'Selesai')
                          <button type="submit" class="btn bg-gradient-dark btn-sm text-white" disabled>Selesai</button>
                        @endif
                      </form>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
              {{ $datas->links() }}
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">List Peminjaman Alat</h3>
  
            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                {{-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
  
                <div class="input-group-append">
                  <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div> --}}
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Alat</th>
                  <th>Peminjam</th>
                  <th>Keperluan</th>
                  <th>Jumlah</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Kembali</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($Palat as $no => $alat)
                <tr>
                  <td>{{++$no + ($Palat->currentPage()-1) * $Palat->perPage()}}</td>
                  <td>{{$alat->nama_alat}}</td>
                  <td>{{$alat->nama_peminjam}}</td>
                  <td>{{$alat->keperluan}}</td>
                  <td>{{$alat->jumlah}}</td>
                  <td>{{$alat->tgl_pinjam}}</td>
                  <td>{{$alat->tgl_kembali}}</td>
                  <td>{{$alat->status}}</td>
                  <td>
                    <form action="{{ route('statusA', $alat->id_pinjamA) }}" method="POST">
                      @method('PUT')
                      @csrf
                      @if ($alat->status == 'Menunggu')
                        <input type="hidden" name="status" value="Terpinjam">
                        <button type="submit" class="btn bg-gradient-warning btn-sm">Menyetujui</button>
                      @endif
                      @if($alat->status == 'Mengembalikan')
                        <input type="hidden" name="status" value="Selesai">
                        <button type="submit" class="btn bg-gradient-success btn-sm">Selesai</button>
                      @endif
                      @if($alat->status == 'Selesai')
                        <button type="submit" class="btn bg-gradient-dark btn-sm text-white" disabled>Selesai</button>
                      @endif
                    </form>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
            {{ $Palat->links() }}
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
  </div>
  </div>
@endsection