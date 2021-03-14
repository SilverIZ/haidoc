
<?php
            include_once("fungsi/koneksi.php");
            if(isset($_POST['tombolcari'])){
            $cari = $_POST['cari'];
            $_SESSION['cari'] = $cari;
            }else{
            $cari = isset($_SESSION['cari'])? $_SESSION['cari'] :false;
            }

            $ambildata = mysqli_query($koneksi, "SELECT * FROM penyakit WHERE nama_penyakit LIKE '%$cari%' 
            OR gejala LIKE '%$cari%' OR deskripsi LIKE '%$cari%'OR pengobatan LIKE '%$cari%'");

            //konfig
                $jumlahdata=5;
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

            $ambilperhalaman = mysqli_query($koneksi, "SELECT * FROM penyakit WHERE nama_penyakit LIKE '%$cari%' 
            LIMIT $dataawal,$jumlahdata");

?>


    <style>
     .wiki-content{
         border-color: #6bcdfd;
         border-style: solid;
         border-radius: 15px;
         margin: 5%;
         padding: 2%;
     }
     .penyakit{
        border-color: #0000;
         border-style: solid;
         border-radius: 15px;
         background-color: white;
         margin: 5%;
         padding: 2%;
     }
     .wiki{
         margin: 5%;
     }
     .cari-wiki{
         display: block;
         margin-left: 15%;
         margin-right: 15%;
     }

    </style>
    <div class="wikipenyakit">
        <div class="row wiki">
            <div class="col-3"></div>
            <div class="col-6">
                <a href="#"> <img src="image/wiki2.png"> </a>
            </div>
        </div>
        <form class="form-inline cari-wiki" action="index.php?page=Wikipenyakit" method="POST">
            <div class="input-group mb-6">
                <input type="text" class="form-control" name="cari" value="<?php echo $cari;?>"  placeholder="Temukan Info Penyakit">
                    <div class="input-group-append">
                        <button class="btn btn-primary" name="tombolcari" type="submit">Cari</button>
                    </div>
            </div>
        </form>
       

            <?php
                $nomor=0 + $dataawal;
                    while($row = mysqli_fetch_assoc($ambilperhalaman)){
                        $nomor++;
                        ?> <div class="wiki-content">
                                    <div class="daftar-wiki">
                <div class="penyakit"> 
                    <h1 style="font-size:3vw;"><?php echo $row['nama_penyakit'] ?></h1>
                    <p style="font-size:1.2vw;">Deskripsi : <?php echo $row['deskripsi'] ?><br></p> 
                    <p style="font-size:1.2vw;">Gejala : <?php echo $row['gejala'] ?><br></p> 
                    <p style="font-size:1.2vw;">Pencegahan : <?php echo $row['pencegahan'] ?><br></p> 
                    <p style="font-size:1.2vw;">Pengobatan : <?php echo $row['pengobatan'] ?></p> 

                </div></div></div>
                <?php }
                    ?>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                <li <?php if($halamanaktif <=1){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                    <a class="page-link " href="index.php?page=Wikipenyakit&halaman=<?php echo $halamanaktif-1?>" tabindex="-1">Previous</a>
                    </li>
                
                <?php for($i=$startno; $i<=$endno; $i++):?>
                    <li <?php if($halamanaktif == $i){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                        <a class="page-link" href="index.php?page=Wikipenyakit&halaman=<?php echo $i;?>">
                        <?php echo $i;?>
                    </a></li>
                <?php  endfor; ?>
                    <li <?php if($halamanaktif >= ($i-1)){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                    <a class="page-link"  href="index.php?page=Wikipenyakit&halaman=<?php echo $halamanaktif+1?>">Next</a>
                    </li>
                </ul>
            </nav>
        
    </div>
