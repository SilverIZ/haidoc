<?php
    include_once("fungsi/koneksi.php");
    include_once("fungsi/helper.php");

    $email = $_POST['email'];
    $id_user = $_POST['id_user'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    $dataform = http_build_query($_POST);
    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' AND id_user='$id_user' AND status='ON'");

    if(empty($email) || empty($password) || empty($id_user) ){
        header("location: ".BASE_URL."index.php?page=lupapw&notif=require&$dataform");
    }elseif ($password != $repassword){
        header("location: ".BASE_URL."index.php?page=lupapw&notif=password&$dataform");
    }elseif(mysqli_num_rows($query) == 1){
        $password = md5($password);
    mysqli_query($koneksi,"UPDATE user SET password='$password' WHERE nama_user='$id_user' AND email='$email'");   
    header("location: ".BASE_URL."index.php?page=login");
    }else{
        header("location: ".BASE_URL."index.php?page=lupapw&notif=kosong&$dataform");
    }
    

    ?>
