<header class="page-header">
	<h2>Pemesan</h2>

	<div class="right-wrapper pull-right">
		<ol class="breadcrumbs">
			<li>
				<a href="index.html">
					<i class="el el-th-list"></i>
				</a>
			</li>
			<li><span>Tiket</span></li>
			<li><span>Pemesan</span></li>
		</ol>
		&nbsp;
	</div>
</header>

<section class="panel">
	<header class="panel-heading">
		<h2 class="panel-title">Data Pemesan Tiket</h2>
	</header>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-bordered table-striped mb-none" id="tbl_kategori">
				<thead>
					<tr>
						<th>Nama</th>
						<th>No Telp</th>
						<th>Email</th>
						<th>Tgl Pesan</th>
						<th>Tgl Bayar</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach($pesanan as $item){
							if($item->status == 'Pesan')
								{ $btn_status = "<button type='button' class='btn btn-warning'></i> Pesan</button>"; }
							if($item->status == 'Konfirmasi Pembayaran')
								{ $btn_status = "<a href='javascript:void(0);' class='item_konfirm modal-basic' data-id='".$item->id_pemesan."'>
													<button type='button' class='btn btn-primary'></i> Konfirmasi Pembayaran</button>
												</a>"; }
							if($item->status == 'Sukses')
								{ $btn_status = "<a href='javascript:void(0);' class='item_tiket modal-basic' data-id='".$item->id_pemesan."'>
													<button type='button' class='btn btn-success'></i> Sukses</button>
												</a>"; }
							if($item->status == 'Terkirim')
							{ $btn_status = "<button type='button' class='btn btn-default'></i> Tiket Terkirim</button>"; }
							echo "
								<tr class='gradeU'>
									<td>".$item->nama_pemesan."</td>
									<td>".$item->no_telp."</td>
									<td>".$item->email."</td>
									<td>".date('d/M/Y H:i', strtotime($item->tgl_pesan))."</td>
									<td>".date('d/M/Y H:i', strtotime($item->tgl_bayar))."</td>
									<td>".$btn_status."</td>
									<td>
										<a href='javascript:void(0);' class='item_delete modal-basic' data-id='".$item->id_pemesan."'>
											<button type='button' class='btn btn-info'><i class='glyphicon glyphicon-info-sign'></i> Detail</button>
										</a>
									</td>
								</tr>
							";
						}
					?>
				</tbody>
			</table>
		</div>

		<div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-hidden="true">
	      	<div class="modal-dialog" role="document">
	        	<div class="modal-content">
	          		<div class="modal-header">
		            <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori</h5>
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		              	<span aria-hidden="true">&times;</span>
		            </button>
	          	</div>
	          	<div class="modal-body">
	               	<strong>Yakin akan dihapus ?</strong>
	          	</div>
	          	<div class="modal-footer">
		            <input type="hidden" name="id" id="id" class="form-control">
		            <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Oke</button>
		            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
	          	</div>
	        </div>
	      </div>
	    </div>

	    <div class="modal fade" id="ModalDetalPemesan" tabindex="-1" role="dialog" aria-hidden="true">
	      	<div class="modal-dialog" role="document">
	        	<div class="modal-content">
	          		<div class="modal-header">
		            <h5 class="modal-title" id="HeaderDetail"></h5>
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		              	<span aria-hidden="true">&times;</span>
		            </button>
	          	</div>
	          	<div class="modal-body">
	               	<div class="table-responsive">
						<table class="table table-bordered table-striped mb-none" id="tbl_kategori">
							<thead>
								<tr>
									<th>Nama</th>
									<th>Kategori</th>
									<th>Jumlah</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody id="TblDetail"></tbody>
						</table>
					</div>
	          	</div>
	          	<div class="modal-footer">
		            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
	          	</div>
	        </div>
	      </div>
		</div>
		
		<!-- LIHAT Foto -->
		<div class="modal fade" id="ModalKonfirmPemesan" tabindex="-1" role="dialog" aria-hidden="true">
	      	<div class="modal-dialog" role="document">
	        	<div class="modal-content">
	          		<div class="modal-header">
		            <h5 class="modal-title" id="HeaderDetail"></h5>
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		              	<span aria-hidden="true">&times;</span>
		            </button>
	          	</div>
	          	<div class="modal-body">
				  	<table>
						<thead>
							<tr>
								<th>Foto Pembayaran</th>
							</tr>
						</thead>
						<tbody id="TblKonfirm"></tbody>
					</table>
	          	</div>
	          	<div class="modal-footer">
					<input type="hidden" name="id_tiket_pemesan" id="id_tiket_pemesan" class="form-control">
					<button type="button" class="btn btn-danger" id="btn_hapus_pemesanan">Hapus</button>
				  	<button type="button" class="btn btn-info" id="btn_kirim_tiket">Valid</button>
		        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
	          	</div>
	        </div>
	      </div>
	    </div>
		
		<!-- KIRIM TIKET -->
		<div class="modal fade" id="ModalKirimTiket" tabindex="-1" role="dialog" aria-hidden="true">
	      	<div class="modal-dialog" role="document">
	        	<div class="modal-content">
	          		<div class="modal-header">
		            <h5 class="modal-title" id="HeaderDetail"></h5>
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		              	<span aria-hidden="true">&times;</span>
		            </button>
	          	</div>
	          	<div class="modal-body">
				  	<p>Tiket akan dikirim memalui email.</p>
					<p><strong>Apakah Anda yakin ?</strong></p>
	          	</div>
	          	<div class="modal-footer">
				  	<input type="hidden" name="id_tiket_kirim" id="id_tiket_kirim" class="form-control">
				  	<button type="button" class="btn btn-info" id="btn_kirim_tiket_fix">Kirim</button>
		        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
	          	</div>
	        </div>
	      </div>
	    </div>

		<div class="modal fade" id="KirimTiket" tabindex="-1" role="dialog" aria-hidden="true">
	      	<div class="modal-dialog" role="document">
	        	<div class="modal-content">
	          		<div class="modal-header">
		            <h5 class="modal-title" id="exampleModalLabel">Kirim Tiket</h5>
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		              	<span aria-hidden="true">&times;</span>
		            </button>
	          	</div>
	          	<div class="modal-body">
	               	<p>Pembayaran sudah divalidasi. Status pemesan akan berubah menjadi sukses.  </p>
					<p><strong>Apakah Anda yakin ?</strong></p>
	          	</div>
	          	<div class="modal-footer">
		            <input type="hidden" name="idPemesan" id="idPemesan" class="form-control">
		            <button type="button" type="submit" id="btn_fix_tiket" class="btn btn-primary">Oke</button>
		            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
	          	</div>
	        </div>
	    </div>

	</div>
</section>

<script type="text/javascript">
	$(document).ready(function() {
	    $('#tbl_kategori').DataTable({
	    	'searching'   : false,
	    	lengthMenu: [
	        	[5],
	          	['5']
	        ],
	        'columnDefs': [
			    { "width": "15%", "targets": 0 },
			    { "width": "15%", "targets": 1 },
			    { "width": "15%", "targets": 2 },
			    { "width": "10%", "targets": 3 },
			    { "width": "10%", "targets": 4 },
			    { "width": "10%", "targets": 5 },
			    { "width": "15%", "targets": 6 }
			]
	    });
	} );

	$('.item_delete').on('click',function(){
		$('#TblDetail').empty();
	    var id = $(this).data('id');
	    $('#ModalDetalPemesan').modal('show');

	    $.ajax({
            type : "Get",
            url  : "<?php echo site_url('Pemesan/View/');?>" + id,
            dataType: 'JSON',
            success: function(data){
             	var detail = document.getElementById('TblDetail');
             	for(var x = 0; x < data.Tiket.length; x++){
             		detail.innerHTML += '<tr>' +
             								'<td>'+data.Tiket[x].pemesan+'</td>'+
             								'<td>'+data.Tiket[x].kategori+'</td>'+
             								'<td>'+data.Tiket[x].jumlah+'</td>'+
             								'<td>'+formatRupiah(data.Tiket[x].total, 'Rp. ')+'</td>'+
             							'</tr>';
             	}
             	detail.innerHTML += '<tr><td><strong>TOTAL</strong></td><td colspan=3"><strong>'+formatRupiah(data.TotalPembayaran.totalp, 'Rp. ')+'</strong></td></tr>';
            }
          });
          return false;
	});

	$('.item_konfirm').on('click',function(){
		$('#TblKonfirm').empty();
	    var id = $(this).data('id');
	    $('#ModalKonfirmPemesan').modal('show');
		$('[name="id_tiket_pemesan"]').val(id);

	    $.ajax({
            type : "Get",
            url  : "<?php echo site_url('Konfirmasi/View/');?>" + id,
            dataType: 'JSON',
            success: function(data){
				console.log(data.foto);
             	var detail = document.getElementById('TblKonfirm');
             	for(var x = 0; x < data.foto.length; x++){
             		detail.innerHTML += '<tr>' +
             								'<td><img src="<?php echo base_url(); ?>temp/file/'+data.foto[x].foto+'"></td>'+
             							'</tr>';
             	}
            }
          });
          return false;
	});

	$('.item_tiket').on('click',function(){
	    var id = $(this).data('id');
	    $('#ModalKirimTiket').modal('show');
		$('[name="id_tiket_kirim"]').val(id);

	    $.ajax({
            type : "Get",
            url  : "<?php echo site_url('Konfirmasi/KirimTiket/');?>" + id,
            dataType: 'JSON',
            success: function(data){
				console.log(data);
            }
          });
          return false;
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

	$('#btn_kirim_tiket').on('click',function(){
	    $('#idPemesan').val($('#id_tiket_pemesan').val());
	    $('#KirimTiket').modal('show');
	});

	$('#btn_fix_tiket').on('click',function(){
	    var id = $('#idPemesan').val();
	    
		$.ajax({
            type : "Get",
            url  : "<?php echo site_url('Konfirmasi/CreateTiket/');?>" + id,
            dataType: 'JSON',
            success: function(data){
				// console.log(data);
				if(data.state == 0){
					alert(data.message);
					$('#KirimTiket').modal('hide');
					$('#ModalKonfirmPemesan').modal('hide');
					setTimeout(function(){
						location.reload();
					}, 1000);
				}else{
					alert(data.message);
					$('#KirimTiket').modal('hide');
					$('#ModalKonfirmPemesan').modal('hide');
					setTimeout(function(){
						location.reload();
					}, 1000);
				}
			}
          });
          return false;
	});

	$('#btn_kirim_tiket_fix').on('click',function(){
		// alert($('#id_tiket_kirim').val());
		$.ajax({
            type : "Get",
            url  : "<?php echo site_url('Konfirmasi/KirimTiket/');?>" + $('#id_tiket_kirim').val(),
            dataType: 'JSON',
            success: function(data){
				//console.log(data);
				if(data.state == 0){
					alert(data.message);
					$('#ModalKirimTiket').modal('hide');
					setTimeout(function(){
						location.reload();
					}, 1000);
				}else{
					alert(data.message);
					$('#ModalKirimTiket').modal('hide');
					setTimeout(function(){
						location.reload();
					}, 1000);
				}
			}
        });
        return false;
	});

	// HAPUS PEMESAN
	$('#btn_hapus_pemesanan').on('click', function(){
		//alert($('#id_tiket_pemesan').val());
		$.ajax({
            type : "Get",
            url  : "<?php echo site_url('Konfirmasi/HapusPemesanan/');?>" + $('#id_tiket_pemesan').val(),
            dataType: 'JSON',
            success: function(data){
				//console.log(data);
				if(data.state == 0){
					alert(data.message);
					$('#ModalKonfirmPemesan').modal('hide');
					setTimeout(function(){
						location.reload();
					}, 1000);
				}else{
					alert(data.message);
					$('#ModalKonfirmPemesan').modal('hide');
					setTimeout(function(){
						location.reload();
					}, 1000);
				}
			}
        });
        return false;
	});
</script>