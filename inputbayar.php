<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    include_once("fungsi/helper.php");
    include_once("fungsi/koneksi.php");
    $atas_nama = $_POST['atas_nama'];
    $pembeli = $_POST['pembeli'];
    $jumlah = $_POST['jumlah'];
    $tagihan = $_POST['tagihan'];
    $metode = $_POST['metode'];
    $id_user = $_POST['id_user'];
    $id_order = $_POST['id_order'];

    $dataform = http_build_query($_POST);
        
   

    if(empty($atas_nama) || empty($pembeli) || empty($jumlah) || empty($tagihan) || empty($metode) || empty($id_user))
    {
        header("location: ".BASE_URL."index.php?page=aksi_cart&aksi=bayar&notif=requiere&$dataform&order=$id_order");
    } else {
            echo $id_order;
            mysqli_query($koneksi, "INSERT INTO pembayaran(atas_nama, pembeli, jumlah, tagihan, metode, id_user, id_order)
                                     VALUES('$atas_nama', '$pembeli', '$jumlah', '$tagihan', '$metode', '$id_user' ,'$id_order')");

             $status="Verifikasi Pembayaran";
             mysqli_query($koneksi,"UPDATE order2 SET status='$status' WHERE id_order='$id_order'");

            header("location: ".BASE_URL."index.php?page=cart");
    }




    ?>
</body>
</html>