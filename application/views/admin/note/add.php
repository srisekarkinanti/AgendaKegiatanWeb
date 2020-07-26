<form action="<?= site_url('admin/notes/add') ?>" method="POST">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label><b>Topik</b></label>
				<select class="form-control" name="idtopic">
					<option value=''>Pilih Topik --</option>
					<?php foreach ($topic as $key => $value): ?>
					<option value="<?= $value['idtopic'] ?>"><?= $value['topik']?></option>
					<?php endforeach ?>
				</select>
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<label><b>Tanggal</b></label>
				<input type="date" name="tanggal" class="form-control">
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<label><b>Deskripsi</b></label>
				<input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label><b>Jam Mulai</b></label>
				<input class="form-control mulai <?php echo form_error('mulai') ? 'is-invalid':'' ?>"" type="text"  name="mulai" />
				<div class="invalid-feedback">
					<?php echo form_error('mulai') ?>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label><b>Jam Selesai</b></label>
				<input class="form-control selesai <?php echo form_error('selesai') ? 'is-invalid':'' ?>"" type="text"  name="selesai" />
				<div class="invalid-feedback">
					<?php echo form_error('selesai') ?>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<label><b>Pegawai</b></label>
								<select id="peserta" name="pegawai[]" class="form-control" multiple="multiple"  style="width: 100%; padding: 15px" required>
									<?php foreach ($list_pegawai as $value): ?>
									<option value="<?= $value['iduser'] ?>" data-id="<?= $value['iduser'] ?>"><?= $value['full_name'] ?></option>
									<?php endforeach; ?>
								</select>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<label><b>Catatan</b></label>
				<textarea class="form-control" name="catatan"></textarea>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
			<button type="submit" class="btn btn-primary">Simpan</button>
		</div>
	</div>
</form>
<script type="text/javascript">
	$(document).ready(function(){
		$(".mulai").timepicker({
			hourHeaderText:"Jam",
			minHeaderText:"Menit",
		});
		$(".selesai").timepicker({
			hourHeaderText:"Jam",
			minHeaderText:"Menit",
		});
		$("#peserta").select2();
	})
</script>