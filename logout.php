<?php

        session_destroy();
        unset($id_user);
        unset($nama_user);
        direct("index.php");
?>