<?php 
    session_start(); 

    //jika belum login, alihkan ke login
    if (empty($_SESSION['user'])) {
        header('Location: index.php');
        exit();
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mahasiswa</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <!-- Header-->
    <nav class="navbar-nav bg-primary">
        <div style="box-shadow: 0px 0px 5px #3498db;">
            <div class="container">
                <div class="navbar-header">
                    <a href="#" class="navbar-brand">
                        <span style="color: #fff;"><b>MAHASISWA</b></span>
                    </a>
                    <a href="proses-logout.php" class="navbar-brand float-right text-light">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <br>
    <!-- End Header-->
    <div class="container-fluid">
        <div class="row" >
            <!-- Input Data Mahasiswa -->
            <div class="col-lg-3">
                <div class="card">
                    <div class="container">
                        <form action="proses-input.php" method="post">
                            <div class="form-group">
                            <label>NIM</label>
                                <input type="text" class="form-control" name="nim" maxlength="9">
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <div class="form-group">
                            <label>Jekel</label>
                                <select name="jekel" class="form-control">
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control" name="tmp_lahir">
                            </div>
                            <div class="form-group">
                                <label>Tanggal_lahir</label>
                                <input type="date" class="form-control" name="tgl_lahir">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alamat">
                            </div>
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Input Data Mahasiswa -->
            <!-- List Data Mahasiswa -->
            <div class="col-lg-9">
                <div class="card">
                    <div class="container">
                        <table class="table tble-striped">
                            <tr>
                                <th width="1%">No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Jekel</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Pilihan</th>
                            </tr>
                            <?php 
                                include 'proses-list.php';
                                $no=1;
                                foreach ($data_mahasiswa as $mahasiswa) :
                            ?>
                            <tr>
                                <td><?= $no++;?>.</td>
                                <td><?= $mahasiswa['nim']?></td>
                                <td><?= $mahasiswa['nama']?></td>
                                <td><?= $mahasiswa['jekel']?></td>
                                <td><?= $mahasiswa['tempat_lahir']?></td>
                                <td><?= date('d-m-Y', strtotime($mahasiswa['tgl_lahir']))?></td>
                                <td><?= $mahasiswa['alamat']?></td>
                                <td>
                                    <a href="form-edit.php?id_mahasiswa=<?php echo $mahasiswa['id_mahasiswa']; ?>" class="btn btn-sm btn-success">Edit</a>
                                    <a href="proses-hapus.php?id_mahasiswa=<?php echo $mahasiswa['id_mahasiswa']; ?>"class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin akan menghapus data?');">Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End List Data Mahasiswa -->
        </div>
    </div>
</body>
</html>