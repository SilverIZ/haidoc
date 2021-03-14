<?php
    include_once("koneksi.php");
            if(isset($_POST['tombolcari'])){
            $cari = $_POST['cari'];
            $_SESSION['cari'] = $cari;
            }else{
            $cari = isset($_SESSION['cari'])? $_SESSION['cari'] :false;
            }

            $ambildata = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang LIKE '%$cari%' 
                         OR nama_barang LIKE '%$cari%'OR keterangan LIKE '%$cari%'");

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

            $ambilperhalaman = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang LIKE '%$cari%' 
            OR nama_barang LIKE '%$cari%' OR status LIKE '%$cari%'OR keterangan LIKE '%$cari%' LIMIT $dataawal,$jumlahdata");

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
        <h2> TABEL BARANG</h2>
       
        </div> 
        <a class="btn btn-warning tombol-tambah" <?php echo "href='".BASE_URL."index.php?page=admin/admin&admin=tambah&tabel=barang'"?> role="button">Tambah</a>
        <br><br>
        <form method="POST" class="form-inline" style="float: inline-end;" action="index.php?page=admin/admin&admin=barang">
        <input class="form-control" name="cari" value="<?php echo $cari;?>" type="search" placeholder="Temukan Data">
        <button class="btn btn-primary my-2 my-sm-0" name="tombolcari" type="submit">Cari</button>
        </form>
        <nav aria-label="Page navigation example">
                <ul class="pagination ">
                <li <?php if($halamanaktif <=1){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                    <a class="page-link " href="index.php?page=admin/admin&admin=barang&halaman=<?php echo $halamanaktif-1?>" tabindex="-1">Previous</a>
                    </li>
                
                <?php for($i=$startno; $i<=$endno; $i++):?>
                    <li <?php if($halamanaktif == $i){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                        <a class="page-link" href="index.php?page=admin/admin&admin=barang&halaman=<?php echo $i;?>">
                        <?php echo $i;?>
                    </a></li>
                <?php  endfor; ?>
                    <li <?php if($halamanaktif >= ($i-1)){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                    <a class="page-link"  href="index.php?page=admin/admin&admin=barang&halaman=<?php echo $halamanaktif+1?>">Next</a>
                    </li>
                </ul>
            </nav>
        <table class="table table-responsive">
            <thead>
            <tr>
                <th>No.</th>
                <th>ID Barang.</th>
                <th>Nama Barang  </th>
                <th>Stok  </th>
                <th>Harga  </th>
                <th>Status </th>
                <th>Keterangan </th>
                <th>gambar </th>
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
                    <td><?php echo $row['id_barang'] ?></td>
                    <td><?php echo $row['nama_barang'] ?></td>
                    <td><?php echo $row['stok'] ?></td>
                    <td><?php echo $row['harga'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                    <td><?php echo $row['keterangan'] ?></td>
                    <td><?php echo $row['gambar'] ?></td>
                    <td>
                        <a class="btn btn-danger" href="<?php echo BASE_URL."index.php?page=admin/admin&admin=hapus&tabel=barang&user=".$row['id_barang'];?>" role="button">Hapus</a>
                        <a class="btn btn-primary" href="<?php echo BASE_URL."index.php?page=admin/admin&admin=edit&tabel=barang&user=".$row['id_barang'];?>"  role="button">Edit</a>
                    </td>
                    </tr>
                    <?php }
                    ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                <li <?php if($halamanaktif <=1){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                    <a class="page-link " href="index.php?page=admin/admin&admin=barang&halaman=<?php echo $halamanaktif-1?>" tabindex="-1">Previous</a>
                    </li>
                
                <?php for($i=$startno; $i<=$endno; $i++):?>
                    <li <?php if($halamanaktif == $i){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                        <a class="page-link" href="index.php?page=admin/admin&admin=barang&halaman=<?php echo $i;?>">
                        <?php echo $i;?>
                    </a></li>
                <?php  endfor; ?>
                    <li <?php if($halamanaktif >= ($i-1)){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                    <a class="page-link"  href="index.php?page=admin/admin&admin=barang&halaman=<?php echo $halamanaktif+1?>">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</body>
</html>