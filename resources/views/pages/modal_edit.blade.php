<!-- Modal -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Kegiatan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" enctype="multipart/form-data" id="formEdit"> 
        @csrf 
        @method('PUT')
        <div class="modal-body">
          <div class="form-group mb-2">
            <label class="form-label">Pratinjau Gambar</label>
            <div class="col-sm-12 col-offset-sm-2 d-flex justify-content-center">
              <img id="preview-image-before-upload" src=""
                      alt="preview image" style="max-height: 120px;">
            </div>
          </div>
          <div class="form-group mb-2 mt-3">
            <label class="form-label">Nama Kegiatan</label>
            <div class="col-sm-12">
              <input type="hidden" name="karyawan_nip"/>
              <input type="text" name="name" id="name" class="form-control" /> @error('name') <code>
                {{ $message }}
              </code> @enderror
            </div>
          </div>
          <div class="form-group mb-2">
            <label class="col-sm-3 col-form-label">Gambar</label>
            <div class="col-sm-12">
              <input type="file" name="gambar" class="form-control" id="formFile" accept="gambar/*">
                @error('gambar')
                  <div class="alert alert-danger mt-2">
                      {{ $message }}
                  </div>
                @enderror 
            </div>
          </div>
          <div class="form-group mb-2">
            <label class="col-sm-3 col-form-label">Tanggal</label>
            <div class="col-sm-12">
              <input type="date" name="tgl" class="form-control"id="tgl"/> @error('tgl') <code>
                {{ $message }}
              </code> @enderror
            </div>
          </div>
          <div class="form-group mb-2">
            <label class="col-sm-5 col-form-label">Deskripsi Kegiatan</label>
            <div class="col-sm-12">
              <input type="text" name="kegiatan" class="form-control" id="kegiatan"/> @error('kegiatan') <code>
                {{ $message }}
              </code> @enderror
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" value="Save">
        </div>
      </form>
    </div>
  </div>
</div>