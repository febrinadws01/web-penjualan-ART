 <?php
    session_start();
    include "koneksi.php";
    $user = $_POST['username'];
    $pass = md5($_POST['password']);

    $op = $_GET['op'];

        $query_1="SELECT * FROM akun where username='$user' AND password='$pass'";
        $a = $koneksi->query($query_1);
        if(mysqli_num_rows($a)==1){

            $b = $a->fetch_assoc();
            $_SESSION['username'] = $b['username'];
            $_SESSION['level'] = $b['level'];

            if($b['level']=="Admin"){
                $_SESSION["admin"]=$b;
                echo "<script>alert('Anda Berhasil Login Admin');</script>";
                echo "<script>location='admin.php'; </script>";
                header("location:admin.php");
            }else if($b['level']=="Pengguna"){
                $_SESSION["pelanggan"] = $b;
                echo "<script>alert('Anda Berhasil Login Pengguna');</script>";
                echo "<script>location='checkout.php'; </script>";
                header("location:user.php");
            }
        }else{
                echo "<script>alert('Anda Gagal Login');</script>";
                echo "<script>location='login.php'; </script>";
        }
        
        
?>
