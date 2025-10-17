<?php
include("includes/config.php");

$query =mysqli_query($conn, "select * from kategori");
$query2 =mysqli_query($conn, "select * from feliciano");
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Jadoo | Travel Agency Landing Page UI</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="assets/css/theme.css" rel="stylesheet" />

  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <?php define('aktif', TRUE);?>
      <?php include("menu.php");?>
      <?php include("travel.php");?> 

      <!-- ============================================-->
      <!-- <section> begin ============================-->

      <?php include("category.php");?>

      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->

      <?php include("topdestination.php");?> 

      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <?php include("booking.php");?> 
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <?php include("testimoni.php");?> 
      <!-- <section> close ============================-->
      <!-- ============================================-->
      <div class="no3" style="margin-top: 70px;">
      <p style="text-align: center; font-size: 35px; color: black;">PLAN YOUR TRIP NOW</p>
      <div class="container text-center">
          <div class="row">
              <div class="col">
                  <div class="card" style="width: 100%; background-color: lightcyan;">
                      <img src="../images/sam poo kong.jpg" class="card-img-top" style="z-index: 1;" alt="Error">
                      <div class="card-body">
                          <h5 class="card-title">Kota Semarang</h5>
                          <p style="font-size: 30px; color: black;">Sam Poo Kong</p> 
                          <div class="container text-center">
                              <div class="row" style=" width: 110%; font-size: 15px; justify-content: center; display: flex;">
                                  <div class="col" style=" padding-top: 8px;"><img src="images/person-circle.svg" style="z-index: 1; margin-right: 5px; padding-bottom: 5px;">John Cena</div>
                                  <div class="col" style=" padding-top: 8px;"><img src="images/clock-fill.svg" style="z-index: 1; margin-right: 5px; padding-bottom: 5px;">1.49 </div>
                                  <div class="col" style="padding-top: 8px;"><img src="images/person-fill.svg" style="z-index: 1; margin-right: 5px; padding-bottom: 5px;">69 </div>
                              </div>
                          <p class="card-text" style="font-size: 20px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla fuga ullam odio ipsa, sapiente minima nobis quae voluptates veniam rem commodi hic optio. Magni excepturi non officiis reiciendis, atque voluptatibus.</p>
                          
                          </div>
                      </div>
                  </div>
              </div>        
              <div class="col">
                  <div class="card" style="width: 100%; background-color: lightcyan;">
                      <img src="../images/kebun raya.jpeg" class="card-img-top" style="z-index: 1;" alt="Error">
                      <div class="card-body">
                          <h5 class="card-title">Kabupaten Bogor</h5>
                          <p style="font-size: 30px; color: black;">Kebun Raya Bogor</p> 
                          <div class="container text-center">
                              <div class="row" style=" width: 110%; font-size: 15px; justify-content: center; display: flex;">
                                  <div class="col" style=" padding-top: 8px;"><img src="images/person-circle.svg" style="z-index: 1; margin-right: 5px; padding-bottom: 5px;">John Cena</div>
                                  <div class="col" style=" padding-top: 8px;"><img src="images/clock-fill.svg" style="z-index: 1; margin-right: 5px; padding-bottom: 5px;">1.49 </div>
                                  <div class="col" style="padding-top: 8px;"><img src="images/person-fill.svg" style="z-index: 1; margin-right: 5px; padding-bottom: 5px;">69 </div>
                              </div>
                          <p class="card-text" style="font-size: 20px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla fuga ullam odio ipsa, sapiente minima nobis quae voluptates veniam rem commodi hic optio. Magni excepturi non officiis reiciendis, atque voluptatibus.</p>
                          
                          </div>
                      </div>
                  </div>
              </div>              
              <div class="col">
                  <div class="card" style="width: 100%; background-color: lightcyan;">
                      <img src="../images/parangtritis.jpg" class="card-img-top" style="z-index: 1;" alt="Error">
                      <div class="card-body">
                          <h5 class="card-title" >Kabupaten Bantul</h5>
                          <p style="font-size: 30px; color: black;">Pantai Parangtritis</p> 
                          <div class="container text-center">
                              <div class="row" style=" width: 110%; font-size: 15px; justify-content: center; display: flex;">
                                  <div class="col" style=" padding-top: 8px;"><img src="images/person-circle.svg" style="z-index: 1; margin-right: 5px; padding-bottom: 5px;">John Cena</div>
                                  <div class="col" style=" padding-top: 8px;"><img src="images/clock-fill.svg" style="z-index: 1; margin-right: 5px; padding-bottom: 5px;">1.49 </div>
                                  <div class="col" style="padding-top: 8px;"><img src="images/person-fill.svg" style="z-index: 1; margin-right: 5px; padding-bottom: 5px;">69 </div>
                              </div>
                          <p class="card-text" style="font-size: 20px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla fuga ullam odio ipsa, sapiente minima nobis quae voluptates veniam rem commodi hic optio. Magni excepturi non officiis reiciendis, atque voluptatibus.</p>
                          
                          </div>
                      </div>
                  </div>
              </div>
  
          </div>
      </div>
  </div><br><br><br>

      <div class="bulet" style="text-align: center; display: block; justify-content: center;">
      <img class="rounded-circle fit-cover" src="../images/me.jpg" height="65" width="65"height="65" width="65" alt="">
      <br><p style="width: 500px; margin-left: 500px; padding-top: 10px;"><?php echo"Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum quidem ipsam laboriosam quos porro quasi nulla quae, minima labore, dolorem cumque ducimus dolores. Magnam vero reiciendis unde, quod voluptatibus iure?"?></p>
      <br><p style="color: black;"><?php echo "Feliciano Tjandera"; ?></p>
      <p style="margin-top: -15px;"><?php echo "825230028"; ?></p>
      </div>

    <footer style="text-align: center; background-color: cadetblue; color: white; font-size: 20px; padding-top: 25px;">
    <div class="container text-center">
        <div class="row" style="font-size: 25px; margin-top: 30px; text-align: left;">
            <div class="col">
                <a style="border-bottom: 1px white solid; display: flex; justify-content: space-between; color:aqua; width: 100%">pesonajawa.com</a>
                <div class="isi1" style="font-size: 15px; padding-left: 0; margin-top: 20px;">
                    <div style="display: flex; align-items: center; margin-bottom: 10px;">
                        <a style="color: white; text-decoration: none;">wisata Jawa Mempesona</a>
                    </div>
                    <div style="display: flex; align-items: center;">
                    <a style="border-bottom: 1px white solid; display: flex; justify-content: space-between; color:aqua; font-size: 25px; width: 100%">Pariwisata Solo</a>
                    </div>
                    <div style="display: flex; align-items: center;">
                    <a style="border-bottom: 1px white solid; display: flex; justify-content: space-between; color:aqua; font-size: 25px; width: 100%">Download SLPP-App</a>
                    </div>
                </div>              
            </div>


            <div class="col">
            <a style="border-bottom: 1px white solid; display: flex; justify-content: space-between; color:aqua; width: 100%">Informasi Kategori</a>
                <div class="isi2" style="font-size: 15px; padding-left: 0; margin-top: 20px;">
                    <div style="display: flex; align-items: center; margin-bottom: 10px;">
                    <?php while($row = mysqli_fetch_array($query)){ ?>
                    <a value="<?php echo $row["kategori_ID"]?>
                    <?php echo $row["kategori_ID"]?>
                  <?php echo $row["kategori_NAMA"]?></a>
            <?php } ?>
                    <?php
                    echo "Budaya"; ?>
                   
                    </div>
                    <div style="display: flex; align-items: center; margin-bottom: 10px;">
                    <?php 
                    echo "Alam"; ?>
                  
                    </div>
                    <div style="display: flex; align-items: center; margin-bottom: 10px;">
                    <?php 
                    echo "Pantai"; ?>
                      
                    </div>
                    <div style="display: flex; align-items: center; margin-bottom: 10px;">
                    <?php 
                    echo "Kuliner"; ?>
                     
                    </div>
                </div>
            </div>
            
            <div class="col">
            <a style="border-bottom: 1px white solid; display: flex; justify-content: space-between; color:aqua; width: 100%">Contact Us</a>
                <div class="isi3" style="font-size: 15px; list-style: none; padding-left: 0; margin-top: 20px;">
                <a style="color: white; text-decoration: none;">admin@pesonajawa.com</a>
            </div>
                
            </div>          
</footer>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="vendors/@popperjs/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="vendors/fontawesome/all.min.js"></script>
    <script src="assets/js/theme.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Volkhov:wght@700&amp;display=swap" rel="stylesheet">
  </body>

</html>
