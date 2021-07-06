<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, inital-scale=1, shrink-to-fit=no"/>
	<meta name="description" content="">
	<meta name="author" content=""/>
	<link rel="icon" href="<?php echo base_url('gambar/fantagoods.png')?>">
	<title>FantaGoods</title>
	<link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.css');?>"/>
</head>
<body>
	<!-- navbar -->

	<main role="main">	
    <nav class="navbar navbar-expand-md navbar-dark bg-white" style="border-bottom-style: solid; border-color: #264156">
        <!-- Logo Toko Online -->
        <a class="navbar-brand" href="<?php echo site_url();?>">
		 <img class="img-responsive" src="<?php echo base_url('gambar/fantagoods.png');?>" height="80" alt="Not Image">
        </a>
        
        <!-- Tombol di Smartphone -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#SubMenu">
			<span class="navbar-toggler-icon"></span>
		</button>
		
        <!-- Menu DropDown -->
		<div class="collapse navbar-collapse" id="SubMenu">
          <ul class="navbar-nav mr-auto">
			<?php
			// Jika  yang login adalah member
		    if($this->session->userdata('SesLevel')=='member'){ 
			?>
    			<li class="nav-item">
    				<a class="nav-link text-dark" href="<?php echo site_url('home/SemuaProduk');?>"><b>Produk</b></a>
    			</li>
			<?php 
            }
            // jika tidak ada yang login / pengunjung bukan anggota
            if($this->session->userdata('SudahkahLogin')==false){    
			?>
				<li class="nav-item">
    				<a class="nav-link text-dark" href="<?php echo site_url('home/SemuaProduk');?>"><b>Produk</b></a>
    			</li>
    			<li class="nav-item">
    				<a class="nav-link text-dark" href="<?php echo site_url('home/CaraBelanja');?>"><b>Panduan Belanja</b></a>
    			</li>
    			<li class="nav-item">
    				<a class="nav-link text-dark" href="<?php echo site_url('home/HubungiKami');?>"><b>Hubungi Kami</b></a>
    			</li>									
			<?php
            }

			// Jika yang login adalah member
			if($this->session->userdata('SesLevel')=='member'){
			?>
				<li class="nav-item">
					<a class="nav-link text-dark" href="<?php echo site_url('home/KeranjangBelanja');?>"><b>Keranjang Belanja</b></a>
				</li>			
				<li class="nav-item">
					<a class="nav-link text-dark" href="<?php echo site_url('home/Konfirmasi');?>"><b>Konfirmasi</b></a>
				</li>						
    			<li class="nav-item">
    				<a class="nav-link text-dark" href="<?php echo site_url('home/HubungiKami');?>"><b>Hubungi Kami</b></a>
    			</li>									
			<?php
			}
			// Jika sudah ada yang login dan yang login adalah administrator
			if($this->session->userdata('SesLevel')=='administrator'){
			?>
    			<li class="nav-item">
    				<a class="nav-link text-dark" href="<?php echo site_url('produk');?>"><b>Produk</b></a>
    			</li>
				<li class="nav-item">
					<a class="nav-link text-dark" href="<?php echo site_url('member');?>"><b>Member</b></a>
				</li>			
				<li class="nav-item">
					<a class="nav-link text-dark" href="<?php echo site_url('Order');?>"><b>Order</b></a>
				</li>			
				<li class="nav-item">
					<a class="nav-link text-dark" href="<?php echo site_url('konfirmasi');?>"><b>Konfirmasi</b></a>
				</li>			
				<li class="nav-item">
					<a class="nav-link text-dark" href="<?php echo site_url('inbox');?>"><b>Inbox</b></a>
				</li>			
			<?php
			} 
			// jika admin/member sudah login
			if($this->session->userdata('SudahkahLogin')==true){
			?>
			<!-- <li class="nav-item"> -->
				<!-- <a class="nav-link text-dark" href="<?php echo site_url('home/profil');?>"><b>Profile</b></a> -->
			</li>
			<?php
			}
			?>
          </ul>
		  
          <form class="form-inline my-2 my-lg-0" method="POST" action="<?php echo site_url('home/Pencarian');?>">
            <input class="form-control " name="KataKunci" type="text" placeholder="Cari barang di sini..." aria-label="Cari barang di sini...">
			<button class="btn btn-white my-2 my-lg-0 mr-sm-2" style="border: 2px solid #D4D4D4" type="submit"><i class="fas fa-search"></i></button>
		  <?php
		  if($this->session->userdata('SudahkahLogin')){ // jika sudah login yg tampil tombol logout
		  ?>
			<a href="<?php echo site_url('member/Logout');?>" class="btn btn-danger my-2 my-lg-0">Keluar</a>        			  
		  <?php } 
			else { // jika belum login yg tampil tombol login 
				?>
			<a href="<?php echo site_url('home/BuatAkun');?>" class="btn text-white my-2 my-lg-0" style="background-color: #023980"><b>Daftar</b></a>      
			<a href="<?php echo site_url('home/login');?>" class="btn btn-white my-2 my-lg-0" style="color: #023980"><b>Masuk</b></a>   
		  <?php } ?>
          </form>
	  </div>
  </nav>
    
	
	<div class="container-fluid">			
		<?php
		if(isset($page)){
			$this->load->view($page);
		} else {
			$this->load->view('v_produk_terbaru');			
		}		
		?>
	</div>


	<!-- Modal Bootstrap -->
	<div class="modal fade" id="KotakDialog">
	  <div class="modal-dialog modal-lg">
		<div class="modal-content">

		  <!-- Modal Header -->
		  <div class="modal-header">
			<h4 class="modal-title">Modal Heading</h4>
			<!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
		  </div>

		  <!-- Modal body -->
		  <div class="modal-body">
			<!-- modal content-->
		  </div>

		  <!-- Modal footer -->
		  <div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
		  </div>

		</div>
	  </div>
	</div>

