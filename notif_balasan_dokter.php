<?php


    include_once("fungsi/koneksi.php");
    include_once("fungsi/helper.php");

    $dokter= $_SESSION['id_user'];
   


    $sql = "SELECT * FROM balasankonsultasi WHERE dokter = '$dokter'";
           
    $query = mysqli_query($koneksi, $sql );
  

    ?>