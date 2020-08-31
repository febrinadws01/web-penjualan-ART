<?php 

session_start();

$kd_art = $_GET["kd_art"];
unset($_SESSION["keranjang"][$kd_art]);

echo "<script>alert('Produk Dihapus dari keranjang');</script>";
echo "<script>location = 'keranjang.php'</script>";
 ?>