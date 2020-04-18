<script src="<?php echo base_url() ?>assets/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
	tinymce.init({
		file_browser_callback: function(field, url, type, win) {
			tinyMCE.activeEditor.windowManager.open({
				file: '<?php echo base_url() ?>assets/kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
				title: 'KCFinder',
				width: 700,
				height: 500,
				inline: true,
				close_previous: false
			}, {
				window: win,
				input: field
			});
			return false;
		},
		selector: "#keterangan",
		height: 150,
		plugins: [
			"advlist autolink lists link image charmap print preview anchor",
			"searchreplace visualblocks code fullscreen",
			"insertdatetime media table contextmenu paste"
		],
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	});
</script>
<?php
// Erro
if (isset($error)) {
	echo '<div class="alert alert-warning">';
	echo $error;
	echo '</div>';
}

// Validasi
echo validation_errors('<div class="alert alert-success">', '</div>');

// Form
echo form_open_multipart('admin/struktur/edit/' . $struktur->id_str);
?>
<div class="col-md-12">
	<div class="form-group form-group-lg">
		<label>Jenis Struktur Organisasi</label>
		<input type="text" name="judul" placeholder="Jenis Struktur Organisasi" value="<?php echo set_value('judul') ?>" required class="form-control">
	</div>
</div>

<div class="col-md-12">

	<div class="form-group">
		<label>Upload gambar</label>
		<input type="file" name="gambar" class="form-control">
	</div>

	<div class="form-group">
		<label>Keterangan</label>
		<textarea name="isi" class="form-control" placeholder="isi Dari Struktur Organisasi" id="isi"><?php echo set_value('isi') ?></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="submit" value="Simpan Data" class="btn btn-primary btn-lg">
		<input type="reset" name="reset" value="Reset" class="btn btn-default btn-lg">
	</div>

</div>


<?php echo form_close() ?>
