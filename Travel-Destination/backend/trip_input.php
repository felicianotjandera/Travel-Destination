<!DOCTYPE html>
<html>

<?php
/** Memanggil koneksi ke MySQL **/
include("includes/config.php");

/** Mengecek apakah tombol simpan sudah di pilih/klik atau belum **/
     if(isset($_POST['Simpan']))
 	 {
		$id_trip = $_POST['inputID'];
		$judul = $_POST['inputJUDUL'];
		$subjudul = $_POST['inputSUB'];
		$nama1 = $_POST['inputKET1'];
		$isi1 = $_POST['inputISI1'];
		$nama2 = $_POST['inputKET2'];
		$isi2 = $_POST['inputISI2'];
		$nama3 = $_POST['inputKET3'];
		$isi3 = $_POST['inputISI3'];
		$tripto = $_POST["inputTRIP"];
		$nama = $_POST["inputNAMA"];
		$people = $_POST["inputPEOPLE"];

		$namafoto = $_FILES['foto']['name']; 
		$file_tmp = $_FILES["foto"]["tmp_name"];
		$file_size = $_FILES["foto"]["size"];
		
		if ($file_size > 2097152) {
			echo "<script>alert('Error: Ukuran file terlalu besar! Maksimal 2MB.'); window.location='berita_input.php';</script>";
		} else {
			move_uploaded_file($file_tmp, 'images/'.$namafoto);
			mysqli_query($conn, "INSERT INTO trip VALUES('$id_trip', '$judul','$subjudul', '$nama1', '$isi1', '$nama2', '$isi2', '$nama3', '$isi3', '$tripto', '$nama', '$people','$namafoto')");
			header("location:trip_input.php");
		}
	}		

	// $query = mysqli_query($conn, "select * from berita,kategori
	// 	where berita.kategori_ID = kategori.kategori_ID");
	// $datakategori = mysqli_query($conn, "select * from kategori");

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
<style>table {position: relative};</style>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Input Wisata</title>

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">	

</head>
<body>

<!-- membuat form input data kategori -->
<div class="row">
<div class="col-1"></div>
<div class="col-10">

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-5">Input Wisata</h1>
    <p class="lead">Wisata di Jawa</p>
  </div>
</div>

	
<form method="POST" enctype="multipart/form-data">
  <div class="row mb-3 mt-5">
    <label for="wisataID" class="col-sm-2 col-form-label">Kode Wisata</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="wisataID" name="inputID" placeholder="Kode Wisata"> 
    </div>
  </div>
  <div class="row mb-3">
    <label for="wisataJUDUL" class="col-sm-2 col-form-label">Judul Wisata</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="wisataJUDUL" name="inputJUDUL" placeholder="Judul Wisata">
    </div>
  </div>
  <div class="row mb-3">
    <label for="wisataSUB" class="col-sm-2 col-form-label">Subjudul Wisata</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="wisataSUB" name="inputSUB" placeholder="Subjudul Wisata">
    </div>
  </div>
  <div class="row mb-3">
    <label for="wisataKET1" class="col-sm-2 col-form-label">Nama Wisata 1</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="wisataKET1" name="inputKET1" placeholder="Nama Wisata 1">
    </div>
  </div>
  <div class="row mb-3">
    <label for="wisataISI1" class="col-sm-2 col-form-label">Isi Wisata 1</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="wisataISI1" name="inputISI1" placeholder="Isi Wisata 1">
    </div>
  </div>
  <div class="row mb-3">
    <label for="wisataKET2" class="col-sm-2 col-form-label">Nama Wisata 2</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="wisataKET2" name="inputKET2" placeholder="Nama Wisata 2">
    </div>
  </div>
  <div class="row mb-3">
    <label for="wisataISI2" class="col-sm-2 col-form-label">Isi Wisata 2</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="wisataISI2" name="inputISI2" placeholder="Isi Wisata 2">
    </div>
  </div>
  <div class="row mb-3">
    <label for="wisataKET3" class="col-sm-2 col-form-label">Nama Wisata 3</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="wisataKET3" name="inputKET3" placeholder="Nama Wisata 3">
    </div>
  </div>
  <div class="row mb-3">
    <label for="wisataISI1" class="col-sm-2 col-form-label">Isi Wisata 3</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="wisataISI3" name="inputISI3" placeholder="Isi Wisata 3">
    </div>
  </div>
  <div class="row mb-3">
    <label for="namaWisata" class="col-sm-2 col-form-label">Nama Wisata</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="namaWisata" name="inputTRIP" placeholder="Nama Wisata">
    </div>
  </div>
  <div class="row mb-3">
    <label for="penyelenggaraWisata" class="col-sm-2 col-form-label">Penyelenggara Wisata</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="penyelenggaraWisata" name="inputNAMA" placeholder="Penyelenggara Wisata">
    </div>
  </div>
  <div class="row mb-3">
    <label for="pesertaWisata" class="col-sm-2 col-form-label">Jumlah Peserta Wisata</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="pesertaWisata" name="inputPEOPLE" placeholder="Jumlah Peserta Wisata">
    </div>
  </div>

