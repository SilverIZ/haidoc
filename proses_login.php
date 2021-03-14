<?php
    include_once("fungsi/koneksi.php");
    include_once("fungsi/helper.php");

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    
    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' AND password='$password' AND status='ON'");

    if(mysqli_num_rows($query) == 0){
        header("location: ".BASE_URL."index.php?page=login&notif=true");
    }else{
        $row = mysqli_fetch_assoc($query);
        session_start();
   
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['nama_user'] = $row['nama_user'];
        $_SESSION['pangkat'] = $row['pangkat'];

        
        if ($_SESSION['pangkat']=='dokter')
        {
        header("location: ".BASE_URL."index.php?page=konsultasi_dokter");
        }
        else 
        {
        header("location: ".BASE_URL."index.php?page=home&id_artikel=8");
        }
    }

    ?>
