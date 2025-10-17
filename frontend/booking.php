<?php
if(!defined('aktif')) {
    die('anda tidak bisa akses langsung file ini');
} else {

   /**Memanggil koneksi ke MySQL **/
   include("../includes/config.php");
   $query = mysqli_query($conn, "SELECT * FROM trip");
   if ($query && $row = mysqli_fetch_assoc($query)) {
?>
<section id="booking">

        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6">
              <div class="mb-4 text-start">
                <h5 class="text-secondary"><?php echo $row['judul']?> </h5>
                <h3 class="fs-xl-10 fs-lg-8 fs-7 fw-bold font-cursive text-capitalize"><?php echo $row['subjudul']?></h3>
              </div>
              <div class="d-flex align-items-start mb-5">
                <div class="bg-primary me-sm-4 me-3 p-3" style="border-radius: 13px"> <img src="assets/img/steps/selection.svg" width="22" alt="steps" /></div>
                <div class="flex-1">
                  <h5 class="text-secondary fw-bold fs-0"><?php echo $row['nama1']?></h5>
                  <p style="text-align: justify;"><?php echo $row['isi1']?></p>
                </div>
              </div>
              <div class="d-flex align-items-start mb-5">
                <div class="bg-danger me-sm-4 me-3 p-3" style="border-radius: 13px"> <img src="assets/img/steps/water-sport.svg" width="22" alt="steps" /></div>
                <div class="flex-1">
                  <h5 class="text-secondary fw-bold fs-0"><?php echo $row['nama2']?></h5>
                  <p style="text-align: justify;"><?php echo $row['isi2']?></p>
                </div>
              </div>
              <div class="d-flex align-items-start mb-5">
                <div class="bg-info me-sm-4 me-3 p-3" style="border-radius: 13px"> <img src="assets/img/steps/taxi.svg" width="22" alt="steps" /></div>
                <div class="flex-1">
                  <h5 class="text-secondary fw-bold fs-0"><?php echo $row['nama3']?></h5>
                  <p style="text-align: justify;"><?php echo $row['isi3']?></p>
                </div>
              </div>
            </div>
            <div class="col-lg-6 d-flex justify-content-center align-items-start">
              <div class="card position-relative shadow" style="max-width: 370px;">
                <div class="position-absolute z-index--1 me-10 me-xxl-0" style="right:-160px;top:-210px;"> <img src="assets/img/steps/bg.png" style="max-width:550px;" alt="shape" /></div>
                <div class="card-body p-3"> <img class="mb-4 mt-2 rounded-2 w-100" src="../images/<?php echo $row['foto']?>" alt="booking" />
                  <div>
                    <h5 class="fw-medium">Trip To <?php echo $row['tripto']?></h5>
                    <p class="fs--1 mb-3 fw-medium">by <?php echo $row['nama']?></p>
                    <div class="icon-group mb-4"> <span class="btn icon-item"> <img src="assets/img/steps/leaf.svg" alt=""/></span><span class="btn icon-item"> <img src="assets/img/steps/map.svg" alt=""/></span><span class="btn icon-item"> <img src="assets/img/steps/send.svg" alt=""/></span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <div class="d-flex align-items-center mt-n1"><img class="me-3" src="assets/img/steps/building.svg" width="18" alt="building" /><span class="fs--1 fw-medium"><?php echo $row['people']?> people going</span></div>
                      <div class="show-onhover position-relative">
                        <div class="card hideEl shadow position-absolute end-0 start-xl-50 bottom-100 translate-xl-middle-x ms-3" style="width: 260px;border-radius:18px;">
                          <div class="card-body py-3">
                            <div class="d-flex">
                              <div style="margin-right: 10px"> <img class="rounded-circle" src="../images/<?php echo $row['foto']?>" width="50" alt="favorite" /></div>
                              <div>
                                <p class="fs--1 mb-1 fw-medium">Ongoing </p>
                                <h5 class="fw-medium mb-3"><?php echo $row['tripto']?></h5>
                                <h6 class="fs--1 fw-medium mb-2"><span>40%</span> completed</h6>
                                <div class="progress" style="height: 6px;">
                                  <div class="progress-bar" role="progressbar" style="width: 40%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <button class="btn"> <img src="assets/img/steps/heart.svg" width="20" alt="step" /></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- end of .container-->

      </section>
<?php }} ?>