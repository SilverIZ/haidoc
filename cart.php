<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<body>
<div class="container">
<?php
    include_once("fungsi/koneksi.php");
            $id_user = $_SESSION['id_user'];

            $ambildata = mysqli_query($koneksi, "SELECT * FROM order2 WHERE id_user='$id_user'");
            
        ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="content-user-admin">
           
        <div class="judul text-center">
        <br>
        <h2> KERANJANG SAYA</h2>
       
        </div> 
        <br><br>
        
        
        <table class="table table-responsive">
            <thead>
            <tr>
                <th>No.</th>
                <th>ID Order.</th>
                <th>Nama Barang  </th>
                <th>Quantity  </th>
                <th>Total Tagihan  </th>
                <th>Tanggal </th>
                <th>Status </th>
                <th>Pembayaran </th>
                <th>Aksi  </th>
            </tr>
            </thead>

            <tbody>
                
                    <?php
                    $nomor=0;
                        while($row = mysqli_fetch_assoc($ambildata)){
                            $nomor++;
                            ?>
                <tr>
                    <td><?php echo $nomor ?></td>
                    <td><?php echo $row['id_order'] ?></td>
                    <td><?php echo $row['nama_barang'] ?></td>
                    <td><?php echo $row['jumlah'] ?></td>
                    <td><?php echo $row['harga'] ?></td>
                    <td><?php echo $row['tanggal'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                    <td><?php echo $row['pembayaran'] ?></td>
                    <td>
                        <?php if($row['status']=="Menunggu Pembayaran"){?>
                            <a class="btn btn-danger" href="<?php echo BASE_URL."index.php?page=aksi_cart&user=user&aksi=batal&order=".$row['id_order'];?>" role="button">BATALKAN</a>
                            <a class="btn btn-primary" href="<?php echo BASE_URL."index.php?page=aksi_cart&aksi=bayar&order=".$row['id_order'];?>"  role="button">BAYAR</a>
                        <?php }elseif($row['status']=="Dibatalkan"){?>
                            <a class="btn btn-danger disabled" role="button">Dibatalkan</a>
                        <?php }elseif($row['status']=="Dikirim"){ ?>
                            <a class="btn btn-primary" href="<?php echo BASE_URL."index.php?page=aksi_cart&user=user&aksi=selesai&order=".$row['id_order'];?>"  role="button">Diterima</a>
                    <?php
                        }elseif($row['status']=="Pembayaran Ditolak"){echo "Silahkan Hubungi Bantuan Jika Nominal yang Anda Kirim salah atau Pembayaran Anda Ditolak";
                        }elseif($row['status']=="Selesai"){?>
                            <a class="btn btn-succes disabled" role="button">Selesai</a>   
                       <?php
                        }?>
                    </td>
                    </tr>
                    <?php }
                    ?>
            </tbody>
        </table>
        
        </div>
    </div>

<style>
                * {
            box-sizing: border-box;
            }

            body {
            font-family: Arial, Helvetica, sans-serif;
            }

            /* Float four columns side by side */
            .column {
            float: left;
            width: 25%;
            padding: 0 10px;
            }

            /* Remove extra left and right margins, due to padding in columns */
            .row {margin: 0 -5px;}

            /* Clear floats after the columns */
            .row:after {
            content: "";
            display: table;
            clear: both;
            }

            /* Style the counter cards */
            .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* this adds the "card" effect */
            padding: 16px;
            text-align: center;
            background-color: #f1f1f1;
            }

            /* Responsive columns - one column layout (vertical) on small screens */
            @media screen and (max-width: 600px) {
            .column {
                width: 100%;
                display: block;
                margin-bottom: 20px;
            }
            }
</style>

    <div class="row">
            <div class="column">
                <div class="card"><label for="cname">No. Rekening </label>
                            <label for="cname">BNI : 01234567 </label>
                            </div>
            </div>
            <div class="column">
                <div class="card"><label for="cname">No. Rekening </label>
                                    <label for="cname">Mandiri :987654321 </label>
                                    <br>
        </div>
            </div>
            <div class="column">
                <div class="card"> <label for="ccnum">No Dana</label>
                                    <label for="ccnum">0823113123</label></div>
            </div>
            <div class="column">
                <div class="card"> <label for="ccnum">Lakukan Konfirmasi Setelah melakukan transfer</label>
                                    <label for="ccnum">Klik <p style="font-weight: bolder;">Bayar<p> Pada Menu Keranjang untuk Konfirmasi</label></div>
            </div>
</div> 
</body>
</html>
</div>

</body>
</html>