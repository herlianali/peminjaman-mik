@extends('layout.layoutMahasiswa')
@section('header', 'Dashboard')
@section('isi')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">History Peminjaman Laboratorium</h3>
            
            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                {{-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search"> --}}
  
                {{-- <div class="input-group-append">
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
                  <th>Nim</th>
                  <th>Keperluan</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Kembali</th>
                  <th>Status</th>
                  <th>Pengembalian</th>
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
                    @if ($value->status == 'Terpinjam')    
                    <form action="{{ route('pengembalianL', $value->id_pinjamL) }}" method="POST">
                      @method('PUT')
                      @csrf
                        <input type="hidden" name="alat" value="{{$value->nama_lab}}">
                        <input type="hidden" name="status" value="Mengembalikan">
                        <button type="submit" class="btn btn-primary btn-sm">Mengembalikan</button>
                    </form>
                    @endif
                  </td>
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
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">History Peminjaman Peralatan Laboratorium</h3>
            
            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                {{-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search"> --}}
  
                {{-- <div class="input-group-append">
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
                  <th>Nim</th>
                  <th>Keperluan</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Kembali</th>
                  <th>Status</th>
                  <th>Pengembalian</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($alats as $no => $alat)
                <tr>
                  <td>{{++$no + ($alats->currentPage()-1) * $alats->perPage()}}</td>
                  <td>{{$alat->nama_alat}}</td>
                  <td>{{$alat->nama_peminjam}}</td>
                  <td>{{$alat->keperluan}}</td>
                  <td>{{$alat->jumlah}}</td>
                  <td>{{$alat->tgl_pinjam}}</td>
                  <td>{{$alat->tgl_kembali}}</td>
                  <td>{{$alat->status}}</td>
                  <td>
                    @if ($alat->status == 'Terpinjam')    
                    <form action="{{ route('pengembalianA', $alat->id_pinjamA) }}" method="POST">
                      @method('PUT')
                      @csrf
                        <input type="hidden" name="alat" value="{{$alat->nama_alat}}">
                        <input type="hidden" name="jumlah" value="{{$alat->jumlah}}">
                        <input type="hidden" name="status" value="Mengembalikan">
                        <button type="submit" class="btn btn-primary btn-sm">Mengembalikan</button>
                    </form>
                    @endif
                  </td>
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