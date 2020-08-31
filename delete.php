<?php
include('koneksi.php');

if(isset($_GET['kd_pembelian'])){
	
	$id = $_GET['kd_pembelian'];
	
	$cek = mysqli_query($koneksi, "SELECT * FROM pembelian WHERE kd_pembelian='$id'") or die(mysqli_error($koneksi));
	
	if(mysqli_num_rows($cek) > 0){
		
		$del = mysqli_query($koneksi, "DELETE FROM pembelian WHERE kd_pembelian='$id'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data!"); document.location="admin.php";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data!"); document.location="admin.php";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database!"); document.location="admin.php";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database!"); document.location="admin.php";</script>';
}

?>