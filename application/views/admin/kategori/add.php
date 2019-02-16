
<header class="page-header">
	<h2>Kategori</h2>

	<div class="right-wrapper pull-right">
		<ol class="breadcrumbs">
			<li>
				<a href="index.html">
					<i class="el el-th-list"></i>
				</a>
			</li>
			<li><span>Event</span></li>
			<li><span>Kategori</span></li>
			<li><span>Tambah Kategori</span></li>
		</ol>
		&nbsp;
	</div>
</header>

<section class="panel">
	<header class="panel-heading">
		<div class="panel-actions">
			<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
		</div>

		<h2 class="panel-title">Form Kategori</h2>
	</header>
	<div class="panel-body">
		<form class="form-horizontal form-bordered" method="post" enctype="multipart/form-data" action="<?php echo site_url('Kategori/AddProses');?>">
			<div class="form-group">
				<label class="col-md-3 control-label" for="inputDefault">Nama Kategori</label>
				<div class="col-md-6">
					<input type="text" class="form-control" id="inputDefault" name="nama_kategori" placeholder="Nama kategori">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 control-label" for="textareaDefault">Deskripsi</label>
				<div class="col-md-6">
					<textarea class="form-control" name="deskripsi" rows="3" data-plugin-maxlength maxlength="140" placeholder="Deskripsi"></textarea>
					<p>Max Character 140.</p>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 control-label" for="inputDefault">Harga</label>
				<div class="col-md-6">
					<input type="text" class="form-control" id="rupiah" name="harga" placeholder="Harga">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 control-label" for="inputDefault">Kapasitas</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="kapasitas" placeholder="kapasitas">
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

<script type="text/javascript">
	var rupiah = document.getElementById('rupiah');
	rupiah.addEventListener('keyup', function(e){
		rupiah.value = formatRupiah(this.value, 'Rp. ');
	});

	function formatRupiah(angka, prefix){
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
		split   		= number_string.split(','),
		sisa     		= split[0].length % 3,
		rupiah     		= split[0].substr(0, sisa),
		ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

		if(ribuan){
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}

		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	}
</script>