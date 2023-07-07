<script>
$(document).ready(function() {
  $('#formFile').on('change', function() {
    let reader = new FileReader();
    reader.onload = function(e) {
      $('#preview-image-before-upload').attr('src', e.target.result);
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
	$('#name').val(name);
	$('#tgl').val(tgl);
	$('#kegiatan').val(kegiatan);
	$('#karyawan_nip').val(karyawan_nip);
	$('#gambar').val(gambar);
    $('#formEdit').attr("action","/kegiatan/"+id);
});
</script>