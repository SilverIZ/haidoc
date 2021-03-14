<?php
    session_start();

    include_once("fungsi/koneksi.php");
    include_once("fungsi/helper.php");

    $nama= $_POST['nama'];
    $email= $_POST['email'];
    $no_hp= $_POST['no_hp'];
    $pesan= $_POST['pesan'];
   


    $dataform = http_build_query($_POST);


    if( empty($nama) || empty($email) || empty($pesan) || empty($no_hp) ){
        header("location: ".BASE_URL."index.php?page=contact_us&notif=require&$dataform");
    } 
    
    else {
           
            mysqli_query($koneksi, "INSERT INTO contactus(nama, email, no_hp, pesan)
                                                VALUES('$nama', '$email', '$no_hp', '$pesan')");
                                     
            header("location: ".BASE_URL."index.php?page=contact_us&notif=success");    
}
    ?>