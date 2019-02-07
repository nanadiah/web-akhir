<div class="container" style="background-color:white;">
    <h1>Data Destinasi Wisata Kami</h1>
</div>
<div class="container-fluid" style="background-color:white">
		<?php foreach($tampil_wisata as $tw):?>
                      	<div class="col-md-4 col-sm-4 mb" >
                      		<div class="white-panel pn" style="margin:20px;width:auto;height:350px;">
                      			<div class="white-header" style="color:black!important;background-color:orange !important;font-weight:bold!important;">
						  			<h5><?=$tw->nama_tempat?></h5>
                      			</div>
								<div class="row">
									
	                      		</div>
	                      		<div class="centered">
										<img src="<?=base_url('assets/img/')?><?=$tw->gambar?>" width="160" height="160">
	                      		</div>
								  <div class="white-header" style="height:auto;margin-top:40px;color:black!important;">
								  <h3><?="$ ".number_format($tw->harga,0,",",".")?></h3>
                      			</div>
                      		</div>
							
                      	</div>
		<?php endforeach ?>
</div>   	