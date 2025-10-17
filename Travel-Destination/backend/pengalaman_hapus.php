<?php
    include("includes/config.php");
    if(isset($_GET["hapuspengalaman"]))
    {
        $id = $_GET["hapuspengalaman"];
        mysqli_query($conn,"DELETE FROM pengalaman WHERE id = '$id'");
        echo "<script>alert('DATA BERHASIL DIHAPUS');
        document.location='pengalaman_input.php'</script>";
    }
?>