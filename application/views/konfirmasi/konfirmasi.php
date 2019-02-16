<link rel="stylesheet" href="<?php echo base_url(); ?>temp/admin/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />
<header class="page-header">
	<h2>Konfirmasi Pembayaran</h2>

	<div class="right-wrapper pull-right">
		<ol class="breadcrumbs">
			<li>
				<a href="index.html">
					<i class="el el-usd"></i>
				</a>
			</li>
			<li><span>Konfirmasi Pembayaran</span></li>
		</ol>
		&nbsp;
	</div>
</header>

<section class="panel">
	<header class="panel-heading">
		<div class="panel-actions">
			<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
		</div>

		<h2 class="panel-title">Form Upload Bukti Pembayaran</h2>
	</header>
	<div class="panel-body">
		<form class="form-horizontal form-bordered" method="post" enctype="multipart/form-data" action="<?php echo site_url('Konfirmasi/AddProses');?>">

			<div class="form-group">
				<label class="col-md-3 control-label">Data Pemesanan</label>
				<div class="col-md-6">
					<section class="form-group-vertical">
						<input class="form-control" type="text" value="<?php echo $pemesan->nama_pemesan; ?>" readonly>
						<input class="form-control" type="text" value="<?php echo $pemesan->no_telp; ?>" readonly> 
						<input class="form-control last" type="text" value="<?php echo $pemesan->email; ?>" readonly>
					</section>
				</div>
			</div>
			<input type="hidden" name="id_pemesan" value="<?php echo $token; ?>">
			<div class="form-group">
				<label class="col-md-3 control-label">Upload Bukti Pembayaran</label>
				<div class="col-md-6">
					<div class="fileupload fileupload-new" data-provides="fileupload">
						<div class="input-append">
							<div class="uneditable-input">
								<i class="fa fa-file fileupload-exists"></i>
								<span class="fileupload-preview"></span>
							</div>
							<span class="btn btn-default btn-file">
								<span class="fileupload-exists">Change</span>
								<span class="fileupload-new">Select file</span>
								<input type="file" name="upload"/>
							</span>
							<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-6 control-label" for="inputDefault">
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Konfirmasi</button>
				</label>
			</div>
		</form>
	</div>
</section>

<script src="<?php echo base_url(); ?>temp/admin/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>