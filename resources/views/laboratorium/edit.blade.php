<div class="modal fade" id="edit{{$data['id_lab']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah List Laboratorium</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('laboratorium.update', $data['id_lab']) }}" method="POST" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <div class="form-group">
            <label for="namaLab">Nama Lab</label>
            <input type="namaLab" name="namaLab" class="form-control" id="namaLab" aria-describedby="namaLab" value="{{$data['nama_lab']}}">
          </div>
          <div class="form-group">
            <label for="aslab">Aslab</label>
            <input type="text" name="aslab" class="form-control" id="aslab" value="{{ $data['aslab'] }}">
          </div>
          <div class="form-group">
            <label for="kapasitas">Kapasitas</label>
            <input type="text" name="kapasitas" class="form-control" id="kapasitas" value="{{ $data['kapasitas'] }}">
          </div>
          <div class="form-group">
            <label for="fasilitas">Fasilitas</label>
            <input type="text" name="fasilitas" class="form-control" id="fasilitas" value="{{ $data['fasilitas'] }}">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Gambar Lab</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="foto" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Pilih foto</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text">Upload</span>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
      </div>
        </form>
    </div>
  </div>
</div>