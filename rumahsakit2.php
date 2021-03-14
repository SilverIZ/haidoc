

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
<?php

        include_once("fungsi/koneksi.php");
        if(isset($_POST['tombolcari'])){
        $cari = $_POST['cari'];
        $_SESSION['cari'] = $cari;
        }else{
        $cari = isset($_SESSION['cari'])? $_SESSION['cari'] :false;
        }

        $ambildata = mysqli_query($koneksi, "SELECT * FROM rumahsakit WHERE nama_rs LIKE '%$cari%' 
        OR alamat_rs LIKE '%$cari%' OR kota LIKE '%$cari%'");

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

        $ambilperhalaman = mysqli_query($koneksi, "SELECT * FROM rumahsakit WHERE nama_rs LIKE '%$cari%' 
        OR alamat_rs LIKE '%$cari%' OR kota LIKE '%$cari%' LIMIT $dataawal,$jumlahdata");

?>


    <div class="mart">
        <div class="row wiki">
            <div class="col-3"></div>
            <div class="col-6">
                <a href="#"> <img src="image/carirs.png"> </a>
            </div>
        </div>
        <form class="form-inline cari-wiki" action="index.php?page=rumahsakit2" method="POST">
            <div class="input-group mb-6">
                <input type="text" class="form-control" name="cari" value="<?php echo $cari;?>" placeholder="Temukan Rumah Sakit">
                    <div class="input-group-append">
                        <button class="btn btn-primary" name="tombolcari" type="submit">Cari</button>
                    </div>
            </div>
        </form>
        <div class="wiki-content">
            <div class="daftar-wiki">
                <div class="penyakit">
<style>
    .bg-cari-hotel{
    background-color:  #86b817;
    }
    .bg-list-hotel{
        box-shadow: 0px 25px 38px rgba(0,0,0,0.1);
    }

</style>



<body>

<div class="row content-hotel-cari" style="margin-left: 0; margin-right: 0;">
   
    </div>
    <div class="col-12">

    <div class="list-hotel">

        <div class="row">
                        <?php   
                            $id_user = isset ($_GET['iduser']) ? $_GET['iduser'] : false;                                
                            while($row=mysqli_fetch_assoc($ambilperhalaman)){

                                echo "<li style='list-style: none; margin-right:0%;'> <div class='col-12'>";
                                ?>
                                <div class="card bg-list-hotel"  style="width:250px; margin-bottom: 10px;">
                                    <img class="card-img-top" width="200" height="200" <?php echo "src='admin/daftar/rs/".$row['gambar']."'"; ?> alt="Card image" style="width:100%">
                                    <div class="card-body">
                                    <h4 style="font-style: italic;" class="card-title"><?php echo $row['nama_rs'];  ?></h4>
                                    <span style="color: green; font-size: 14px; ">Kota : <?php echo $row['kota']; ?> </span><br>
                                    <p style="color: green; font-size: 14px; ">deskripsi : <?php echo $row['deskripsi']; ?> </span><br>
                                    <p style="font-size: 16px;" class="card-text"> Alamat :<?php echo $row['alamat_rs'] ?> </p>
                                </div>
                                </div>
                                <?php
                              } 
                            ?>
                    </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                    <li <?php if($halamanaktif <=1){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                                        <a class="page-link " href="index.php?page=mart&halaman=<?php echo $halamanaktif-1?>" tabindex="-1">Previous</a>
                                        </li>
                                    
                                    <?php for($i=$startno; $i<=$endno; $i++):?>
                                        <li <?php if($halamanaktif == $i){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                                            <a class="page-link" href="index.php?page=mart&halaman=<?php echo $i;?>">
                                            <?php echo $i;?>
                                        </a></li>
                                    <?php  endfor; ?>
                                        <li <?php if($halamanaktif >= ($i-1)){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                                        <a class="page-link"  href="index.php?page=mart&halaman=<?php echo $halamanaktif+1?>">Next</a>
                                        </li>
                                    </ul>
                                </nav>
    </div>