</main>
	
	
<!--footer-->
<footer class="text-muted">
	<div class="container-fluid">
		<hr class="text-green"/>
		<p class="float-right">
		<a href="#">Back to Top</a>
		<p class="text-center"><b>FantaGoods</b>
		<br/>All Right Reserved
		</p>
	</div>
</footer>
<!--footer-->
	
	
<script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>	
<script src="<?php echo base_url('bootstrap/js/jquery-3.3.1.min.js');?>"></script>
<script src="<?php echo base_url('bootstrap/js/bootstrap.js');?>"></script>
<script>
$(document).ready(function(){

    $('#KotakDialog').on('show.bs.modal', function (e) {
        // merubah judul Modal Bootstrap //
        var link  = $(e.relatedTarget);
        var judul = link.data('judul');
		$('.modal-title').text(judul);
		//Load remoter URL dari a href
		$('.modal-body').load(e.relatedTarget.href);
    });
    
	 $('a[data-confirm]').click(function(ev) {
	  var href = $(this).attr('href');
	  if(!$('#dataConfirmModal').length) {
	   $('body').append('<div id="dataConfirmModal" class="modal fade bs-modal-sm" tableindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hiden="true"><div class="modal-dialog modal-sm"><div class="modal-content"><div class="modal-header"><h4 class="modal-title" id="dataConfrimLabel">Konfirmasi</h4><button type="button" class="close" data-dismiss="modal" aria-hiden="ture">&times;</button></div><div class="modal-body"></div><div class="modal-footer"><button type="button" class="btn btn-default btn-sx" data-dismiss="modal" aria-hiden=""true"> Tidak </button><a class="btn btn-danger btn-sx" aria-hiden="true" id="dataConfirmOK"> Ya </a></div></div></div></div>');
	   }
	  $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
	  $('#dataConfirmOK').attr('href',href);
	  $('#dataConfirmModal').modal({show:true});
	  return false;
	 });

	
});
</script> 
	
	
</body>
</html>
