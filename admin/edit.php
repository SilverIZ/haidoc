<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php  
    include_once("koneksi.php");
    $tabel = isset ($_GET['tabel']) ? $_GET['tabel'] : false;
    $user = isset ($_GET['user']) ? $_GET['user'] : false;
    ?>
    <div class="content-edit">
        <?php 
if($tabel=="user"){
                    ?>
        <div class="form-edit-user">
        <div class="form-tambah-user">
            <div>
                <br>
                <br>
                <h2 class="text-center" style="font-weight: bolder;">MASUKAN DATA USER YANG INGIN DIEDIT</h2>
                <br>
            </div>
        <form action="admin/proses_edit.php" style="padding: 1px;" method="POST">
            
            <?php
            $ambil = mysqli_query($koneksi,"SELECT * FROM user WHERE id_user='$user'");
            $row3 = mysqli_fetch_assoc($ambil);
            
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
                    </tr>
                </thead>
                <tbody>
                    <tr> 
                        <td>
                            <input type="text" class="form-control" value="<?php echo $row3['id_user']; ?>" readonly  placeholder="Username" name="id_user">
                            </td>
                        <td>
                            <input type="text" class="form-control" placeholder="Nama" name="nama_user" value="<?php echo $row3['nama_user']; ?>">
                            </td>
                        <td>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" readonly value="<?php echo $row3['email']; ?>">
                            </td>
                        <td>
                            <input type="text" class="form-control" id="inputZip" name="umur" value="<?php echo $row3['umur']; ?>">
                            </td>
                        <td>
                            <input type="text" class="form-control" id="inputZip" name="berat" value="<?php echo $row3['berat']; ?>">
                            </td>
                        <td>
                            <input type="text" class="form-control" id="inputZip" name="tinggi" value="<?php echo $row3['tinggi']; ?>">
                            </td>
                        <td>
                            <textarea type="text" class="form-control" id="inputZip" name="alamat"><?php echo $row3['alamat']; ?></textarea>
                            </td>
                        <td>
                            <select id="inputState" class="form-control" name="gender">
                                    <option  <?php if($row3['gender']=="Laki-Laki"){echo "selected";}  ?>>Laki-Laki</option>
                                    <option  <?php if($row3['gender']=="Perempuan"){echo "selected";}  ?>>Perempuan</option>
                                </select>
                            </td>                         
                        
                        <td>
                            <input type="text" class="form-control" id="inputZip" name="no_hp" value="<?php echo $row3['no_hp']; ?>">
                            </td>
                        <td>
                            <select id="inputState" class="form-control" name="status" value="<?php echo $status; ?>">
                                    <option <?php if($row3['pangkat']=="pengguna"){echo "selected";}  ?>>pengguna</option>
                                    <option <?php if($row3['pangkat']=="dokter"){echo "selected";}  ?>>dokter</option>
                                    <option <?php if($row3['pangkat']=="admin"){echo "selected";}  ?>>admin</option>
                                </select>
                            </td>  
                        <td>
                        <button type="submit" name="simpan" value="user" class="btn btn-warning" >Input</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </form>
        </div>

        <?php
}elseif($tabel=="barang"){?>
    <div class="edit-barang-admin">
        <div class="form-tambah-user">
            <div>
                <br>
                <br>
                <h2 class="text-center" style="font-weight: bolder;">MASUKAN DATA BARANG YANG INGIN DIEDIT</h2>
                <br>
            </div>
        <form action="admin/proses_edit.php" style="padding: 1px;" enctype="multipart/form-data" method="POST">
        <div class="row">


        </div>
            <?php
            $ambil = mysqli_query($koneksi,"SELECT * FROM barang WHERE id_barang='$user'");

            $row3 = mysqli_fetch_assoc($ambil);
               $notif = isset($_GET['notif']) ? $_GET['notif'] :false;
               $nama_barang = isset($_GET['nama_barang']) ? $_GET['nama_barang'] :false;
               $harga = isset($_GET['harga']) ? $_GET['harga'] :false;
               $stok = isset($_GET['stok']) ? $_GET['stok'] :false;
               $gambar = isset($_GET['gambar']) ? $_GET['gambar'] :false;
               $keterangan = isset($_GET['keterangan']) ? $_GET['keterangan'] :false;
               $status = isset($_GET['status']) ? $_GET['status'] :false;
               $gambar_old = $row3['gambar'];
               
              
               if ($notif == "requiere"){
                   echo "<div class='notif'> Maaf, kamu Harus Isi Semua Data yang Ingin ditambahkan <br></div>";
               }elseif($notif=="ukuran"){
                   echo "<div class='notif'> Maaf, Gambar Kamu Terlalu Besar <br></div>";
               }elseif($notif=="format"){
                   echo "<div class='notif'> Maaf, Gambar Kamu Tidak Sesuai Format <br></div>";
               }
            ?>
            <div>
                <input type="hidden" class="form-control" name="gambar_old" value="<?php echo $gambar_old ?>">
                <input type="hidden" class="form-control" name="id_barang" value="<?php echo $row3['id_barang'] ?>">

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
                            <input type="text" class="form-control" value="<?php echo $row3['nama_barang']; ?>"  placeholder="Username" name="nama_barang">
                            </td>
                        <td>
                            <input type="text" class="form-control" placeholder="Cth : 50" name="stok"  value="<?php echo $row3['stok']; ?>">
                            </td>
                        <td>
                            <input type="text" class="form-control" placeholder="Cth: 50000" name="harga"  value="<?php echo $row3['harga']; ?>">
                            </td>
                        <td>
                            <select id="inputState" class="form-control" name="status">
                                    <option  <?php if($row3['status']=="ON") {echo "selected";}?>>ON</option>
                                    <option  <?php if($row3['status']=="OFF") {echo "selected";}?>>OFF</option>
                                </select>
                            </td>   
                        <td>
                            <input type="text" class="form-control" id="inputZip" name="keterangan" value="<?php echo $row3['keterangan']; ?>">
                            </td>
                        <td>
                            <div>
                                <p>Hanya JPG atau PNG Maks. 700Kb</p>
                                <input type="file" class="form-control-file"  value="<?php echo $row3['$gambar']; ?>"  name="gambar">
                            </div>
                        <td>
                        <button type="submit" name="simpan" value="barang" class="btn btn-warning" >Input</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </form>
        
        </div>

        </div>
    <?php
}elseif($tabel=="artikel"){
    ?>
 <div class="tambah-artikel-admin">
                <div>
                <br>
                <br>
                <h2 class="text-center" style="font-weight: bolder;">MASUKAN DATA ARTIKEL YANG INGIN DIEDIT</h2>
                <br>        
        </div>
            <?php
            $ambil = mysqli_query($koneksi,"SELECT * FROM artikel WHERE id='$user'");
            $row3 = mysqli_fetch_array($ambil);
                 $notif = isset($_GET['notif']) ? $_GET['notif'] :false;
                 $id_artikel = isset($_GET['id_artikel']) ? $_GET['id_artikel'] :false;
                 $judul = isset($_GET['judul']) ? $_GET['judul'] :false;
                 $gambar = isset($_GET['gambar']) ? $_GET['gambar'] :false;
                 $isi_a = isset($_GET['isi_a']) ? $_GET['isi_a'] :false;
                 $isi_b = isset($_GET['isi_b']) ? $_GET['isi_b'] :false;
                 $penulis = isset($_GET['penulis']) ? $_GET['penulis'] :false;
                 $tahun = isset($_GET['tahun']) ? $_GET['tahun'] :false;
                 $gambar_old = $row3['gambar'];
                
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
               
            <form action="admin/proses_edit.php" style="padding: 1px;" enctype="multipart/form-data" method="POST">
                <input type="hidden" class="form-control" name="gambar_old" value="<?php echo $gambar_old ?>">
                <input type="hidden" class="form-control" name="id" value="<?php echo $row3['id'] ?>">

                <label for="fname">Judul Artikel</label>
                <input type="text" class="form-control" readonly value="<?php echo $row3['judul']; ?>"  name="judul">

                <label for="lname">Penulis</label>
                <input type="text" class="form-control"  name="penulis" value="<?php echo $row3['penulis']; ?>">

                <label for="lname">Tahun</label>
                <input type="text" class="form-control"  name="tahun" value="<?php echo $row3['tahun']; ?>">

                <label for="subject1">Isi Artikel Bagian 1</label>
                <textarea id="subject1" name="isi_a" placeholder="Tulis Isi Disini..." style="height:200px"><?php echo $row3['isi_a']; ?></textarea>

                <label for="subject">Isi Artikel Bagian 2</label>
                <textarea id="subject" name="isi_b" placeholder="Tulis Isi Disini.." style="height:200px"><?php echo $row3['isi_b']; ?></textarea>

                <label for="gambar">Gambar Illustrasi</label>
                <p style="font-size: 12px;">Hanya JPG atau PNG Maks. 700Kb</p>
                <input type="file"  name="gambar">
                <br><br>
                <button type="submit" class="btn btn-warning"  name="simpan" value="artikel">Submit</button>
            </form>
            </div>
            </div>

    <?php
}elseif($tabel=="rs"){
    ?>
            <div class="tambah-barang-admin">
                    <div class="form-tambah-user">
                        <div>
                            <br>
                            <br>
                            <h2 class="text-center" style="font-weight: bolder;">MASUKAN DATA RUMAH SAKIT YANG INGIN DIEDIT</h2>
                            <br>
                        </div>
                    <form action="admin/proses_edit.php" style="padding: 1px;" enctype="multipart/form-data" method="POST">
                    <div class="row">
                    

                    </div>
                        <?php

                        $ambil = mysqli_query($koneksi,"SELECT * FROM rumahsakit WHERE id_rs='$user'");
                        $row3 = mysqli_fetch_assoc($ambil);

                            $notif = isset($_GET['notif']) ? $_GET['notif'] :false;
                            $nama_rs = isset($_GET['nama_rs']) ? $_GET['nama_rs'] :false;
                            $alamat_rs = isset($_GET['alamat_rs']) ? $_GET['alamat_rs'] :false;
                            $kota = isset($_GET['kota']) ? $_GET['kota'] :false;
                            $gambar = isset($_GET['gambar']) ? $_GET['gambar'] :false;
                            $deskripsi = isset($_GET['deskripsi']) ? $_GET['deskripsi'] :false;
                            $gambar_old=$row3['gambar'];
                            
                            
                            if ($notif == "requiere"){
                                echo "<div class='notif'> Maaf, kamu Harus Isi Semua Data yang Ingin ditambahkan <br></div>";
                            }elseif($notif=="ukuran"){
                                echo "<div class='notif'> Maaf, Gambar Kamu Terlalu Besar <br></div>";
                            }elseif($notif=="format"){
                                echo "<div class='notif'> Maaf, Gambar Kamu Tidak Sesuai Format <br></div>";
                            }
                        ?>
                        <input type="hidden" class="form-control" name="gambar_old" value="<?php echo $gambar_old ?>">
                     <input type="hidden" class="form-control" name="id_rs" value="<?php echo $row3['id_rs'] ?>">
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
                                        <input type="text" class="form-control" readonly value="<?php echo $row3['nama_rs']; ?>"  name="nama_rs">
                                        </td>
                                    <td>
                                        <input type="text" class="form-control"  name="alamat_rs" value="<?php echo $row3['alamat_rs']; ?>">
                                        </td>
                                    <td>
                                        <input type="text" class="form-control"  name="kota" value="<?php echo $row3['kota']; ?>">
                                        </td>
                                    <td>
                                        <input type="text" class="form-control"  name="deskripsi" value="<?php echo $row3['deskripsi']; ?>">
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
                 <div class="form-edit-user">
        <div class="form-tambah-user">
            <div>
                <br>
                <br>
                <h2 class="text-center" style="font-weight: bolder;">MASUKAN DATA USER YANG INGIN DIEDIT</h2>
                <br>
            </div>
        <form action="admin/proses_edit.php" style="padding: 1px;" method="POST">
            
            <?php
            $ambil = mysqli_query($koneksi,"SELECT * FROM penyakit WHERE id_penyakit='$user'");
            $row3 = mysqli_fetch_assoc($ambil);
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
                        <input type="hidden" name="id_penyakit" value="<?php echo $row3['id_penyakit'] ?>">
                    <td>
                            <input type="text" class="form-control" placeholder="Nama" name="nama_penyakit" value="<?php echo $row3['nama_penyakit']; ?>">
                            </td>
                        <td>
                            <input type="text" class="form-control" id="inputEmail4" name="deskripsi" value="<?php echo $row3['deskripsi']; ?>">
                            </td>
                        <td>
                            <input type="text" class="form-control" id="inputZip" name="gejala" value="<?php echo $row3['gejala']; ?>">
                            </td>
                        <td>
                            <input type="text" class="form-control" id="inputZip" name="pencegahan" value="<?php echo $row3['pencegahan']; ?>">
                            </td>
                        <td>
                            <input type="text" class="form-control" id="inputZip" name="pengobatan" value="<?php echo $row3['pengobatan']; ?>">
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
}    ?>

    </div>
</body>
</html>