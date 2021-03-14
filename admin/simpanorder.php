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
    include_once("helper.php");
        $alamat = $_POST['alamat'];
        $jumlah = $_POST['jumlah'];
        $id_user = $_POST['id_user'];
        $id_barang = $_POST['id_barang'];
        $harga = $_POST['harga'];
        $pembayaran = $_POST['pembayaran'];
        $id_user = $_POST['id_user'];
        $nama_barang = $_POST['nama_barang'];
        $status="Menunggu Pembayaran";

            $dataform = http_build_query($_POST);
            
               
            $harga = $harga * $jumlah;
            
                if(empty($alamat) ){
                    header("location: ".BASE_URL."index.php?page=admin/formorder&notif=requiere&$dataform");
                } else {
                   
                        mysqli_query($koneksi, "INSERT INTO order2(nama_barang, jumlah, harga, alamat, status, pembayaran, id_user, id_barang)
                                                            VALUES('$nama_barang', '$jumlah', '$harga', '$alamat', '$status', '$pembayaran', '$id_user','$id_barang')");

                        header("location: ".BASE_URL."index.php?page=cart");
                }
    ?>
</body>
</html>