<style type="text/css">
	.btn {
		border:none;
	}
	label{
		font-weight: bold
	}
</style>
<?php $this->load->view("admin/_partials/breadcrumb.php") ?>
<?php if ($this->session->flashdata('success')): ?>
<div class="flash-data" data-flash='<?= $this->session->flashdata('success') ?>'></div>
<?php endif; ?>
<div class="card mb-3">
	
	
	<div class="modal fade" id="tambahEvent" tabindex="-1" role="dialog" aria-labelledby="tambahEventLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="tambahEventLabel">Form Tambah Kegiatan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form class="form-horizontal" action="<?php echo base_url('admin/events/add')?>" method="post" enctype="multipart/form-data" role="form">
					<div class="modal-body">
						
						
						
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="tanggal">Tanggal*</label>
									<input class="form-control <?php echo form_error('tanggal') ? 'is-invalid':'' ?>"
									type="date" name="tanggal" placeholder="Tanggal" value="<?php echo date("Y-m-d") ?>" required />
									<div class="invalid-feedback">
										<?php echo form_error('tanggal') ?>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="mulai">Jam Mulai*</label>
									<div class="input-group mb-3">
										<input class="form-control mulai <?php echo form_error('mulai') ? 'is-invalid':'' ?>"" type="text"  name="mulai" />
									<div class="invalid-feedback">
										<?php echo form_error('mulai') ?>
									</div>
									</div>
									
								</div>
							</div>
							<div class="col-md-6">
								<label for="selesai">Jam Selesai*</label>
								<input class="form-control selesai <?php echo form_error('selesai') ? 'is-invalid':'' ?>"" type="text"  name="selesai" />
								<div class="invalid-feedback">
									<?php echo form_error('selesai') ?>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Topik</label>
							<select class="form-control" name="idtopic" required>
								<option value=""> Pilih Topik.. </option>
								<?php foreach ($topics as $value): ?>
								<option value="<?= $value['idtopic'] ?>"><?= $value['topik'] ?>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<label for="deskripsi">Deskripsi*</label>
								<textarea class="form-control <?php echo form_error('deskripsi') ? 'is-invalid':'' ?>"
								name="deskripsi" placeholder="Deskripsi..." required></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('deskripsi') ?>
								</div>
							</div>
							<div class="form-group">
								<label>Peserta</label>
								<select id="peserta" name="peserta2[]" class="form-control" multiple="multiple"  style="width: 100%; padding: 15px" required>
									<?php foreach ($orangs as $value): ?>
									<option value="<?= $value['iduser'] ?>" data-id="<?= $value['iduser'] ?>"><?= $value['full_name'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<label>Ruangan</label>
								<select class="form-control ruangan" name="idroom" required>
									<option value=""> Pilih Ruangan.. </option>
									<?php foreach ($rooms as $value): ?>
									<option value="<?= $value['idroom'] ?>"><?= $value['ruangan'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						
						
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
							
							<input class="btn btn-success" type="submit" name="btn" value="Simpan" />
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="d-flex align-items-start mb-3">
				<h4 class="card-title mb-0" style="color: #212529;">Daftar Kegiatan</h4>
				<div class="ml-auto">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahEvent"><i class="fa fa-plus-circle"></i>&nbsp;Tambah Kegiatan</button>
				</div>
			</div>
			<hr>
			<form action="<?php echo site_url('admin/events/printPDF') ?>" method="POST" class="formReport">
				<div class="row mb-3 ">
					<div class="col-md-4">
						<select class="form-control namaBulan" name="namaBulan">
							<option value="">Pilih Bulan</option>
							<option value="January">Januari</option>
							<option value="February">Februari</option>
							<option value="March">Maret</option>
							<option value="April">April</option>
							<option value="May">Mei</option>
							<option value="June">Juni</option>
							<option value="July">Juli</option>
							<option value="August">Agustus</option>
							<option value="September">September</option>
							<option value="October">Oktober</option>
							<option value="November">November</option>
							<option value="Desember">Desember</option>
						</select>
					</div>
					<div class="col-md-4 listTopik">
						<select class="form-control" name="topik">
							<option value="">Pilih Topik</option>
							<?php foreach ($topics as $key => $value): ?>
							<option value="<?= $value['idtopic'] ?>"><?= $value['topik'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="col-md-1 mt-1">
						<button type="submit" class="btn btn-danger btn-rounded btnCetak"> <i class="fa fa-print"></i>Cetak</button>
					</div>
				</div>
			</form>
			
			<div class="table-responsive">
				<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Tanggal</th>
							<th>Mulai</th>
							<th>Selesai</th>
							<th>Topik</th>
							<th>Deskripsi</th>
							<th>Peserta</th>
							<th>Ruangan</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($events as $event): ?>
						<tr>
							<td>
								<?php echo $event->Tanggal ?>
							</td>
							<td>
								<?php echo $event->mulai ?>
							</td>
							<td>
								<?php echo $event->selesai ?>
							</td>
							<td>
								<?php echo $event->topik ?>
							</td>
							<td class="small">
							<?php echo substr($event->desc, 0, 120) ?>...</td>
							<td>
								<?php echo count(explode(",",$event->peserta)) ?> Orang
							</td>
							<td>
								<?php echo $event->ruangan ?>
							</td>
							<td>
								<div class="btn-group">
									<button class="btn btn-small btn-warning btnEdit" data-id="<?= $event->idevent ?>"><i class="fa fa-edit"></i>Ubah</button>&nbsp;
									<!-- <a onclick="deleteConfirm('<?php echo site_url('admin/events/delete/'.$event->idevent) ?>')"
									href="<?php echo site_url('admin/events/delete/'.$event->idevent) ?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a> -->
									<button type="button" class="btn btn-primary btn-small btnDetail" data-id="<?= $event->idevent ?>"><i class="fa fa-eye"></i>Detail</button>&nbsp;
									<button type="button" class="btn btn-danger btn-small btnDelete" data-id="<?= $event->idevent ?>" ><i class="fa fa-trash"></i>Hapus</button>
								</div>
							</td>
						</tr>
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
					<h4 class="modal-title">Detail Kegiatan</h4>
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
	<div class="modal" id="modalUpdateEvent" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Ubah Kegiatan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="contentModal">
				</div>
				
			</div>
		</div>
	</div>
	<script>
	$(document).ready(function(){
		//tombol cetak
			$('.listTopik').hide()
		$(".mulai").timepicker({
			hourHeaderText:"Jam",
			minHeaderText:"Menit",
		});
		$(".selesai").timepicker({
			hourHeaderText:"Jam",
			minHeaderText:"Menit",
		});
	$('.namaBulan').change(function(){
		var value = $(this).val();
		if(value){
			$('.listTopik').show()
		}
		else{
			$('.listTopik').hide()
		}
	})
	$('.btnCetak').click(function(e){
		e.preventDefault()
		var namaBulan = $('.namaBulan').val()
		if(namaBulan){
			$('.formReport').submit()
		}
	})
		$("#peserta").select2();
		$('#dataTable').DataTable()
		$("#peserta").change(function(){
			var id = $(this).val()
		})
		$('.btnDetail').click(function(){
			var id = $(this).data('id')
	var base_url = "<?php echo site_url("admin/events/detail/") ?>"+id
	console.log(base_url)
	$('#modalDetail').modal({show:true}).find('#modalcontentDetail').load(base_url)
	$('#modalDetail').appendTo('body')
	})
	
	function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
	}
	})
	$(document).ready(function(){
	function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
	}
	$('.btnEdit').click(function(){
	var id  = $(this).data('id')
	var url = "<?= site_url('admin/events/edit/') ?>"+id;
	console.log(url)
	$('#modalUpdateEvent').modal({show:true}).find('#contentModal').load(url)
	})
	})
	$('.btnDelete').click(function(e){
	var id = $(this).data('id')
	var url = "<?= site_url("admin/events/delete/") ?>"+id;
	swal({
	title: "Hapus",
	text: "Apakah Anda Yakin Ingin Menghapusnya?",
	icon: "warning",
	buttons: true,
	dangerMode: true,
	}).then((res) => {
	if (res) {
	$.ajax({
	url : url,
	type : "DELETE",
	success : function(){
	location.reload()
	}
	})
	}else {
	swal("Canceled!!");
	}
	});
	var flashdata = $('.flash-data').data('flash');
	console.log(flashdata)
	
	})
	
	</script>
</body>
</html>