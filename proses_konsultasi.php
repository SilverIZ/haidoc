<?php
    session_start();

    include_once("fungsi/koneksi.php");
    include_once("fungsi/helper.php");

    $nama= $_SESSION['id_user'];
    $email= $_POST['email'];
    $topik= $_POST['topik'];
    $pertanyaan= $_POST['pertanyaan'];
   


    $dataform = http_build_query($_POST);


    if( empty($email) || empty($topik) || empty($pertanyaan) ){
        header("location: ".BASE_URL."index.php?page=konsultasi&notif=require&$dataform");
    } 
    
    else {
           
            mysqli_query($koneksi, "INSERT INTO konsultasi(nama, email, topik, pertanyaan)
                                                VALUES('$nama', '$email', '$topik', '$pertanyaan')");
                                                
            header("location: ".BASE_URL."index.php?page=konsultasi");    
}
    ?>