<!DOCTYPE html>
<html>

<?php
/** Memanggil koneksi ke MySQL **/
include("includes/config.php");

/** Mengecek apakah tombol simpan sudah di pilih/klik atau belum **/
     if(isset($_POST['Simpan']))
 	 {
		$id = $_POST['inputID'];
		$judul = $_POST['inputJUDUL'];
		$subjudul = $_POST['inputSUB'];
		$keterangan = $_POST['inputKET'];
		$link = $_POST["inputLINK"];

		$namafoto = $_FILES['foto']['name']; 
		$file_tmp = $_FILES["foto"]["tmp_name"];
		$file_size = $_FILES["foto"]["size"];
		
		if ($file_size > 2097152) {
			echo "<script>alert('Error: Ukuran file terlalu besar! Maksimal 2MB.'); window.location='berita_input.php';</script>";
		} else {
			move_uploaded_file($file_tmp, '../images/'.$namafoto);
			mysqli_query($conn, "INSERT INTO pengalaman VALUES('$id', '$judul','$subjudul', '$keterangan', '$link', '$namafoto')");
			header("location:pengalaman_input.php");
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
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Input Pengalaman Wisata</title>

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
    <h1 class="display-5">Input Pengalaman Wisata</h1>
    <p class="lead">Pengalaman Wisata di Jawa</p>
  </div>
</div>

	
<form method="POST" enctype="multipart/form-data">
  <div class="row mb-3 mt-5">
    <label for="pengalamanID" class="col-sm-2 col-form-label">Kode Pengalaman</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="pengalamanID" name="inputID" placeholder="Kode Pengalaman"> 
    </div>
  </div>
  <div class="row mb-3">
    <label for="pengalamanJUDUL" class="col-sm-2 col-form-label">Judul Pengalaman</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="pengalamanJUDUL" name="inputJUDUL" placeholder="Judul Pengalaman">
    </div>
  </div>
  <div class="row mb-3">
    <label for="pengalamanSUB" class="col-sm-2 col-form-label">Subjudul Pengalaman</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="pengalamanSUB" name="inputSUB" placeholder="Subjudul Pengalaman">
    </div>
  </div>
  <div class="row mb-3">
    <label for="pengalamanKET" class="col-sm-2 col-form-label">Keterangan Pengalaman</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="pengalamanKET" name="inputKET" placeholder="Keterangan Pengalaman">
    </div>
  </div>
  <div class="row mb-3">
    <label for="pengalamanLINK" class="col-sm-2 col-form-label">Link Pengalaman</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="pengalamanLINK" name="inputLINK" placeholder="Link Pengalaman">
    </div>
  </div>

<!-- input file -->
  <div class="form-group row mb-3">
    <label for="file" class="col-sm-2 col-form-label">Foto Pengalaman</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" id="file" name="foto">
      <p class="help-block">Unggah Foto Pengalaman</p>
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
    <h1 class="display-5">Output Pengalaman</h1>
  </div>
</div>

<!-- form pencarian data -->
 <form method="POST">
	<div class="form-group row mt-5">
		<label for="search" class="col-sm-2">Cari Judul Pengalaman</label>
		<div class="col-sm-6">
			<input type="text" name="search" class="form-control" id="search"
			value="<?php if(isset($_POST["search"]))
			{echo $_POST["search"];}?>" placeholder="Cari Judul Pengalaman">
		</div>
		<input type="submit" name="kirim" value="Cari" class="col-sm-1 btn btn-primary">
	</div>
 </form>
 <!-- end pencarian data -->

<table class="table table-striped table-success table-hover mt-5">
<!-- membuat judul -->
	<tr class="info">
		<th>Kode Pengalaman</th>
		<th>Judul Pengalaman</th>
		<th>Subjudul Pengalaman</th>
		<th>Keterangan Pengalamani</th>
		<th>Link Pengalaman</th>
		<th>Foto Testimoni</th>
		<th colspan="2">Aksi</th>
	</tr>

<!-- menampilkan data dari tabel kategori -->
	<?php { 	
		if(isset($_POST["kirim"]))
		{
			$search = $_POST["search"];
			$query = mysqli_query($conn, "SELECT * FROM pengalaman WHERE judul like '%" .$search. "%'");
		}else
		{
			$query = mysqli_query($conn,"SELECT * FROM pengalaman");
	}
 ?>
	<?php while ($row = mysqli_fetch_array($query)) 	
		{ ?>
			<tr class="danger">
				<td><?php echo $row['id']; ?> </td>
				<td><?php echo $row['judul']; ?> </td>
				<td><?php echo $row['sub_judul']; ?> </td>
				<td><?php echo $row['keterangan']; ?> </td>
				<td><?php echo $row['link']; ?> </td>
				<td>
						<?php if($row['foto']==""){ echo "<img src='../images/noimage.png' width='88'/>";}else{?>
						<img src="../images/<?php echo $row['foto'] ?>" width="88" class="img-responsive" />
						<?php }?>
				</td>
				<td>
				<a href="pengalaman_edit.php?ubahpengalaman=<?php echo $row["id"]?>" class="btn btn-success btn-sm" title="EDIT">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
					<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
					<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
				</svg>
			</td>
			<td>
				<a href="pengalaman_hapus.php?hapuspengalaman=<?php echo $row["id"]?>" class="btn btn-danger btn-sm" title="HAPUS">	
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