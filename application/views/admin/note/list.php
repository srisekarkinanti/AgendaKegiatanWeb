

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">
					

					

					<div class="card-body">
						<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>
				<div class="d-flex align-items-start mb-3">
				<h4 class="card-title mb-0" style="color: #212529;">Daftar Catatan</h4>
				<div class="ml-auto">
						<button type="button" class="btn btn-primary btnAdd" data-toggle="modal" data-target="#tambahNote"><i class="fa fa-plus-circle"></i>&nbsp;Tambah Catatan</button>
								
					
					
				</div>
			</div>
			<hr>
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Tanggal</th>
										<th>Topik</th>
										<th>Deskripsi</th>
										<th>Mulai</th>
										<th>Selesai</th>
										<th>Catatan</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($notes as $note): ?>
									<tr>
										<td>
											<?php echo $note->tanggal ?>
										</td>
										<td>
											<?php echo $note->topik ?>
										</td>
										<td class="small">
											<?php echo substr($note->deskripsi, 0, 120) ?>...</td>
										<td>
											<?php echo $note->mulai ?>
										</td>
										<td>
											<?php echo $note->selesai ?>
										</td>
										<td>
											<?php echo $note->catatan ?>
										</td>
										<td width="250">
											<a data-toggle="modal" data-target="#edit-data<?= $note->idnote ?>" class="btn btn-small btn-warning text-white"><i class="fa fa-edit"></i> Ubah</a>
											<button type="button" class="btn btn-primary btn-small btnDetail" data-id="<?= $note->idnote ?>"><i class="fa fa-eye"></i>Detail</button>&nbsp;
											<button class="btn btn-danger btnDelete" data-id="<?= $note->idnote ?>"><i class="fa fa-trash"></i> Hapus</button>
										</td>
									</tr>
									<?php endforeach; ?>

									<?php foreach ($notes as $note): ?>
									<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data<?= $note->idnote ?>" class="modal fade">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title">Ubah Catatan</h4>
													<button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
												</div>
												<form class="form-horizontal" action="<?php echo site_url("admin/notes/edit/".$note->idnote) ?>" method="post" enctype="multipart/form-data" role="form">
												<div class="modal-body">
													<input type="hidden" name="id" value="<?= $note->idnote ?>"/>
													<input type="hidden" name="iduser" value="<?= $note->iduser ?>"/>
													<div class="form-group">
														<label for="tanggal">Tanggal*</label>
														<input class="form-control <?php echo form_error('tanggal') ? 'is-invalid':'' ?>"
														 type="date" name="tanggal" placeholder="Tanggal" value="<?php echo $note->tanggal ?>" />
														<div class="invalid-feedback">
															<?php echo form_error('tanggal') ?>
														</div>
													</div>

													<div class="form-group">
														<label for="topik">Topik*</label>
														<!-- <input class="form-control <?php echo form_error('topik') ? 'is-invalid':'' ?>"
														 type="text" name="topik" min="0" placeholder="Topik" value="<?php echo $note->topik ?>" /> -->
														 <select class="form-control" name="idtopic">
									<option> Pilih Topik.. </option>
									<?php foreach ($topics as $value): ?>
										<option value="<?= $value['idtopic'] ?>" <?= $value['idtopic'] == $note->idtopic ? 'selected' : '' ?>><?= $value['topik'] ?></option>

									<?php endforeach; ?>
								</select>
														<div class="invalid-feedback">
															<?php echo form_error('topik') ?>
														</div>
													</div>

													<div class="row">
														<div class="col-md-12">
															<div class="form-group">
														<label for="deskripsi">Deskripsi*</label>
														<textarea class="form-control <?php echo form_error('deskripsi') ? 'is-invalid':'' ?>"
														 name="deskripsi" placeholder="Deskripsi..."> <?php echo $note->deskripsi ?> </textarea>
														<div class="invalid-feedback">
															<?php echo form_error('deskripsi') ?>
														</div>
													</div>

														</div>
														<div class="col-md-6">
															<div class="form-group">
														<label for="mulai">Jam Mulai*</label>
														<input class="form-control <?php echo form_error('mulai') ? 'is-invalid':'' ?>"
														 type="time" name="mulai" min="0" placeholder="Mulai" value="<?php echo $note->mulai ?>" />
														<div class="invalid-feedback">
															<?php echo form_error('mulai') ?>
														</div>
													</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
														<label for="selesai">Jam Selesai*</label>
														<input class="form-control <?php echo form_error('selesai') ? 'is-invalid':'' ?>"
														 type="time" name="selesai" min="0" placeholder="Selesai" value="<?php echo $note->selesai ?>"/>
														<div class="invalid-feedback">
															<?php echo form_error('selesai') ?>
														</div>
													</div>
														</div>
													</div>
													

													
													
													<div class="form-group">
														<label for="catatan">Catatan*</label>
														<input class="form-control <?php echo form_error('catatan') ? 'is-invalid':'' ?>"
														 type="text" name="catatan" min="0" placeholder="Catatan" value="<?php echo $note->catatan ?>" />
														<div class="invalid-feedback">
															<?php echo form_error('catatan') ?>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													
													<button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
													<input class="btn btn-success" type="submit" value="Simpan"/>
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

<div class="modal fade" id="modalDetail">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Detail Catatan</h4>
					<button type="button" class="close" data-dismiss="modal">×</button>
				</div>
				
				<!-- Modal body -->
				<div class="modal-body" id="modalcontentDetail">
					
				</div>
				
				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
				</div>
				
			</div>
		</div>
	</div>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
     
    </div>
  </div>
</div>
			
	<script>
	$(document).ready(function(){
		function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	$('#dataTable').DataTable()

	$('.btnAdd').click(function(){
		var url = "<?= site_url('admin/notes/add') ?>"
		$('.modal-title').text('Tambah Catatan')
		$('#modal').modal({show:true}).find('.modal-body').load(url)
	})

	$('.btnDetail').click(function(){
			var id = $(this).data('id')
	var base_url = "<?php echo site_url("admin/notes/detail/") ?>"+id
	console.log(base_url)
	$('#modalDetail').modal({show:true}).find('#modalcontentDetail').load(base_url)
	$('#modalDetail').appendTo('body')
	})

	$('.btnDelete').click(function(){
			var id = $(this).data('id')
			var url = "<?= site_url('admin/notes/delete/') ?>"+id
			swal({
				title: "Hapus",
				text : "Yakin ingin menghapus catatan?",
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
		          		swal("berhasil","Berhasil menghapus catatan","success")
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
	})
	</script>

