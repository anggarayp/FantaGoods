<h2 class="text-center font-weight-bold mt-3" style="color: #023980">Produk Terbaru</h2>
		<div class="row">
			<!-- item produk -->
			<?php
				if(isset($ProdukTerbaru)) { 
					foreach($ProdukTerbaru as $DataProduk) {
						
						?>
			<div class="col-md-3">
				<div class="card mb-2">
					<div class="card-header text-center font-weight-bold "><?php echo $DataProduk['nama_produk'];?></div>
						<img class="card-img-top img-responsive" src="<?php echo base_url('gambar/'.$DataProduk['photo_produk']);?>" style="max-height:275px"/>
						<div class="card-body">
							<div class="text-center">
							<p class="font-weight-bold">Rp. <?php echo number_format($DataProduk['harga_jual'],0,',','.');?>	</p>
							<a href="<?php echo site_url('home/detail/'.$DataProduk['kode_produk']);?>" class="btn btn-info" style="background-color: #ff9966; border: 2px solid #ff9966" data-judul="Detail Produk" data-toggle="modal" data-target="#KotakDialog">Detail</a>
							<a href="<?php echo site_url('home/beli/'.$DataProduk['kode_produk']);?>" class="btn btn-danger" style="background-color: #6592e6; border: 2px solid #6592e6">Beli</a>
						</div>
					</div>
				</div>
			</div>			
				<?php
					}
				}
				?>				
		<!-- end item produk -->
</div>
