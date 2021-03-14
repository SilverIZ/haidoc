<!DOCTYPE html>
<html lang="en">

<head>
	
	<title>kontak haidoc</title>

	


</head>
<style>
	.section {
	position: relative;
	height: 100vh;
}

.section .section-center {
	position: absolute;
	top: 50%;
	left: 0;
	right: 0;
	-webkit-transform: translateY(-50%);
	transform: translateY(-50%);
}

#booking {
	font-family: 'Montserrat', sans-serif;
	background-image: linear-gradient(to right, #0020dd, #0575E6);
	background-size: cover;
	background-position: center;
}

#booking::before {
	content: '';
	position: absolute;
	left: 0;
	right: 0;
	bottom: 0;
	top: 0;
	background: rgba(95, 255, 95, 0.616);
}

.booking-form {
	background-image: linear-gradient(to right, #0020dd, #0575E6);
	padding: 50px 20px;
	-webkit-box-shadow: 0px 5px 20px -5px rgba(0, 0, 0, 0.3);
	box-shadow: 0px 5px 20px -5px rgba(0, 0, 0, 0.3);
	border-radius: 4px;
}

.booking-form .form-group {
	position: relative;
	margin-bottom: 30px;
}

.booking-form .form-control {
	background-color: #ebecee;
	border-radius: 4px;
	border: none;
	height: 40px;
	-webkit-box-shadow: none;
	box-shadow: none;
	color:rgba(0, 0, 0, 0.616);
	font-size: 14px;
}


.booking-form select.form-control+.select-arrow {
	position: absolute;
	right: 0px;
	bottom: 4px;
	width: 32px;
	line-height: 32px;
	height: 32px;
	text-align: center;
	pointer-events: none;
	color: rgba(255, 0, 0, 0.3);
	font-size: 14px;
}

.booking-form select.form-control+.select-arrow:after {
	content: '\279C';
	display: block;
	-webkit-transform: rotate(90deg);
	transform: rotate(90deg);
}

.booking-form .form-label {
	display: inline-block;
	color: rgb(8, 216, 8);
	font-weight: 700;
	margin-bottom: 6px;
	margin-left: 7px;
}

.booking-form .submit-btn {
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

.booking-form .submit-btn:hover,
.booking-form .submit-btn:focus {
	opacity: 0.9;
}

.booking-cta {
	margin-top: 80px;
	margin-bottom: 30px;
}
.booking-cta h1 {
	font-size: 52px;
	text-transform: uppercase;
	color: #fff;
	font-weight: 700;
}

.booking-cta p {
	font-size: 16px;
	color: rgb(255, 255, 255);
}
.notif {
            background: red;
            color: white;
            padding: 1%;
            border-radius: 15px;
            text-align: center;
            width: 40%;
            margin-left: 30%;
            margin-bottom: 3%;
            box-shadow: 3px 5px 2px rgba(0,0,0,0.4);
        }
</style>

<body>
<?php
$notif = isset($_GET['notif']) ? $_GET['notif'] :false;
                $nama = isset($_GET['nama']) ? $_GET['nama'] :false;
                $email = isset($_GET['email']) ? $_GET['email'] :false;
                $no_hp = isset($_GET['no_hp']) ? $_GET['no_hp'] :false;
                $pesan = isset($_GET['pesan']) ? $_GET['pesan'] :false;

				if ($notif == "requiere"){
                    echo "<div class='notif'> Maaf, kamu Harus Isi Data yang Ingin ditambahkan <br></div>";
				}
				else if($notif == "success"){
					echo "<div class='notif'> Pesan berhasil dikirim <br></div>";
				
				}
				
				?>

	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-md-push-5">
						<div class="booking-cta">
							<h1>Contact us</h1>
							<p>Tim Haidoc<br><br>
								Jl. H.S Ronggowaluyo kel.Puserjaya kec.Telukjambe Timur kab. Karawang prov. Jawa barat<br>
								email : Support@haidoc.my.com<br>
								call  : +62 242 009 1234
							</p>
						</div>
					</div>
					<div class="col-md-4 col-md-pull-7">
						<div class="booking-form">
							<form action="prosescontact.php" method="post">
								<div class="form-group">
									<span class="form-label">Name</span>
									<input class="form-control" type="text" name="nama" placeholder="Massukan Nama Anda">
								</div>
								<div class="form-group">
									<span class="form-label">Email</span>
									<input class="form-control" type="email" name="email" placeholder="Massukan Email Anda">
								</div>
								<div class="form-group">
									<span class="form-label">Phone</span>
									<input class="form-control" type="text" name="no_hp" placeholder="Massukan No Hp Anda">
								</div>
								<div class="form-group">
									<span class="form-label">Message</span>
									<textarea class="form-control" type="text-area" name="pesan" placeholder="Massukan Keluhan Anda" style="height:100px;"></textarea>
								</div>
								<div class="form-btn">
									<button class="submit-btn" type="submit" name="submit">SEND</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>