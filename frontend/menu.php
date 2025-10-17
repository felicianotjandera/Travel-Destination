<?php
if(!defined('aktif')) {
    die('anda tidak bisa akses langsung file ini');
} else {

    /**Memanggil koneksi ke MySQL **/
    include("../includes/config.php");
    $query = mysqli_query($conn, "SELECT * FROM kategori");
    $query1 = mysqli_query($conn, "SELECT * FROM kabupaten");
    $query2 = mysqli_query($conn, "SELECT * FROM destinasiwisata");
    $query3 = mysqli_query($conn, "SELECT * FROM kecamatan");
    $query4 = mysqli_query($conn, "SELECT * FROM testimoni");
?>
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-5 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="index.html"><img src="assets/img/logo.svg" height="34" alt="logo" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base align-items-lg-center align-items-start">

            <li class="nav-item dropdown px-3 px-xl-4">
                <a class="d-inline-block ps-0 py-2 pe-3 text-decoration-none dropdown-toggle fw-medium" href="#" id="navbarDropdown"
                role="button" data-bs-toggle="dropdown" aria-expanded="false">Kategori</a>
                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg" style="border-radius: 0.3rem;" aria-labelledby="navbarDropdown">
                  <?php if(mysqli_num_rows($query) > 0) { ?>
                  <?php while($row=mysqli_fetch_array($query)) { ?>
                  <li><a class="dropdown-item" href="kategori.php?kodekategori=<?php echo $row["kategori_ID"]?>">
                    <?php echo $row["kategori_NAMA"] ?></a></li>
                    <?php } ?>
                    <?php } ?>
                </ul>
            </li>

            <li class="nav-item dropdown px-3 px-xl-4">
                <a class="d-inline-block ps-0 py-2 pe-3 text-decoration-none dropdown-toggle fw-medium" href="#" id="navbarDropdown"
                role="button" data-bs-toggle="dropdown" aria-expanded="false">Destination</a>
                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg" style="border-radius: 0.3rem;" aria-labelledby="navbarDropdown">
                  <?php if(mysqli_num_rows($query1) > 0) { ?>
                  <?php while($row=mysqli_fetch_array($query1)) { ?>
                    <li><a class="dropdown-item" href="kabupaten.php?kodekabupaten=<?php echo $row["kode_kabupaten"]?>">
                    <?php echo $row["kode_kabupaten"] ?>
                    <?php echo $row["nama_kabupaten"] ?>
                    <?php echo $row["alamat_kabupaten"] ?></a></li>
                    <?php } ?>
                    <?php } ?>
                </ul>
            </li>

            <li class="nav-item dropdown px-3 px-xl-4">
                <a class="d-inline-block ps-0 py-2 pe-3 text-decoration-none dropdown-toggle fw-medium" href="#" id="navbarDropdown"
                role="button" data-bs-toggle="dropdown" aria-expanded="false">Booking</a>
                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg" style="border-radius: 0.3rem;" aria-labelledby="navbarDropdown">
                  <?php if(mysqli_num_rows($query3) > 0) { ?>
                  <?php while($row=mysqli_fetch_array($query3)) { ?>
                  <li><a class="dropdown-item" href="kabupaten.php?kodekecamatan=<?php echo $row["kode_kecamatan"]?>">
                    <?php echo $row["nama_kecamatan"] ?></a></li>
                    <?php } ?>
                    <?php } ?>
                </ul>
            </li>

            <li class="nav-item dropdown px-3 px-xl-4">
                <a class="d-inline-block ps-0 py-2 pe-3 text-decoration-none dropdown-toggle fw-medium" href="#" id="navbarDropdown"
                role="button" data-bs-toggle="dropdown" aria-expanded="false">Testimonial</a>
                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg" style="border-radius: 0.3rem;" aria-labelledby="navbarDropdown">
                  <?php if(mysqli_num_rows($query4) > 0) { ?>
                  <?php while($row=mysqli_fetch_array($query4)) { ?>
                  <li><a class="dropdown-item" href="kabupaten.php?kodetestimoni=<?php echo $row["id_testimoni"]?>">
                    <?php echo $row["judul_testimoni"] ?></a></li>
                    <?php } ?>
                    <?php } ?>
                </ul>
            </li>

            <li class="nav-item dropdown px-3 px-xl-4">
                <a class="d-inline-block ps-0 py-2 pe-3 text-decoration-none dropdown-toggle fw-medium" href="#" id="navbarDropdown"
                role="button" data-bs-toggle="dropdown" aria-expanded="false">Destinasi</a>
                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg" style="border-radius: 0.3rem;" aria-labelledby="navbarDropdown">
                  <?php if(mysqli_num_rows($query2) > 0) { ?>
                  <?php while($row=mysqli_fetch_array($query2)) { ?>
                  <li><a class="dropdown-item" href="kabupaten.php?kodedestinasi=<?php echo $row["kode_destinasi"]?>">
                    <?php echo $row["nama_destinasi"] ?></a></li>
                    <?php } ?>
                    <?php } ?>
                </ul>
            </li>

              <li class="nav-item px-3 px-xl-4"><a class="btn btn-outline-dark order-1 order-lg-0 fw-medium" href="#!">Sign Up</a></li>
              <li class="nav-item dropdown px-3 px-lg-0"> <a class="d-inline-block ps-0 py-2 pe-3 text-decoration-none dropdown-toggle fw-medium" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">EN</a>
                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg" style="border-radius:0.3rem;" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#!">EN</a></li>
                  <li><a class="dropdown-item" href="#!">BN</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
<?php } ?>