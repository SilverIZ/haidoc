<?php


    include_once("fungsi/koneksi.php");
    include_once("fungsi/helper.php");

    $nama= $_SESSION['id_user'];
   


    $sql = "SELECT * FROM konsultasi WHERE nama = '$nama'";
           
    $query = mysqli_query($koneksi, $sql );
  

    ?>