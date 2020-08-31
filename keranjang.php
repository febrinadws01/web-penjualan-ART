<?php 
session_start();


$koneksi = new mysqli("localhost", "root", "", "web_uas");


if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])) {
    echo "<script>alert('Keranjang Kosong, Silahkan Belanja');</script>";
    echo "<script>location = 'user.php'</script>";
}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Keranjang Belanja</title>
 	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Product</title>
        <link rel="stylesheet" href="css/style1.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>

    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
                <a class="navbar-brand" href="#">febrinadws</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>

                        <?php if (isset($_SESSION["pelanggan"])):?>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                        <?php endif ?>

                        <li class="nav-item">
                            <a class="nav-link" href="checkout.php">Checkout</a>
                        </li>
                    </ul>
                </div>
        </div>
    </nav>
    
    <section class="konten">
    	<div class="container">
    		<h2>Keranjang Belanja</h2>
    		<hr>
    		<table class="table table-bordered">
    			<thead>
    				<tr>
    					<th>No.</th>
    					<th>Kd_art</th>
    					<th>Nama_art</th>
    					<th>Harga</th>
    					<th>Jumlah</th>
    					<th>Total Jumlah</th>
                        <th>Aksi</th>
    				</tr>
    			</thead>
    			<tbody>
    				<?php $nomor=1; ?>
    				<?php foreach ($_SESSION["keranjang"] as $kd_art => $jumlah): ?>
    				<!-- nampilin produk  berdasrkan kd art-->
    				<?php 
    				$ambil = $koneksi->query("SELECT * FROM art WHERE kd_art='$kd_art'");
    				$pecah = $ambil->fetch_assoc();
    				$total =$pecah['harga']*$jumlah;
    				 ?>
    				<tr>
    					<td><?php echo $nomor; ?></td>
    					<td><?php echo $pecah['kd_art']; ?></td>
    					<td><?php echo $pecah['nama_art']; ?></td>
    					<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
    					<td><?php echo $jumlah; ?></td>
    					<td>Rp. <?php echo number_format($total); ?></td>
                        <td>
                            <a href="hapuskeranjang.php?kd_art=<?php echo $kd_art ?>" class="btn btn-danger btn-xs">Hapus</a>
                        </td>
    				</tr>
    				<?php $nomor++; ?>
    				<?php endforeach ?>
    			</tbody>
    		</table>

    		<a href="user.php" class="btn btn-warning">Lanjutkan Belanja</a>
    		<a href="checkout.php" class="btn btn-primary">Checkout Belanja</a>
    	</div>
    </section>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 
 </body>
 </html>