<h2>Destinasi</h2>

<center><a href="#tambah" data-toggle="modal" class="btn btn-success">Tambah</a></center>
<table id="tmbh" class="table table-hover table-stripped">
	<thead>
		<tr>
			<td>NO</td>
			<td>ID Destinasi</td>
			<td>Destinasi</td>
			<td>Aksi</td>
		</tr>
	</thead>
	<tbody>
		<?php $no = 0;foreach ($tampil_destinasi as $des):
			$no++;?>
		<tr>
			<td><?= $no?></td>
			<td><?=$des->id_des?></td>
			<td><?=$des->destinasi?></td>
			<td>
				<a href="#edit" onclick="edit('<?=$des->id_des?>')" data-toggle="modal" class="btn btn-primary">
					Ubah
				</a>
				<a href="<?=base_url('destinasi/hapus/'.$des->id_des)?>" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-danger">
					Hapus
				</a>
			</td>
		</tr>
	<?php endforeach?>
	<?php
    if($this->session->flashdata('pesan')!= null){
      echo"<div class='alert alert-success' style='width:200px'>".$this->session->flashdata('pesan')."</div";
       }?>
	</tbody>
</table>

<div class="modal fade" id="tambah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="color:white;"><h2>Tambah Destinasi</h2>
				<button class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body"> 
			<form action="<?=base_url('destinasi/tambah')?>" method="post">
				<table>
					<tr>
						<td>Nama Destinasi</td>
						<td><input type="text" name="nama_destinasi" required class="form-control"></td>
					</tr>
				</table>
				<br>
				<input type="submit" name="simpan" value="Simpan" class="btn btn-success">
			</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="edit">
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header" style="color:white;">
			<center><h2>Edit Destinasi</h2></center>
			<button class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
			</button>
		</div>
		<div class="modal-body">
			<form action="<?=base_url('destinasi/destinasi_update')?>" method="post">
				<input type="hidden" name="id_des_lama" id="id_des_lama">
				<table>
				<tr>
					<td>ID Destinasi</td>
					<td>
					<input type="text" name="id_des" id="id_des" required class="form-control">
					</td>
				</tr>
				<tr>
					<td>Destinasi</td>
					<td>
					<input type="text" id="nama_destinasi" name="nama_destinasi" required class="form-control">
					</td>
				</tr>
				</table>
				<input type="submit" name="edit" value="Simpan" class="btn btn-success">
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tmbh').DataTable();
	});
</script>
<script type="text/javascript">
	function edit(a){
		$.ajax({
			type:"post",
		url:"<?=base_url()?>destinasi/edit_destinasi/"+a,dataType:"json",
		success:function(data){
			$("#id_des").val(data.id_des);
			$("#destinasi").val(data.destinasi);
			$("#id_des_lama").val(data.id_des);
		}
		});
	}
</script>