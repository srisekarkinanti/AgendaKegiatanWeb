


	<div class="card border-0">
		<div class="card-header">
			Detail
		</div>

		<div class="card-body">
			<table class="table table-bordered table-hover">
				<tbody>
					<tr>
						<td class="left bg-light">Tanggal</td>
						<td colspan="4"><?= isset($notes->tanggal)? date('d F Y',strtotime($notes->tanggal)) : null ?></td>
					</tr>
					<tr>
						<td class="left bg-light">Topik</td>
						<td colspan="4"><?= isset($notes->topik)? $notes->topik : null ?></td>
					</tr>
					<tr>
						<td class="left bg-light">Deksripsi</td>
							<td colspan="4"><?= isset($notes->deskripsi)? $notes->deskripsi : null ?>
						</td>
					</tr>
					<tr>
						<td class="left bg-light"><i class="fa fa-clock-o"></i> Jam Mulai</td>
						<td><?= isset($notes->mulai)? $notes->mulai : null ?></td>
						<td class="left bg-light"><i class="fa fa-clock-o"></i> Jam Akhir</td>
						<td><?= isset($notes->selesai)? $notes->selesai : null ?></td>
					</tr>
					<tr>
						<td class="left bg-light">Catatan</td>
							<td colspan="4"><?= isset($notes->catatan)? $notes->catatan : null ?>
						</td>
					</tr>
				</tbody>
			</table>

				<!-- <table class="table table-bordered table-hover">
					<thead>
						<th>Peserta</th>
					</thead>
					<tbody>
						<?php foreach($peserta as $value):?>
						<tr>
							<td><?= $value->full_name ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table> -->
			
		</div>
	</div>

