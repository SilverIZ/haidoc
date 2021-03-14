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



    if ($simpan == "user") {
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


        $dataform = http_build_query($_POST);


        if (empty($id_user) || empty($email) || empty($alamat) || empty($no_hp) || empty($umur) || empty($id_user) || empty($berat) || empty($tinggi) || empty($status) || empty($gender)) {
            header("location: " . BASE_URL . "index.php?page=admin/admin&admin=edit&tabel=user&notif=requiere&user=$id_user");
        } else {
            $password = md5($password);
            mysqli_query($koneksi, "UPDATE user SET nama_user='$nama_user', alamat='$alamat', gender='$gender',
                                                         no_hp='$no_hp',umur='$umur',pangkat='$status', berat='$berat', tinggi='$tinggi' WHERE id_user='$id_user'");
            header("location: " . BASE_URL . "index.php?page=admin/admin&admin=user");
        }
        //end
    } elseif ($simpan == "barang") {
        $gambar_old = $_POST['gambar_old'];
        $id_barang = $_POST['id_barang'];

        $nama_barang = $_POST['nama_barang'];
        $stok = $_POST['stok'];
        $harga = $_POST['harga'];
        $keterangan = $_POST['keterangan'];
        $gambar = $_POST['gambar'];
        $status = $_POST['status'];

        if ($_POST['simpan']) {
            $ekstensi_diperbolehkan    = array('png', 'jpg');
            $namaft = $_FILES['gambar']['name'];
            $ekstensi = strtolower(pathinfo($namaft, PATHINFO_EXTENSION));
            $x = explode('.', $namaft);
            $gambar = rand(1000, 1000000) . "." . $ekstensi;
            $ukuran    = $_FILES['gambar']['size'];
            $sumber = $_FILES['gambar']['tmp_name'];
            $folder = 'daftar/barang/';



            if (in_array($ekstensi, $ekstensi_diperbolehkan)) {
                if (!$ukuran < 700000) {
                    move_uploaded_file($sumber, $folder . $gambar);
                    $dataform = http_build_query($_POST);

                    $server = $_SERVER['DOCUMENT_ROOT'];
                    $target = $server . "/haidoc_4D_Kel1/admin/daftar/barang/" . $gambar_old;
                    unlink($target);

                    if (empty($nama_barang) || empty($harga) || empty($keterangan) || empty($stok) || empty($status) || empty($gambar)) {
                        header("location: " . BASE_URL . "index.php?page=admin/admin&admin=edit&tabel=barang&notif=requiere&iduser=$id_barang");
                    } else {
                        $query = mysqli_query($koneksi, "UPDATE barang SET nama_barang='$nama_barang', stok='$stok', harga='$harga',
                 status='$status',gambar='$gambar',keterangan='$keterangan' WHERE id_barang='$id_barang'");

                        header("location: " . BASE_URL . "index.php?page=admin/admin&admin=barang");
                    }
                } else {
                    header("location: " . BASE_URL . "index.php?page=admin/admin&admin=edit&tabel=barang&notif=ukuran&user=$id_barang");
                }
            } else {
                header("location: " . BASE_URL . "index.php?page=admin/admin&admin=edit&tabel=barang&notif=format&user=$id_barang");
            }
        }
    } elseif ($simpan == "artikel") {
        $id = $_POST['id'];
        $judul = $_POST['judul'];
        $isi_a = $_POST['isi_a'];
        $isi_b = $_POST['isi_b'];
        $penulis = $_POST['penulis'];
        $tahun = $_POST['tahun'];
        $gambar_old = $_POST['gambar_old'];


        if ($_POST['simpan']) {
            $ekstensi_diperbolehkan    = array('png', 'jpg');
            $namaft = $_FILES['gambar']['name'];
            $ekstensi = strtolower(pathinfo($namaft, PATHINFO_EXTENSION));
            $x = explode('.', $namaft);
            $gambar = rand(1000, 1000000) . "." . $ekstensi;
            $ukuran    = $_FILES['gambar']['size'];
            $sumber = $_FILES['gambar']['tmp_name'];
            $folder = 'daftar/artikel/';



            if (in_array($ekstensi, $ekstensi_diperbolehkan)) {
                if (!$ukuran < 700000) {

                    $dataform = http_build_query($_POST);

                    if (empty($judul) || empty($isi_a) || empty($penulis) || empty($tahun) || empty($gambar)) {
                        header("location: " . BASE_URL . "index.php?page=admin/admin&admin=edit&tabel=artikel&notif=requiere&$dataform");
                    } else {
                        $query = mysqli_query($koneksi, "UPDATE artikel SET judul='$judul', isi_a='$isi_a', isi_b='$isi_b',
                                penulis='$penulis',tahun='$tahun', gambar='$gambar' WHERE id='$id'");
                        $server = $_SERVER['DOCUMENT_ROOT'];
                        $target = $server . "/haidoc/admin/daftar/artikel/" . $gambar_old;
                        unlink($target);

                        move_uploaded_file($sumber, $folder . $gambar);
                        header("location: " . BASE_URL . "index.php?page=admin/admin&admin=artikel");
                    }
                } else {
                    header("location: " . BASE_URL . "index.php?page=admin/admin&admin=edit&tabel=artikel&notif=ukuran&user=$id");
                }
            } else {
                header("location: " . BASE_URL . "index.php?page=admin/admin&admin=edit&tabel=artikel&notif=format&user=$id");
            }
        }
    } elseif ($simpan == "rs") {
        $id_rs = $_POST['id_rs'];
        $nama_rs = $_POST['nama_rs'];
        $alamat_rs = $_POST['alamat_rs'];
        $kota = $_POST['kota'];
        $deskripsi = $_POST['deskripsi'];
        $gambar_old = $_POST['gambar_old'];



        if ($_POST['simpan']) {
            $ekstensi_diperbolehkan    = array('png', 'jpg');
            $namaft = $_FILES['gambar']['name'];
            $ekstensi = strtolower(pathinfo($namaft, PATHINFO_EXTENSION));
            $x = explode('.', $namaft);
            $gambar = rand(1000, 1000000) . "." . $ekstensi;
            $ukuran    = $_FILES['gambar']['size'];
            $sumber = $_FILES['gambar']['tmp_name'];
            $folder = 'daftar/rs/';



            if (in_array($ekstensi, $ekstensi_diperbolehkan)) {
                if (!$ukuran < 700000) {

                    $dataform = http_build_query($_POST);
                    $server = $_SERVER['DOCUMENT_ROOT'];
                    $target = $server . "/haidoc_4D_Kel1/admin/daftar/rs/" . $gambar_old;
                    unlink($target);


                    if (empty($nama_rs) || empty($alamat_rs) || empty($kota) || empty($deskripsi) || empty($gambar)) {

                        header("location: " . BASE_URL . "index.php?page=admin/admin&admin=edit&tabel=rs&notif=requiere&$dataform");
                    } else {
                        $query = mysqli_query($koneksi, "UPDATE rumahsakit SET nama_rs='$nama_rs', alamat_rs='$alamat_rs', kota='$kota',
                                                deskripsi='$deskripsi',gambar='$gambar' WHERE id_rs='$id_rs'");

                        move_uploaded_file($sumber, $folder . $gambar);
                        header("location: " . BASE_URL . "index.php?page=admin/admin&admin=rs");
                    }
                } else {
                    echo "Ukuran";
                    header("location: " . BASE_URL . "index.php?page=admin/admin&admin=edit&tabel=rs&notif=ukuran&user=$id_rs");
                }
            } else {
                echo "format";
                header("location: " . BASE_URL . "index.php?page=admin/admin&admin=edit&tabel=rs&notif=format&user=$id_rs");
            }
        }
    } elseif ($simpan == "wiki") {
        $nama_penyakit =  $_POST['nama_penyakit'];
        $deskripsi =  $_POST['deskripsi'];
        $gejala =  $_POST['gejala'];
        $pencegahan =  $_POST['pencegahan'];
        $pengobatan =  $_POST['pengobatan'];
        $id_penyakit = $_POST['id_penyakit'];


        $dataform = http_build_query($_POST);


        if (empty($nama_penyakit) || empty($deskripsi) || empty($gejala) || empty($pencegahan) || empty($pengobatan)) {
            header("location: " . BASE_URL . "index.php?page=admin/admin&admin=edit&tabel=wiki&notif=requiere&user=$id_penyakit");
        } else {

            mysqli_query($koneksi, "UPDATE penyakit SET nama_penyakit='$nama_penyakit', deskripsi='$deskripsi', gejala='$gejala',
                                                         pencegahan='$pencegahan',pengobatan='$pengobatan' WHERE id_penyakit='$id_penyakit'");
            header("location: " . BASE_URL . "index.php?page=admin/admin&admin=wiki");
        }
    }       ?>

</body>

</html>