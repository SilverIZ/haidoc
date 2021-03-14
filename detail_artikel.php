<?php
include_once("fungsi/koneksi.php");
$id_artikel = isset ($_GET['id_artikel']) ? $_GET['id_artikel'] : false;
$ambil25 = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id='$id_artikel' ");
$row25 = mysqli_fetch_assoc($ambil25);
?>

<div class="baca-artikel">
                
                <div class="gambar-artikel">
                <img  height="210" width="270" <?php echo "src='admin/daftar/artikel/".$row25['gambar']."'"; ?> alt="">
                </div>
                <div>
                    <br>
                    <br>
                <h3 style="font-weight: bolder; text-align: center;" class="text-center"> <?php echo $row25['judul'] ?> </h3>
                </div>
              
                <br>
                <p style="text-align: justify; text-indent: 1cm; font-weight: normal;"> <?php echo $row25['isi_a'] ?><br>
                <?php echo $row25['isi_b'] ?></p>
                </div>