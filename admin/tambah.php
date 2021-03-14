<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="tambah-data-admin">
    <?php 
        
        $tabel = isset ($_GET['tabel']) ? $_GET['tabel'] : false;
if($tabel=="user"){ ?>
        <div class="form-tambah-user">
            <div>
                <br>
                <br>
                <h2 class="text-center" style="font-weight: bolder;">MASUKAN DATA USER YANG INGIN DITAMBAHKAN</h2>
                <br>
            </div>
        <form  action="admin/simpan.php" style="padding: 1px;" method="POST">
        <div class="row">


        </div>
            <?php
                $notif = isset($_GET['notif']) ? $_GET['notif'] :false;
                $nama_user = isset($_GET['nama_user']) ? $_GET['nama_user'] :false;
                $email = isset($_GET['email']) ? $_GET['email'] :false;
                $alamat = isset($_GET['alamat']) ? $_GET['alamat'] :false;
                $gender = isset($_GET['gender']) ? $_GET['gender'] :false;
                $no_hp = isset($_GET['no_hp']) ? $_GET['no_hp'] :false;
                $umur = isset($_GET['umur']) ? $_GET['umur'] :false;
                $berat = isset($_GET['berat']) ? $_GET['berat'] :false;
                $tinggi = isset($_GET['tinggi']) ? $_GET['tinggi'] :false;
                $status = isset($_GET['status']) ? $_GET['status'] :false;
                $id_user = isset($_GET['id_user']) ? $_GET['id_user'] :false;

                if ($notif == "requiere"){
                    echo "<div class='notif'> Maaf, kamu Harus Isi Semua Data yang Ingin ditambahkan <br></div>";
                }elseif ($notif == "email"){
                    echo "<div class='notif'> Maaf, email sudah ada <br></div>";
                }elseif ($notif == "iduser"){
                    echo "<div class='notif'> Maaf, sudah ada <br></div>";
                }
            ?>
            <div>
            <table class="table-responsive">
                    <thead>
                    <tr>
                        <th>Username  </th>
                        <th>Nama  </th>
                        <th>Email  </th>
                        <th>Usia  </th>
                        <th>Berat Badan </th>
                        <th>Tinggi Badan </th>
                        <th>Alamat  </th>
                        <th>Jenis Kelamin  </th>
                        <th>No. Hp   </th>
                        <th>Status   </th>
                        <th>Password   </th>
                    </tr>
                </thead>
                <tbody>
                    <tr> 
                        <td>
                            <input type="text" class="form-control" value="<?php echo $id_user; ?>"  placeholder="Username" name="id_user">
                            </td>
                        <td>
                            <input type="text" class="form-control" placeholder="Nama" name="nama_user" value="<?php echo $nama_user; ?>">
                            </td>
                        <td>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" value="<?php echo $email; ?>">
                            </td>
                        <td>
                            <input type="text" min="1" max="150"  onkeypress="return hanyaAngka(event)" class="form-control" id="inputZip" name="umur" value="<?php echo $umur; ?>">
                            </td>
                        <td>
                            <input type="text" min="1" max="1000"  onkeypress="return hanyaAngka(event)" class="form-control" id="inputZip" name="berat" value="<?php echo $berat; ?>">
                            </td>
                        <td>
                            <input type="text" min="1" max="300"  onkeypress="return hanyaAngka(event)" class="form-control" id="inputZip" name="tinggi" value="<?php echo $tinggi; ?>">
                            </td>
                        <td>
                            <textarea type="text" class="form-control" id="inputZip" name="alamat"><?php echo $alamat; ?></textarea>
                            </td>
                        <td>
                            <select id="inputState" class="form-control" name="gender">
                                    <option  <?php if($gender=="Laki-Laki"){echo "selected";}  ?>>Laki-Laki</option>
                                    <option  <?php if($gender=="Perempuan"){echo "selected";}  ?>>Perempuan</option>
                                </select>
                            </td>                         
                        
                        <td>
                            <input type="text" min="1" max="9999999999999"  onkeypress="return hanyaAngka(event)" class="form-control" id="inputZip" name="no_hp" value="<?php echo $no_hp; ?>">
                            </td>
                        <td>
                            <select id="inputState" class="form-control" name="status" value="<?php echo $status; ?>">
                                    <option>pengguna</option>
                                    <option>dokter</option>
                                    <option>admin</option>
                                </select>
                            </td>  
                        <td>
                            <input type="password" class="form-control" id="inputZip" name="password" >
                            </td>
                        <td>
                        <button type="submit" name="simpan" value="user" class="btn btn-warning" >Input</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
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
    <?php
}elseif($tabel=="barang"){
        ?>
        <div class="tambah-barang-admin">
        <div class="form-tambah-user">
            <div>
                <br>
                <br>
                <h2 class="text-center" style="font-weight: bolder;">MASUKAN DATA BARANG YANG INGIN DITAMBAHKAN</h2>
                <br>
            </div>
        <form action="admin/simpan.php" style="padding: 1px;" enctype="multipart/form-data" method="POST">
        <div class="row">


        </div>
            <?php
                 $notif = isset($_GET['notif']) ? $_GET['notif'] :false;
                 $nama_barang = isset($_GET['nama_barang']) ? $_GET['nama_barang'] :false;
                 $harga = isset($_GET['harga']) ? $_GET['harga'] :false;
                 $stok = isset($_GET['stok']) ? $_GET['stok'] :false;
                 $gambar = isset($_GET['gambar']) ? $_GET['gambar'] :false;
                 $keterangan = isset($_GET['keterangan']) ? $_GET['keterangan'] :false;
                 $status = isset($_GET['status']) ? $_GET['status'] :false;
                
                if ($notif == "requiere"){
                    echo "<div class='notif'> Maaf, kamu Harus Isi Semua Data yang Ingin ditambahkan <br></div>";
                }elseif($notif=="ukuran"){
                    echo "<div class='notif'> Maaf, Gambar Kamu Terlalu Besar <br></div>";
                }elseif($notif=="format"){
                    echo "<div class='notif'> Maaf, Gambar Kamu Tidak Sesuai Format <br></div>";
                }
            ?>
            <div>
            <table class="table-responsive">
                    <thead>
                    <tr>
                        <th>Nama Barang  </th>
                        <th>Stok  </th>
                        <th>Harga  </th>
                        <th>Status </th>
                        <th>Keterangan </th>
                        <th>gambar </th>
                    </tr>
                </thead>
                <tbody>
                    <tr> 
                        <td>
                            <input type="text" class="form-control" value="<?php echo $nama_barang; ?>"  name="nama_barang">
                            </td>
                        <td>
                            <input type="text" min="1" max="50"  onkeypress="return hanyaAngka(event)" placeholder="Cth : 50" name="stok" value="<?php echo $stok; ?>">
                            </td>
                        <td>
                            <input type="text" min="1" max="9999999999999"  onkeypress="return hanyaAngka(event)" placeholder="Cth: 50000" name="harga" value="<?php echo $harga; ?>">
                            </td>
                        <td>
                            <select id="inputState" class="form-control" name="status">
                                    <option>ON</option>
                                    <option>OFF</option>
                                </select>
                            </td>   
                        <td>
                            <input type="text" class="form-control" id="inputZip" name="keterangan" value="<?php echo $keterangan; ?>">
                            </td>
                        <td>
                            <div>
                                <p>Hanya JPG atau PNG Maks. 700Kb</p>
                                <input type="file"  name="gambar">
                            </div>
                        <td>
                        <button type="submit" name="simpan" value="barang" class="btn btn-warning" >Input</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
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

        </div>
        <?php 
}elseif($tabel=="artikel"){
    ?>
             <div class="tambah-artikel-admin">
                <div>
                <br>
                <br>
                <h2 class="text-center" style="font-weight: bolder;">MASUKAN DATA ARTIKEL YANG INGIN DITAMBAHKAN</h2>
                <br>        
        </div>
            <?php
                 $notif = isset($_GET['notif']) ? $_GET['notif'] :false;
                 $id_artikel = isset($_GET['id_artikel']) ? $_GET['id_artikel'] :false;
                 $judul = isset($_GET['judul']) ? $_GET['judul'] :false;
                 $gambar = isset($_GET['gambar']) ? $_GET['gambar'] :false;
                 $isi_a = isset($_GET['isi_a']) ? $_GET['isi_a'] :false;
                 $isi_b = isset($_GET['isi_b']) ? $_GET['isi_b'] :false;
                 $penulis = isset($_GET['penulis']) ? $_GET['penulis'] :false;
                 $tahun = isset($_GET['tahun']) ? $_GET['tahun'] :false;
                
                if ($notif == "requiere"){
                    echo "<div class='notif'> Maaf, kamu Harus Isi Semua Data yang Ingin ditambahkan <br></div>";
                }elseif($notif=="ukuran"){
                    echo "<div class='notif'> Maaf, Gambar Kamu Terlalu Besar <br></div>";
                }elseif($notif=="format"){
                    echo "<div class='notif'> Maaf, Gambar Kamu Tidak Sesuai Format <br></div>";
                }elseif($notif=="judul"){
                    echo "<div class='notif'> Maaf, Judul Artikel Sudah Ada <br></div>";
                }
            ?>
        </div>
    <style>
                * {box-sizing: border-box;}

                input[type=text], select, textarea {
                width: 100%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                margin-top: 6px;
                margin-bottom: 16px;
                resize: vertical;
                }

                input[type=submit] {
                background-color: #4CAF50;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                }

                input[type=submit]:hover {
                background-color: #45a049;
                }

                .container {
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 20px;
                }
    </style>

            <div>

            <div class="container">
            <form style="color: black;" action="admin/simpan.php" style="padding: 1px;" enctype="multipart/form-data" method="POST">
                <label for="fname">Judul Artikel</label>
                <input type="text" class="form-control" value="<?php echo $judul; ?>"  name="judul">

                <label for="lname">Penulis</label>
                <input type="text" class="form-control"  name="penulis" value="<?php echo $penulis; ?>">

                <label for="lname">Tahun</label>
                <input type="text" min="1111" max="9999"  onkeypress="return hanyaAngka(event)" class="form-control"  name="tahun" value="<?php echo $tahun; ?>">

                <label for="subject1">Isi Artikel Bagian 1</label>
                <textarea id="subject1" name="isi_a" placeholder="Tulis Isi Disini..." style="height:200px"><?php echo $isi_a; ?></textarea>

                <label for="subject">Isi Artikel Bagian 2</label>
                <textarea id="subject" name="isi_b" placeholder="Tulis Isi Disini.." style="height:200px"><?php echo $isi_b; ?></textarea>

                <label for="gambar">Gambar Illustrasi</label>
                <p style="font-size: 12px;">Hanya JPG atau PNG Maks. 700Kb</p>
                <input type="file"  name="gambar">
                <br><br>
                <button type="submit" class="btn btn-warning"  name="simpan" value="artikel">Submit</button>
            </form>
            </div>
            </div>

    <script>
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
       
        </script>

    <?php
}elseif($tabel=="rs"){
            ?>

        <div class="tambah-barang-admin">
                <div class="form-tambah-user">
                    <div>
                        <br>
                        <br>
                        <h2 class="text-center" style="font-weight: bolder;">MASUKAN DATA RUMAH SAKIT YANG INGIN DITAMBAHKAN</h2>
                        <br>
                    </div>
                <form action="admin/simpan.php" style="padding: 1px;" enctype="multipart/form-data" method="POST">
                <div class="row">


                </div>
                    <?php
                        $notif = isset($_GET['notif']) ? $_GET['notif'] :false;
                        $nama_rs = isset($_GET['nama_rs']) ? $_GET['nama_rs'] :false;
                        $alamat_rs = isset($_GET['alamat_rs']) ? $_GET['alamat_rs'] :false;
                        $kota = isset($_GET['kota']) ? $_GET['kota'] :false;
                        $gambar = isset($_GET['gambar']) ? $_GET['gambar'] :false;
                        $deskripsi = isset($_GET['deskripsi']) ? $_GET['deskripsi'] :false;
                        
                        if ($notif == "requiere"){
                            echo "<div class='notif'> Maaf, kamu Harus Isi Semua Data yang Ingin ditambahkan <br></div>";
                        }elseif($notif=="ukuran"){
                            echo "<div class='notif'> Maaf, Gambar Kamu Terlalu Besar <br></div>";
                        }elseif($notif=="format"){
                            echo "<div class='notif'> Maaf, Gambar Kamu Tidak Sesuai Format <br></div>";
                        }
                    ?>
                    <div>
                    <table class="table-responsive">
                            <thead>
                            <tr>
                                <th>Nama Rumah Sakit  </th>
                                <th>Alamat Rumah Sakit  </th>
                                <th>Kota  </th>
                                <th>Deskripsi </th>
                                <th>gambar </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr> 
                                <td>
                                    <input type="text" class="form-control" value="<?php echo $nama_rs; ?>"  name="nama_rs">
                                    </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Cth: Jalan Ir Soekarno" name="alamat_rs" value="<?php echo $alamat_rs; ?>">
                                    </td>
                                <td>
                                    <input type="text" class="form-control"  name="kota" value="<?php echo $kota; ?>">
                                    </td>
                                <td>
                                    <input type="text" class="form-control"  name="deskripsi" value="<?php echo $deskripsi; ?>">
                                    </td>
                                <td>
                                    <div>
                                        <p>Hanya JPG atau PNG Maks. 700Kb</p>
                                        <input type="file"  name="gambar">
                                    </div>
                                <td>
                                <button type="submit" name="simpan" value="rs" class="btn btn-warning" >Input</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
                
                </div>

                </div>



    <?php
}elseif($tabel=="wiki"){
    ?>
 <div class="form-tambah-user">
            <div>
                <br>
                <br>
                <h2 class="text-center" style="font-weight: bolder;">MASUKAN DATA PENYAKIT YANG INGIN DITAMBAHKAN</h2>
                <br>
            </div>
        <form action="admin/simpan.php" style="padding: 1px;" method="POST">
        <div class="row">


        </div>
            <?php
                $notif = isset($_GET['notif']) ? $_GET['notif'] :false;
                $nama_penyakit = isset($_GET['nama_user']) ? $_GET['nama_user'] :false;
                $id_penyakit = isset($_GET['email']) ? $_GET['email'] :false;
                $deskripsi = isset($_GET['alamat']) ? $_GET['alamat'] :false;
                $gejala = isset($_GET['gender']) ? $_GET['gender'] :false;
                $pencegahan = isset($_GET['no_hp']) ? $_GET['no_hp'] :false;
                $pengobatan = isset($_GET['umur']) ? $_GET['umur'] :false;
                

                if ($notif == "requiere"){
                    echo "<div class='notif'> Maaf, kamu Harus Isi Semua Data yang Ingin ditambahkan <br></div>";
                }elseif ($notif == "nama"){
                    echo "<div class='notif'> Maaf, Nama Penyakit Sudah <br></div>";
                }
            ?>
            <div>
            <table class="table-responsive">
                    <thead>
                    <tr>
                        
                        <th>Nama Penyakit </th>
                        <th>Deskripsi  </th>
                        <th>Gejala  </th>
                        <th>Pencegahan </th>
                        <th>Pengobatan </th>
                    </tr>
                </thead>
                <tbody>
                    <tr> 
                        
                        <td>
                            <input type="text" class="form-control" placeholder="Nama" name="nama_penyakit" value="<?php echo $nama_penyakit; ?>">
                            </td>
                        <td>
                            <input type="text" class="form-control" id="inputEmail4" name="deskripsi" value="<?php echo $deskripsi; ?>">
                            </td>
                        <td>
                            <input type="text" class="form-control" id="inputZip" name="gejala" value="<?php echo $gejala; ?>">
                            </td>
                        <td>
                            <input type="text" class="form-control" id="inputZip" name="pencegahan" value="<?php echo $pencegahan; ?>">
                            </td>
                        <td>
                            <input type="text" class="form-control" id="inputZip" name="pengobatan" value="<?php echo $pengobatan; ?>">
                            </td>
                         <td>
                            <button type="submit" name="simpan" value="wiki" class="btn btn-warning" >Input</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </form>
        </div>
<?php
}
        ?>
    </div>
</body>
             
</html>