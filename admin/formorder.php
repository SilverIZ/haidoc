<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <style>
        body {
        font-family: Arial;
        font-size: 17px;
        
        }

        * {
        box-sizing: border-box;
        }

        .row {
        display: -ms-flexbox; /* IE10 */
        display: flex;
        -ms-flex-wrap: wrap; /* IE10 */
        flex-wrap: wrap;
        margin: 0 -16px;
        }

        .col-25 {
        -ms-flex: 25%; /* IE10 */
        flex: 25%;
        }

        .col-50 {
        -ms-flex: 50%; /* IE10 */
        flex: 50%;
        }

        .col-75 {
        -ms-flex: 75%; /* IE10 */
        flex: 75%;
        }

        .col-25,
        .col-50,
        .col-75 {
        padding: 0 16px;
        }

        .container {
        background-color: #f2f2f2;
        padding: 5px 20px 15px 20px;
        border: 1px solid lightgrey;
        border-radius: 3px;
        }

        input[type=text] {
        width: 100%;
        margin-bottom: 20px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 3px;
        }

        label {
        margin-bottom: 10px;
        display: block;
        }

        .icon-container {
        margin-bottom: 20px;
        padding: 7px 0;
        font-size: 24px;
        }

        .btn {
        background-color: #4CAF50;
        color: white;
        padding: 12px;
        margin: 10px 0;
        border: none;
        width: 100%;
        border-radius: 3px;
        cursor: pointer;
        font-size: 17px;
        }

        .btn:hover {
        background-color: #45a049;
        }

        

        hr {
        border: 1px solid lightgrey;
        }

        span.price {
        float: right;
        color: grey;
        }

        /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
        @media (max-width: 800px) {
        .row {
            flex-direction: column-reverse;
        }
        .col-25 {
            margin-bottom: 20px;
        }
        }

</style>


<?php
include_once("koneksi.php");
$notif = isset($_GET['notif']) ? $_GET['notif'] :false;
$alamat = isset($_GET['alamat']) ? $_GET['alamat'] :false;
$id_barang = isset($_GET['id_barang']) ? $_GET['id_barang'] :false;


if ($notif == "requiere"){
    echo "<div class='notif'> Maaf, kamu Harus Lengkapi Semua Data yang Ingin ditambahkan <br></div>";
}


$id_user = $_SESSION['id_user'];

 $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang='$id_barang'");
 $query2 = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user'");
 
 $row = mysqli_fetch_assoc($query);
 $row2= mysqli_fetch_assoc($query2);


?>

<body>
    <div class="order-barang">
               <div class="row">
                <div class="col-75">
                    <br>
                <h3 style="text-align: center; font-weight:bolder;" >TAGIHAN</h3>
                    <div class="container">
                    <form style="color: black;"  action="admin/simpanorder.php" method="POST">
                        <div class="row">
                        <div class="col-50">
                            <input type="hidden" name="id_barang" value="<?php echo $id_barang; ?>" >
                            <input type="hidden" name="nama_barang" value="<?php echo $row['nama_barang']; ?>" >
                            <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" >

                            <label for="fname"><i class="fa fa-user"></i> Pemesan</label>
                            <input type="text" id="fname" name="nama_user" readonly value="<?php echo $row2['nama_user']; ?>">
                            <label> Barang Dipilih </label>
                            <label > <b><?php echo $row['nama_barang']; ?> </b> </label><br>
                            
                           
                            <label for="adr"><i class="fa fa-address-card-o"></i> Alamat</label>
                            <input type="text" id="adr" name="alamat" value="<?php echo $alamat ?>">
                            <label for="city"><i class="fa fa-institution"></i> Jumlah</label>
                                <select class="form-control"  name="jumlah">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>

                            <div class="row">
                            <div class="col-50">
                                <label for="state">Harga Satuan</label>
                                <input type="text" id="state" name="harga" readonly value="<?php echo $row['harga']; ?>">
                            </div>
                             </div>
                        </div>

                        <div class="col-50">
                            
                            <label for="fname">Metode Pembayaran</label>
                            <select id="inputState" class="form-control" name="pembayaran" value="<?php echo $status; ?>">
                                    <option>Transfer Bank</option>
                                    <option>Dana</option>
                                </select>
                                <br>
                            <label for="cname">No. Rekening </label>
                            <label for="cname">BNI : 01234567 </label>
                            <label for="cname">Mandiri :987654321 </label>
                            <br>
                            <label for="ccnum">No Dana</label>
                            <label for="ccnum">0823113123</label>
                           </div>
                        
                        </div>
                       
                        <input type="submit" value="Tambah Ke Keranjang" class="btn">
                    </form>
                    </div>
                </div>
                <br>
                
                </div>

    </div>
</body>
</html>