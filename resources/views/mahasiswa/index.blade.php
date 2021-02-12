@extends('layout.layout')
@section('header', 'List Mahasiswa')

@section('isi')
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
              <th>Nama</th>
              <th>Nim</th>
              <th>Kelas</th>
              <th>Username</th>
              <th>Password</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($mhs as $m)
            <tr>
              <td>{{ ++$i }}</td>
              <td>{{ $m->nama }}</td>
              <td>{{ $m->nim }}</td>
              <td>{{ $m->kelas }}</td>
              <td>{{ $m->username }}</td>
              <td> ********* </td>
              <td>
                <form action="">
                  <button class="btn btn-danger btn-sm">Hapus</button>
                  <a href="{{ route('mahasiswa.edit', $m->id_user) }}" class="btn btn-success btn-sm">Edit</a>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {!! $mhs->links() !!}
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
@endsection