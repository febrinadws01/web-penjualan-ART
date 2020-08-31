<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
	
	<div class="container" style="margin-top:20px">
		<h2>Edit Daftar Pembelian</h2>
		
		<hr>
		
		<?php
		if(isset($_GET['kd_pembelian'])){
			$id = $_GET['kd_pembelian'];
			$sql = mysqli_query($koneksi, "SELECT * FROM pembelian WHERE kd_pembelian=$id") or die(mysqli_error($koneksi));
			if(mysqli_num_rows($sql) == 0){

				echo '<div class="alert alert-warning">Kode ART tidak ada dalam database.</div>';
				exit();
			}else{
				$data = mysqli_fetch_assoc($sql);
			}
		}
		?>
		
		<?php
		if(isset($_POST['submit'])){
			$id = $_GET['kd_pembelian'];
			$kd_art = $_POST['kd_art'];
			$nama	= $_POST['username'];
			$jumlah = $_POST['jumlah'];
			$jenis_tf= $_POST['jenis_tf'];
			$total_harga = $_POST['total_harga'];
			$status = $_POST['status'];
			
			$sql = mysqli_query($koneksi, "UPDATE pembelian SET jumlah='$jumlah', jenis_tf='$jenis_tf', total_harga='$total_harga', status='$status' WHERE kd_pembelian=$id") or die(mysqli_error($koneksi));
			
			if($sql){
				echo '<script>alert("Berhasil menyimpan data!"); document.location="edit.php?kd_pembelian='.$id.'";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>
		
		<form action="edit.php?kd_pembelian=<?php echo $id; ?>" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kode Pembelian</label>
				<div class="col-sm-10">
					<input type="text" name="kd_pembelian" class="form-control" size="4" value="<?php echo $data['kd_pembelian']; ?>" readonly required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kode ART</label>
				<div class="col-sm-10">
					<input type="text" name="kd_art" class="form-control" value="<?php echo $data['kd_art']; ?>" readonly required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-10">
					<input type="text" name="username" class="form-control" value="<?php echo $data['username']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">JUmlah</label>
				<div class="col-sm-10">
					<input type="text" name="jumlah" class="form-control" value="<?php echo $data['jumlah']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Transaksi</label>
				<div class="col-sm-10">
					<input type="text" name="jenis_tf" class="form-control" value="<?php echo $data['jenis_tf']; ?>" required>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Total Harga</label>
				<div class="col-sm-10">
					<input type="text" name="total_harga" class="form-control" value="<?php echo $data['total_harga']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status</label>
				<div class="col-sm-10">
					<input type="text" name="status" class="form-control" value="<?php echo $data['status']; ?>" required>
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