<?php
    session_start();
    include_once("fungsi/helper.php");
    $page = isset ($_GET['page']) ? $_GET['page'] : false;
    
    $id_user = isset($_SESSION['id_user'])? $_SESSION['id_user'] :false;
    $nama_user = isset($_SESSION['nama_user'])? $_SESSION['nama_user'] :false;
    $pangkat = isset($_SESSION['pangkat']) ? $_SESSION['pangkat'] :false;
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link href="css/style.css" type="text/css" rel="stylesheet"/>
    <title>HAIDOC</title>
   
    </head>

    <body >
        <div id="container" class="container-fluid">
            <div id="header">
                    <nav class="navbar navbar-expand-md ">
                        <a class="navbar-brand" href="<?php echo BASE_URL."index.php";?>">
                            <img src="image/logo.png" class="img-fluid"/>
                        </a>
                        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                            <span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="collapsibleNavbar">
                            <ul class="navbar-nav">
                                <li class="nav-item"  >
                                    <a style="font-size: 17px;" <?php if($page == "home"){echo "class='navbar-brand active'";}else{echo "class='navbar-brand'";} ?> href="<?php echo BASE_URL."index.php?page=home&id_artikel=8";?>">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a style="font-size: 17px;" <?php if($page == "Wikipenyakit"){echo "class='navbar-brand active'";}else{echo "class='navbar-brand'";} ?> href="<?php echo BASE_URL."index.php?page=Wikipenyakit";?>">Wiki Penyakit</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a style="font-size: 17px;" <?php if($page == "mart"){echo "class='navbar-brand active'";}else{echo "class='navbar-brand'";} ?> href="<?php if($id_user){echo BASE_URL."index.php?page=mart";}else{echo "index.php?page=login";}?>">Mart</a>
                                </li>
                                <li class="nav-item">
                                    <a  style="font-size: 17px;" <?php if($page == "konsultasi" || $page == "kosultasi_dokter"){echo "class='navbar-brand active'";}else{echo "class='navbar-brand'";} ?> href="<?php echo BASE_URL."index.php?page=konsultasi";?>">Dokter</a>
                                </li>
                                <li class="nav-item">
                                    <a style="font-size: 17px;" <?php if($page == "rumahsakit2"){echo "class='navbar-brand active'";}else{echo "class='navbar-brand'";} ?> href="<?php echo BASE_URL."index.php?page=rumahsakit2";?>">Cari Rumah Sakit</a>
                                </li>
                                <li class="nav-item">
                                    <a style="font-size: 17px;" <?php if($page == "contact_us"){echo "class='navbar-brand active'";}else{echo "class='navbar-brand'";} ?> href="<?php echo BASE_URL."index.php?page=contact_us";?>">Hubungi Kami</a>
                                </li>
                                <li class="nav-item">
                                    <a style="font-size: 17px;" class="navbar-brand" href="pantaucovid.php">Pantau Corona</a>
                                </li>
                                <li class="nav-item">
                                    <a style="font-size: 17px;" <?php if($page == "about"){echo "class='navbar-brand active'";}else{echo "class='navbar-brand'";} ?> href="<?php echo BASE_URL."index.php?page=about";?>">Tentang Kami</a>
                                </li>
                            </ul>
                            <ul class="navbar-nav ">
                                <li class="nav-item dropleft">
                                    <a class="nav-link" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="false">
                                        <img src="image/profil.png" class="img-fluid" /></a>
                                            <div class="dropdown-menu">
                                                <?php 
                                                    if($id_user){
                                                        echo "<a class='dropdown-text' style='margin:2%'><b> Hai, $nama_user</b> </a>";
                                                        if($pangkat=="admin"){
                                                            echo "<a class='dropdown-item' href='".BASE_URL."index.php?page=admin/admin&admin=user'>Dashboard Admin</a>";
                                                        }
                                                        else if($pangkat=="dokter"){
                                                            echo "<a class='dropdown-item' href='".BASE_URL."index.php?page=konsultasi_dokter'>Pesan Client</a>";
                                                        }
                                                        echo "<a class='dropdown-item' href='".BASE_URL."index.php?page=profile'> My Profile</a>";
                                                        echo "<a class='dropdown-item' id='logout' href='".BASE_URL."index.php?page=cart'>Keranjang</a>";
                                                        echo "<a class='dropdown-item' href='".BASE_URL."index.php?page=logout'>Logout</a>";
                                                    }else{
                                                        echo "<a class='dropdown-item' href='".BASE_URL."index.php?page=login'>Login</a>";
                                                        echo "<a class='dropdown-item' href='".BASE_URL."index.php?page=register'> Register</a>";
                                                    }
                                                ?>
                                         </div>
                                    </li>
                                </ul> 
                                </nav>
                            </div>  
                        
                        <!--Start of Tawk.to Script-->
                            <script type="text/javascript">
                                var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
                                (function(){
                                var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                                    s1.async=true;
                                    s1.src='https://embed.tawk.to/5ec920a6c75cbf1769eea677/default';
                                    s1.charset='UTF-8';
                                    s1.setAttribute('crossorigin','*');
                                    s0.parentNode.insertBefore(s1,s0);
                                })();
                            </script>
                        <!--End of Tawk.to Script-->
                </div>
            </div>
            
            
           <div>
           <div id="container-fluid" style="height:auto; min-height:850px">
                <?php
                    $filename = "$page.php";
                    if(file_exists($filename)){
                        include_once($filename);
                    }else{
                        direct(BASE_URL."index.php?page=home&id_artikel=8");
                    }
                ?>
               
                <br><br><br><br>
            </div>
           </div>
        <div class="footer" style="text-align: center;
                padding-top: 0.7rem;
                box-shadow: 5px 2px 3px 7px rgba(0,0,0,0.4);
                margin: 0rem;
                background-image: linear-gradient(to right, #0020dd, #0575E6);
                height: 3.5rem;
                color: #ffffff;">
                <p>Copyright By Haidoc</p>
                
            </div>
           
            
            

    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    
  </body>
  
</html>