<br><br><h2 align="center">Halaman Transaksi</h2> <br><br>
<div class="col-md-6">
	<table id="example" class="table table-hover table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Tempat</th>
				<th>Harga</th>
				<th>Destinasi</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=0; foreach($tampil_wisata as $wisata): $no++; ?>
			<tr>
				<td><?=$no?></td>
				<td><?=$wisata->nama_tempat?></td>
				<td><?=$wisata->harga?></td>
				<td><?=$wisata->destinasi?></td>
				<td><a href="<?=base_url('transaksi/addcart/'.$wisata->id_wisata)?>" class="btn btn-info">Pesan</a></td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
</div>

<div class="col-md-6">
	<form action="<?=base_url('transaksi/simpan')?>" method="post">
		<a href="<?=base_url('transaksi/clearcart')?>" class="btn btn-danger">Clear Cart</a>
		Nama Pembeli : <input type="text" name="nama_pembeli" class="form-control" style="display: inline-block;width:200px"><br>
		<input type="hidden" name="id_admin" class="form-control" value="<?= $this->session->userdata('id_admin'); ?>" style="display: inline-block;width:200px"><br>
		<table class="table table-striped table-hover" blocked>
			<tr>
				<th>No</th>
				<th>Nama Tempat</th>
				<th>Harga</th>
				<th>Subtotal</th>
				<th>Aksi</th>
			</tr>
				<?php $no=0; foreach($this->cart->contents() as $items): $no++; ?>
				<input type="hidden" name="id_wisata[]" value="<?=$items['id']?>">
				<input type="hidden" name="rowid[]" value="<?=$items['rowid']?>">
			
			<?php endforeach ?>
			<input type="hidden" name="total" value="<?=$this->cart->total()?>">
			<tr style="border-bottom:5px black solid">
				<th colspan="4">Grandtotal</th>
				<th><?= number_format($this->cart->total()) ?></th>
				<th></th>
			</tr>
			<tr>
				<th colspan="4">Bayar</th>
				<th><input type="number" name="uang_bayar" class="form-control" style="display: inline-block;width:200px"></th>
				<th></th>
			</tr>
		</table>
		<input type="submit" name="update" class="btn btn-success" value="Update QTY"> 
		<input required type="submit" name="bayar" onclick="return confirm('Are you sure?')" class="btn btn-warning" value="Bayar">
	</form>
<?php if ($this->session->flashdata('pesan')): ?>
	<div class="alert alert-warning"><?= $this->session->flashdata('pesan'); ?></div>
<?php endif ?>
</div>