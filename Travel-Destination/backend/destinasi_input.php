<!DOCTYPE html>
<html>

<?php
/** Memanggil koneksi ke MySQL **/
include("includes/config.php");

/** Mengecek apakah tombol simpan sudah dipilih/klik atau belum **/
if (isset($_POST['Simpan'])) {
    $kode_destinasi = $_POST['inputKODE'];
    $nama_destinasi = $_POST['inputNAMA'];
    $alamat_destinasi = $_POST['inputALAMAT'];
    $keterangan_destinasi = $_POST['inputKET'];
    $kategori_ID = $_POST['inputKat'];
    $kode_kabupaten = $_POST['inputKab'];

    $namafoto = $_FILES['fotodestinasi']['name'];
    $file_tmp = $_FILES["fotodestinasi"]["tmp_name"];
    $file_size = $_FILES["fotodestinasi"]["size"];

    if ($file_size > 2097152) { 
        echo "<script>alert('Error: Ukuran file terlalu besar! Maksimal 2MB.');</script>";
    } else {
        move_uploaded_file($file_tmp, '../images/' . $namafoto);
        mysqli_query($conn, "INSERT INTO destinasiwisata VALUES ('$kode_destinasi', '$nama_destinasi', '$alamat_destinasi', '$keterangan_destinasi', '$kategori_ID', '$kode_kabupaten', '$namafoto')");
        header("location:destinasi_input.php");
    }
}
$datakategori = mysqli_query($conn, "SELECT * FROM kategori");
$datakabupaten = mysqli_query($conn, "SELECT * FROM kabupaten");
//$query = mysqli_query($conn, "SELECT destinasiwisata.*, kecamatan.kode_kecamatan, kecamatan.nama_kecamatan FROM kecamatan LEFT JOIN destinasiwisata ON destinasiwisata.kode_kecamatan = kecamatan.kode_kecamatan");
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
    <title>Input Destinasi Wisata</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">	    
</head>
<body>

<!-- membuat form input data destinasi wisata -->
<div class="row">
<div class="col-1"></div>
<div class="col-10">

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-5">Input Destinasi Wisata</h1>
        <p class="lead">Destinasi Wisata Jawa</p>
    </div>
</div>

<form method="POST" enctype="multipart/form-data">
    <div class="row mb-3 mt-5">
        <label for="kodeDes" class="col-sm-2 col-form-label">Kode Destinasi Wisata</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="kodeDes" name="inputKODE" placeholder="Kode Destinasi Wisata"> 
        </div>
    </div>
    <div class="row mb-3">
        <label for="namaDes" class="col-sm-2 col-form-label">Nama Destinasi Wisata</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="namaDes" name="inputNAMA" placeholder="Nama Destinasi Wisata">
        </div>
    </div>
    <div class="row mb-3">
        <label for="alamatDes" class="col-sm-2 col-form-label">Alamat Destinasi Wisata</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="alamatDes" name="inputALAMAT" placeholder="Alamat Destinasi Wisata">
        </div>
    </div>
    <div class="row mb-3">
        <label for="ketDes" class="col-sm-2 col-form-label">Keterangan Destinasi Wisata</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="ketDes" name="inputKET" placeholder="Keterangan Destinasi Wisata">
        </div>
    </div>

    <!-- penggunaan select2 -->
    <div class="row mb-3">
        <label for="inputKec" class="col-sm-2 col-form-label">Kode Kategori</label>
        <div class="col-sm-10">
            <select class="form-control" id="kategori_ID" name="inputKat">
                <option>Kode kategori</option>
                <?php while ($row = mysqli_fetch_array($datakategori)) { ?>
                    <option value="<?php echo $row["kategori_ID"] ?>">
                        <?php echo $row["kategori_ID"] ?> - <?php echo $row["kategori_ID"] ?>
                    </option>
                <?php } ?>
            </select>
        </div>
    </div>
    <!-- end select2 -->
    <!-- penggunaan select2 -->
    <div class="row mb-3">
        <label for="inputKec" class="col-sm-2 col-form-label">Kode Kabupaten</label>
        <div class="col-sm-10">
            <select class="form-control" id="kode_kabupaten" name="inputKab">
                <option>Kode kabupaten</option>
                <?php while ($row = mysqli_fetch_array($datakabupaten)) { ?>
                    <option value="<?php echo $row["kode_kabupaten"] ?>">
                        <?php echo $row["kode_kabupaten"] ?> - <?php echo $row["nama_kabupaten"] ?>
                    </option>
                <?php } ?>
            </select>
        </div>
    </div>
    <!-- end select2 -->

    <!-- input file -->
    <div class="form-group row mb-3">
        <label for="file" class="col-sm-2 col-form-label">Foto Destinasi Wisata</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="file" name="fotodestinasi">
            <p class="help-block">Unggah Foto Destinasi Wisata</p>
        </div>
    </div>
    <!-- end input file -->

    <div class="form-group row">  
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <input type="submit" class="btn btn-success" value="Simpan" name="Simpan">
            <input type="reset" class="btn btn-danger" value="Batal">
        </div>
    </div>    
