<a href="#" class="btn btn-success">
	<i class="fa fa-plus"></i> Tambah</a></p>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th>#</th>
			<th>
				<center>Nam</center>
			</th>
			<th>
				<center>Gmail</center>
			</th>
			<th>
				<center>Pesan</center>
			</th>
			<th>
				<center>Action</center>
			</th>
		</tr>
	</thead>
	<tbody>
		<?php $i = 1;
		foreach ($kontak as $kontak) { ?>
			<tr class="odd gradeX">
				<td><?php echo $i ?></td>
				<td><?php echo $kontak->nama ?></td>
				<td><?php echo $kontak->gmail ?></td>
				<td><?php echo $kontak->pesan?></td>
				<td>
					<center>
						<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
						<?php include('delete.php') ?>
					</center>
				</td>
			</tr>
		<?php $i++;
		} ?>
	</tbody>
</table>
