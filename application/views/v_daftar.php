<h2 class="text-center font-weight-bold mt-4" style="color: #023980">Pendaftaran</h2>
<p>Silakan gunakan form dibawah ini untuk untuk mendaftar sebagai member di toko kami</p>

<?php echo $this->session->userdata('pesan_login');?>

<form method="POST" action="<?php echo site_url('member/ProsesDaftar');?>">

	<div class="form-group">
		<label class="font-weight-bold">Nama Lengkap</label>
		<input type="text" class="form-control" name="nama_txt" placeholder="Masukkan nama lengkap" required="required" 
oninvalid="this.setCustomValidity('Tidak boleh dikosongkan.')"  onchange="this.setCustomValidity('')"/>
	</div>

	<div class="form-group">
		<label class="font-weight-bold">Email</label>
		<input type="email" class="form-control" name="email_txt" placeholder="Masukkan email" placeholder="Masukkan email" required="required" 
oninvalid="this.setCustomValidity('Tidak boleh dikosongkan.')"  onchange="this.setCustomValidity('')"/>
	</div>
	
	<div class="form-group">
		<label class="font-weight-bold">Kata Sandi</label>
		<input type="password" class="form-control" name="pass_txt" placeholder="Masukkan kata sandi" placeholder="Masukkan email" required="required" 
oninvalid="this.setCustomValidity('Tidak boleh dikosongkan.')"  onchange="this.setCustomValidity('')"/>
	</div>

	<div class="form-group">
		<label class="font-weight-bold">Alamat Lengkap</label>
		<textarea type="password" class="form-control" name="alamat_txt" placeholder="Masukkan alamat lengkap untuk pengiriman barang" placeholder="Masukkan email" required="required" 
oninvalid="this.setCustomValidity('Tidak boleh dikosongkan.')"  onchange="this.setCustomValidity('')"></textarea>
	</div>
		
	<div class="form-group">
		<button type="submit" class="btn text-white" style="background-color: #023980">Buat Akun</button>
		<br>Sudah memiliki akun? <a href="<?php echo site_url('home/login');?>">Masuk disini</a> 
	</div>
</form>

