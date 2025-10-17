<?php
if(!defined('aktif')) {
    die('anda tidak bisa akses langsung file ini');
} else {

  include("../includes/config.php");
  $query_random_category = "SELECT kategori_NAMA, kategori_ID FROM kategori ORDER BY RAND() LIMIT 1";
  $result_random_category = mysqli_query($conn, $query_random_category);
  if ($result_random_category && mysqli_num_rows($result_random_category) > 0) {
    $row_random_category = mysqli_fetch_assoc($result_random_category);
    $category_name = $row_random_category['kategori_NAMA'];
    $kategori_ID = $row_random_category['kategori_ID'];

    // Query untuk mendapatkan destinasi wisata berdasarkan kategori_ID
    $query_destinasi = "SELECT * FROM destinasiwisata WHERE kategori_ID = '$kategori_ID'";
    $result_destinasi = mysqli_query($conn, $query_destinasi);
    if (!$result_destinasi) {
      die("Error retrieving data: " . mysqli_error($conn));
    }
  } else {
    die("No categories found.");
  }}
?>
<section class="pt-5 pt-md-9" id="service">

        <div class="container">
          <div class="position-absolute z-index--1 end-0 d-none d-lg-block"><img src="assets/img/category/shape.svg" style="max-width: 200px" alt="service" /></div>
          <div class="mb-7 text-center">
            <h5 class="text-secondary">CATEGORY </h5>
            <h3 class="fs-xl-10 fs-lg-8 fs-7 fw-bold font-cursive text-capitalize"><?php echo $category_name; ?></h3>
          </div>
          <div class="row">
            <?php while ($row_destinasi = mysqli_fetch_assoc($result_destinasi)) { ?>
            <div class="col-lg-3 col-sm-6 mb-6">
              <div class="card service-card shadow-hover rounded-3 text-center align-items-center">
                <div class="card-body p-xxl-5 p-4"> <img src="../images/<?php echo $row_destinasi['foto_destinasi']; ?>" style="width: 75px; height: 75px;"/>
                  <h4 class="mb-3"><?php echo $row_destinasi['nama_destinasi']; ?></h4>
                  <p class="mb-0 fw-medium"style="text-align: justify;"><?php echo $row_destinasi['keterangan_destinasi']; ?></p>
                </div>
              </div>
            </div>
          </div>
        </div><!-- end of .container-->

      </section>
<?php } ?>