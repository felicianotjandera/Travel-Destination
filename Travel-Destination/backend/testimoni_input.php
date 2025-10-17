<!DOCTYPE html>
<html>

<?php
/** Memanggil koneksi ke MySQL **/
include("includes/config.php");

/** Mengecek apakah tombol simpan sudah di pilih/klik atau belum **/
     if(isset($_POST['Simpan']))
 	 {
		$id_testimoni = $_POST['inputID'];
		$judul_testimoni = $_POST['inputJUDUL'];
		$isi_testimoni = $_POST['inputISI'];
		$nama_testimoni = $_POST['inputNAMA'];
		$kode_kabupaten = $_POST['inputKAB'];

		$namafoto = $_FILES['foto_testimoni']['name']; 
		$file_tmp = $_FILES["foto_testimoni"]["tmp_name"];
		$file_size = $_FILES["foto_testimoni"]["size"];
		
		if ($file_size > 2097152) {
			echo "<script>alert('Error: Ukuran file terlalu besar! Maksimal 2MB.'); window.location='berita_input.php';</script>";
		} else {
			move_uploaded_file($file_tmp, '../images/'.$namafoto);
			mysqli_query($conn, "INSERT INTO testimoni VALUES('$id_testimoni', '$judul_testimoni', '$isi_testimoni', '$nama_testimoni', '$kode_kabupaten','$namafoto')");
			header("location:testimoni_input.php");
		}
	}		

	// $query = mysqli_query($conn, "select * from berita,kategori
	// 	where berita.kategori_ID = kategori.kategori_ID");
	$datakabupaten = mysqli_query($conn, "select * from kabupaten");

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
	<title>Input Testimoni</title>

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
    <h1 class="display-5">Input Testimoni Wisata</h1>
    <p class="lead">Testimoni Wisata di Jawa</p>
  </div>
</div>

	
<form method="POST" enctype="multipart/form-data">
  <div class="row mb-3 mt-5">
    <label for="testimoniID" class="col-sm-2 col-form-label">Kode Testimoni</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="testimoniID" name="inputID" placeholder="Kode Testimoni"> 
    </div>
  </div>
  <div class="row mb-3">
    <label for="testimoniJUDUL" class="col-sm-2 col-form-label">Judul Testimoni</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="testimoniJUDUL" name="inputJUDUL" placeholder="Judul Testimoni">
    </div>
  </div>
  <div class="row mb-3">
    <label for="testimoniISI" class="col-sm-2 col-form-label">Isi Testimoni</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="testimoniISI" name="inputISI" placeholder="Isi Testimoni">
    </div>
  </div>
  <div class="row mb-3">
    <label for="testimoniNAMA" class="col-sm-2 col-form-label">Nama Testimoni</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="testimoniNAMA" name="inputNAMA" placeholder="Nama Testimoni">
    </div>
  </div>

  <!-- penggunaan select2 -->
  <div class="row mb-3">
        <label for="inputKAB" class="col-sm-2 col-form-label">Kode Kabupaten</label>
        <div class="col-sm-10">
            <select class="form-control" id="kode_kabupaten" name="inputKAB">
                <option>Kode Kabupaten</option>
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
    <label for="file" class="col-sm-2 col-form-label">Foto Testimoni</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" id="file" name="foto_testimoni">
      <p class="help-block">Unggah Foto Testimoni</p>
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
    <h1 class="display-5">Output Testimoni</h1>
  </div>
</div>

<!-- form pencarian data -->
 <form method="POST">
	<div class="form-group row mt-5">
		<label for="search" class="col-sm-2">Cari Judul Testimoni</label>
		<div class="col-sm-6">
			<input type="text" name="search" class="form-control" id="search"
			value="<?php if(isset($_POST["search"]))
			{echo $_POST["search"];}?>" placeholder="Cari Judul Testimoni">
		</div>
		<input type="submit" name="kirim" value="Cari" class="col-sm-1 btn btn-primary">
	</div>
 </form>
 <!-- end pencarian data -->

<table class="table table-striped table-success table-hover mt-5">
<!-- membuat judul -->
	<tr class="info">
				<th>Kode</th>
				<th>Judul Testimoni</th>
				<th>Isi Testimoni</th>
				<th>Nama Testimoni</th>
				<th>Kode Kabupaten</th>
				<th>Nama Kabupaten</th>
				<th>Foto Testimoni</th>
				<th colspan="2">Aksi</th>
	</tr>

<!-- menampilkan data dari tabel kategori -->
	<?php { 	
		if(isset($_POST["kirim"]))
		{
			$search = $_POST["search"];
			$query = mysqli_query($conn, "SELECT testimoni.*, kabupaten.nama_kabupaten FROM testimoni JOIN kabupaten ON testimoni.kode_kabupaten = kabupaten.kode_kabupaten WHERE judul_testimoni LIKE '%" . $search . "%'");
		}else
		{
			$query = mysqli_query($conn,"SELECT * FROM testimoni, kabupaten where kabupaten.kode_kabupaten = testimoni.kode_kabupaten");
	}
 ?>
	<?php while ($row = mysqli_fetch_array($query)) 	
		{ ?>
			<tr class="danger">
				<td><?php echo $row['id_testimoni']; ?> </td>
				<td><?php echo $row['judul_testimoni']; ?> </td>
				<td><?php echo $row['isi_testimoni']; ?> </td>
				<td><?php echo $row['nama_testimoni']; ?> </td>
				<td><?php echo $row['kode_kabupaten']; ?> </td>
				<td><?php echo $row['nama_kabupaten']; ?> </td>
				<td>
						<?php if($row['foto_testimoni']==""){ echo "<img src='../images/noimage.png' width='88'/>";}else{?>
						<img src="../images/<?php echo $row['foto_testimoni'] ?>" width="88" class="img-responsive" />
						<?php }?>
				</td>
				<td>
				<a href="testimoni_edit.php?ubahtestimoni=<?php echo $row["id_testimoni"]?>" class="btn btn-success btn-sm" title="EDIT">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
					<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
					<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
				</svg>
			</td>
			<td>
				<a href="testimoni_hapus.php?hapustestimoni=<?php echo $row["id_testimoni"]?>" class="btn btn-danger btn-sm" title="HAPUS">	
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