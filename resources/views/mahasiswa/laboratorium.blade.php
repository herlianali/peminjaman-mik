@extends('layout.layoutMahasiswa')
@section('header', 'laboratorium')

@section('isi')

	@foreach ($labs as $lab)
		<div class="m-5">	
			<div class="row">
				<div class="card" style="width: 18rem;">
					<div class="card-header">
						<h3 class="card-title">
							<i class="fa fa-school mr-2"></i>
							{{ $lab->nama_lab }}
						</h3>
					</div>
					<img class="card-img-top" src="{{ url('storage/data_images/laboratorium').'/'.$lab->foto }}" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">{{ $lab->aslab }}</h5>
						<p class="card-text">
							Kapasitas Lab : {{ $lab->kapasitas }}<br>
							Fasilitas : {{ $lab->fasilitas }}
						</p>
						<button class="btn btn-success" data-toggle="modal" data-target="#modal{{$lab->id_lab}}">Pinjam</button>
					</div>
				</div>
			</div>
		</div>


		<div class="modal fade" id="modal{{$lab->id_lab}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="{{ url('/pinjamLab') }}" method="POST">
		        	@csrf
		        	<div class="form-group">
					    <label for="namaLab">Nama Lab</label>
					    <input type="text" class="form-control" id="namaLab" name="namaLab" placeholder="Nama Lab" value="{{ $lab->nama_lab }}" readonly>
					</div>
		        	<div class="form-group">
					    <label for="namaPeminjam">Nama Peminjam</label>
					    <input type="text" class="form-control" id="namaPeminjam" name="namaPeminjam" placeholder="Nama Peminjam">
					</div>
					<div class="form-group">
					    <label for="nim">Nim</label>
					    <input type="text" class="form-control" id="nim" placeholder="Nim" name="nim">
					</div>
					<div class="form-group">
					    <label for="keperluan">Keperluan</label>
					    <input type="text" class="form-control" id="keperluan" placeholder="Keperluan" name="keperluan">
					</div>
					<div class="form-group">
					    <label for="tglPinjam">Tanggal Pinjam</label>
					    <input type="date" class="form-control" id="tglPinjam" name="tglPinjam">
					</div>
					<div class="form-group">
					    <label for="tglSelesai">Tanggal Selesai</label>
					    <input type="date" class="form-control" id="tglSelesai" name="tglSelesai">
					</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-success">Pinjam</button>
		      </div>
		        </form>
		    </div>
		  </div>
		</div>
	@endforeach

@endsection