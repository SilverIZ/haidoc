<?php
    session_start();

    include_once("fungsi/koneksi.php");
    include_once("fungsi/helper.php");

    $dokter= $_SESSION['id_user'];
    $nama= $_POST['nama'];
    $topik= $_POST['topik'];
    $balasan= $_POST['balasan'];
   


    $dataform = http_build_query($_POST);


    if( empty($nama) || empty($topik) || empty($balasan) ){
        header("location: ".BASE_URL."index.php?page=konsultasi_dokter&notif=require&$dataform");
    } 
    
    else {
           
            mysqli_query($koneksi, "INSERT INTO balasankonsultasi(dokter, nama, topik, balasan)
                                                VALUES('$dokter', '$nama', '$topik', '$balasan')");
            header("location: ".BASE_URL."index.php?page=konsultasi_dokter");    
}
    ?>