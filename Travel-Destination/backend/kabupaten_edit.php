<!DOCTYPE html>
<html>

<?php
/** Memanggil koneksi ke MySQL **/
include("includes/config.php");

$kode_kabupaten = $_GET["ubahkabupaten"];
$edit = mysqli_query($conn, "SELECT * from kabupaten WHERE kode_kabupaten = '$kode_kabupaten'");
$row_edit = mysqli_fetch_array($edit);

/** Mengecek apakah tombol simpan sudah dipilih/klik atau belum **/
if (isset($_POST['ubah'])) {
    $kode_kabupaten = $_POST['inputKODE'];
    $nama_kabupaten = $_POST['inputNAMA'];
    $alamat_kabupaten = $_POST['inputALAMAT'];
    $kode_provinsi = $_POST['inputPRO'];

    $namafoto = $_FILES['fotokabupaten']['name']; /** untuk menampung data foto atau gambar **/
    $file_tmp = $_FILES["fotokabupaten"]["tmp_name"];
    $file_size = $_FILES["fotokabupaten"]["size"];

    //mysqli_query($conn, "INSERT INTO kabupaten VALUES ('$kode_kabupaten', '$nama_kabupaten', '$kode_provinsi', '$namafoto')");

    if ($file_size > 2097152) { 
        echo "<script>alert('Error: Ukuran file terlalu besar! Maksimal 2MB.');</script>";
    } else {
        if ($namafoto == "") {
            mysqli_query($conn, "UPDATE kabupaten SET nama_kabupaten = '$nama_kabupaten', alamat_kabupaten = '$alamat_kabupaten', kode_provinsi = '$kode_provinsi' WHERE kode_kabupaten = '$kode_kabupaten'");
        } else {
            mysqli_query($conn, "UPDATE kabupaten SET nama_kabupaten = '$nama_kabupaten', alamat_kabupaten = '$alamat_kabupaten', kode_provinsi = '$kode_provinsi', foto_kabupaten = '$namafoto' WHERE kode_kabupaten = '$kode_kabupaten'");
        }    
        header("location:kabupaten_input.php");
    }
}
$dataprovinsi = mysqli_query($conn, "SELECT * FROM provinsi");
//$query = mysqli_query($conn, "SELECT kabupaten.*, provinsi.kode_provinsi, provinsi.nama_provinsi FROM provinsi LEFT JOIN kabupaten ON kabupaten.kode_provinsi = provinsi.kode_provinsi");
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
    <title>Input Kabupaten</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">	   
</head>
<body>

<!-- membuat form input data kabupaten -->
<div class="row">
<div class="col-1"></div>
<div class="col-10">

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-5">Input Kabupaten</h1>
        <p class="lead">Kabupaten Jawa</p>
    </div>
</div>

<form method="POST" enctype="multipart/form-data">
    <div class="row mb-3 mt-5">
        <label for="kodeKab" class="col-sm-2 col-form-label">Kode Kabupaten</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="kodeKab" name="inputKODE" value="<?php echo $row_edit["kode_kabupaten"]?>" readonly> 
        </div>
    </div>
    <div class="row mb-3">
        <label for="namaKab" class="col-sm-2 col-form-label">Nama Kabupaten</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="namaKab" name="inputNAMA" value="<?php echo $row_edit["nama_kabupaten"]?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="alamatKab" class="col-sm-2 col-form-label">Alamat Kabupaten</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="alamatKab" name="inputALAMAT" value="<?php echo $row_edit["alamat_kabupaten"]?>">
        </div>
    </div>

    <!-- penggunaan select2 -->
    <div class="row mb-3">
        <label for="inputPRO" class="col-sm-2 col-form-label">Kode Provinsi</label>
        <div class="col-sm-10">
            <select class="form-control" id="kode_provinsi" name="inputPRO">
            <option><?php echo $row_edit["kode_provinsi"]?></option>
                <?php if(mysqli_num_rows($dataprovinsi) > 0){?>
                <?php while($row = mysqli_fetch_array($dataprovinsi)) 
                { ?>
                <option value="<?php echo $row["kode_provinsi"]?>">
                        <?php echo $row["kode_provinsi"] ?> - <?php echo $row["nama_provinsi"] ?>
                    </option>
                    <?php } ?>            
                <?php } ?>
            </select>
        </div>
    </div>
    <!-- end select2 -->

    <!-- input file -->
    <div class="form-group row mb-3">
        <label for="file" class="col-sm-2 col-form-label">Foto Kabupaten</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="file" name="fotokabupaten">
            <p class="help-block">Unggah Foto Kabupaten</p>
        </div>
    </div>
    <!-- end input file -->

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
        <h1 class="display-5">Output Kabupaten</h1>
    </div>
</div>

<!-- form pencarian data -->
<form method="POST">
	<div class="form-group row mt-5">
		<label for="search" class="col-sm-2">Cari Nama Kabupaten</label>
		<div class="col-sm-6">
			<input type="text" name="search" class="form-control" id="search"
			value="<?php if(isset($_POST["search"]))
			{echo $_POST["search"];}?>" placeholder="Cari nama kabupaten">
		</div>
		<input type="submit" name="kirim" value="Cari" class="col-sm-1 btn btn-primary">
	</div>
 </form>
 <!-- end pencarian data -->

<table class="table table-striped table-success table-hover mt-5">
    <!-- membuat judul -->
    <tr class="info">
        <th>Kode Kabupaten</th>
        <th>Nama Kabupaten</th>
        <th>Alamat Kabupaten</th>
        <th>Kode Provinsi</th>
        <th>Nama Provinsi</th>
        <th>Foto Kabupaten</th>
        <th colspan="2">Aksi</th>
    </tr>

    <!-- menampilkan data dari tabel kabupaten -->
    <?php { 	
		if (isset($_POST["kirim"])) {
            $search = $_POST["search"];
            $query = mysqli_query($conn, "SELECT kabupaten.*, provinsi.nama_provinsi FROM kabupaten JOIN provinsi ON kabupaten.kode_provinsi = provinsi.kode_provinsi WHERE kabupaten.nama_kabupaten LIKE '%" . $search . "%'");

        } else {
            $query = mysqli_query($conn, "SELECT * FROM kabupaten, provinsi where kabupaten.kode_provinsi = provinsi.kode_provinsi");
        }
	}    
    ?>
    <?php while ($row = mysqli_fetch_array($query)) { ?>
        <tr class="danger">
            <td><?php echo $row['kode_kabupaten']; ?></td>
            <td><?php echo $row['nama_kabupaten']; ?></td>
            <td><?php echo $row['alamat_kabupaten']; ?></td>
            <td><?php echo $row['kode_provinsi']; ?></td>
            <td><?php echo $row['nama_provinsi']; ?></td>
            <td>
                <?php if ($row['foto_kabupaten'] == "") { 
                    echo "<img src='../images/noimage.png' width='88'/>"; 
                } else { ?>
                    <img src="../images/<?php echo $row['foto_kabupaten'] ?>" width="88" class="img-responsive" />
                <?php } ?>
            </td>
            <td>
                <a href="#" class="btn btn-success btn-sm" title="EDIT">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
					<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
					<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                </svg>
            </td>
            <td>
                <a href="#" class="btn btn-danger btn-sm" title="HAPUS">	
                    <i class="bi bi-trash"></i>
                </td>
            </tr>
    <?php } ?>
</table>
</div>
<div class="col-1"></div>
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
