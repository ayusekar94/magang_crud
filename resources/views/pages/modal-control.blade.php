<script type="text/javascript">
$(document).ready(function() {
  $('#formFile').on('change', function() {
    let reader = new FileReader();
    reader.onload = function(e) {
      $('#preview-image-before-upload').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);
  });

  $('#formFileEdit').on('change', function() {
    let reader = new FileReader();
    reader.onload = function(e) {
      $('#preview-image-before-upload-edit').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);
  });
});

$(document).on('click','.open_modal',function(){
    var id = $(this).data('id');
	var name = $(this).data('name');
	var tgl = $(this).data('tgl');
	var kegiatan = $(this).data('kegiatan');
	var karyawan_nip = $(this).data('karyawan_nip');
	var gambar = $(this).data('gambar');

	$('#modalEdit').modal('show');
	$('#id').val(id);
	$('#name-edit').val(name);
	$('#tgl-edit').val(tgl);
	$('#kegiatan-edit').val(kegiatan);
	$('#karyawan_nip-edit').val(karyawan_nip);
	// $('#formFileEdit').val(gambar);
	$('#preview-image-before-upload-edit').attr('src', gambar);
    $('#formEdit').attr("action","/kegiatan/"+id);
});

// Buka Modal Saat Validation Error
   @if ($errors->has('name-edit')||$errors->has('tgl-edit')||$errors->has('kegiatan-edit')||$errors->has('image-edit'))
      $('#formEdit').modal('show');
   @endif
</script>