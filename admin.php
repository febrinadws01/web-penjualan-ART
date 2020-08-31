<?php
include('koneksi.php');session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
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
                        <?php if (isset($_SESSION['username'])):?>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                        <?php endif ?>

                        <li class="nav-item">
                            <a class="nav-link" href="tambah.php">Tambah ART</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="view_pembelian.php">Lihat Penjualan</a>
                        </li>
                    </ul>
                </div>
        </div>
    </nav>
    
    <div class="container" style="margin-top:20px">
        <h2>Daftar Pembelian</h2>
        
        <hr>
        
        <table class="table table-striped table-hover table-sm table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Kode Pembelian</th>
                    <th>Kode ART</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Jenis Transaksi</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = mysqli_query($koneksi, "SELECT * FROM pembelian") or die(mysqli_error($koneksi));
                if(mysqli_num_rows($sql) > 0){
                    $no = 1;
                    while($data = mysqli_fetch_assoc($sql)){
                        
                        echo '
                        <tr>
                            <td>'.$data['kd_pembelian'].'</td>
                            <td>'.$data['kd_art'].'</td>
                            <td>'.$data['username'].'</td>
                            <td>'.$data['jumlah'].'</td>
                            <td>'.$data['jenis_tf'].'</td>
                            <td>'.$data['total_harga'].'</td>
                            <td>'.$data['status'].'</td>
                            <td>
                                <a href="edit.php?kd_pembelian='.$data['kd_pembelian'].'" class="badge badge-warning">Edit</a>
                                <a href="delete.php?kd_pembelian='.$data['kd_pembelian'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
                            </td>
                        </tr>
                        ';
                        $no++;
                    }
             
                }else{
                    echo '
                    <tr>
                        <td colspan="6">Tidak ada data.</td>
                    </tr>
                    ';
                }
                ?>
            <tbody>
        </table>
        
    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</body>
</html>