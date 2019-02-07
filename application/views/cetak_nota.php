<h2 align="center">Nota</h2>
No Nota 				: <?= $transaksi->id_transaksi ?> <br>
Tanggal keberangkatan	: <?= $transaksi->tgl_berangkat ?> <br>
Nama Pemesan 			: <?= $transaksi->nama_pemesan ?> <br>
Kasir 					: <?= $this->session->userdata('fullname'); ?> <br> <br>

<table border="1" style="border-collapse: collapse;">
	<tr>
		<th>No</th>
		<th>Nama Tempat</th>
		<th>Harga</th>
		<th>QTY</th>
		<th>Subtotal</th>
	</tr>
		<?php $no=0; foreach($this->trans->detail_pembelian($transaksi->id_transaksi) as $wisata): $no++; ?>
		<tr>
			<th><?=$no?></th>
			<th><?=$wisata->nama_tempat?></th>
			<th><?= number_format($wisata->harga)?></th>
			<th><?=$wisata->jumlah?></th>
			<th><?= number_format(($wisata->harga*$wisata->jumlah)) ?></th>
		</tr>
	<?php endforeach ?>
		<tr>
			<th colspan="4">Grand Total</th>
			<th><?= number_format($transaksi->total) ?></th>
		</tr>
</table>
<br>
Uang bayar : <?= $this->session->userdata('bayar'); ?> <br>
Kembalian : <?= $this->session->userdata('kembalian'); ?><br><br>

<a href="<?=base_url('transaksi')?>">Back</a>
<script type="text/javascript">
	window.print();
	// location.href="<?=base_url('index.php/transaksi')?>"
</script>