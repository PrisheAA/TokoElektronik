
<h1>elektronik</h1>

<?php if($this->session->flashdata('pesan')): ?>


	<div class="alert alert-warning"><?= $this->session->flashdata('pesan') ?></div>
	

<?php endif?>



<?php if($this->session->userdata('level')=="admin"){?>
<a href="#tambah" class="btn btn-primary" data-toggle="modal" style="float: right;">Tambah</a>

<?php }?>
<table class="table table-hover table-stripped"> 

	<thead>

		<tr>

			<td>no</td><td>kode_elektronik</td><td>merk_elektronik</td><td>tahun</td><td>kategori</td><td>harga</td><td>cover</td><td>buatan</td><td>produksi</td><td>stok</td><td></td><td></td>

		</tr>

	</thead>

	<tbody>


		<?php $no = 0; foreach($elektronik as $lk): $no++;?>







		<tr>

			<td><?=$no?></td><td><?=$lk->kode_elektronik?></td><td><?=$lk->merk_elektronik?></td><td><?=$lk->tahun?></td><td><?=$lk->nama_kategori?></td><td><?=$lk->harga?></td><td><img src="<?=base_url('assets/gambar/'.$lk->cover)?>" style="width:40px;"></td><td><?=$lk->buatan?></td><td><?=$lk->produksi?></td><td><?=$lk->stok?></td>

			<td><?php if($this->session->userdata('level')=="admin"){?> <a href="#ubah" data-toggle="modal" onclick="edit(<?=$lk->kode_elektronik?>)"  class="btn btn-warning">Ubah</a><?php }else{ 		echo "anda kasir"; }?></td>

			<td><?php if($this->session->userdata('level')=="admin"){?><a href="<?=base_url('index.php/elektronik/hapus/'.$lk->kode_elektronik)?>" onclick="return confirm('apakah anda yakin untuk menghapus')" class="btn btn-danger">Hapus</a><?php }else{ echo "anda kasir"; }?></td>

		</tr>



	<?php endforeach?>


</tbody>	

</table>




<div class="modal fade" id="tambah" >
	<div class="modal-dialog">
		
		<div class="modal-content">
			<div class="modal-header">


			<div class="row">

			<div class="col-md-6">
				<div class="modal-title">Tambah elektronik</div>
			</div>
			<div class="col-md-6">
				<button class="btn " data-dismiss = "modal" style="float: right; ">X</button>
				</div>

				</div>

			</div>	

			<div class="modal-body">


				<form action="<?=base_url('index.php/elektronik/tambah')?>" method="post" enctype="multipart/form-data">

					<table>

						<tr>
							<td>merk elektronik</td>
							<td><input type="text" name="merk_elektronik" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td>tahun</td>
							<td><input type="number" name="tahun" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td>kategori</td>
							<td>


								<select name="kategori" style="margin-left: 20px; ">
									<?php foreach ($kategori as $kt): ?>

										<option value="<?= $kt->kode_kategori?>" ><?= $kt->nama_kategori?></option>
									<?php endforeach?>	
								</select>
							</td>
						</tr>

						<tr>
							<td>harga</td>
							<td><input type="text" name="harga" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td>foto cover</td>
							<td><input type="file" name="cover" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td>buatan</td>
							<td><input type="text" name="buatan" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td>produksi</td>
							<td><input type="text" name="produksi" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td>stok</td>
							<td><input type="number" name="stok" style="margin-left: 20px;"></td>
						</tr>

					</table>


					<center><input type="submit" name="tambah" value="tambah" class="btn btn-warning" style="margin-top: 30px;"></center>

				</form>

			</div>	
		</div>
	</div>

</div>



<div class="modal fade" id="ubah" >
	<div class="modal-dialog">
		
		<div class="modal-content">
			<div class="modal-header">

				<div class="row">

			<div class="col-md-6">
				<div class="modal-title">Ubah elektronik</div>
			</div>
			<div class="col-md-6">
				<button class="btn " data-dismiss = "modal" style="float: right; ">X</button>
				</div>

				</div>
			</div>	

			<div class="modal-body">


				<form action="<?=base_url('index.php/elektronik/update')?>" method="post" enctype="multipart/form-data">

					<table>

						<input type="hidden" name="kode_elektronik" required id="kode_elektronik" style="margin-left: 20px;">

						<tr>
							<td>merk elektronik</td>
							<td><input type="text" name="merk_elektronik"  required  id="merk_elektronik" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td>tahun</td>
							<td><input type="number" name="tahun" required  id="tahun" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td>kategori</td>
							<td>


								<select name="kategori" style="margin-left: 20px; " id="kategori" required >
									<?php foreach ($kategori as $kt): ?>

										<option value="<?= $kt->kode_kategori?>" ><?= $kt->nama_kategori?></option>
									<?php endforeach?>	
								</select>
							</td>
						</tr>

						<tr>
							<td>harga</td>
							<td><input type="text" name="harga" required  id="harga" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td>foto cover</td>
							<td><input type="file" name="cover"   id="cover" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td>buatan</td>
							<td><input type="text" name="buatan" required   id="buatan" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td>produksi</td>
							<td><input type="text" name="produksi" required  id="produksi" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td>stok</td>
							<td><input type="number" name="stok" required  id="stok" style="margin-left: 20px;"></td>
						</tr>

					</table>


					<center><input type="submit" value="Ubah" name="update" required  class="btn btn-warning" style="margin-top: 30px;"></center>

				</form>

			</div>	
		</div>
	</div>

</div>




<script >
	

	function edit(kode_elektronik){
		$.ajax({
			type:"post",
			url:"<?=base_url()?>index.php/elektronik/tampil_ubah_elektronik/"+kode_elektronik,
			dataType:"json",


			success:function(data){
				$("#kode_elektronik").val(data.kode_elektronik);
				$("#merk_elektronik").val(data.merk_elektronik);
				$("#tahun").val(data.tahun);
				$("#kategori").val(data.kode_kategori);
				$("#harga").val(data.harga);
				$("#buatan").val(data.buatan);
				$("#produksi").val(data.produksi);
				$("#stok").val(data.stok);	
			}
		});
	}

</script>