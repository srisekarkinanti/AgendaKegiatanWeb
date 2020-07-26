<style>
	.btn {
		border:none;
	}
</style>

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>
				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success text-white" role="alert">
					<b><?php echo $this->session->flashdata('success'); ?></b>
				</div>
				<?php endif; ?>
				
				<!-- DataTables -->
				<div class="card mb-3">
					

						<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data" class="modal fade">
	    					<div class="modal-dialog">
	       						<div class="modal-content">
	            					<div class="modal-header">
	            						<h4 class="modal-title">Tambah Data</h4>
	                					<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
	                					
	            					</div>
	            			<form class="form-horizontal" action="<?php echo base_url('admin/topics/add')?>" method="post" enctype="multipart/form-data" role="form">
		           			<div class="modal-body">
		                    <div class="form-group">
		                        <label for="topik">Topik*</label>
								<input class="form-control <?php echo form_error('topik') ? 'is-invalid':'' ?>"
								 type="text" name="topik" min="0" placeholder="Topik" />
								<div class="invalid-feedback">
									<?php echo form_error('topik') ?>
								</div>
		                    </div>
		                </div>
		                <div class="modal-footer">
		                    <input class="btn btn-success" type="submit" name="btn" value="Save" />
		                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
		                </div>
	                	</form>
	            				</div>
	        				</div>
	    				</div>

						<div class="card-body">
							<div class="d-flex align-items-start mb-3">
		<h4 class="card-title mb-0" style="color: #212529;">Daftar Topik</h4>
		<div class="ml-auto">
						<button type="button" data-toggle="modal" data-target="#tambah-data" class="btn btn-primary"><i class="fa fa-plus-circle"></i>&nbsp;Tambah Topik</button>
			
			
		</div>
	</div>
	<hr>
							<div class="table-responsive">
							<table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Topik</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($topics as $topic): ?>
									<tr>
										<td>
											<?php echo $topic->topik ?>
										</td>
										<td width="250">
											<a data-toggle="modal" data-target="#edit-data<?= $topic->idtopic ?>" class="btn btn-small btn-warning text-white"><i class="fa fa-edit"></i> Ubah</a>
											<button type="button" class="btn btn-danger btnDelete" data-id="<?= $topic->idtopic ?>">
												<i class="fa fa-trash"></i>&nbsp;Hapus
											</button>
										</td>
									</tr>
									<?php endforeach; ?>
									<?php foreach ($topics as $topic): ?>
									<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data<?= $topic->idtopic ?>" class="modal fade">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title">Ubah Topik</h4>
													<button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
												</div>
												<form class="form-horizontal" action="<?php echo base_url("admin/topics/edit/".$topic->idtopic)?>" method="post" enctype="multipart/form-data" role="form">
												<div class="modal-body">
													<input type="hidden" name="id" value="<?= $topic->idtopic ?>"/>
													<div class="form-group">
														<label for="topik">Topik*</label>
														<input class="form-control <?php echo form_error('topik') ? 'is-invalid': '' ?>" type="text" name="topik" min="0" placeholder="" value="<?php echo $topic->topik ?>" />
														<div class="invalid-feedback">
															<?php echo form_error('topik') ?>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
													<input class="btn btn-success" type="submit" name="btn" value="Simpan"/>
													
												</div>
												</form>
											</div>
										</div>
									</div>	
								<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						</div>
					</div>

	<script>
	$(document).ready(function(){
		$('.btnDelete').click(function(){
			var id = $(this).data('id')
			var url = "<?= site_url('admin/topics/delete/') ?>"+id
			swal({
				title: "Hapus",
				text : "Yakin ingin menghapus topik?",
				 icon: "warning",
			  button: "hapus",
			  dangerMode: true,
			}).then((res) => {
		        if (res) {
		          $.ajax({
		          	url : url,
		          	method: "DELETE",
		          	dataType: false,
		          	success:function(){
		          		swal("berhasil","Berhasil menghapus topik","success")
		          		location.reload()
		          	},
		          	error:function(){
		          		swal("error","error while deleting","error")
		          	}
		          })
		        }else {
		          swal("Canceled!!");
		        }
		      });
		})

	$('#dataTable').DataTable()
	})
	</script>

