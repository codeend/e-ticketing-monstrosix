
<header class="page-header">
	<h2>Cod</h2>

	<div class="right-wrapper pull-right">
		<ol class="breadcrumbs">
			<li>
				<a href="index.html">
					<i class="el el-th-list"></i>
				</a>
			</li>
			<li><span>Event</span></li>
			<li><span>No Cod</span></li>
			<li><span>Ubah No Cod</span></li>
		</ol>
		&nbsp;
	</div>
</header>

<section class="panel">
	<header class="panel-heading">
		<div class="panel-actions">
			<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
		</div>

		<h2 class="panel-title">Form No Cod</h2>
	</header>
	<div class="panel-body">
		<form class="form-horizontal form-bordered" method="post" enctype="multipart/form-data" action="<?php echo site_url('Cod/EditProses');?>">
			<div class="form-group">
				<label class="col-md-3 control-label" for="inputDefault">Nama</label>
				<div class="col-md-6">
					<input type="text" class="form-control" id="inputDefault" name="nama" placeholder="Nama Bank" value="<?php echo $cod->nama; ?>">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 control-label" for="inputDefault">No Whatsapp</label>
				<div class="col-md-6">
					<input type="text" class="form-control" id="inputDefault" name="no_hp" placeholder="No Whatsapp" value="<?php echo $cod->no_hp; ?>">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 control-label" for="inputDefault">
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
				</label>
			</div>
			<input type="hidden" name="create_date" value="<?php echo date("Y-m-d H:i:s"); ?>">
			<input type="hidden" name="id_cod" value="<?php echo $cod->id_cod; ?>">
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