<!-- input file -->
  <div class="form-group row mb-3">
    <label for="file" class="col-sm-2 col-form-label">Foto Wisata</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" id="file" name="foto">
      <p class="help-block">Unggah Foto Wisata</p>
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
    <h1 class="display-5">Output Wisata</h1>
  </div>
</div>

<!-- form pencarian data -->
 <form method="POST">
	<div class="form-group row mt-5">
		<label for="search" class="col-sm-2">Cari Judul Wisata</label>
		<div class="col-sm-6">
			<input type="text" name="search" class="form-control" id="search"
			value="<?php if(isset($_POST["search"]))
			{echo $_POST["search"];}?>" placeholder="Cari Judul Wisata">
		</div>
		<input type="submit" name="kirim" value="Cari" class="col-sm-1 btn btn-primary">
	</div>
 </form>
 <!-- end pencarian data -->

<table class="table table-striped table-success table-hover mt-5">
<!-- membuat judul -->
	<tr class="info">
		<th>Kode Wisata</th>
		<th>Judul Wisata</th>
		<th>Subjudul Wisata</th>
		<th>Nama Wisata 1</th>
		<th>Isi Wisata 1</th>
		<th>Nama Wisata 2</th>
		<th>Isi Wisata 2</th>
		<th>Nama Wisata 3</th>
		<th>Isi Wisata 3</th>
		<th>Trip To</th>
		<th>Penyelenggara</th>
		<th>Jumlah Peserta</th>
		<th>Foto Wisata</th>
		<th colspan="2">Aksi</th>
	</tr>

<!-- menampilkan data dari tabel kategori -->
	<?php { 	
		if(isset($_POST["kirim"]))
		{
			$search = $_POST["search"];
			$query = mysqli_query($conn, "SELECT * FROM trip WHERE judul like '%" .$search. "%'");
		}else
		{
			$query = mysqli_query($conn,"SELECT * FROM trip");
	}
 ?>
	<?php while ($row = mysqli_fetch_array($query)) 	
		{ ?>
			<tr class="danger">
				<td><?php echo $row['id_trip']; ?> </td>
				<td><?php echo $row['judul']; ?> </td>
				<td><?php echo $row['subjudul']; ?> </td>
				<td><?php echo $row['nama1']; ?> </td>
				<td><?php echo $row['isi1']; ?> </td>
				<td><?php echo $row['nama2']; ?> </td>
				<td><?php echo $row['isi2']; ?> </td>
				<td><?php echo $row['nama3']; ?> </td>
				<td><?php echo $row['isi3']; ?> </td>
				<td><?php echo $row['tripto']; ?> </td>
				<td><?php echo $row['nama']; ?> </td>
				<td><?php echo $row['people']; ?> </td>
				<td>
						<?php if($row['foto']==""){ echo "<img src='../images/noimage.png' width='88'/>";}else{?>
						<img src="../images/<?php echo $row['foto'] ?>" width="88" class="img-responsive" />
						<?php }?>
				</td>
				<td>
				<a href="trip_edit.php?ubahtrip=<?php echo $row["id_trip"] ?>" class="btn btn-success btn-sm" title="EDIT">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
					<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
					<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
				</svg>
			</td>
			<td>
				<a href="trip_hapus.php?hapustrip=<?php echo $row["id_trip"]?>" class="btn btn-danger btn-sm" title="HAPUS">	
					<i class="bi bi-trash"></i>
				</td>
			</tr>
			<?php } ?>
			<?php }?>
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