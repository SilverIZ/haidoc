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
include_once("../fungsi/helper.php");
$simpan = $_POST['simpan'];



if($simpan=="user"){
    $simpan = $_POST['simpan'];
    $id_user = $_POST['id_user'];
    $nama_user = $_POST['nama_user'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];
    $umur = $_POST['umur'];
    $no_hp = $_POST['no_hp'];
    $berat = $_POST['berat'];
    $tinggi = $_POST['tinggi'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
        $dataform = http_build_query($_POST);
        
            $query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email'");
            $query2 = mysqli_query($koneksi, "SELECT * FROM user WHERE userID='$id_user'");
        
            if(empty($nama_user) || empty($email) || empty($password) || empty($alamat) || empty($no_hp) || empty($umur) || empty($id_user)|| empty($berat) || empty($tinggi) || empty($status) || empty($gender)){
                header("location: ".BASE_URL."index.php?page=admin/admin&admin=tambah&tabel=user&notif=requiere&$dataform");
            } elseif (mysqli_num_rows($query) == 1){
                header("location: ".BASE_URL."index.php?page=admin/admin&admin=tambah&tabel=user&notif=email&$dataform");
            }elseif (mysqli_num_rows($query2) == 1){
                header("location: ".BASE_URL."index.php?page=admin/admin&admin=tambah&tabel=user&notif=email&$dataform");
            }else {
                    $password = md5($password);
                    mysqli_query($koneksi, "INSERT INTO user(nama_user, email, password, alamat, gender, no_hp, umur, id_user, pangkat, berat, tinggi)
                                                        VALUES('$nama_user', '$email', '$password', '$alamat', '$gender', '$no_hp', '$umur', '$id_user', '$status', '$berat', '$tinggi' )");
                    header("location: ".BASE_URL."index.php?page=admin/admin&admin=user");
            }
            //end
}elseif($simpan=="barang"){
                    $nama_barang = $_POST['nama_barang'];
                    $stok = $_POST['stok'];
                    $status = $_POST['status'];
                    $keterangan = $_POST['keterangan'];
                    $harga = $_POST['harga'];
                    


                    if($_POST['simpan']){
                        $ekstensi_diperbolehkan	= array('png','jpg');
                        $namaft = $_FILES['gambar']['name'];
                        $ekstensi=strtolower(pathinfo($namaft, PATHINFO_EXTENSION));
                        $x = explode('.', $namaft);
                        $gambar=rand(1000,1000000).".".$ekstensi;
                        $ukuran	= $_FILES['gambar']['size'];
                        $sumber = $_FILES['gambar']['tmp_name'];	
                        $folder = 'daftar/barang/';
                        
                        
                    
                if(in_array($ekstensi, $ekstensi_diperbolehkan)){
                    if(!$ukuran < 700000){
                        move_uploaded_file($sumber, $folder.$gambar);
                        $dataform = http_build_query($_POST);
                        
                        if(empty($nama_barang) || empty($harga) || empty($keterangan) || empty($stok) || empty($status) || empty($gambar)){
                            header("location: ".BASE_URL."index.php?page=admin/admin&admin=tambah&tabel=barang&notif=requiere&$dataform");
                        }else{
                                $query = mysqli_query($koneksi, "INSERT INTO barang(nama_barang, stok, harga, status, gambar, keterangan)
                                                    VALUES('$nama_barang', '$stok', '$harga', '$status', '$gambar', '$keterangan')");
                                                   move_uploaded_file($sumber, $folder.$gambar);                         
                                    header("location: ".BASE_URL."index.php?page=admin/admin&admin=barang");
                            }
                    }else{
                        header("location: ".BASE_URL."index.php?page=admin/admin&admin=tambah&tabel=barang&notif=ukuran&$dataform");
                    }

                }else{
                     header("location: ".BASE_URL."index.php?page=admin/admin&admin=tambah&tabel=barang&notif=format&$dataform");
                }
            }

}elseif($simpan=="artikel"){
                    $judul = $_POST['judul'];
                    $isi_a = $_POST['isi_a'];
                    $isi_b = $_POST['isi_b'];
                    $penulis = $_POST['penulis'];
                    $tahun = $_POST['tahun'];
                    


                    if($_POST['simpan']){
                        $ekstensi_diperbolehkan	= array('png','jpg');
                        $namaft = $_FILES['gambar']['name'];
                        $ekstensi=strtolower(pathinfo($namaft, PATHINFO_EXTENSION));
                        $x = explode('.', $namaft);
                        $gambar=rand(1000,1000000).".".$ekstensi;
                        $ukuran	= $_FILES['gambar']['size'];
                        $sumber = $_FILES['gambar']['tmp_name'];	
                        $folder = 'daftar/artikel/';
                        
                        
                     $dataform = http_build_query($_POST);
                            if(in_array($ekstensi, $ekstensi_diperbolehkan)){
                                if(!$ukuran < 700000){
                                   
                                   
                                    $query2 = mysqli_query($koneksi,"SELECT * FROM artikel WHERE judul = '$judul'");

                                    if(empty($judul) || empty($isi_a) || empty($penulis) || empty($tahun) || empty($gambar) ){
                                        header("location: ".BASE_URL."index.php?page=admin/admin&admin=tambah&tabel=artikel&notif=requiere&$dataform");
                                    }elseif((mysqli_num_rows($query2) >= 1)){
                                        header("location: ".BASE_URL."index.php?page=admin/admin&admin=tambah&tabel=artikel&notif=judul&$dataform");
                                    }else{
                                            $query = mysqli_query($koneksi, "INSERT INTO artikel(judul, gambar, isi_a, isi_b, penulis, tahun)
                                                                VALUES('$judul', '$gambar', '$isi_a', '$isi_b', '$penulis', '$tahun')");
                                                 move_uploaded_file($sumber, $folder.$gambar);
                                                header("location: ".BASE_URL."index.php?page=admin/admin&admin=artikel");
                                        }
                                }else{
                                    header("location: ".BASE_URL."index.php?page=admin/admin&admin=tambah&tabel=artikel&notif=ukuran&$dataform");
                                }

                            }else{
                                header("location: ".BASE_URL."index.php?page=admin/admin&admin=tambah&tabel=artikel&notif=format&$dataform");
                            }
                }
    
    
}elseif($simpan=="rs"){
    $nama_rs = $_POST['nama_rs'];
    $alamat_rs = $_POST['alamat_rs'];
    $kota = $_POST['kota'];
    $deskripsi = $_POST['deskripsi'];
    


    if($_POST['simpan']){
        $ekstensi_diperbolehkan	= array('png','jpg');
        $namaft = $_FILES['gambar']['name'];
        $ekstensi=strtolower(pathinfo($namaft, PATHINFO_EXTENSION));
        $x = explode('.', $namaft);
        $gambar=rand(1000,1000000).".".$ekstensi;
        $ukuran	= $_FILES['gambar']['size'];
        $sumber = $_FILES['gambar']['tmp_name'];	
        $folder = 'daftar/rs/';
        
        
    
            if(in_array($ekstensi, $ekstensi_diperbolehkan)){
                if(!$ukuran < 700000){
                   
                    $dataform = http_build_query($_POST);
                    $query2 = mysqli_query($koneksi, "SELECT * FROM rumahsakit WHERE nama_rs = '$nama_rs'");

                    if(empty($nama_rs) || empty($alamat_rs) || empty($kota) || empty($deskripsi) || empty($gambar) ){
                        
                        header("location: ".BASE_URL."index.php?page=admin/admin&admin=tambah&tabel=rs&notif=requiere&$dataform");
                    }elseif(mysqli_num_rows($query2) >= 1){
                        header("location: ".BASE_URL."index.php?page=admin/admin&admin=tambah&tabel=rs&notif=judul&$dataform");
                    }else{
                            $query = mysqli_query($koneksi, "INSERT INTO rumahsakit(nama_rs, alamat_rs, kota, deskripsi, gambar)
                                                VALUES('$nama_rs', '$alamat_rs', '$kota', '$deskripsi', '$gambar')");
                                move_uploaded_file($sumber, $folder.$gambar);
                                header("location: ".BASE_URL."index.php?page=admin/admin&admin=rs");
                        }
                }else{
                    echo "Ukuran";
                    header("location: ".BASE_URL."index.php?page=admin/admin&admin=tambah&tabel=artikel&notif=ukuran&$dataform");
                }

            }else{
                echo "format";
            header("location: ".BASE_URL."index.php?page=admin/admin&admin=tambah&tabel=artikel&notif=format&$dataform");
            }
        }
}elseif($simpan == "wiki"){
    $nama_penyakit = $_POST['nama_penyakit'];
    $deskripsi = $_POST['deskripsi'];
    $gejala = $_POST['gejala'];
    $pengobatan = $_POST['pengobatan'];
    $pencegahan = $_POST['pencegahan'];
    
        $dataform = http_build_query($_POST);
        
            $query = mysqli_query($koneksi, "SELECT * FROM penyakit WHERE nama_penyakit='$nama_penyakit'");
           
        
            if(empty($nama_penyakit) || empty($deskripsi) || empty($gejala) || empty($pengobatan) || empty($pencegahan) ){
                header("location: ".BASE_URL."index.php?page=admin/admin&admin=tambah&tabel=wiki&notif=requiere&$dataform");
            } elseif (mysqli_num_rows($query) == 1){
                header("location: ".BASE_URL."index.php?page=admin/admin&admin=tambah&tabel=wiki&notif=nama&$dataform");
            }else {
                    $password = md5($password);
                    mysqli_query($koneksi, "INSERT INTO penyakit(nama_penyakit, deskripsi, gejala, pencegahan, pengobatan)
                                                        VALUES('$nama_penyakit', '$deskripsi', '$gejala', '$pencegahan', '$pengobatan')");
                    header("location: ".BASE_URL."index.php?page=admin/admin&admin=wiki");
            }

}
        ?>    




</body>
</html>