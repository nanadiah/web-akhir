<h2 align="center">Histori Pesanan</h2>
<?= $this->session->flashdata('pesan'); ?>
<table id="example" class="table table-hover table-striped">
	<thead>
		<tr>
			<td>No</td>
			<td>No. Nota</td>
			<td>Nama Pemesan</td>
			<td>Tanggal Berangkat</td>
			<td>Grand Total</td>
			<!-- <td>Detail</td> -->
		</tr>
	</thead>
	<tbody>
		<?php $no=0; foreach($tampil_pesanan as $psn):
		$no++; ?>
		<tr>
			<td><?= $no ?></td>
			<td><?= $psn->id_transaksi ?></td>
			<td><?= $psn->nama_pemesan ?></td>
			<td><?= $psn->tgl_berangkat ?></td>
			<td><?= $psn->total ?></td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>
