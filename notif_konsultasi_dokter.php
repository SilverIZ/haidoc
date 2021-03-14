<?php


    include_once("fungsi/koneksi.php");
    include_once("fungsi/helper.php");

    $nama= $_SESSION['id_user'];
   


    $sql = "SELECT konsultasi.waktu, konsultasi.email, konsultasi.pertanyaan, konsultasi.topik, 
    user.gender, user.tinggi, user.berat, user.umur, konsultasi.nama FROM konsultasi,user
    WHERE user.id_user = konsultasi.nama  ";
           
    $query = mysqli_query($koneksi, $sql );


    ?>