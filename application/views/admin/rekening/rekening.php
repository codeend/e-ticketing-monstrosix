
<header class="page-header">
	<h2>Rekening</h2>

	<div class="right-wrapper pull-right">
		<ol class="breadcrumbs">
			<li>
				<a href="index.html">
					<i class="el el-th-list"></i>
				</a>
			</li>
			<li><span>Event</span></li>
			<li><span>Rekening</span></li>
		</ol>
		&nbsp;
	</div>
</header>

<section class="panel">
	<header class="panel-heading">
		<div class="panel-actions">
			<a href="<?php echo site_url('Rekening/Add');?>">
				<button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>Tambah Rekening</button>
			</a>
		</div>

		<h2 class="panel-title">Data Rekening</h2>
	</header>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-bordered table-striped mb-none" id="tbl_rek">
				<thead>
					<tr>
						<th>Nama Bank</th>
						<th>Atas Nama</th>
						<th>No Rekening</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach($Rekening as $item){
							echo "
								<tr class='gradeU'>
									<td>".$item->nama_bank."</td>
									<td>".$item->atas_nama."</td>
									<td>".$item->no_rek."</td>
									<td>
										<a href='".site_url('Rekening/Edit/'.$item->id_rek)."'>
											<button type='button' class='btn btn-warning'><i class='glyphicon glyphicon-edit'></i> Ubah</button>
										</a>
										<a href='javascript:void(0);' class='item_delete modal-basic' data-id='".$item->id_rek."'>
											<button type='button' class='btn btn-danger'><i class='glyphicon glyphicon-remove-sign'></i> Hapus</button>
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
		            <h5 class="modal-title" id="exampleModalLabel">Hapus Rekening</h5>
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
	</div>
</section>



<script type="text/javascript">
	$(document).ready(function() {
	    $('#tbl_rek').DataTable({
	    	'searching'   : false,
	    	lengthMenu: [
	        	[5],
	          	['5']
	        ],
	        'columnDefs': [
			    { "width": "15%", "targets": 0 },
			    { "width": "20%", "targets": 1 },
			    { "width": "15%", "targets": 2 },
			    { "width": "10%", "targets": 3 }
			]
	    });
	} );

	$('.item_delete').on('click',function(){
	    var id = $(this).data('id');
	    $('#Modal_Delete').modal('show');
	    $('[name="id"]').val(id);
	});

	$('#btn_delete').on('click',function(){
	    var id = $('#id').val();
	    $.ajax({
	        type : "POST",
	        data: "id="+id,
	        url: "<?php echo site_url("rekening/Hapus");?>",
	        success: function(data){
              	$('#Modal_Delete').modal('hide');
              	setTimeout(function(){
                	location.reload();
              	}, 1000);
	        }
	    });
	    return false;
	});

</script>