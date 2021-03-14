<?php
    session_start();

    include_once("fungsi/koneksi.php");
    include_once("fungsi/helper.php");
    $id_user = $_SESSION['id_user'];
    $nama_user= $_POST['nama_user'];
    $alamat= $_POST['alamat'];
    $no_hp= $_POST['no_hp'];
    $umur= $_POST['umur'];
    $berat= $_POST['berat'];
    $tinggi= $_POST['tinggi'];


    $dataform = http_build_query($_POST);


  
           
            mysqli_query($koneksi, "UPDATE user  SET nama_user='$nama_user', alamat='$alamat', no_hp='$no_hp',
            umur='$umur', berat='$berat', tinggi='$tinggi' where id_user='$id_user'" );
                                                
            header("location: ".BASE_URL."index.php?page=profile");  

    ?>