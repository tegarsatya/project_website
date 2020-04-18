<a href="<?php echo base_url('admin/guru/tambah') ?>" class="btn btn-success">
	<i class="fa fa-plus"></i> Tambah</a></p>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th>#</th>
			<th>
				<center>Nama Guru</center>
			</th>
			<th>
				<center>Alamat Guru</center>
			</th>
			<th>
				<center>Ngampuh Pelajaran</center>
			</th>
			<th>
				<center>Foto Guru</center>
			</th>
			<th>
				<center>Action</center>
			</th>
		</tr>
	</thead>
	<tbody>
		<?php $i = 1;
		foreach ($guru as $guru) { ?>
			<tr class="odd gradeX">
				<td><?php echo $i ?></td>
				<td><?php echo $guru->nama_guru ?></td>
				<td><?php echo $guru->alamat ?></td>
				<td><?php echo $guru->pelajaran?></td>
				<td>
					<img src="<?php echo base_url('assets/upload/image/thumbs/' . $guru->gambar) ?>" class="img img-responsive" width="60">
				</td>
				<td>
					<center>
						<a href="<?php echo base_url('admin/struktur/edit/' . $guru->id_guru) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
						<?php include('delete.php') ?>
					</center>
				</td>
			</tr>
		<?php $i++;
		} ?>
	</tbody>
</table>
