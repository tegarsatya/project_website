<a href="<?php echo base_url('admin/struktur/tambah') ?>" class="btn btn-success">
	<i class="fa fa-plus"></i> Tambah</a></p>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th>#</th>
			<th>
				<center>judul</center>
			</th>
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
		foreach ($struktur as $str) { ?>
			<tr class="odd gradeX">
				<td><?php echo $i ?></td>
				<td><?php echo $str->judul ?></td>
				<td><?php echo $str->isi ?></td>
				<td>
					<img src="<?php echo base_url('assets/upload/image/thumbs/' . $str->gambar) ?>" class="img img-responsive" width="60">
				</td>
				<td>
				<center>
					<a href="<?php echo base_url('admin/struktur/edit/' . $str->id_str) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
					<?php include('delete.php') ?>
				</center>
				</td>
			</tr>
		<?php $i++;
		} ?>
	</tbody>
</table>
