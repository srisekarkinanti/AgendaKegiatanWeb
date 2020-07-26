<!DOCTYPE html>
<html><head>
	<title></title>
</head><body>
<center>
	<table class="table table-bordered table-hover" >
		
			<tr>
				<th>No</th>
				<th>Tanggal</th>
				<th>Mulai</th>
				<th>Selesai</th>
				<th>Topik</th>
				<th>Deskripsi</th>
				<th>Ruangan</th>
				<th>Peserta</th>
			</tr>

			<?php
			$no= 1;
			foreach ($events as $event): ?>

			<tr text-align="center">
				<td><?php echo $no++?></td>
				<td><?php echo $event->Tanggal ?></td>
				<td><?php echo $event->mulai ?></td>
				<td><?php echo $event->selesai ?></td>
				<td><?php echo $event->idtopic ?></td>
				<td><?php echo $event->deskripsi ?></td>
				<td><?php echo $event->idroom ?></td>
				<td><?php echo $event->peserta ?></td>
			</tr>

			<?php endforeach; ?>

		
	</table>
</center>
</body></html>