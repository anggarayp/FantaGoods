<h2 class="text-center font-weight-bold mt-4" style="color: #023980">Login</h2>
<p>Silakan gunakan form dibawah ini untuk untuk login ke akun anda</p>

<?php 
echo $this->session->userdata('pesan_login');
echo $this->session->userdata('pesan_daftar');
?>
<form method="POST" action="<?php echo site_url('member/CekLogin');?>">

	<div class="form-group">
		<label class="font-weight-bold">Email</label>
		<input type="email" class="form-control" name="email_txt" placeholder="Masukkan email" autofocus autocomplete="off" required="required" 
oninvalid="this.setCustomValidity('Tidak boleh dikosongkan.')"  onchange="this.setCustomValidity('')"/>
	</div>
	
	<div class="form-group">
		<label class="font-weight-bold">Kata Sandi</label>
		<input type="password" class="form-control" name="pass_txt" placeholder="Masukkan kata sandi" required="required" 
oninvalid="this.setCustomValidity('Tidak boleh dikosongkan.')"  onchange="this.setCustomValidity('')"/>
	</div>
	
	<div class="form-group">
		<button type="submit" class="btn text-white" style="background-color: #023980">Masuk</button>
		<br>Belum memiliki akun? <a href="<?php echo site_url('home/BuatAkun');?>">Buat akun disini</a> 
		
	</div>
</form>

<?php 
$this->session->unset_userdata('pesan_login');
$this->session->unset_userdata('pesan_daftar');
?>
