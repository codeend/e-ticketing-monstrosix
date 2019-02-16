<link rel="stylesheet" href="<?php echo base_url(); ?>leaflet/leaflet.css"/>
<script src="<?php echo base_url(); ?>leaflet/leaflet.js"></script>

<header class="page-header">
	<h2>Acara</h2>

	<div class="right-wrapper pull-right">
		<ol class="breadcrumbs">
			<li>
				<a href="index.html">
					<i class="el el-th-list"></i>
				</a>
			</li>
			<li><span>Event</span></li>
			<li><span>Acara</span></li>
		</ol>
		&nbsp;
	</div>
</header>

<section class="panel">
	<header class="panel-heading">
		<div class="panel-actions">
			<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
		</div>

		<h2 class="panel-title">Form Acara</h2>
	</header>
	<div class="panel-body">
		<form class="form-horizontal form-bordered" method="post" enctype="multipart/form-data" action="<?php echo site_url('Acara/Update');?>">
			<div class="form-group">
				<label class="col-md-3 control-label" for="inputDefault">Nama Acara</label>
				<div class="col-md-6">
					<input type="text" class="form-control" id="nama_acara" name="nama_acara" placeholder="Nama Acara" value="<?php echo $acara->nama_acara; ?>">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 control-label">Deskripsi Acara</label>
				<div class="col-md-6">
					<textarea name="deskripsi_acara" id="deskripsi_acara" rows="3"><?php echo $acara->deskripsi_acara; ?></textarea>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 control-label">Terms & Conditions</label>
				<div class="col-md-6">
					<textarea name="term" id="term" rows="3"><?php echo $acara->term; ?></textarea>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 control-label">About</label>
				<div class="col-md-6">
					<textarea name="about" id="about" rows="3"><?php echo $acara->about; ?></textarea>
				</div>
			</div>			

			<div class="form-group">
				<label class="col-md-3 control-label" for="textareaDefault">Alamat Acara</label>
				<div class="col-md-6">
					<textarea name="alamat_acara" id="alamat_acara" rows="3"><?php echo $acara->alamat_acara; ?></textarea>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 control-label">Tanggal Acara</label>
				<div class="col-md-6">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</span>
						<input type="text" id="tgl_acara" name="tgl_acara" class="form-control" value="<?php echo $acara->tgl_acara; ?>">
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 control-label">Jam Acara</label>
				<div class="col-md-6">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-clock-o"></i>
						</span>
						<input type="text" id="jam_acara" name="jam_acara" data-plugin-timepicker class="form-control" data-plugin-options='{ "showMeridian": false }' value="<?php echo $acara->jam_acara; ?>">
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 control-label">Lokasi Acara</label>
				<div class="col-md-6">
					<div class="input-group">
						<div id="mapid" style="width: 600px; height: 400px;"></div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 control-label" for="inputDefault">Penyelenggara</label>
				<div class="col-md-6">
					<input type="text" class="form-control" id="inputDefault" name="create_by" id="create_by" placeholder="Penyelenggara" value="<?php echo $acara->create_by; ?>">
				</div>
			</div>

			<input type="hidden" name="lat" id="lat" value="<?php echo $acara->lat; ?>">
			<input type="hidden" name="lng" id="lng" value="<?php echo $acara->long; ?>">

			<div class="form-group">
				<label class="col-md-4 control-label" for="inputDefault">
					<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Simpan</button>
				</label>
			</div>
		</form>
	</div>
</section>

<script type="text/javascript">

	CKEDITOR.replace( 'deskripsi_acara' );
	CKEDITOR.replace( 'alamat_acara' );
	CKEDITOR.replace( 'term' );
	CKEDITOR.replace( 'about' );

	var lat = document.getElementById("lat");
	var lng = document.getElementById("lng");

	var mapOptions = {
        center: [-3.551722, 117.249992],
        zoom: 4
    }
    var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
    var map = new L.map('mapid', mapOptions);
    map.addLayer(layer);

    var popup = L.popup();
    var marker;

    map.on('click', onMapClick);

    function onMapClick(e) {

        popup
            .setLatLng(e.latlng)
            .setContent("Alamat Berada di Titik : " + e.latlng.toString())
            .openOn(map);
        $('[name="lat"]').val(e.latlng.lat);
        $('[name="lng"]').val(e.latlng.lng);
    }

    $(function() {

       	$('#tgl_acara').datepicker({
	        format: 'yyyy-m-d'
	    });
   	});




</script>

