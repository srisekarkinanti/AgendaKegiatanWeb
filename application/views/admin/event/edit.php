<form class="form-horizontal" action="<?php echo site_url("admin/events/edit/".$event->idevent)?>" method="post" enctype="multipart/form-data" role="form">

							<div class="modal-body">
								<input type="hidden" name="id" value="<?php echo $event->idevent ?>" />
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
								<label for="tanggal">Tanggal*</label>
								<input class="form-control <?php echo form_error('tanggal') ? 'is-invalid':'' ?>"
								 type="date" name="tanggal" placeholder="Tanggal" value="<?php echo $event->Tanggal ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('tanggal') ?>
								</div>
							</div>
								</div>
								<div class="col-md-6">
								<div class="form-group">
								<label for="mulai">Jam Mulai*</label>
								<input class="form-control <?php echo form_error('mulai') ? 'is-invalid':'' ?>"
								 type="time" name="mulai" min="0" placeholder="Mulai" value="<?php echo $event->mulai ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('mulai') ?>
								</div>
							</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label for="selesai">Jam Selesai*</label>
								<input class="form-control <?php echo form_error('selesai') ? 'is-invalid':'' ?>"
								 type="time" name="selesai" min="0" placeholder="Selesai" value="<?php echo $event->selesai ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('selesai') ?>
								</div>
							</div>	
							</div>
							</div>

							

							
							
							<div class="form-group">
								<label for="topik">Topik*</label>
								<select class="form-control <?php echo form_error('topik') ? 'is-invalid':'' ?>" name="topik" type="text" min="0" value="<?php echo $event->idtopic ?>">
									<?php foreach ($topic as $value): ?> 
										<option value="<?= $value['idtopic'] ?>" <?= ($event->idtopic == $value['idtopic']) ?  'selected'  : ''; ?>><?= $value['topik'] ?>
									<?php endforeach; ?>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('topik') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="deskripsi">Deskripsi*</label>
								<textarea class="form-control <?php echo form_error('deskripsi') ? 'is-invalid':'' ?>"
								 name="deskripsi" placeholder="Deskripsi..."> <?php echo $event->deskripsi ?> </textarea>
								<div class="invalid-feedback">
									<?php echo form_error('deskripsi') ?>
								</div>
							</div>

							
							<div class="form-group">
			                <label>Peserta</label>
			                <select id="peserta2" name="peserta2[]" class="form-control" multiple="multiple"  style="width: 100%; padding: 15px">
			                    <?php foreach ($getPeserta as $value): ?>
			                    	<option value="<?= $value->iduser ?>" data-id="<?= $value->iduser ?>" selected><?= $value->full_name ?></option>

			                    <?php endforeach; ?>
			                </select>
			            </div>

							<div class="form-group">
								<label for="ruangan">Ruangan*</label>
								<select class="form-control <?php echo form_error('ruangan') ? 'is-invalid':'' ?>" name="ruangan" type="text" min="0" value="<?php echo $event->ruangan ?>">
									<?php foreach ($rooms as $value): ?> 
										<option value="<?= $value['idroom'] ?>"><?= $value['ruangan'] ?>
									<?php endforeach; ?>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('ruangan') ?>
								</div>
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
								<input class="btn btn-success" type="submit" name="btn" value="Simpan"/>
								
							</div>
							</div>
						</form>

						<script type="text/javascript">
							$(document).ready(function(){
								$("#peserta2").select2({
                    placeholder: "Please Select"
                });
							})
						</script>