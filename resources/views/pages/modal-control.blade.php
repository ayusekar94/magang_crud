<script>
$(document).on('click','.open_modal',function(){
    var id = $(this).data('id');
	var name = $(this).data('name');
	var tgl = $(this).data('tgl');
	var kegiatan = $(this).data('kegiatan');
	var karyawan_nip = $(this).data('karyawan_nip');

	$('#modalEdit').modal('show');
	$('#id').val(id);
	$('#name').val(name);
	$('#tgl').val(tgl);
	$('#kegiatan').val(kegiatan);
	$('#karyawan_nip').val(karyawan_nip);
    $('#formEdit').attr("action","/kegiatan/"+id);
});
</script>