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
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
              <input type="text" name="name" id="name" class="form-control" /> @error('name') <code>
                {{ $message }}
              </code> @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Tanggal</label>
            <div class="col-sm-9">
              <input type="date" name="tgl" class="form-control" id="tgl" /> @error('tgl') <code>
                {{ $message }}
              </code> @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Kegiatan</label>
            <div class="col-sm-9">
              <input type="text" name="kegiatan" class="form-control" id="kegiatan" /> @error('kegiatan') <code>
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