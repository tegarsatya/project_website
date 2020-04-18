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
echo form_open_multipart('admin/guru/tambah');
?>
	<div class="col-md-12">
		<div class="form-group form-group-lg">
			<label>Nama Guru </label>
			<input type="text" name="nama_guru" placeholder="Inputkan Nama Guru dengan Lengkap beserta Gelarnya" value="<?php echo set_value('nama_guru') ?>" required class="form-control">
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group form-group-lg">
			<label>Alamat Guru</label>
			<input type="text" name="alamat" placeholder="Inputkan Alamat lengkap" value="<?php echo set_value('alamat') ?>" required class="form-control">
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group form-group-lg">
			<label>Mata Pelajaran yang Di ampuh</label>
			<input type="text" name="pelajaran" placeholder="Inputkan Mata Pelajaran" value="<?php echo set_value('pelajaran') ?>" required class="form-control">
		</div>
	</div>

	<div class="col-md-12">

	<div class="form-group">
		<label>Upload gambar</label>
		<input type="file" name="gambar" class="form-control">
	</div>


		<div class="form-group">
			<input type="submit" name="submit" value="Simpan Data" class="btn btn-primary btn-lg">
			<input type="reset" name="reset" value="Reset" class="btn btn-default btn-lg">
		</div>

</div>


<?php echo form_close() ?>
