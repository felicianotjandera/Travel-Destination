<!DOCTYPE html>
<html>

<?php
include("includes/config.php");

$kodeprovinsi = isset($_GET["ubahprovinsi"]) ? $_GET["ubahprovinsi"] : '';
$edit = mysqli_query($conn, "SELECT * FROM provinsi WHERE kode_provinsi = '$kodeprovinsi'");
$row_edit = mysqli_fetch_array($edit);


if (isset($_POST['ubah'])) {
    $kode_provinsi = $_POST['kode_provinsi'];
    $nama_provinsi = $_POST['inputNAMA'];
    $namafoto = $_FILES['fotoprovinsi']['name'];
    $file_tmp = $_FILES["fotoprovinsi"]["tmp_name"];
    $file_size = $_FILES["fotoprovinsi"]["size"];

    if ($file_size > 2097152) { 
        echo "<script>alert('Error: Ukuran file terlalu besar! Maksimal 2MB.');</script>";
    } else {
        if ($namafoto != "") {
            move_uploaded_file($file_tmp, '../images/' . $namafoto);
            mysqli_query($conn, "UPDATE provinsi SET kode_provinsi = '$kode_provinsi', nama_provinsi = '$nama_provinsi', foto_provinsi = '$namafoto' WHERE kode_provinsi = '$kodeprovinsi'");
        } else {
            mysqli_query($conn, "UPDATE provinsi SET kode_provinsi = '$kode_provinsi', nama_provinsi = '$nama_provinsi' WHERE kode_provinsi = '$kodeprovinsi'");
        }
        header("location:provinsi_input.php");
    }
}
?>
<?php 
ob_start();
session_start();
if(!isset($_SESSION['admin_USER']))
    header("location:login.php");
?>
  
<?php include "include/head.php"; ?>
    <body class="sb-nav-fixed">
    <?php include "include/menunav.php"; ?>
        <div id="layoutSidenav">
            <?php include "include/menu.php"; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ubah Provinsi</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

<div class="row">
<div class="col-1"></div>
<div class="col-10">

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-5">Input Provinsi</h1>
        <p class="lead">Provinsi Jawa</p>
    </div>
</div>

    <form method="POST" enctype="multipart/form-data">
    <div class="row mb-3 mt-5">
            <label for="kode_provinsi" class="col-sm-2 col-form-label">Kode Provinsi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kode_provinsi" name="kode_provinsi" value="<?php echo $row_edit["kode_provinsi"] ?>" readonly>
            </div>
        </div>
        <div class="row mb-3">
            <label for="provinsiNAMA" class="col-sm-2 col-form-label">Nama Provinsi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="provinsiNAMA" name="inputNAMA" value="<?php echo $row_edit["nama_provinsi"] ?>">
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="file" class="col-sm-2 col-form-label">Foto Provinsi</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="file" name="fotoprovinsi">
                <p class="help-block">Unggah Foto Provinsi</p>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <input type="submit" class="btn btn-success" value="Update" name="ubah">
                <input type="reset" class="btn btn-danger" value="Batal">
            </div>
        </div>
    </form>

    <div class="jumbotron jumbotron-fluid mt-5">
    <div class="container">
        <h1 class="display-5">Output Provinsi</h1>
    </div>
</div>


    <form method="post">
        <div class="form-group row mt-5">
            <label for="search" class="col-sm-2">Cari Nama Provinsi</label>
            <div class="col-sm-6">
                <input type="text" name="search" class="form-control" id="search" value="<?php echo isset($_POST["search"]) ? $_POST["search"] : ''; ?>" placeholder="Cari nama provinsi">
            </div>
            <input type="submit" name="kirim" value="Cari" class="col-sm-1 btn btn-primary">
        </div>
    </form>

    <table class="table table-striped table-success table-hover mt-5">
        <tr class="info">
            <th>Kode Provinsi</th>
            <th>Nama Provinsi</th>
            <th>Foto Provinsi</th>
            <th colspan="2">Aksi</th>
        </tr>

        <?php
        if (isset($_POST["kirim"])) {
            $search = $_POST["search"];
            $query = mysqli_query($conn, "SELECT * FROM provinsi WHERE nama_provinsi LIKE '%" . $search . "%'");
        } else {
            $query = mysqli_query($conn, "SELECT * FROM provinsi");
        }

        while ($row = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $row['kode_provinsi']; ?></td>
                <td><?php echo $row['nama_provinsi']; ?></td>
                <td>
                    <?php if ($row['foto_provinsi'] == "") { ?>
                        <img src="../images/noimage.png" width="88" />
                    <?php } else { ?>
                        <img src="../images/<?php echo $row['foto_provinsi']; ?>" width="88" class="img-responsive" />
                    <?php } ?>
                </td>
                <td>
                    <a href="#" class="btn btn-success btn-sm" title="EDIT">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                </td>
                <td>
                    <a href="#" class="btn btn-danger btn-sm" title="HAPUS">
                        <i class="bi bi-trash"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.min.js"></script>
</main>
                <?php include "include/footer.php"; ?>
            </div>
        </div>
        <?php include "include/jsscript.php" ?>
</body>
<?php
  mysqli_close($conn);
  ob_end_flush();
?>
</html>