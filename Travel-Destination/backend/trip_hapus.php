<?php
    include("includes/config.php");
    if(isset($_GET["hapustrip"]))
    {
        $id_trip = $_GET["hapustrip"];
        mysqli_query($conn,"DELETE FROM trip WHERE id_trip = '$id_trip'");
        echo "<script>alert('DATA BERHASIL DIHAPUS');
        document.location='trip_input.php'</script>";
    }
?>