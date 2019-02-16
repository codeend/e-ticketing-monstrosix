
<header class="page-header">
	<h2>Pengguna</h2>

	<div class="right-wrapper pull-right">
		<ol class="breadcrumbs">
			<li>
				<a href="index.html">
					<i class="el el-adult"></i>
				</a>
			</li>
			<li><span>Pengguna</span></li>
			<li><span>Tambah Pengguna</span></li>
		</ol>
		&nbsp;
	</div>
</header>

<section class="panel">
	<header class="panel-heading">
		<div class="panel-actions">
			<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
		</div>

		<h2 class="panel-title">Form Pengguna</h2>
	</header>
	<div class="panel-body">
		<form class="form-horizontal form-bordered" method="post" enctype="multipart/form-data" action="<?php echo site_url('Pengguna/AddProses');?>">
			<div class="form-group">
				<label class="col-md-3 control-label" for="inputDefault">Nama Pengguna</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="nama_pengguna" placeholder="Nama Pengguna">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 control-label" for="inputDefault">No Telp</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="no_telp" placeholder="No Telp">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 control-label" for="inputDefault">Email</label>
				<div class="col-md-6">
					<input type="email" class="form-control" name="email" placeholder="Email">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 control-label" for="inputDefault">Password</label>
				<div class="col-md-6">
					<input type="password" class="form-control" name="password" placeholder="Password">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 control-label" for="inputDefault">Re Password</label>
				<div class="col-md-6">
					<input type="password" class="form-control" name="repassword" placeholder="Re Password">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 control-label" for="inputDefault">
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
				</label>
			</div>
			<input type="hidden" name="create_date" value="<?php echo date("Y-m-d H:i:s"); ?>">
		</form>
	</div>
</section>