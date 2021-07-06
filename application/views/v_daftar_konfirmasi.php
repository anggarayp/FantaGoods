<h2 class="text-center font-weight-bold mt-4" style="color: #023980">Daftar Konfirmasi Pembelian</h2>
<p>Untuk melakukan proses konfirmasi pembayaran, silahkan upload bukti pembayaran pada masing-masing pembelian !</p>

<div class="table table-responsive">
<table class="table table-bordered table-hovered">
	<thead class="thead-light">
		<tr class="text-center">
			<th>No</th>
			<th>Tanggal Order</th>
			<th>Jumlah Barang</th>
			<th>Total Pembayaran</th>
			<th>Bukti Transfer</th>
		</tr>	
	</thead>
	<tbody>
		<?php
		if(isset($DataKonfirmasi)){
			$NoUrut=null;
		foreach($DataKonfirmasi as $BarisData){
			$NoUrut++;
			?>
				<tr>
					<td class="text-center">
						<?php echo $NoUrut;?>
					</td>
					<td>
						<?php echo $BarisData['tanggal_pembelian'];?>
					</td>
					<td class="text-right">
						<?php echo $BarisData['jumlah_pembelian'];?> buah
					</td>
					<td class="text-right">
						Rp. <?php echo number_format($BarisData['total_pembelian'],0,',','.');?>
					</td>
					<td class="text-center">
						<?php if($BarisData['bukti_pembayaran']==null){?>
						<a href="<?php echo site_url('home/FormKonfirmasi/'.$BarisData['id_pembelian']);?>" class="btn btn-info btn-sm" style="background-color: #6592e6; border: 2px solid #6592e6">Upload</a>
						<?php } else { ?>
						<a href="<?php echo site_url('home/BuktiKonfirmasi/'.$BarisData['bukti_pembayaran']);?>" class="btn btn-success btn-sm" style="background-color: #4ad943; border: 2px solid #4ad943"  data-judul="Preview Bukti Transfer" data-toggle="modal" data-target="#KotakDialog">Lihat</a>							
							<?php }?>
					</td>
				</tr>
		<?php
			}
		}
		?>
	</tbody>
</table>
</div>
