@extends('layout.layout')
@section('header', 'List Peralatan')
@section('isi')
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <a href="{{ url('/laborant/peralatan/tambah') }}"><i class="fas fa-plus-circle fa-2x" data-toggle="tooltip" data-placement="right" title="tambah data"></i></a>
        </h3>
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
      <div class="card-body table-responsive p-0">
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
              <td><img src="{{ url('/data_images') }}/{{$data->images}}" alt="" style="max-width: 50%; width: 100px;"></td>
              <td>
                <form action="{{ route('peralatan.destroy', $data->id_alat) }}" method="POST">
                  @method('DELETE')
                  @csrf
                  <a href="{{ route('peralatan.edit', $data->id_alat) }}" class="btn btn-success btn-sm">Edit</a>
                  <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection