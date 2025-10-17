<?php
if(!defined('aktif')) {
    die('anda tidak bisa akses langsung file ini');
} else {

  /**Memanggil koneksi ke MySQL **/
  include("../includes/config.php");
  $sql = "SELECT testimoni.*, kabupaten.nama_kabupaten FROM testimoni 
            INNER JOIN kabupaten ON testimoni.kode_kabupaten = kabupaten.kode_kabupaten";
  $result = $conn->query($sql);
?>
<section id="testimonial">

        <div class="container">
          <div class="row">
            <div class="col-lg-5">
              <div class="mb-8 text-start">
                <h5 class="text-secondary">Testimonials </h5>
                <h3 class="fs-xl-10 fs-lg-8 fs-7 fw-bold font-cursive text-capitalize">What people say about Us.</h3>
              </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-6">
              <div class="pe-7 ps-5 ps-lg-0">
                <div class="carousel slide carousel-fade position-static" id="testimonialIndicator" data-bs-ride="carousel">
                  <div class="carousel-indicators">
                  <?php
                        $i = 0;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<button type="button" data-bs-target="#testimonialIndicator" data-bs-slide-to="' . $i . '" aria-label="Testimonial ' . $i . '" ' . ($i === 0 ? 'class="active" aria-current="true"' : '') . '></button>';
                                $i++;
                            }
                        }
                        ?>
                    </div>
                    <div class="carousel-inner">
                        <?php
                        $i = 0;
                        $result->data_seek(0); // Reset pointer
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="carousel-item position-relative ' . ($i === 0 ? 'active' : '') . '">';
                            echo '    <div class="card shadow" style="border-radius:10px;">';
                            echo '        <div class="d-flex align-items-center">';
                            echo '            <div class="position-relative">';
                            echo '                <img class="rounded-circle fit-cover" src="../images/' . ($row['foto_testimoni']) . '" height="65" width="65" alt="' . ($row['nama_testimoni']) . '">';
                            echo '            </div>';
                            echo '            <div class="ms-3">';
                            echo '                <h6 class="mb-0">' . ($row['judul_testimoni']) . '</h6>';
                            echo '            </div>';
                            echo '        </div>';
                            echo '        <div class="card-body p-4">';
                            echo '            <p class="fw-medium mb-4">&quot;' . ($row['isi_testimoni']) . '&quot;</p>';
                            echo '            <h5 class="text-secondary">' . ($row['nama_testimoni']) . '</h5>';
                            echo '            <p class="fw-medium fs--1 mb-0">' . ($row['nama_kabupaten']) . '</p>';
                            echo '        </div>';
                            echo '    </div>';
                            echo '</div>';
                            $i++;
                        }
                        ?>
                  </div>
                  <div class="carousel-navigation d-flex flex-column flex-between-center position-absolute end-0 top-lg-50 bottom-0 translate-middle-y z-index-1 me-3 me-lg-0" style="height:60px;width:20px;">
                    <button class="carousel-control-prev position-static" type="button" data-bs-target="#testimonialIndicator" data-bs-slide="prev"><img src="assets/img/icons/up.svg" width="16" alt="icon" /></button>
                    <button class="carousel-control-next position-static" type="button" data-bs-target="#testimonialIndicator" data-bs-slide="next"><img src="assets/img/icons/down.svg" width="16" alt="icon" /></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- end of .container-->

      </section>
<?php } ?>