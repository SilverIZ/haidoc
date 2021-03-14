
  <?php 
  include 'profile_fungsi.php';


  if (!isset($_SESSION['id_user']))
  {
      direct(BASE_URL."/index.php?page=login");  
  }
  while ($row = mysqli_fetch_array($query))
  { 
  ?>  
</head>

<style>

  /* Profile container */
  body {
	background-image: linear-gradient(to right, #0020dd, #0575E6);
  }
  .profile {
	margin: 20px 0;
  }
  
  /* Profile sidebar */
  .profile-sidebar {
	padding:80px 0 10px 0;
	background: #fff;
	-webkit-box-shadow: 0px 5px 20px -5px rgba(0, 0, 0, 0.3);
	box-shadow: 0px 5px 20px -5px rgba(0, 0, 0, 0.3);
	border-radius: 4px;
  }
  
  .profile-userpic img {
	float: none;
	margin: 0 auto;
	width: 50%;
	height: 50%;
	-webkit-border-radius: 50% !important;
	-moz-border-radius: 50% !important;
	border-radius: 50% !important;
  }
  
  .profile-usertitle {
	text-align: center;
	margin-top: 20px;
  }
  
  .profile-usertitle-name {
	color: #5a7391;
	font-size: 16px;
	font-weight: 600;
	margin-bottom: 7px;
  }
  
  .profile-usertitle-job {
	color: #5b9bd1;
	font-size: 12px;
	font-weight: 600;
	margin-bottom: 15px;
  }
  
  .profile-userbuttons {
	text-align: center;
	margin-top: 10px;
  }
  
  .profile-userbuttons .btn {
	text-transform: uppercase;
	font-size: 11px;
	font-weight: 600;
	padding: 6px 15px;
	margin-right: 5px;
  }
  
  .profile-userbuttons .btn:last-child {
	margin-right: 0px;
  }
	  
  .profile-usermenu {
	margin-top: 30px;
  }
  
  .profile-usermenu ul li {
	border-bottom: 1px solid #f1f7f0;
  }
  
  .profile-usermenu ul li:last-child {
	border-bottom: none;
  }
  
  .profile-usermenu ul li a {
	color: #94b593;
	font-size: 14px;
	font-weight: 400;
  }
  
  .profile-usermenu ul li a i {
	margin-right: 8px;
	font-size: 14px;
  }
  
  .profile-usermenu ul li a:hover {
	background-color: #fafcfd;
	color: #6fd15b;
  }
  
  .profile-usermenu ul li.active {
	border-bottom: none;
  }
  
  .profile-usermenu ul li.active a {
	color: #73d15b;
	background-color: #f6f9fb;
	border-left: 2px solid #69d15b;
	margin-left: -2px;
  }
  
  /* Profile Content */
  .profile-content {
	padding: 20px;
	background: #fff;
	-webkit-box-shadow: 0px 5px 20px -5px rgba(0, 0, 0, 0.3);
	box-shadow: 0px 5px 20px -5px rgba(0, 0, 0, 0.3);
	border-radius: 4px;
	min-height: 460px;
  }
  .profile-content .form-label {
	display: inline-block;
	color: rgb(112, 114, 112);
	font-weight: 700;
	margin-bottom: 6px;
	margin-left: 7px;
}
.profile-content h1 {
	font-size: 30px;
	color: rgb(207, 214, 203);
	font-weight: 70;
}

.profile-content p {
	font-size: 16px;
	color: rgb(124, 124, 124);
}
.profile-content .submit-btn {
	left: 1000%;
	display: inline-block;
	color: #fff;
	background-color: #36df44;
	font-weight: 700;
	padding: 14px 30px;
	border-radius: 4px;
	border: none;
	-webkit-transition: 0.2s all;
	transition: 0.2s all;
}

.profile-content .submit-btn:hover,
.profile-content .submit-btn:focus {
	opacity: 0.9;
}


</style>
<div>
<div class="container">
        <div class="row profile">
            <div class="col-md-3">
                <div class="profile-sidebar ">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic ">
                        <img style="margin-left: 23%;" src="image/profil.png" class="img-responsive" alt="">
                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    
                    <div class="profile-usertitle">
                      <form action="#">
                          <label for="fname">Username</label>
                          <input type="text" class="form-control" readonly value= "<?php echo $row['id_user'] ?>"  name="judul">

                          <label for="lname">Nama</label>
                          <input type="text" class="form-control" readonly  name="penulis" value="<?php echo $row['nama_user'] ?>">
                      </form>
                    
                        
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <div class="profile-userbuttons">
                    <a href="index.php?page=home" class="btn btn-danger btn-userbtn-block">
                      Kembali
                    </a>
                    </div>
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul class="nav">
                            
                        </ul>
                    </div>
                    <!-- END MENU -->
                </div>
            </div>
            <div class="col-md-9">
                <div class="profile-content">
                    <h1 class="text-center" style="color: black; font-weight:bolder;">Profil <?php echo $row['pangkat'] ?></h1>
                    <form action="profile_perbarui.php" method="POST">  
                    <div class="form-group">
                            <span class="form-label">Nama</span>
                            <input class="form-control" type="text" name="nama_user" value="<?php echo $row['nama_user'] ?>">
                    </div>
                    <div class="form-group">
                            <span class="form-label">Alamat</span>
                            <input class="form-control" type="text" name="alamat" value="<?php echo $row['alamat'] ?>">
                    </div>
                    <div class="form-group">
                            <span class="form-label">No HP</span>
                            <input class="form-control" type="text" name="no_hp" value="<?php echo $row['no_hp'] ?>">
                             </div>
                    <div class="form-group">
                            <span class="form-label">Tinggi</span>
                            <input class="form-control" type="text" name="tinggi" value="<?php echo $row['tinggi'] ?>">
                             </div>
                    <div class="form-group">
                            <span class="form-label">Berat</span>
                            <input class="form-control" type="text" name="berat" value="<?php echo $row['berat'] ?>">
                    </div>
                    <div class="form-group">
                            <span class="form-label">Umur</span>
                            <input class="form-control" type="text" name="umur" value="<?php echo $row['umur'] ?>">
                    </div>
                    <div class="form-btn">
                            <button class="submit-btn" type="submit" name="submit">Simpan Rincian profile</button>
                    </div>
                    </form>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    }
    ?>
</div>