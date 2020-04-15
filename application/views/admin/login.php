<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?= base_url() ?></title>
	<!-- BOOTSTRAP STYLES-->
	<link href="<?= base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" />
	<!-- FONTAWESOME STYLES-->
	<link href="<?= base_url() ?>assets/admin/assets/css/font-awesome.css" rel="stylesheet" />
	<!-- CUSTOM STYLES-->
	<link href="<?= base_url() ?>assets/admin/assets/css/custom.css" rel="stylesheet" />
	<!-- GOOGLE FONTS-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>

<body>
	<div class="container">
		<div class="row text-center ">
			<div class="col-md-12">
				<br /><br />
				<h2> Halaman Login Admin</h2>

				<h2>Website Sma Banjarwangi</h2>
				<br />
			</div>
		</div>
		<div class="row ">

			<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong> Enter Details To Login </strong>
					</div>
					<div class="panel-body">
						<form role="form">
							<br />
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag"></i></span>
								<input type="text" class="form-control" placeholder="Your Username " />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input type="password" class="form-control" placeholder="Your Password" />
							</div>
							<div class="form-group">
								<label class="checkbox-inline">
									<input type="checkbox" /> Remember me
								</label>
								<span class="pull-right">
									<a href="#">Forget password ? </a>
								</span>
							</div>

							<a href="index.html" class="btn btn-primary ">Login Now</a>
							<hr />
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
	<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
	<!-- JQUERY SCRIPTS -->
		<script src="<?= base_url() ?>assets/admin/assets/js/jquery-1.10.2.js"></script>
		<!-- BOOTSTRAP SCRIPTS -->
		<script src="<?= base_url() ?>assets/admin/assets/js/bootstrap.min.js"></script>
		<!-- METISMENU SCRIPTS -->
		<script src="<?= base_url() ?>assets/admin/assets/js/jquery.metisMenu.js"></script>
		<!-- CUSTOM SCRIPTS -->
		<script src="<?= base_url() ?>assets/admin/assets/js/custom.js"></script>

	</body>

</html>
