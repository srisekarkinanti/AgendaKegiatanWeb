

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>
				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- DataTables -->
				<div class="card mb-3">
					

					

					<div class="modal fade" id="tambahRoom" tabindex="-1" role="dialog" aria-labelledby="tambahRoomLabel" aria-hidden="true">
 					 <div class="modal-dialog" role="document">
    					<div class="modal-content">
      						<div class="modal-header">
       						 <h5 class="modal-title" id="tambahRoomLabel">Form Tambah Room</h5>
        						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
         						 <span aria-hidden="true">&times;</span>
        						</button>
      						</div>

      						<form class="form-horizontal" action="<?php echo base_url('admin/rooms/add')?>" method="post" enctype="multipart/form-data" role="form">
     					 <div class="modal-body">

       					<div class="form-group">
								<label for="ruangan">Ruangan*</label>
								<input class="form-control <?php echo form_error('ruangan') ? 'is-invalid':'' ?>"
								 type="text" name="ruangan" min="0" placeholder="Ruangan" />
								<div class="invalid-feedback">
									<?php echo form_error('ruangan') ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="name">Gambar</label>
								<br>
								<input type="file" name="file">
								<div class="invalid-feedback">
									<?php echo form_error('gambar') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Deskripsi*</label>
								<textarea class="form-control <?php echo form_error('deskripsi') ? 'is-invalid':'' ?>"
								 name="deskripsi" placeholder="Deskripsi"></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('deskripsi') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="ruangan">Kapasitas*</label>
								<input class="form-control <?php echo form_error('kapasitas') ? 'is-invalid':'' ?>"
								 type="text" name="kapasitas" min="0" placeholder="Kapasitas" />
								<div class="invalid-feedback">
									<?php echo form_error('kapasitas') ?>
								</div>
							</div>

     					 </div>
     					 
      					<div class="modal-footer">       					 
		             		<button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
		             		<input class="btn btn-success" type="submit" name="btn" value="Simpan" />
     					</div>
     					</form>
    					</div>
  					 </div>
					</div>
			

					

						<div class="card-body">
							<div class="d-flex align-items-start mb-3">
				<h4 class="card-title mb-0" style="color: #212529;">Daftar Ruangan</h4>
				<div class="ml-auto">
						<a class="btn btn-primary text-white" data-toggle="modal" data-target="#tambahRoom"><i class="fa fa-plus-circle"></i>&nbsp;Tambah Ruangan</a>
						
								
					
					
				</div>
			</div>
							<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Ruangan</th>
										<th>Gambar</th>
										<th>Deskripsi</th>
										<th>Kapasitas</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=1; foreach ($rooms as $room): ?>
									<tr>
										<td><?= $no++ ?></td>
										<td>	
											<?php echo $room->ruangan ?>
										</td>
										
											<td> <?php if ($room->gambar != ""): ?>
												<a href="<?php echo base_url('upload/room/'.$room->gambar)?>" target="_blank">Lihat file.</a>
												<?php else: ?>
													<i>Tidak ada file</i>
											<?php endif ?></td>
										
										<td class="small">
											<?php echo substr($room->deskripsi, 0, 120) ?>...</td>
										<td>
											<?php echo $room->kapasitas ?> orang
										</td>
										
										<td width="250">
											<button class="btn btn-warning btnUpdate" data-id="<?= $room->idroom ?>"><i class="fa fa-edit"></i> Ubah</a></button>
											<button type="button" class="btn btn-danger btnDelete" data-id="<?= $room->idroom ?>"><i class="fa fa-trash"></i> Hapus</button>
											
											<!-- <a onclick="deleteConfirm('<?php echo site_url('admin/rooms/delete/'.$room->idroom) ?>')"
											 href="#!" class="btn btn-small btn-danger	"><i class="fa fa-trash"></i> Hapus</a> -->
										</td>
									</tr>
									<?php endforeach; ?>

									<?php foreach ($rooms as $room): ?>
									<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data<?php echo $room->idroom ?>" class="modal fade">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title">Ubah Ruangan</h4>
													<button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
												</div>
												
											</div>
										</div>
									</div>	
								<?php endforeach; ?>

								</tbody>
							</table>
						</div>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>

	<div class="modal" id="modalUpdateRoom" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ubah Ruangan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="contentModal">

      </div>
      
   


	<script>
	$(document).ready(function(){
		function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();


	}
	$('#dataTable').DataTable()
	$('.btnUpdate').click(function(){
			var id  = $(this).data('id')
			var url = "<?= site_url('admin/rooms/edit/') ?>"+id;
			$('#modalUpdateRoom').modal({show:true}).find('#contentModal').load(url)
		})

	$('.btnDelete').click(function(){
			var id = $(this).data('id')
			var url = "<?= site_url('admin/rooms/delete/') ?>"+id
			swal({
				title: "Hapus",
				text : "Yakin ingin menghapus ruangan?",
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
		          		swal("berhasil","Berhasil menghapus ruangan","success")
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

