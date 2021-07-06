<h2 class="text-center font-weight-bold mt-4" style="color: #023980">Beli Produk</h2>

<div class="row">
	<div class="col-md-4  text-center">
	<img class="img-thumbnail img-responsive" src="<?php echo base_url('gambar/'.$DetailProduk['photo_produk']);?>" />
	</div>

	<div class="col-md-8">
		<form method="POST" action="<?php echo site_url('home/ProsesBeli');?>">
		<h4 class="font-weight-bold text-danger"><?php echo $DetailProduk['nama_produk'];?></h4>
	
		<div class="row mb-3 mt-3">
			<label class="col-md-2 font-weight-bold">Merk</label>	
			<div class="col-md-10"><?php echo $DetailProduk['merk'];?>
			<input type="hidden" name="KodeProduk" value="<?php echo $DetailProduk['kode_produk'];?>">
			</div>
		</div>


		<div class="row mb-3">
			<label class="col-md-2 font-weight-bold">Harga</label>	
			<div class="col-md-10">Rp. <?php echo number_format($DetailProduk['harga_jual'],0,',','.');?></div>
		</div>
		
		<div class="row mb-3">
			<label class="col-md-2 font-weight-bold">Stok Barang</label>	
			<div class="col-md-10">Tersedia <?php echo $DetailProduk['jml_beli'];?></div>
		</div>

		<div class="row mb-3">
			<label class="col-md-2 font-weight-bold">Jml. Pembelian</label>	
			<div class="col-md-10">
				<input type="text" name="JmlPembelian" class="form-control" placeholder="Masukan jumlah pembelian" autofocus autocomplete="no" required="required" 
oninvalid="this.setCustomValidity('Tidak boleh dikosongkan.')"  onchange="this.setCustomValidity('')"/>
			</div>
		</div>

		<div class="row mb-3">
			<label class="col-md-2 font-weight-bold">Catatan</label>	
			<div class="col-md-10">
				<textarea name="keterangan" class="form-control" placeholder="Masukan catatan untuk penjual, misal warna atau ukuran"></textarea>
			</div>
		</div>

		<button type="button" class="btn btn-danger" OnClick="javascript:history.back()">Kembali</button>
		<button type="submit" class="btn text-white" style="background-color: #6592e6; border: 2px solid #6592e6">Beli</button>
		
		</form>
	</div>

</div>
