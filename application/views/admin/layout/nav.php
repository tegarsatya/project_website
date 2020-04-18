<nav class="navbar-default navbar-side" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav" id="main-menu">

			<!-- Dasbor -->
			<li><a href="<?php echo base_url('admin/dasbor') ?>"><i class="fa fa-dashboard"></i> Dasbor</a></li>

			<!-- Struktur Organisasi -->
			<li><a href="#"><i class="fa fa-book"></i> Struktur Organisasi<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><a href="<?php echo base_url('admin/struktur') ?>">Data struktur Organisasi</a></li>
					<li><a href="<?php echo base_url('admin/struktur/tambah') ?>">Tambah struktur Organisasi</a></li>
				</ul>
			</li>
			<!-- end Struktur Organisasi -->
			<!-- visi misi -->
			<li><a href=""><i class="fa fa-book"></i> Visi Misi <span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><a href="<?= base_url('') ?>">Data VISI MISI</a></li>
					<li><a href="<?= base_url('') ?>">Tambah Daftar VISI MISI</a></li>
				</ul>
			</li>
			<!-- end vivi misi -->

			<!-- Berita -->
			<li><a href="#"><i class="fa fa-newspaper-o"></i> Berita<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><a href="<?php echo base_url('admin/berita') ?>">Data Berita</a></li>
					<li><a href="<?php echo base_url('admin/berita/tambah') ?>">Tambah Berita</a></li>
					<li><a href="<?php echo base_url('admin/kategori_berita') ?>">Kategori Berita</a></li>
				</ul>
			</li>

			<!-- Modul Video -->
			<li><a href="#"><i class="fa fa-film"></i> Video<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><a href="<?php echo base_url('admin/video') ?>">Data Video</a></li>
					<li><a href="<?php echo base_url('admin/video/tambah') ?>">Tambah Video</a></li>
				</ul>
			</li>

			<!-- Modul User -->
			<li><a href="#"><i class="fa fa-users"></i> User/Administrator<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><a href="<?php echo base_url('admin/user') ?>">Data User/Administrator</a></li>
					<li><a href="<?php echo base_url('admin/user/tambah') ?>">Tambah User/Admin</a></li>
				</ul>
			</li>

			<!-- Data Guru -->
			<li><a href="#"><i class="fa fa-users"></i> Guru Aktif Mengajar<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><a href="<?php echo base_url('admin/guru') ?>">Data Guru Aktif Mengajar</a></li>
					<li><a href="<?php echo base_url('admin/guru/tambah') ?>">Tambah Data Guru</a></li>
				</ul>
			</li>

			<!-- Modul Konfigurasi -->
			<li><a href="#"><i class="fa fa-wrench"></i> Konfigurasi Website<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><a href="<?php echo base_url('admin/dasbor/konfigurasi') ?>">Konfigurasi Umum</a></li>
					<li><a href="<?php echo base_url('admin/dasbor/logo') ?>">Ganti Logo</a></li>
					<li><a href="<?php echo base_url('admin/dasbor/icon') ?>">Ganti Icon</a></li>
					<li><a href="<?php echo base_url('admin/dasbor/quote') ?>">Quote</a></li>
				</ul>
			</li>
		</ul>

	</div>

</nav>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2><?php echo $title ?></h2>
			</div>
		</div>
		<!-- /. ROW  -->
		<hr />

		<div class="row">
			<div class="col-md-12">
				<!-- Advanced Tables -->
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="table-responsive">
