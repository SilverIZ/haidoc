<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    * {
    box-sizing: border-box;
    }

    input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
    }

    label {
    padding: 12px 12px 12px 0;
    display: inline-block;
    }

    input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
    }

    input[type=submit]:hover {
    background-color: #45a049;
    }

    .container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    }

    .col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
    }

    .col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row:after {
    content: "";
    display: table;
    clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
    }
</style>
<body>
<?php  
include_once("fungsi/koneksi.php");
     $aksi = isset ($_GET['aksi']) ? $_GET['aksi'] : false;
     $user = isset ($_GET['user']) ? $_GET['user'] : false;
     $id_order = isset ($_GET['order']) ? $_GET['order'] : false;
     $query = mysqli_query($koneksi, "SELECT * FROM order2 WHERE id_order='$id_order'");
     $row=mysqli_fetch_assoc($query);

if($aksi=="batal"){
    
    $status="Dibatalkan";
    mysqli_query($koneksi,"UPDATE order2 SET status='$status' WHERE id_order='$id_order'");
    if($user=="user"){
    direct(BASE_URL."index.php?page=cart");               
    }elseif($user=="admin"){
        direct(BASE_URL."index.php?page=admin/admin&admin=order");
    }

}elseif($aksi=="bayar"){
    $notif = isset($_GET['notif']) ? $_GET['notif'] :false;
                $atas_nama = isset($_GET['atas_nama']) ? $_GET['atas_nama'] :false;
                $pembeli = isset($_GET['pembeli']) ? $_GET['pembeli'] :false;
                $jumlah = isset($_GET['jumlah']) ? $_GET['jumlah'] :false;
                $tagihan = isset($_GET['tagihan']) ? $_GET['tagihan'] :false;
                $metode = isset($_GET['metode']) ? $_GET['metode'] :false;
                $id_user = isset($_GET['id_user']) ? $_GET['id_user'] :false;
    
    ?>
            
            <h2 style="text-align: center;">FORMULIR KONFIRMASI PEMBAYARAN</h2>

            <div class="container">
            <p style="color: black;">Proses Verifikasi Pembayaran mungkin dapat memakan waktu hingga 2x24 Jam.</p>
            <form style="color: black;" action="inputbayar.php" method="POST">
            <input type="hidden" name="id_user" value="<?php echo $row['id_user'];?>">
            <input type="hidden" name="id_order" value="<?php echo $id_order;?>">
                <div class="row">
                <div class="col-25">
                    <label >Nama Pengirim</label>
                </div>
                <div class="col-75">
                    <input type="text" value="<?php echo $atas_nama ?>"  name="atas_nama">
                </div>
                </div>

                <div class="row">
                <div class="col-25">
                    <label for="lname">Jumlah Kirim</label>
                </div>
                <div class="col-75">
                    <input type="text" min="1" max="9999999999999"  onkeypress="return hanyaAngka(event)"  value="<?php echo $jumlah ?>" name="jumlah" >
                </div>
                </div>

                <div class="row">
                <div class="col-25">
                    <label for="lname">Tagihan</label>
                </div>
                <div class="col-75">
                    <input type="text" readonly value="<?php echo $row['harga'] ?>" name="tagihan" >
                </div>
                </div>

                <div class="row">
                <div class="col-25">
                    <label for="lname">Username Pembeli</label>
                </div>
                <div class="col-75">
                    <input type="text" value="<?php echo $row['id_user'] ?>" name="pembeli" >
                </div>
                </div>

               
                <div class="row">
                <div class="col-25">
                    <label for="subject">Metode Pembayaran</label>
                </div>

                <div class="col-75">
                        <select id="inputState" class="form-control" name="metode">
                                    <option>Transfer Bank</option>
                                    <option>Dana</option>
                                </select>                </div>
                </div>

                <div class="row">
                <input type="submit" value="Submit">
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
}elseif($aksi=="kirim"){
    $status="Dikirim";
    mysqli_query($koneksi,"UPDATE order2 SET status='$status' WHERE id_order='$id_order'");
    
    direct(BASE_URL."index.php?page=kirim&order=$id_order"); 
}elseif($aksi=="tolak"){
    $status="Pembayaran Ditolak";
    mysqli_query($koneksi,"UPDATE order2 SET status='$status' WHERE id_order='$id_order'");
    direct(BASE_URL."index.php?page=admin/admin&admin=order"); 
}elseif($aksi=="selesai"){
    $status="Selesai";
    mysqli_query($koneksi,"UPDATE order2 SET status='$status' WHERE id_order='$id_order'");
    if($user=="user"){
    direct(BASE_URL."index.php?page=cart");               
    }elseif($user=="admin"){
        direct(BASE_URL."index.php?page=admin/admin&admin=order");
    }else{
        direct(BASE_URL."index.php?page=cart");    
    }
}
    ?>    


</body>
</html>