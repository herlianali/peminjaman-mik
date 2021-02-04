@extends('layout.layoutMahasiswa')
@section('header', 'List Peralatan Di Laboratorium')
@section('isi')
<div class="col-12">
    <div class="card">
      <div class="card-header">
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
              <th>Alat</th>
              <th>Jumlah</th>
              <th>Keadaan</th>
              <th>Tersimpan Di</th>
              <th>Foto Barang</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($datas as $no =>$data)
            <tr>
              <td>{{++$no + ($datas->currentPage()-1) * $datas->perPage()}}</td>
              <td>{{$data->nama_alat}}</td>
              <td>{{$data->jumlah}}</td>
              <td>{{$data->keterangan}}</td>
              <td>{{$data->tempat}}</td>
              <td><img src="{{ url('/data_images') }}/{{$data->images}}" alt="" style="max-width: 50%"></td>
              <td>
                @if ($data->status != 'terpinjam')
                  <a href="{{ url('/pinjamAlat') }}/{{$data->id_alat}}" class="btn btn-primary btn-sm">Pinjam Alat</a>
                @else
                  <form action="" method="POST">
                    @csrf
                    <button class="btn btn-primary btn-sm">Mengembalikan</button>
                  </form>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection