<?php
    if($id_user){
        direct(BASE_URL);
    }
    $notif = isset($_GET['notif']) ? $_GET['notif'] :false;

    if ($notif == true){
    echo "<div class='notif '> Email / Password Salah <br></div>";
}
?>

<div class="col-md-4 col-md-offset-4 form-login">
    <div class="outter-form-login">
        <div class="logo-login">
            <em class="glyphicon glyphicon-user"></em>
        </div>
        <form action="proses_login.php" method="post">
            <h3 class="text-center title-login" style="color: black;">LOGIN MEMBER </h3>
            <br>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Email" name="email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>           
            <input type="submit" class="btn btn-block" style="background: #c9f05d" value="LOGIN" />           
            <div class="text-center" >
                <a class="btn" style="color: red;" href="<?php echo BASE_URL."index.php?page=lupapw";?>">Forgot Password ?</a>
            </div>
            <div class="text-center" >
            <a style="color: black;">Belum Punya Akun?</a>
                <a class="btn" style="margin-bottom:1%; padding-left:0%; color: blue;" href="<?php echo BASE_URL."index.php?page=register";?>">Daftar<a>
            </div>
        </form>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
