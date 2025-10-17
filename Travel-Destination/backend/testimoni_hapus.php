<?php
    include("includes/config.php");
    if(isset($_GET["hapustestimoni"]))
    {
        $id_testimoni = $_GET["hapustestimoni"];
        mysqli_query($conn,"DELETE FROM testimoni WHERE id_testimoni = '$id_testimoni'");
        echo "<script>alert('DATA BERHASIL DIHAPUS');
        document.location='testimoni_input.php'</script>";
    }
?>