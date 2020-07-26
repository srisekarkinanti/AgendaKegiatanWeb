

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">



					<div class="card-body">
						<?php if ($this->session->flashdata('success')): ?>
					<div class="flash-data" data-flash='<?= $this->session->flashdata('success') ?>'></div>
					<?php endif; ?>
					<h4 class="card-title" style="text-align: center;">Daftar Peserta</h4>
					<hr>
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Kegiatan</th>
										<th>Peserta</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($participants as $participant): ?>
									<tr>
										<td>
											<?php echo $participant['deskripsi'] ?>
										</td>
										<td>
											<?php echo $participant['full_name'] ?>
										</td>
										<td>
										<?php if ($participant['status'] == 0): ?>
											<span class="btn btn-secondary btn-rounded"><i class="fa fa-hourglass"></i>&nbsp;Menunggu</span>
											<?php elseif ($participant['status'] == 1): ?>
											<span class="btn btn-success btn-rounded"><i class="fa fa-check"></i>&nbsp;Bergabung</span>
											<?php else: ?>
											<span class="btn btn-danger btn-rounded"><i class="fa fa-times"></i>&nbsp;Tidak Bergabung</span>

										<?php endif ?>
										</td>
										
										<td width="250">
											<button class="btn btn-danger btnDelete" data-id="<?=$participant['idparticipant'] ?>"><i class="fa fa-trash"></i>&nbsp; Hapus</button>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
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

	$('.btnDelete').click(function(){
			var id = $(this).data('id')
			var url = "<?= site_url('admin/participants/delete/') ?>"+id
			swal({
				title: "Hapus",
				text : "Yakin ingin menghapus Peserta?",
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
		          		swal("berhasil","Berhasil menghapus Peserta","success")
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
