@extends('layout.layout')
@section('header', 'List laboratorium')
@section('isi')
  @if ($message = Session::get('success'))
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
          {{ $message }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
  @endif
  @if ($message = Session::get('successD'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ $message }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
  @endif
  <div class="container">
      <div class="row">
          @foreach($datas as $data)
              <div class="col-md-4">
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">
                              <i class="fas fa-text-width"></i>
                              Laboratorium {{$data['nama_lab']}}
                          </h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                          <img class="img-fluid pad" src="{{ url('data_images/laboratorium').'/'.$data['foto'] }}">
                          <p>Keterangan Lab <br> kapasitas : {{$data['kapasitas']}}<br> penanggung jawab : {{$data['aslab']}} <br> fasilitas : <br>{!!$data['fasilitas']!!}</p>
                          <div class="row">
                            
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$data['id_lab']}}">
                              <i class="fa fa-edit"></i>
                              Edit
                            </button>
                            <button class="btn btn-success btn-sm ml-2" data-toggle="modal" data-target="#jadwal">
                              <i class="fa fa-calendar-check"></i>
                              Lihat Jadwal
                            </button>
                            <form action="{{ route('laboratorium.destroy', $data['id_lab']) }}" method="POST">
                              @method('DELETE')
                              @csrf
                              <button type="submit" class="btn btn-danger btn-sm ml-2">
                                <i class="fa fa-trash"></i>
                                Hapus
                              </button>
                            </form>
                          </div>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              </div>

              <div class="modal fade" id="jadwal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Jadwal Lab ....</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <div class="col-12">
                              <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0" style="height: 300px;">
                                  <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                      <tr>
                                        <th>Peminjam</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                        <th>Selesai</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>Angga Rifki</td>
                                        <td>34-13-3034</td>
                                        <td>25.00</td>
                                        <td>25.01</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                                <!-- /.card-body -->
                              </div>
                              <!-- /.card -->
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                @include('laboratorium.edit')
          @endforeach

          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#create" aria-label="Left Align" style="width: 50px; height: 50px;border-radius: 35px; padding: 7px 10px; position: fixed; bottom: 65px; right: 10px">
            <span class="fa fa-plus fa-lg" aria-hidden="true"></span>
          </button>
      </div>
  </div>
  @include('laboratorium.create')
@endsection

@push('jsTambahan')
    <script type="text/javascript">
        $(".alert").show();
        setTimeout(function(){ $('.alert').hide(); }, 2000);
    </script>
@endpush