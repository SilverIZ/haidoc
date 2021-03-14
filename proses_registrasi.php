<?php


    include_once("fungsi/koneksi.php");
    include_once("fungsi/helper.php");

    $nama_user= $_POST['nama_user'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    $repassword= $_POST['repassword'];
    $alamat= $_POST['alamat'];

    
    $gender= $_POST['gender'];
    $no_hp= $_POST['no_hp'];
    $janji= $_POST['janji'];

    $tinggi= $_POST['tinggi'];
    $berat= $_POST['berat'];
    $umur= $_POST['umur'];
    $id_user= $_POST['id_user'];

    unset($_POST['password']);
    unset($_POST['repassword']);
    $dataform = http_build_query($_POST);

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email'");
    $query2 = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user'");

    if(empty($nama_user) || empty($email) || empty($password) || empty($alamat) || empty($no_hp) || empty($tinggi) || empty($berat)|| empty($umur) || empty($id_user) || empty($janji) ){
        header("location: ".BASE_URL."index.php?page=register&notif=require&$dataform");
    } elseif ($password != $repassword){
        header("location: ".BASE_URL."index.php?page=register&notif=password&$dataform");
    }elseif (mysqli_num_rows($query) == 1){
        header("location: ".BASE_URL."index.php?page=register&notif=email&$dataform");
    }elseif (mysqli_num_rows($query2) == 1){
        header("location: ".BASE_URL."index.php?page=register&notif=iduser&$dataform");
    }else {
             $password = md5($password);
            mysqli_query($koneksi, "INSERT INTO user(nama_user, email, password, alamat, gender, no_hp, tinggi, berat, umur, id_user)
                                                VALUES('$nama_user', '$email', '$password', '$alamat', '$gender', '$no_hp', '$tinggi','$berat', '$umur', '$id_user' )");
            header("location: ".BASE_URL."index.php?page=login");    
}
    ?>