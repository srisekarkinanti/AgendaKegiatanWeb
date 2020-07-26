<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

<form class="form-horizontal" action="<?php echo site_url("admin/rooms/edit/")?>" method="post" enctype="multipart/form-data" role="form">
												<div class="modal-body">
													<input type="hidden" name="id" value="<?= $room->idroom ?>"/>
													<div class="form-group">
														<label for="ruangan">Ruangan*</label>
														<input class="form-control <?php echo form_error('ruangan') ? 'is-invalid':'' ?>"
														 type="text" name="ruangan" min="0" placeholder="Ruangan" value="<?php echo $room->ruangan ?>"/>
														<div class="invalid-feedback">
															<?php echo form_error('ruangan') ?>
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
														 name="deskripsi" placeholder="description..."><?php echo $room->deskripsi ?></textarea>
														<div class="invalid-feedback">
															<?php echo form_error('deskripsi') ?>
														</div>
													</div>

													<div class="form-group">
														<label for="ruangan">Kapasitas*</label>
														<input class="form-control <?php echo form_error('kapasitas') ? 'is-invalid':'' ?>"
														 type="text" name="kapasitas" min="0" placeholder="Kapasitas" value="<?php echo $room->kapasitas ?>"/>
														<div class="invalid-feedback">
															<?php echo form_error('kapasitas') ?>
														</div>

												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
													<input class="btn btn-success" type="submit" name="btn" value="Simpan"/>
												</div>
												</form>