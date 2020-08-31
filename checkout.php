<?php 
session_start();

$koneksi = new mysqli("localhost", "root", "", "web_uas");

if (!isset($_SESSION["pelanggan"])) {
	echo "<script>alert('Silahkan Login Terlebih Dahulu'); </script>";
	echo "<script>location ='login.php'; </script>";
}

 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>Checkout</title>
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
               
    				</tr>
    			</thead>
    			<tbody>
    				<?php $nomor=1; ?>
    				<?php $totalbelanja = 0; ?>
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
                       
    				</tr>
    				<?php $nomor++; ?>
    				<?php $totalbelanja+=$total; ?>
    				<?php endforeach ?>
    			</tbody>
    			<tfoot>
    				<tr>
    					<th colspan="5"> Total Belanja : </th>
    					<th> Rp. <?php echo number_format($totalbelanja) ?></th>
    				</tr>
    			</tfoot>
    		</table>
    		<form method="post" action="aksi_chekout.php">
    			<h3>Data Pemesan</h3>
    			<div class="row">
    				<div class="col-md-2">
    					<div class="form-group">
    					<input type="text" name="" readonly="" value="<?php echo $_SESSION["pelanggan"]["username"] ?>" class="form-control">
    					</div>
    				</div>
    				<div class="col-md-2">
    					<div class="form-group">
    						<input type="text" name="" readonly="" value="<?php echo $_SESSION["pelanggan"]["alamat"] ?>" class="form-control">
    					</div>
    				</div>
    				<div class="col-md-2">
    					<div class="form-group">
    						<input type="text" name="" readonly="" value="<?php echo $_SESSION["pelanggan"]["telepon"] ?>" class="form-control">
    					</div>
    				</div>
    				<div class="col-md-2">
    					<select class="form-control" name="jenis_tf">
    						<option value="">Pilih Jenis Transaksi</option>
    						<option value="transfer">Transfer Via Bank</option>
    						<option value="tunai">Tunai atau COD</option>
    					</select>
    				</div>
    				<div class="col-md-2">
    					<select class="form-control" name="status">
    						<option value="lunas">Lunas</option>
    						<option value="belum_lunas">Belum Lunas</option>
    					</select>
    				</div>
    			</div>
    			
    			<button class="btn btn-primary" name="checkout" type="submit">Buat Pesanan</button>
    		</form>

    	</div>
    </section>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 </body>
 </html>