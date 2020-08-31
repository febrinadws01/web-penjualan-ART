<?php 
	session_start();
	$kd_art = $_GET['kd_art'];


	if (isset($_SESSION['keranjang'][$kd_art])) {
		$_SESSION['keranjang'][$kd_art]+=1;

	}else{
		$_SESSION['keranjang'][$kd_art]=1;
	}



echo '<script>alert("Produk telah ditambahkan ke keranjang!"); document.location="keranjang.php";</script>';;
 ?>