<a href="<?php echo base_url('admin/visi_misi/tambah') ?>" class="btn btn-success">
	<i class="fa fa-plus"></i> Tambah</a></p>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th>#</th>
			<th>
				<center>isi</center>
			</th>
			<th>
				<center>gambar</center>
			</th>
			<th>
				<center>Action</center>
			</th>
		</tr>
	</thead>
	<tbody>
		<?php $i = 1;
		foreach ($visi_misi as $visi_misi) { ?>
			<tr class="odd gradeX">
				<td><?php echo $i ?></td>
				<td><?php echo $visi_misi->isi ?></td>
				<td>
					<img src="<?php echo base_url('assets/upload/image/thumbs/' . $visi_misi->gambar) ?>" class="img img-responsive" width="60">
				</td>
				<td>
					<center>
						<a href="<?php echo base_url('admin/visi_misi/edit/' . $visi_misi->id_vm) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
						<?php include('delete.php') ?>
					</center>
				</td>
			</tr>
		<?php $i++;
		} ?>
	</tbody>
</table>
