<?php
    include_once("koneksi.php");
            if(isset($_POST['tombolcari'])){
            $cari = $_POST['cari'];
            $_SESSION['cari'] = $cari;
            }else{
            $cari = isset($_SESSION['cari'])? $_SESSION['cari'] :false;
            }

            $ambildata = mysqli_query($koneksi, "SELECT * FROM artikel WHERE judul LIKE '%$cari%' 
                         OR isi_a LIKE '%$cari%' OR isi_b LIKE '%$cari%' OR penulis LIKE '%$cari%'");

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

            $ambilperhalaman = mysqli_query($koneksi, "SELECT * FROM artikel WHERE judul LIKE '%$cari%' 
            OR isi_a LIKE '%$cari%' OR isi_b LIKE '%$cari%' OR penulis LIKE '%$cari%' LIMIT $dataawal,$jumlahdata");

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
        <h2> TABEL ARTIKEL</h2>
       
        </div> 
        <a class="btn btn-warning tombol-tambah" <?php echo "href='".BASE_URL."index.php?page=admin/admin&admin=tambah&tabel=artikel'"?> role="button">Tambah</a>
        <br><br>
        <form method="POST" class="form-inline" style="float: inline-end;" action="index.php?page=admin/admin&admin=artikel">
        <input class="form-control" name="cari" value="<?php echo $cari;?>" type="search" placeholder="Temukan Data">
        <button class="btn btn-primary my-2 my-sm-0" name="tombolcari" type="submit">Cari</button>
        </form>
        <nav aria-label="Page navigation example">
                <ul class="pagination ">
                <li <?php if($halamanaktif <=1){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                    <a class="page-link " href="index.php?page=admin/admin&admin=artikel&halaman=<?php echo $halamanaktif-1?>" tabindex="-1">Previous</a>
                    </li>
                
                <?php for($i=$startno; $i<=$endno; $i++):?>
                    <li <?php if($halamanaktif == $i){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                        <a class="page-link" href="index.php?page=admin/admin&admin=artikel&halaman=<?php echo $i;?>">
                        <?php echo $i;?>
                    </a></li>
                <?php  endfor; ?>
                    <li <?php if($halamanaktif >= ($i-1)){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                    <a class="page-link"  href="index.php?page=admin/admin&admin=artikel&halaman=<?php echo $halamanaktif+1?>">Next</a>
                    </li>
                </ul>
            </nav>
        <table class="table table-responsive">
            <thead>
            <tr>
                <th>No.</th>
                <th>ID Artikel.</th>
                <th>Judul Artikel</th>
                <th>Gambar  </th>
                <th>Isi A  </th>
                <th>Isi B </th>
                <th>Penulis </th>
                <th>Tahun </th>
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
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['judul'] ?></td>
                    <td><?php echo $row['gambar'] ?></td>
                    <td><?php echo substr($row['isi_a'], 0, 70) . '...';?></td>
                    <td><?php echo substr($row['isi_b'], 0, 70) . '...'; ?></td>
                    <td><?php echo $row['penulis'] ?></td>
                    <td><?php echo $row['tahun'] ?></td>
                    <td>
                        <a class="btn btn-danger" href="<?php echo BASE_URL."index.php?page=admin/hapus&tabel=artikel&user=".$row['id'];?>" role="button">Hapus</a>
                        <a class="btn btn-primary" href="<?php echo BASE_URL."index.php?page=admin/edit&tabel=artikel&user=".$row['id'];?>"  role="button">Edit</a>
                    </td>
                    </tr>
                    <?php }
                    ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
                <ul class="pagination ">
                <li <?php if($halamanaktif <=1){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                    <a class="page-link " href="index.php?page=admin/admin&admin=artikel&halaman=<?php echo $halamanaktif-1?>" tabindex="-1">Previous</a>
                    </li>
                
                <?php for($i=$startno; $i<=$endno; $i++):?>
                    <li <?php if($halamanaktif == $i){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                        <a class="page-link" href="index.php?page=admin/admin&admin=artikel&halaman=<?php echo $i;?>">
                        <?php echo $i;?>
                    </a></li>
                <?php  endfor; ?>
                    <li <?php if($halamanaktif >= ($i-1)){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                    <a class="page-link"  href="index.php?page=admin/admin&admin=artikel&halaman=<?php echo $halamanaktif+1?>">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</body>
</html>