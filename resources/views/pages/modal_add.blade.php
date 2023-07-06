<!-- Modal -->
<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/kegiatan" method="post" enctype="multipart/form-data"> @csrf 
          <div class="modal-body">
          <div class="form-group mb-2">
              <label class="form-label">Nama Kegiatan</label>
              <div class="col-sm-9">
                <input type="text" name="name" placeholder="Nama Lengkap" class="form-control" /> @error('nama') <code>
                  {{ $message }}
                </code> @enderror
              </div>
            </div>
            <div class="form-group mb-2">
              <label class="col-sm-3 col-form-label">Tanggal</label>
              <div class="col-sm-9">
                <input type="date" name="tgl" class="form-control" /> @error('tgl') <code>
                  {{ $message }}
                </code> @enderror
              </div>
            </div>
            <div class="form-group mb-2">
              <label class="col-sm-3 col-form-label">Deskripsi Kegiatan</label>
              <div class="col-sm-9">
                <input type="text" name="kegiatan" class="form-control" /> @error('kegiatan') <code>
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
