<?php
    //session_start();
    if (!isset($_SESSION['id_user']))
    {
        direct(BASE_URL."/index.php?page=login");  
    }
    
    
    
    ?>
<style>
    body {
        background-image: linear-gradient(to right, #0020dd, #0575E6);;   
    }
    .chat {
	background-image: linear-gradient(to right, #0020dd, #0575E6);;
	padding: 50px 20px;
	-webkit-box-shadow: 0px 5px 20px -5px rgba(0, 0, 0, 0.3);
	box-shadow: 0px 5px 20px -5px rgba(0, 0, 0, 0.3);
    border-radius: 4px;
    }
    .chat2 {
	background-image: linear-gradient(to right, silver, white);;
	padding: 50px 20px;
	-webkit-box-shadow: 0px 5px 20px -5px rgba(0, 0, 0, 0.3);
	box-shadow: 0px 5px 20px -5px rgba(0, 0, 0, 0.3);
    border-radius: 4px;
    }
    .chat3 {
	background-image: linear-gradient(to right, white, white);;
	padding: 50px 20px;
	-webkit-box-shadow: 0px 5px 20px -5px rgba(0, 0, 0, 0.3);
	box-shadow: 0px 5px 20px -5px rgba(0, 0, 0, 0.3);
    border-radius: 4px;
    }
}
</style>
<div class="row">
    <div class="col-md-6">
        <div class="chat3">
            <h3> Daftar Pertanyaan </h3>
            <?php include 'notif_konsultasi_dokter.php' ?>
            <?php 
            while ($row = mysqli_fetch_array($query))
            { 
            ?>
            <div class="chat2">
            <h6 style="color:black"> Waktu : <?php echo $row['waktu'] ?> </h6>
            <h5 style="color:black"> Nama : <?php echo $row['nama'] ?> </h5>
            <h6 style="color:black"> Gender & Usia : <?php echo $row['gender'] ?> - <?php echo $row['umur'] ?> Tahun </h6>
            <h6 style="color:black"> Tinggi & Berat : <?php echo $row['tinggi'] ?> cm - <?php echo $row['berat'] ?> kg </h6>
            <h5 style="color:black"> Topik : <?php echo $row['topik'] ?> </h5>
            <p style="color:black"> Pertanyaan : <?php echo $row['pertanyaan'] ?> </p>
            </div>
                <br>
            <?php
            }
            ?>
            
        </div>
    </div>
    <div id="container-user-akses2" class="col-md-6">
        <div class="chat">
             <h3> Balas Pertanyaan</h3><br>
            <form action="proses_konsultasi_dokter.php" method="POST"> 
            <?php
                $notif = isset($_GET['notif']) ? $_GET['notif'] :false;
                $dokter = isset($_SESSION['id_user']) ? $_SESSION['id_user'] :false;
                $nama = isset($_GET['nama']) ? $_GET['nama'] :false;
                $balasan = isset($_GET['balasan']) ? $_GET['balasan'] :false;
                $topik = isset($_GET['topik']) ? $_GET['topik'] :false;
                

            ?>

        
                <div class="form-group ">
                    <label for="nama">Ke</label>
                    <input type="text" class="form-control" id="nama" placeholder="isi nama user tujuan" name="nama" value="<?php echo $nama; ?>">
                </div>
        
            
                <div class="form-group ">
                    <label for="inputTopik">Topik</label>
                    <input type="text" class="form-control" id="topik" name="topik" value="<?php echo $topik; ?>">
                </div>
    
            
            <div class="form-group ">
                <label for="inputPertanyaan">Balasan</label>
                <div class="input-group">
                        <textarea class="form-control" id="balasan" placeholder="Isi balasan " name="balasan" aria-label="With textarea"><?php echo $balasan; ?></textarea>
                </div>
            </div>
        
            <button type="submit" class="btn btn-primary btn-lg" >Kirim</button>
        </form> 

</div>
</div>
</div>

<div class="chat3">
<h3> Daftar Balasan Anda </h3>
            <?php include 'notif_balasan_dokter.php' ?>
    <div class="row">
            <?php 
            while ($row = mysqli_fetch_array($query))
            { 
            ?>
            <div class="chat2">
            <h6 style="color:black"> Waktu : <?php echo $row['waktu'] ?> </h6>
            <h5 style="color:black"> Nama : <?php echo $row['nama'] ?> </h5>
            <h5 style="color:black"> Topik : <?php echo $row['topik'] ?> </h5>
            <p style="color:black"> Balasan : <?php echo $row['balasan'] ?> </p>
            </div>
            <?php
            }
            ?>
    </div>

</div>