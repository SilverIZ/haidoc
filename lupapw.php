<?php
    if($id_user){
        direct(BASE_URL);
    }
    $notif = isset($_GET['notif']) ? $_GET['notif'] :false;
    $email = isset($_GET['email']) ? $_GET['email'] :false;
    $id_user = isset($_GET['id_user']) ? $_GET['id_user'] :false;
    

    if ($notif == "require"){
    echo "<div class='notif '> Lengkapi Form <br></div>";
    }elseif($notif=="kosong"){
        echo "<div class='notif '> Akun Tidak ditemukan <br></div>";
    }elseif($notif=="password"){
        echo "<div class='notif '> Password Tidak Sama <br></div>";
    }
?>
<div class="col-md-4 col-md-offset-4 form-login">
    <div class="outter-form-login">
        <div class="logo-login">
            <em class="glyphicon glyphicon-user"></em>
        </div>
        <form action="proses_lupa.php" method="post">
            <h3 class="text-center title-login" style="color: black;">Masukan Email dan Username Akun Anda </h3>
            <br>
            <div class="form-group">
                <input type="text" class="form-control" value="<?php echo $email; ?>" placeholder="Email" name="email">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" value="<?php echo $id_user; ?>" placeholder="Username" name="id_user">
            </div> 
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password Baru" name="password">
            </div> 
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Ulangi Password Baru" name="repassword">
            </div>           
            <input type="submit" class="btn btn-block" style="background: #c9f05d" value="PERBARUI PASSWORD" />           
        </form>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
