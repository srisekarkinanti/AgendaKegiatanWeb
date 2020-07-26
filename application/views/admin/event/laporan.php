<style>
	table{
		border-collapse: collapse;
	}
	
	tr, td, th {
		border: 1px solid #95a5a6;
		padding: 10px;
	}
</style>
<!-- <img src="<?php echo base_url() ?>assets/logo/logo.png" width="20%"> -->
<h1 style="text-align:center">Laporan Agenda Kegiatan</h1>
<h6 style="text-align:center">Dinas Komunikasi dan Informatika Kota Batam</h6>
<hr>
<h4>Bulan : <?= $bulan ?></h4>
<?php if ($topik != ""): ?>
<h4>Topik : <?= $topik ?></h4>
<?php endif ?>
<?php if (!empty($events)): ?>

	<?php foreach ($events as $key => $event): ?>
	<h5>Agenda Kegiatan : <?php echo $event['desc'] ?></h5>
<table class="event" style="width:100%; border:1px solid #95a5a6">
	<tr>
		<th>Tanggal</th>
		<th>Mulai</th>
		<th>Selesai</th>
		<th>Topik</th>
		<th>Deskripsi</th>
		<th>Peserta</th>
		<th>Ruangan</th>
	</tr>
	<tr>
		<td>
			<?php echo $event['Tanggal'] ?>
		</td>
		<td>
			<?php echo $event['mulai'] ?>
		</td>
		<td>
			<?php echo $event['selesai'] ?>
		</td>
		<td>
			<?php echo $event['topik']?>
		</td>
		<td class="small">
		<?php echo substr($event['desc'], 0, 120) ?>...</td>
		<td>
			<?php echo $event['jumlah_peserta'] ?> orang
		</td>
		<td>
			<?php echo $event['ruangan'] ?>
		</td>
	</tr>
</table>
<table style="margin-top: 10px;	">
	<tr>
		<td style="font-weight: bold">Peserta</td>
		<td>
			<?php foreach ($event['peserta'] as $k => $v): ?>
		<ul>
			<li><?php echo $v ?></li>
		</ul>
	<?php endforeach ?>
		</td>
	</tr>
	
</table>
<?php endforeach ?>
<?php else: ?>
	<div style="Width:100%; text-align:center"><i>Tidak ada data pada bulan <?= $bulan ?></i></div>
<?php endif ?>