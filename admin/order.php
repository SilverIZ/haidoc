<?php
    include_once("koneksi.php");
    $id_user = $_SESSION['id_user'];
   
            if(isset($_POST['tombolcari'])){
            $cari = $_POST['cari'];
            $_SESSION['cari'] = $cari;
            }else{
            $cari = isset($_SESSION['cari'])? $_SESSION['cari'] :false;
            }

            $ambildata = mysqli_query($koneksi, "SELECT * FROM order2 WHERE id_order LIKE '%$cari%' 
                          OR nama_barang LIKE '%$cari%' OR id_barang LIKE '%$cari%' OR id_user LIKE '%$cari%'");
            //konfig
                $jumlahdata=10;
                $totaldata= mysqli_num_rows($ambildata);
                
            //end
            $jumlahpage = ceil($totaldata/$jumlahdata);

            if(isset($_GET['halaman'])){
                $halamanaktif=$_GET['halaman'];
            }else{
                $halamanaktif=1;
            }

            $dataawal = ($halamanaktif*$jumlahdata) - $jumlahdata;

            $jumlahlink = 2;
            if($halamanaktif>$jumlahlink){
                $startno = $halamanaktif - $jumlahlink;
            }else{
                $startno=1;
            }

            if($halamanaktif < ($jumlahpage - $jumlahlink)){
            $endno= $halamanaktif + $jumlahlink;

            }else{
            $endno = $jumlahpage;
            }

            $ambilperhalaman = mysqli_query($koneksi, "SELECT * FROM order2 WHERE id_order LIKE '%$cari%' 
            OR nama_barang LIKE '%$cari%' OR id_barang LIKE '%$cari%' OR id_user LIKE '%$cari%' LIMIT $dataawal,$jumlahdata");

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
        <h2> TABEL PESANAN</h2>
       
        </div> 
        <!--<a class="btn btn-warning tombol-tambah"<?php echo "href='".BASE_URL."index.php?page=admin/formorder&tabel=order&iduser='"?> role="button">Tambah</a>-->
        <br><br>
        <form method="POST" class="form-inline" style="float: inline-end;" action="index.php?page=admin/admin&admin=order">
        <input class="form-control" name="cari" value="<?php echo $cari;?>" type="search" placeholder="Temukan Data">
        <button class="btn btn-primary my-2 my-sm-0" name="tombolcari" type="submit">Cari</button>
        </form>
        <nav aria-label="Page navigation example">
                <ul class="pagination ">
                <li <?php if($halamanaktif <=1){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                    <a class="page-link " href="index.php?page=admin/admin&admin=order&halaman=<?php echo $halamanaktif-1?>" tabindex="-1">Previous</a>
                    </li>
                
                <?php for($i=$startno; $i<=$endno; $i++):?>
                    <li <?php if($halamanaktif == $i){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                        <a class="page-link" href="index.php?page=admin/admin&admin=order&halaman=<?php echo $i;?>">
                        <?php echo $i;?>
                    </a></li>
                <?php  endfor; ?>
                    <li <?php if($halamanaktif >= ($i-1)){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                    <a class="page-link"  href="index.php?page=admin/admin&admin=order&halaman=<?php echo $halamanaktif+1?>">Next</a>
                    </li>
                </ul>
            </nav>
        <table class="table table-responsive">
            <thead>
            <tr>
                <th>No.</th>
                <th>ID Order.</th>
                <th>Nama Barang  </th>
                <th>Quantity  </th>
                <th>Total Tagihan  </th>
                <th>Id_User </th>
                <th>Tanggal </th>
                <th>Status </th>
                <th>Pembayaran </th>
                <th>Aksi  </th>
            </tr>
            </thead>

            <tbody>
                
                    <?php
                    $nomor=0 + $dataawal;
                        while($row = mysqli_fetch_assoc($ambilperhalaman)){
                            $nomor++;
                            ?>
                <tr>
                    <td><?php echo $nomor ?></td>
                    <td><?php echo $row['id_order'] ?></td>
                    <td><?php echo $row['nama_barang'] ?></td>
                    <td><?php echo $row['jumlah'] ?></td>
                    <td><?php echo $row['harga'] ?></td>
                    <td><?php echo $row['id_user'] ?></td>
                    <td><?php echo $row['tanggal'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                    <td><?php echo $row['pembayaran'] ?></td>
                    <td>
                        <?php if($row['status']=="Menunggu Pembayaran"){?>
                            <a class="btn btn-danger" href="<?php echo BASE_URL."index.php?page=aksi_cart&user=admin&aksi=batal&order=".$row['id_order'];?>" role="button">BATALKAN</a>
                        <?php }elseif($row['status']=="Dibatalkan"){?>
                            <a class="btn btn-danger disabled" role="button">Dibatalkan</a>
                        <?php }elseif($row['status']=="Verifikasi Pembayaran"){?>
                            <a class="btn btn-danger" href="<?php echo BASE_URL."index.php?page=aksi_cart&user=admin&aksi=kirim&order=".$row['id_order'];?>" role="button">Kirim</a>      
                        <?php
                        }
                        ?>    
                    </td>
                    </tr>
                    <?php }
                    ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                <li <?php if($halamanaktif <=1){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                    <a class="page-link " href="index.php?page=admin/admin&admin=order&halaman=<?php echo $halamanaktif-1?>" tabindex="-1">Previous</a>
                    </li>
                
                <?php for($i=$startno; $i<=$endno; $i++):?>
                    <li <?php if($halamanaktif == $i){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                        <a class="page-link" href="index.php?page=admin/admin&admin=order&halaman=<?php echo $i;?>">
                        <?php echo $i;?>
                    </a></li>
                <?php  endfor; ?>
                    <li <?php if($halamanaktif >= ($i-1)){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                    <a class="page-link"  href="index.php?page=admin/admin&admin=order&halaman=<?php echo $halamanaktif+1?>">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</body>
</html>