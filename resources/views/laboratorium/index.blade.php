@extends('layout.layout')
@section('header', 'List laboratorium')
@section('isi')
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
                            <img class="img-fluid pad" src="{{ url('asset/images/lab1.jpg') }}">
                            <p>Keterangan Lab <br> kapasitas : {{$data['kapasitas']}}<br> fasilitas : {{$data['fasilitas']}}<br> penanggung jawab : {{$data['aslab']}}</p>
                            <a class="btn btn-primary btn-sm" href="" data-toggle="modal" data-target="#stop{{$data['id_lab']}}">Pinjam Sekarang</a>
                            <a class="btn btn-success btn-sm" href="" data-toggle="modal" data-target="#jadwal">Lihat Jadwal</a>
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
                  <div class="modal fade" id="stop{{$data['id_lab']}}">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Sudah Cek jadwal ?</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Cek Ketersedian Jadwal Di Tombol Lihat JadwalJika Sudah Klik Lanjut</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          <a class="btn btn-success" href="{{ url('/pinjamLab') }}/{{$data['id_lab']}}">Lanjutkan</a>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
            @endforeach
        </div>
    </div>
@endsection