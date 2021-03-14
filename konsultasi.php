<?php
    //session_start();
    if (!isset($_SESSION['id_user']))
    {
        direct(BASE_URL."/index.php?page=login");  
    }
    if ($_SESSION['pangkat']=='dokter')
    {
        direct(BASE_URL."/index.php?page=konsultasi_dokter");  
    }
    
    ?>
<link href="css/konsultasi.css" type="text/css" rel="stylesheet"/>
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

</style>
    <div class="row">
    
      <div class="col-md-6">
        <div class="chat">
            <div class="inner">
            
                     <h3 > Ajukan Pertanyaan </h3>
                 
                <form action="proses_konsultasi.php" method="POST"> 
                    <?php
                        $notif = isset($_GET['notif']) ? $_GET['notif'] :false;
                        $nama = isset($_SESSION['id_user']) ? $_SESSION['id_user'] :false;
                        $email = isset($_GET['email']) ? $_GET['email'] :false;
                        $pertanyaan = isset($_GET['pertanyaan']) ? $_GET['pertanyaan'] :false;
                        $topik = isset($_GET['topik']) ? $_GET['topik'] :false;
                        

                    ?>

     
                <div class="form-group ">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                </div>
     
        
                <div class="form-group ">
                    <label for="inputTopik">Topik</label>
                    <input type="text" class="form-control" id="topik" name="topik" value="<?php echo $topik; ?>">
                </div>
  
        
               <div class="form-group ">
                <label for="inputPertanyaan">Pertanyaan</label>
                <div class="input-group">
                        <textarea class="form-control" id="pertanyaan" placeholder="Masukkan Pertanyaan " name="pertanyaan" aria-label="With textarea"><?php echo $pertanyaan; ?></textarea>
                </div>
                </div>
       
                 <button type="submit" class="btn btn-primary btn-lg" >Kirim</button>
                 </form>
            </div>
            </div>
        </div>

<div id="container-user-akses2" class="col-md-6">
<div class="chat3">
<h3> Daftar Pertanyaan Anda & Balasan</h3><br>
    <?php include 'notif_konsultasi.php' ?>
    <?php 
    while ($row = mysqli_fetch_array($query))
    { 
    ?>
    <div class="chat2">
    <h6 style="color:black"> Waktu : <?php echo $row['waktu'] ?> </h6>
    <h5 style="color:black"> Nama : <?php echo $row['nama'] ?> </h5>
    <h5 style="color:black"> Topik : <?php echo $row['topik'] ?> </h5>
    <p style="color:black"> Pertanyaan : <?php echo $row['pertanyaan'] ?> </p>
    </div>
    <br>
    <?php
    }
    ?>
    </div>


</div>
</div>

<div class="chat2">
<h3> Daftar Balasan Anda </h3>
            <?php include 'notif_balasan.php' ?>
    <div class="row">
            <?php 
            while ($row = mysqli_fetch_array($query))
            { 
            ?>
            <div class="chat3" >
            <h6 style="color:black"> Waktu : <?php echo $row['waktu'] ?> </h6>
            <h5 style="color:black"> Nama Dokter : <?php echo $row['dokter'] ?> </h5>
            <h5 style="color:black"> Topik : <?php echo $row['topik'] ?> </h5>
            <p style="color:black"> Balasan : <?php echo $row['balasan'] ?> </p>
            </div>
            <?php
            }
            ?>
    </div>

</div>
