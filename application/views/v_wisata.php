<h2>Daftar Wisata</h2>
<?= $this->session->flashdata('pesan'); ?>
<center>
  <a href="#tambah" data-toggle="modal" class="btn btn-warning">Tambah +</a>
</center>
<table id="example" class="table table-hover table-striped">
  <thead>
    <tr>
      <td>No</td>
      <td>Foto Tempat</td>
      <td>Nama Tempat</td>
      <td>Destinasi</td>
      <td>Harga</td>
      <td>Aksi</td>
    </tr>
  </thead>
  <tbody>
    <?php $no=0; foreach($tampil_wisata as $wisata):
    $no++; ?>
    <tr>
      <td><?= $no ?></td>
      <td><img src="<?=base_url('assets/img/'.$wisata->gambar )?>" style="width: 40px"></td>
      <td><?= $wisata->nama_tempat ?></td>
      <td><?= $wisata->destinasi ?></td>
      <td><?= $wisata->harga ?></td>
      <td><a href="#edit" onclick="edit('<?= $wisata->id_wisata ?>')" data-toggle="modal" class="btn btn-success">Ubah</a>
        <a href="<?=base_url('wisata/hapus/'.$wisata->id_wisata)?>" onclick="return confirm('Anda Yakin?')" class="btn btn-danger">Hapus</a></td>
    </tr>
  <?php endforeach ?>
  </tbody>
</table>

<div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-titile">Tambah Wisata</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('wisata/tambah')?>" method="post" enctype="multipart/form-data">
          <table>
            <tr>
              <td><input type="hidden" name="id_wisata" class="form-control"></td>
            </tr>
            <tr>
              <td>Nama Tempat</td>
              <td><input type="text" name="nama_tempat" required class="form-control"></td>
            </tr>
            <tr>
              <td>Destinasi</td>
              <td><select name="id_des" class="form-control">
                <option></option>
                <?php foreach($destinasi as $des): ?>
                <option value="<?=$des->id_des?>"><?=$des->destinasi?></option>
                <?php endforeach ?>
              </select></td>
            </tr>
              <td>Harga</td>
              <td><input type="number" name="harga" required class="form-control"></td>
            </tr>
            <tr>
              <td>Gambar</td>
              <td><input type="file" name="gambar" class="form-control"></td>
            </tr>
          </table>
          <input type="submit" name="create" value="Simpan" class="btn btn-success">
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
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-titile">Edit Wisata</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('wisata/wisata_update')?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_wisata_lama" id="id_wisata_lama">
          <table>
            <tr>
              <td><input type="hidden" name="id_wisata" id="id_wisata" class="form-control"></td>
            </tr>
            <tr>
              <td>Nama Tempat</td>
              <td><input type="text" name="nama_tempat" id="nama_tempat" required class="form-control"></td>
            </tr>
            <tr>
              <td>Destinasi</td>
              <td><select name="id_des" class="form-control" id="id_des">
                <option></option>
                <?php foreach($destinasi as $des): ?>
                <option value="<?=$des->id_des?>"><?=$des->destinasi?></option>
                <?php endforeach ?>
              </select></td>
            </tr>
            <tr>
              <td>Harga</td>
              <td><input type="number" name="harga" required id="harga" class="form-control"></td>
            </tr>
            <tr>
              <td>Gambar</td>
              <td><input type="file" name="gambar" id="gambar" class="form-control"></td>
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
  function edit(a){
    $.ajax({
      type:"post",
      url:"<?=base_url()?>wisata/edit_wisata/"+a,
      dataType:"json",
      success:function(data){
        $("#id_wisata").val(data.id_wisata);
        $("#nama_tempat").val(data.nama_tempat);
        $("#id_des").val(data.id_des);
        $("#harga").val(data.harga);
        $("#id_wisata_lama").val(data.id_wisata);
      }
    })
  }
</script>