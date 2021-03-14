

  <?php


include_once("fungsi/koneksi.php");
include_once("fungsi/helper.php");

$user= $_SESSION['id_user'];




$sql = "SELECT * FROM user  WHERE id_user = '$user'";
       
$query = mysqli_query($koneksi, $sql );


?>