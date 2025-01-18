<?php 
    session_start(); 

    //jika belum login, alihkan ke login
    if (empty($_SESSION['user'])) {
        header('Location: index.php');
        exit();
    }

    include 'koneksi.php';
    $id_mahasiswa = $_GET['id_mahasiswa'];
    $query = "SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa";
    $hasil = mysqli_query($db, $query);
    $data_mahasiswa = mysqli_fetch_assoc($hasil);
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
    <!-- End Header-->
    <br>
    <div class="container-fluid">
        <div class="row" >
            <!-- Edit Data Mahasiswa -->
            <div class="col-lg-3">
                <div class="card cnter">
                    <div class="container">
                        <form action="proses-edit.php" method="post">
                            <div class="form-group">
                                <input type="hidden" name="id_mahasiswa" value="<?php echo $data_mahasiswa['id_mahasiswa'];?>">
                                <label>NIM</label>
                                <input type="text" class="form-control" name="nim"  maxlength="9" value="<?php echo $data_mahasiswa['nim'];?>">
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" value="<?php echo $data_mahasiswa['nama'];?>">
                            </div>
                            <div class="form-group">
                            <label>Jekel</label>
                                <select name="jekel" class="form-control">
                                    <?php if ($data_mahasiswa['jekel'] == "L"): ?>
                                    <option value="L" selected>Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                    <?php else : ?>
                                    <option value="L">Laki-laki</option>
                                    <option value="P" selected>Perempuan</option>
                                    <?php endif ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control" name="tmp_lahir" value="<?php echo $data_mahasiswa['tempat_lahir'];?>">
                            </div>
                            <div class="form-group">
                                <label>Tanggal_lahir</label>
                                <input type="date" class="form-control" name="tgl_lahir" value="<?php echo $data_mahasiswa['tgl_lahir'];?>">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="<?php echo $data_mahasiswa['alamat'];?>">
                            </div>
                            <input type="submit" class="btn btn-success" value="Edit">
                            <a href="index.php" class="btn btn-warning">Batal</a>
                        </form>
                    </div>
                
                </div>
            </div>
            <!-- End Edit Data Mahasiswa -->
            <!-- List Data Mahasiswa -->
            <div class="col-lg-9">
                <div class="card">
                    <div class="container">
                        <table class="table">
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