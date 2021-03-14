<?php
    include_once("koneksi.php");
            if(isset($_POST['tombolcari'])){
            $cari = $_POST['cari'];
            $_SESSION['cari'] = $cari;
            }else{
            $cari = isset($_SESSION['cari'])? $_SESSION['cari'] :false;
            }

            $ambildata = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user LIKE '%$cari%' 
                        OR no_hp LIKE '%$cari%' OR nama_user LIKE '%$cari%'OR email LIKE '%$cari%'");

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

            $ambilperhalaman = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user LIKE '%$cari%' 
            OR no_hp LIKE '%$cari%' OR nama_user LIKE '%$cari%'OR email LIKE '%$cari%' LIMIT $dataawal,$jumlahdata");

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
        <h2> TABEL USER</h2>
       
        </div> 
        <a class="btn btn-warning tombol-tambah"  <?php echo "href='".BASE_URL."index.php?page=admin/admin&admin=tambah&tabel=user'"?>  role="button">Tambah</a>
        <br><br>
        <form method="POST" class="form-inline" style="float: inline-end;" action="index.php?page=admin/admin&admin=user">
        <input class="form-control" name="cari" value="<?php echo $cari;?>" type="search" placeholder="Temukan Data">
        <button class="btn btn-primary my-2 my-sm-0" name="tombolcari" type="submit">Cari</button>
        </form>
        <nav aria-label="Page navigation example">
                <ul class="pagination ">
                <li <?php if($halamanaktif <=1){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                    <a class="page-link " href="index.php?page=admin/admin&admin=user&halaman=<?php echo $halamanaktif-1?>" tabindex="-1">Previous</a>
                    </li>
                
                <?php for($i=$startno; $i<=$endno; $i++):?>
                    <li <?php if($halamanaktif == $i){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                        <a class="page-link" href="index.php?page=admin/admin&admin=user&halaman=<?php echo $i;?>">
                        <?php echo $i;?>
                    </a></li>
                <?php  endfor; ?>
                    <li <?php if($halamanaktif >= ($i-1)){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                    <a class="page-link"  href="index.php?page=admin/admin&admin=user&halaman=<?php echo $halamanaktif+1?>">Next</a>
                    </li>
                </ul>
            </nav>
        <table class="table table-responsive">
            <thead>
            <tr>
                <th>No.</th>
                <th>Username  </th>
                <th>Nama  </th>
                <th>Email  </th>
                <th>Usia  </th>
                <th>Berat Badan </th>
                <th>Tinggi Badan </th>
                <th>Alamat </th>
                <th>Jenis Kelamin </th>
                <th>No. Hp  </th>
                <th>Status  </th>
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
                    <td><?php echo $row['id_user'] ?></td>
                    <td><?php echo $row['nama_user'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['umur'] ?></td>
                    <td><?php echo $row['berat'] ?></td>
                    <td><?php echo $row['tinggi'] ?></td>
                    <td><?php echo $row['alamat'] ?></td>
                    <td><?php echo $row['gender'] ?></td>
                    <td><?php echo $row['no_hp'] ?></td>
                    <td><?php echo $row['pangkat'] ?></td>
                    <td>
                        <a class="btn btn-danger" href="<?php echo BASE_URL."index.php?page=admin/admin&admin=hapus&tabel=user&user=".$row['id_user'];?>"role="button">Hapus</a>
                        <a class="btn btn-primary" href="<?php echo BASE_URL."index.php?page=admin/admin&admin=edit&tabel=user&user=".$row['id_user'];?>" role="button">Edit</a>
                    </td>                           
                    </tr>
                    <?php }
                    ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                <li <?php if($halamanaktif <=1){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                    <a class="page-link " href="index.php?page=admin/admin&admin=user&halaman=<?php echo $halamanaktif-1?>" tabindex="-1">Previous</a>
                    </li>
                
                <?php for($i=$startno; $i<=$endno; $i++):?>
                    <li <?php if($halamanaktif == $i){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                        <a class="page-link" href="index.php?page=admin/admin&admin=user&halaman=<?php echo $i;?>">
                        <?php echo $i;?>
                    </a></li>
                <?php  endfor; ?>
                    <li <?php if($halamanaktif >= ($i-1)){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                    <a class="page-link"  href="index.php?page=admin/admin&admin=user&halaman=<?php echo $halamanaktif+1?>">Next</a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>
</body>
</html>