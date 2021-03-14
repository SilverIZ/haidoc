
<?php
    $id_user="";
    if($id_user){
        direct(BASE_URL);
    }
?>

<div id="container-user-akses">
        <a href="<?php echo BASE_URL."index.php";?>">
                <img class="mx-auto d-block img-fluid float-md-none" src="image/buatakun2.png"/>
                </a><br/><br/><br/>
    <form action="proses_registrasi.php" method="POST"> 
        <?php
            $notif = isset($_GET['notif']) ? $_GET['notif'] :false;
            $nama_user = isset($_GET['nama_user']) ? $_GET['nama_user'] :false;
            $email = isset($_GET['email']) ? $_GET['email'] :false;
            $alamat = isset($_GET['alamat']) ? $_GET['alamat'] :false;
            $no_hp = isset($_GET['no_hp']) ? $_GET['no_hp'] :false;
            $tinggi = isset($_GET['tinggi']) ? $_GET['tinggi'] :false;
            $berat = isset($_GET['berat']) ? $_GET['berat'] :false;
            $gender = isset($_GET['gender']) ? $_GET['gender'] :false;
            $umur = isset($_GET['umur']) ? $_GET['umur'] :false;
            $id_user = isset($_GET['id_user']) ? $_GET['id_user'] :false;

            if ($notif == "require"){
                echo "<div class='notif'> Maaf, kamu Harus Isi Form Dibawah ini <br></div>";
            }elseif ($notif == "password"){
                echo "<div class='notif'> Maaf, Password Tidak Sama <br></div>";
            }elseif ($notif == "email"){
                echo "<div class='notif'> Maaf, email telah digunakan <br></div>";
            }elseif ($notif == "iduser"){
                echo "<div class='notif'> Maaf, Username telah digunakan <br></div>";
            }
        ?>

        <div class="form-row">
            <div class="form-group col-md">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" value="<?php echo $email; ?>">
            </div>
                <div class="form-group col-md">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md">
                <label for="inputIdUser">Username</label>
                <input type="text" id="name" class="form-control" placeholder="Maks. 10 Karakter" name="id_user" value="<?php echo $id_user; ?>">
            </div>
            <div class="form-group col-md">
                <label for="inputPassword4">Ulangi Password</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="repassword">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputName">Nama Lengkap</label>
                <input type="text" class="form-control" id="inputName" name="nama_user" value="<?php echo $nama_user; ?>">
            </div>
            <div class="form-group col-md-2">
                <label for="inputGender">Jenis Kelamin</label>
                <select id="inputGender" class="form-control" name="gender" value="<?php echo $gender; ?>">
                    <option selected>Laki-Laki</option>
                    <option> Perempuan</option>
                </select>
            </div>
            <div class="form-group col-md-4">
            <label for="inputPhone">Nomor Handphone</label>
                <input type="number" min="1" max="9999999999999"  onkeypress="return hanyaAngka(event)" class="form-control" id="inputPhone" name="no_hp" value="<?php echo $no_hp; ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="inputAddress">Alamat</label>
            <div class="input-group">
                    <textarea class="form-control" id="inputAddress" placeholder="Contoh: Jalan Sesama Nomor 32 Blok.B Perumahan Bumi " name="alamat" aria-label="With textarea"><?php echo $alamat; ?></textarea>
            </div>
        </div>
       
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputHeight">Tinggi Badan(Cm)</label>
                <input type="number" min="1" max="300"  onkeypress="return hanyaAngka(event)" class="form-control" id="inputHeight" placeholder="Contoh: 170" name="tinggi" value="<?php echo $tinggi; ?>">
            </div>

            <div class="form-group col-md-6">
                <label for="inputWeight">Berat Badan(Kg)</label>
                <input  type="number" min="1" max="1000"  onkeypress="return hanyaAngka(event)" class="form-control" id="inputWeight" placeholder="Contoh: 65" name="berat" value="<?php echo $berat; ?>">
            </div>

            <div class="form-group col-md-1">
                <label for="inputAge">Usia</label>
                <input type="number" min="1" max="150"  onkeypress="return hanyaAngka(event)" class="form-control" id="inputAge" name="umur" value="<?php echo $umur; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck" name="janji">
                <label class="form-check-label" for="gridCheck">
                    Saya Setuju Dengan Kebijakan dan Privasi 
                </label>
            </div>
        </div>
        <button type="submit"  class="btn btn-primary btn-lg" >Buat Akun</button>
    </form>
    <script>
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
       
        </script>

</div>