</form>

<div class="jumbotron jumbotron-fluid mt-5">
    <div class="container">
        <h1 class="display-5">Output Destinasi Wisata</h1>
    </div>
</div>

<!-- form pencarian data -->
<form method="POST">
	<div class="form-group row mt-5">
		<label for="search" class="col-sm-2">Cari Nama Destinasi</label>
		<div class="col-sm-6">
			<input type="text" name="search" class="form-control" id="search"
			value="<?php if(isset($_POST["search"]))
			{echo $_POST["search"];}?>" placeholder="Cari nama destinasi">
		</div>
		<input type="submit" name="kirim" value="Cari" class="col-sm-1 btn btn-primary">
	</div>
 </form>
 <!-- end pencarian data -->

<table class="table table-striped table-success table-hover mt-5">
    <!-- membuat judul -->
    <tr class="info">
        <th>Kode Destinasi Wisata</th>
        <th>Nama Destinasi Wisata</th>
        <th>Alamat Destinasi Wisata</th>
        <th>Keterangan Destinasi Wisata</th>
        <th>Kode Kategori</th>
        <th>Kode Kabupaten</th>
        <th>Nama Kabupaten</th>
        <th>Foto Destinasi Wisata</th>
        <th colspan="2">Aksi</th>
    </tr>

    <!-- menampilkan data dari tabel destinasi wisata -->
    <?php { 	
		if (isset($_POST["kirim"])) {
            $search = $_POST["search"];
            $query = mysqli_query($conn, "SELECT destinasiwisata.*, kabupaten.nama_kabupaten FROM kabupaten JOIN destinasiwisata ON destinasiwisata.kode_kabupaten = kabupaten.kode_kabupaten WHERE destinasiwisata.nama_destinasi LIKE '%" . $search . "%'");

        } else {
            $query = mysqli_query($conn, "SELECT * FROM destinasiwisata, kabupaten where destinasiwisata.kode_kabupaten = kabupaten.kode_kabupaten");
        }
	}
    ?>
    <?php while ($row = mysqli_fetch_array($query)) { ?>
        <tr class="danger">
            <td><?php echo $row['kode_destinasi']; ?></td>
            <td><?php echo $row['nama_destinasi']; ?></td>
            <td><?php echo $row['alamat_destinasi']; ?></td>
            <td><?php echo $row['keterangan_destinasi']; ?></td>
            <td><?php echo $row['kategori_ID']; ?></td>
            <td><?php echo $row['kode_kabupaten']; ?></td>
            <td><?php echo $row['nama_kabupaten']; ?></td>
            <td>
                <?php if ($row['foto_destinasi'] == "") { 
                    echo "<img src='../images/noimage.png' width='88'/>"; 
                } else { ?>
                    <img src="../images/<?php echo $row['foto_destinasi'] ?>" width="88" class="img-responsive" />
                <?php } ?>
            </td>
            <td>
                <a href="destinasi_edit.php?ubahdestinasi=<?php echo $row["kode_destinasi"]?>" class="btn btn-success btn-sm" title="EDIT">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
					<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
					<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                </svg>
            </td>
            <td>
                <a href="destinasi_hapus.php?hapusdestinasi=<?php echo $row["kode_destinasi"]?>" class="btn btn-danger btn-sm" title="HAPUS">	
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