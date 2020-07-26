


	<div class="card border-0">
		<div class="card-header">
			Detail
		</div>

		<div class="card-body">
			<table class="table table-bordered table-hover">
				<tbody>
					<tr>
						<td class="left bg-light">Tanggal</td>
						<td colspan="4"><?= isset($events->Tanggal)? date('d F Y',strtotime($events->Tanggal)) : null ?></td>
					</tr>
					<tr>
						<td class="left bg-light">Topik</td>
						<td colspan="4"><?= isset($events->topik)? $events->topik : null ?></td>
					</tr>
					<tr>
						<td class="left bg-light">Ruangan</td>
						<td colspan="4"><?= isset($events->ruangan)? $events->ruangan : null ?></td>
					</tr>
					<tr>
						<td class="left bg-light">Deksripsi</td>
							<td colspan="4"><?= isset($events->deskripsi)? $events->deskripsi : null ?>
						</td>
					</tr>
					<tr>
						<td class="left bg-light"><i class="fa fa-clock-o"></i> Jam Mulai</td>
						<td><?= isset($events->mulai)? $events->mulai : null ?></td>
						<td class="left bg-light"><i class="fa fa-clock-o"></i> Jam Akhir</td>
						<td><?= isset($events->selesai)? $events->selesai : null ?></td>
					</tr>
					
				</tbody>
			</table>

				<table class="table table-bordered table-hover">
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
				</table>
			
		</div>
	</div>

