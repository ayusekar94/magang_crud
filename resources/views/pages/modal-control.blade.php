<script>
$(document).on('click','.open_modal',function(){
    var id = $(this).data('id');
	var name = $(this).data('name');
	var tgl = $(this).data('tgl');
	var kegiatan = $(this).data('kegiatan');

	$('#modalEdit').modal('show');
	$('#id').val(id);
	$('#name').val(name);
	$('#tgl').val(tgl);
	$('#kegiatan').val(kegiatan);
    $('#formEdit').attr("action","/kegiatan/"+id);
});
</script>