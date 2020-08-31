<?php 
	include"koneksi.php";

	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$ulangi = md5($_POST['ulangi']);
	$email = $_POST['email'];
	$alamat = $_POST['alamat'];
	$telepon = $_POST['telepon'];
	$level = $_POST['level'];
	$gender= $_POST['gender'];

	if ($password == $ulangi) {
		$sql = "INSERT INTO akun(username,password,email,alamat,telepon,level,jeniskelamin) VALUES ('".$username."','".$password."','".$email."','".$alamat."','".$telepon."','".$level."','".$gender."')";

        $a = $koneksi->query($sql);
        
        if ($a == true) {
            echo "<script type = 'text/javascript'>
				alert('Anda Sukses Registrasi');
				window.location.href = ('login.php');
			</script>";
        } else {
 			echo "<script type = 'text/javascript'>
				alert('Registrasi Gagal');
				window.location.href = ('register.php');
			</script>";

        }

    }else{

       echo "<script 
			type = 'text/javascript'>
			alert('Ulangi, Password Anda Tidak Sama');
			history.go(-1)
		</script>";

    }

 ?>