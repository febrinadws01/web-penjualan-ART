        <?php 
            include "koneksi.php";
            session_start();
                if (isset($_POST['checkout'])) {
                    $barang = $_SESSION["keranjang"];
                    $username = $_SESSION['pelanggan']["username"];
                    $jumlah = $_POST["pelanggan"]["jumlah"];
                    $jenis_tf = $_POST["jenis_tf"];
                    $total = $_SESSION["total_harga"];
                    $status = $_POST["status"];
            
                    
                    $totalpembelian = 0;
                    foreach ($barang as $key => $value) {
                        $query = $koneksi->query("SELECT * FROM art WHERE kd_art = '{$key}'");
                        $result = $query->fetch_object();

                        $harga = $result->harga;
                        $jumlah_beli = $value;
                        
                        $totalpembelian += $harga * $jumlah_beli;
                        
                        // insert ke table pembelian
                        $query = $koneksi->query("INSERT INTO pembelian VALUES(null, '{$key}', '{$username}', '{$value}', '{$jenis_tf}', '{$totalpembelian}', '{$status}')");

                    }                   
                    

                    if ($query) {
                        echo "<script>alert('Pesanan Berhasil Dibuat');</script>";
                        session_destroy();
                        header('Location: user.php');
                        exit;

                    } else {
                        echo "<script>alert('gagal belanja')</script>";
                    }

                    // $koneksi->query("INSERT INTO pembelian(kd_pembelian, kd_art, username, jumlah, jenis_tf, status) VALUES ('', '$kd_art', '$username'. '$jumlah', '$jenis_tf', '$total', '$status') ");
                }

             ?>