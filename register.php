<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
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

	<h1>Selamat Datang Di Toko Kami</h1>

	<div class="kotak_login">
		<p class="tulisan_login">Silahkan Register</p>

		<form action="aksi_register.php" method="POST">
			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Username">

			<label>Password</label>
			<input type="password" name="password" class="form_login" placeholder="Password">

			<label>Ulangi Password</label>
			<input type="password" name="ulangi" class="form_login" placeholder="Password">

			<label>Email</label>
			<input type="text" name="email" class="form_login" placeholder="Email">

			<label>Alamat</label>
			<input type="textarea" name="alamat" class="form_login" placeholder="Alamat">

			<label>No. Telepon</label>
			<input type="text" name="telepon" class="form_login" placeholder="No. Telepon">

			<label>Level</label>
			<select name="level">
				<option value="Pengguna">Pengguna</option>
				<option value="Admin">Admin</option>
			</select>
			
			<br/>
			<br/>

			<label>Jenis Kelamin</label>
			<select name="gender">
				<option value="Pengguna">Laki-laki</option>
				<option value="Admin">Perempuan</option>
			</select>


			<br/>
			<br/>
			<input type="submit" class="tombol_login" value="REGISTER">
		</form>
	</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>