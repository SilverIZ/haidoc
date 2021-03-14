<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
<?php
include_once("koneksi.php");

$user = $_GET['user'];

$tabel= $_GET['tabel'];


if($tabel=="user"){
            $user= $_GET['user'];
                $query = mysqli_query($koneksi, "DELETE FROM user WHERE id_user = '$user'");
                if($query){
                    direct("index.php?page=admin/admin&admin=user");
            }       
}elseif($tabel=="barang"){
    $user = $_GET['user'];
    $query2 = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang = '$user'");
    $row = mysqli_fetch_array($query2);
    $server = $_SERVER['DOCUMENT_ROOT'];
    $target = $server."/admin/daftar/barang/".$row['gambar'];
    unlink($target);
    $query = mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang = '$user'");
                if($query){
                    direct("index.php?page=admin/admin&admin=barang");
            }     
}elseif($tabel=="artikel"){
    $user = $_GET['user'];
    $query2 = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id = '$user'");
    $row = mysqli_fetch_array($query2);
    $server = $_SERVER['DOCUMENT_ROOT'];
    $target = $server."/admin/daftar/artikel/".$row['gambar'];
    unlink($target);
    $query = mysqli_query($koneksi, "DELETE FROM artikel WHERE id = '$user'");
                if($query){
                    direct("index.php?page=admin/admin&admin=artikel");
            }     

}elseif($tabel == "rs"){
    $id_rs = $_GET['user'];
    $query2 = mysqli_query($koneksi, "SELECT * FROM rumahsakit WHERE id_rs = '$id_rs'");
    $row = mysqli_fetch_array($query2);
    $server = $_SERVER['DOCUMENT_ROOT'];
    $target = $server."/admin/daftar/rs/".$row['gambar'];
    unlink($target);
    $query = mysqli_query($koneksi, "DELETE FROM rumahsakit WHERE id_rs = '$id_rs'");
                if($query){
                    direct("index.php?page=admin/admin&admin=rs");
            }    
}elseif($tabel == "wiki"){
    $user= $_GET['user'];
                $query = mysqli_query($koneksi, "DELETE FROM penyakit WHERE id_penyakit = '$user'");
                if($query){
                    direct("index.php?page=admin/admin&admin=wiki");
            }    
}
?> 
</body>
</html>
