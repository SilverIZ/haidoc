<?php

    if($id_user){$page = isset ($_GET['page']) ? $_GET['page'] : false;
        $modul = isset($_GET['modul']) ? $_GET['modul'] : false;
        $action = isset($_GET['action']) ? $_GET['action'] :false;
        $action = isset($_GET['mode']) ? $_GET['mode'] :false;

    }else{
        direct(BASE_URL."/index.php?page=login");
        }
?>

<div id="bg-text-profile">
        <div id="menu-profile">
            <ul>
                <li>
                    <a href="<?php echo BASE_URL."index.php?page=myprofile&modul=pesanan&action=list";?>">
                        Pesanan</a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL."index.php?page=myprofile&modul=barang&action=list";?>">
                        Barang</a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL."index.php?page=myprofile&modul=user&action=list";?>">
                        Pengguna</a>
                <li>
                    <a href="<?php echo BASE_URL."index.php?page=myprofile&modul=banner&action=list";?>">
                        Banner</a>
                </li>
            </ul>
        </div>
        <div id="profil-content">
            <?php
            $file="modul/$modul/$action.php";
            if(file_exists($file)){
                include_once($file);
            }else{
                echo "<h3> Maaf Halaman Tidak Ketemu <h3>";
            }
            ?>
        </div>

</div>

        

