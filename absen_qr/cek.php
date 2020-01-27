<?php 
include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hasil Validasi Ijazah</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="./assets/img/logo.png">
	<!-- Bootstrap core CSS -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="./">Validasi Ijazah dengan QR Code</a>
        </div>
    </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Hasil Validasi Ijazah</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">                                
                        <tr>
                            <td colspan="3">
                                <center>
                                <img src="assets/img/logo.png" width="90px">
                                <h1>UNIVERSITAS LURUILMU.COM</h1>
                                <p>Jl. Pulau Beringin Blok. B Pondok Kelapa Bengkulu Tengah</p>
                                <hr>
                            </td>
                        </tr>
                    </table>
                    <?php
                    $sql=mysqli_query($konek, "SELECT * FROM mahasiswa WHERE no_ijazah='$_POST[noijazah]'");
                    $d=mysqli_fetch_array($sql);

                    if(mysqli_num_rows($sql) < 1){
                        ?>
                        <div class="alert alert-danger">
                            <center>
                            <strong>Maaf, Data tidak ditemukan..!</strong><br>
                            <i>Silahkan menghubungi Perguruan Tinggi terkait untuk menanyakan masalah ini</i>
                            </center>
                        </div>
                        <?php
                    }else{
                    ?>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>NPM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Program Studi</th>
                            <th>Tanggal Lulus</th>
                            <th>Nomor Ijazah</th>
                            <th>IPK</th>
                        </tr>
                        <tr>
                            <td><?php echo $d['npm']; ?></td>
                            <td><?php echo $d['nama_mhs']; ?></td>
                            <td><?php echo $d['prodi']; ?></td>
                            <td><?php echo $d['tgl_lulus']; ?></td>
                            <td><?php echo $d['no_ijazah']; ?></td>
                            <td><?php echo $d['ipk']; ?></td>
                        </tr>
                    </table>
                    <?php } ?>
                </div>
                <div class="panel-footer">
                    <center><a class="btn btn-danger" href="./validasi-ijazah">Kembali</a></center>
                </div>
            </div>
        </div>
    </div>
</body>
</html>