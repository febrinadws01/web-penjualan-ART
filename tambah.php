<?php include('koneksi.php'); session_start(); ?>
<!DOCTYPE html>
<html>
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

						<?php if (isset($_SESSION["username"])):?>
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
    
	
	<div class="container" style="margin-top:20px">
		<h2>Tambah Alat Rumah Tangga</h2>
		
		<hr>
		
		<?php
		if(isset($_POST['submit'])){
			$kd_art = $_POST['kd_art'];
			$nama_art = $_POST['nama_art'];
			$harga = $_POST['harga'];
			$stok = $_POST['stok'];
			$gambar = $_POST['gambar'];


			$cek = mysqli_query($koneksi, "SELECT * FROM art WHERE kd_art='$kd_art'") or die(mysqli_error($koneksi));
			
			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO art(kd_art, nama_art, harga, stok, gambar) VALUES('$kd_art', '$nama_art', '$harga', '$stok', '$gambar')") or die(mysqli_error($koneksi));
				
				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="tambah.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, kd_art sudah terdaftar.</div>';
			}
		}
		?>
		
		<form action="tambah.php" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">KD_ART</label>
				<div class="col-sm-10">
					<input type="text" name="kd_art" class="form-control" size="4" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA ART</label>
				<div class="col-sm-10">
					<input type="text" name="nama_art" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">HARGA</label>
				<div class="col-sm-10">
					<input type="text" name="harga" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">STOK</label>
				<div class="col-sm-10">
					<input type="text" name="stok" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">GAMBAR</label>
				<div class="col-sm-10">
					<input type="text" name="gambar" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<a href="admin.php" class="btn btn-warning">KEMBALI</a>
				</div>
			</div>
		</form>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>