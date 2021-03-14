<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php  
    include_once("fungsi/koneksi.php");
    include_once("fungsi/helper.php");
    $order = isset ($_GET['order']) ? $_GET['order'] : false;
    

    $query = mysqli_query($koneksi, "SELECT * FROM order2 WHERE id_order='$order'");
    $row=mysqli_fetch_assoc($query);

    $id_user = $row['id_user'];
    
    $query5 = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user'");
    $row5 = mysqli_fetch_assoc($query5);

    $no_hp = $row5['no_hp'];
    $nama = $row5['nama_user'];
    $alamat = $row['alamat'];
    $id_order = $order;
    echo $alamat;
    echo $nama;
    echo $id_order;
    echo $no_hp;

    mysqli_query($koneksi, "INSERT INTO delivery(no_telp, nama, alamat, id_order)
                            VALUES('$no_hp', '$nama', '$alamat', '$id_order')");
         
        direct(BASE_URL."index.php?page=admin/admin&admin=pengiriman");
    ?>
</body>
</html>