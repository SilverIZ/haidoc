<style>
    .gambar-artikel{
   
    background-repeat: no-repeat;
    background-size: 100%,100%;
    margin-left: auto;
    margin-right: auto;
    height: 200px;
    width: 200px;
    }
    .baca-artikel{
    padding: 2%;
    }
    .daftar-artikel{
    margin-right: 30%;
    width: auto;
    }
    .list-group-item {
    color: rgb(6, 6, 6);
    }
    .carousel-inner img {
    width: 100%;
    height: 100%;
    }

</style>
<?php
$id_artikel = isset ($_GET['id_artikel']) ? $_GET['id_artikel'] : false;
        include_once("fungsi/koneksi.php");
        if(isset($_POST['tombolcari'])){
        $cari = $_POST['cari'];
        $_SESSION['cari'] = $cari;
        }else{
        $cari = isset($_SESSION['cari'])? $_SESSION['cari'] :false;
        }

        $ambildata = mysqli_query($koneksi, "SELECT * FROM artikel WHERE  judul LIKE '%$cari%' 
        OR penulis LIKE '%$cari%' OR isi_a LIKE '%$cari%' ");

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
        OR penulis LIKE '%$cari%' OR isi_a LIKE '%$cari%' LIMIT $dataawal,$jumlahdata");
?>

<div class="slider-gambar" >
        <div id="demo" class="carousel slide" style="margin-left:10%; margin-right:10%; margin-top:2%;" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img  src="image/slide2.jpg" alt="Los Angeles">
                <div class="carousel-caption">
                </div>
            </div>
            <div class="carousel-item">
                <img src="image/slide.png" alt="Chicago">
                <div class="carousel-caption">
                </div>
            </div>
            <div class="carousel-item">
                <img src="image/poster2.jpg" alt="New York">
                <div class="carousel-caption">
                </div>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
        </a>
</div>
<br><br>
<div class="artikel-show">
    <div class="row">
        <div class="col-8" style="text-align:center;">
        <?php 
        include_once("detail_artikel.php") 
        ?>
            
        </div>
        <div class="col-4">
            <div class="daftar-artikel">
                <div class="list-group">
               <?php while($row=mysqli_fetch_assoc($ambilperhalaman)){?>
                    <a href="<?php echo BASE_URL."index.php?page=home&id_artikel=".$row['id']; ?>" class="list-group-item list-group-item-action">
                    <img class="img-fluid" <?php echo "src='admin/daftar/artikel/".$row['gambar']."'"; ?> alt=" image"><p style="font-size:1vw;"><?php echo $row['judul'];?></p></a>
                    <?php  
                            } 
                            ?>
                                <nav aria-label="Page navigation example" style="margin-left:50%;" class="table-responsive mb-4">
                                    <ul class="pagination justify-content-center mb-0">
                                    <li <?php if($halamanaktif <=1){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                                        <a class="page-link " href="index.php?page=home&halaman=<?php echo $halamanaktif-1?>&id_artikel=7" tabindex="-1">Previous</a>
                                        </li>
                                    
                                    <?php for($i=$startno; $i<=$endno; $i++):?>
                                        <li <?php if($halamanaktif == $i){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                                            <a class="page-link" href="index.php?page=home&halaman=<?php echo $i;?>&id_artikel=7">
                                            <?php echo $i;?>
                                        </a></li>
                                    <?php  endfor; ?>
                                        <li <?php if($halamanaktif >= ($i-1)){echo "class='page-item disabled'";}else{echo "class='page-item'";} ?>>
                                        <a class="page-link"  href="index.php?page=home&halaman=<?php echo $halamanaktif+1?>&id_artikel=7">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                </div> 

            </div>
        </div>
    </div>
</div>

