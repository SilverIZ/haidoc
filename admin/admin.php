<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php

$admin = isset ($_GET['admin']) ? $_GET['admin'] : false;
?>
<style>
 /* The side navigation menu */
 .sidebar {
	margin: 0;
	padding: 0;
	width: 200px;
	background-color: #780be6;
	position: absolute;
	height: 135%;
	overflow: auto;
}

/* Sidebar links */
.sidebar a {
  display: block;
  color: white;
  padding: 16px;
  text-decoration: none;
}

/* Active/current link */
.sidebar a.active {
  background-color: #4CAF50;
  color: white;
}

/* Links on mouse-over */
.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

/* Page content. The value of the margin-left property should match the value of the sidebar's width property */
div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

/* On screens that are less than 700px wide, make the sidebar into a topbar */
@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

/* On screens that are less than 400px, display the bar vertically, instead of horizontally */
@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
} 
</style>

<body>
    <div class="content-admin">
                    <div class="sidebar">          
                <a <?php echo "href='".BASE_URL."index.php?page=admin/admin&admin=user'";
                  if($admin == "user"){echo "class='active'";}?>><i class="fa fa-fw fa-user"></i>Tabel User</a>
                <a <?php echo "href='".BASE_URL."index.php?page=admin/admin&admin=rs'";
                if($admin == "rs"){echo "class='active'";}?>><i class="fa fa-building" aria-hidden="true"></i> Rumah Sakit</a>
                <a <?php echo "href='".BASE_URL."index.php?page=admin/admin&admin=wiki'";
                if($admin == "wiki"){echo "class='active'";}?>><i class="fa fa-heart" aria-hidden="true"></i> Wiki Penyakit</a>
                <a <?php echo "href='".BASE_URL."index.php?page=admin/admin&admin=artikel'";
                if($admin == "artikel"){echo "class='active'";}?>><i class="fa fa-book" aria-hidden="true"></i> Artikel</a>
                <a <?php echo "href='".BASE_URL."index.php?page=admin/admin&admin=barang'";
                if($admin == "barang"){echo "class='active'";}?>><i class="fa fa-gift" aria-hidden="true"></i> Barang</a>
                <a <?php echo "href='".BASE_URL."index.php?page=admin/admin&admin=order'";
                if($admin == "order"){echo "class='active'";}?>><i class="fa fa-shopping-cart" aria-hidden="true"></i>  Pesanan</a>
                <a <?php echo "href='".BASE_URL."index.php?page=admin/admin&admin=konfirmasi'";
                if($admin == "konfirmasi"){echo "class='active'";}?>><i class="fa fa-money" aria-hidden="true"></i>  Konfirmasi Pembayaran</a>
                <a <?php echo "href='".BASE_URL."index.php?page=admin/admin&admin=pengiriman'";
                if($admin == "pengiriman"){echo "class='active'";}?>><i class="fa fa-plane" aria-hidden="true"></i> Pengiriman</a>
                </div>

                <div class="content" style="height: auto; min-height: 800px;">
                <?php
                $aksi = isset ($_GET['aksi']) ? $_GET['aksi'] : false;
                $admin = isset ($_GET['admin']) ? $_GET['admin'] : false;
                    $filename2 = "admin/$admin.php";
                    if(file_exists($filename2)){
                        include_once($filename2);
                    }else{
                        
                    }
                ?>
                
                </div>
    
    </div>
</body>

</html>