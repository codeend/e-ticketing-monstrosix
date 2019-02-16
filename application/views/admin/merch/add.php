<link rel="stylesheet" href="<?php echo base_url(); ?>temp/admin/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />
<header class="page-header">
	<h2>Merch</h2>

	<div class="right-wrapper pull-right">
		<ol class="breadcrumbs">
			<li>
				<a href="index.html">
					<i class="el el-th-list"></i>
				</a>
			</li>
			<li><span>Event</span></li>
			<li><span>Merch</span></li>
			<li><span>Tambah Merch</span></li>
		</ol>
		&nbsp;
	</div>
</header>

<section class="panel">
	<header class="panel-heading">
		<div class="panel-actions">
			<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
		</div>

		<h2 class="panel-title">Form Merch</h2>
	</header>
	<div class="panel-body">
		<form class="form-horizontal form-bordered" method="post" enctype="multipart/form-data" action="<?php echo site_url('Merch/AddProses');?>">
			<div class="form-group">
				<label class="col-md-3 control-label" for="textareaDefault">Deskripsi</label>
				<div class="col-md-6">
					<textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" data-plugin-maxlength maxlength="140" placeholder="Deskripsi"></textarea>
					<p>Max Character 140.</p>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 control-label">Foto</label>
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
				<label class="col-md-4 control-label" for="inputDefault">
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
				</label>
			</div>
			
		</form>
	</div>
</section>

<script type="text/javascript">
	CKEDITOR.replace( 'deskripsi' );
</script>