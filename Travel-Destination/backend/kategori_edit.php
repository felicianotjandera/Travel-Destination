<?php
/** Memanggil koneksi ke MySQL **/
include("includes/config.php");

$kategori_ID = $_GET["ubahkategori"];
$edit = mysqli_query($conn, "SELECT * from kategori WHERE kategori_ID = '$kategori_ID'");
$row_edit = mysqli_fetch_array($edit);

/** Mengecek apakah tombol simpan sudah dipilih/klik atau belum **/
if (isset($_POST['ubah'])) {
    $kategori_ID = $_POST['inputID'];
    $kategori_NAMA = $_POST['inputNAMA'];
    $kategori_KET = $_POST['inputKETERANGAN'];

    // $query = "INSERT INTO kategori (kategori_ID, kategori_NAMA, kategori_KET) 
    //           VALUES ('$kategori_ID', '$kategori_NAMA', '$kategori_KET')";
    // mysqli_query($conn, $query);
    mysqli_query($conn, "UPDATE kategori SET kategori_NAMA = '$kategori_NAMA', kategori_KET ='$kategori_KET' WHERE kategori_ID = '$kategori_ID'");
    header("Location: kategori_input.php");
    exit;
}

//$query = mysqli_query($conn, "SELECT * FROM kategori");
?>

<!DOCTYPE html>
<html lang="en">
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Kategori Wisata</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
  <!-- membuat form input  -->
<form method="POST" action="kategori_edit.php?ubahkategori=<?php echo $kategori_ID; ?>">
  <div class="row mb-3 mt-5">
    <label for="kategoriID" class="col-sm-2 col-form-label">Kode Kategori Wisata</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="kategoriID" name="inputID" value="<?php echo $row_edit["kategori_ID"]?>" readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label for="kategoriNAMA" class="col-sm-2 col-form-label">Nama Kategori Wisata</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="kategoriNAMA" name="inputNAMA" value="<?php echo $row_edit["kategori_NAMA"]?>" >
    </div>
  </div>
  <div class="row mb-3">
    <label for="kategoriKET" class="col-sm-2 col-form-label">Keterangan Kategori Wisata</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="kategoriKET" name="inputKETERANGAN" value="<?php echo $row_edit["kategori_KET"]?>" >
    </div>
  </div>
 
  <div class="form-group row">  
    <div class="col-sm-2"></div>
    <div class="col-sm-10">
        <button type="submit" class="btn btn-success" value="Update" name="ubah">Update</button>
        <input type="reset" class="btn btn-danger" value="Batal">
    </div>
  </div>    
</form>

<form method="post">
	<div class="form-group row mt-5">
			<label for="search" class="col-sm-2">Cari Nama Kategori</label>
		<div class="col-sm-6">
			<input type="text" name="search" class="form-control" id="search" value="<?php
			 if(isset($_POST["search"])){
				echo $_POST["search"];}?>" placeholder="Cari Nama Kategori">
		</div>
		<input type="submit" name="kirim" value="Cari" class="col-sm-1 btn btn-primary">
	</div>
</form>

<table class="table table-striped table-success table-hover mt-5">
  <thead>
    <tr class="info">
      <th>Kode</th>
      <th>Nama Kategori</th>
      <th>Keterangan Kategori</th>
      <th colspan="2">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <!-- menampilkan data dari tabel  -->
    <?php { 
		if(isset($_POST["kirim"]))
		{
			$search = $_POST["search"];
            $query = mysqli_query($conn, "select * from kategori where kategori_NAMA like '%" .$search. "%'");
		}else{
			$query = mysqli_query($conn, "select * from kategori");
		}
    }
	?>
    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
    <tr class="danger">
      <td><?php echo $row['kategori_ID']; ?></td>
      <td><?php echo $row['kategori_NAMA']; ?></td>
      <td><?php echo $row['kategori_KET']; ?></td>
      <td>
      <a href="kategori_edit.php?ubahkategori=<?php echo $row["kategori_ID"]?>" class="btn btn-success btn-sm" title="EDIT">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  				<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  				<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
				</svg>
			</td>
			<td>
            <a href="kategori_hapus.php?hapuskategori=<?php echo $row["kategori_ID"]?>" class="btn btn-danger btn-sm" title="HAPUS">
				<i class="bi bi-trash"></i>
			</td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<script src="js/bootstrap.bundle.min.js"></script>
</main>
                <?php include "include/footer.php"; ?>
            </div>
        </div>
        <?php include "include/jsscript.php" ?>
</body>
</html>