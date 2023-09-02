<?php
	include ('header.php');

    define("DATABASE_FILE", "database.json");
    // user -> password = 12345
    // admin -> password = super

    if (file_exists(DATABASE_FILE) == true) {
       // on prend les données sous forme de tableau associatif
        $_SESSION['datas'] = file_get_contents(DATABASE_FILE, true);
        $_SESSION['datas'] = json_decode($_SESSION['datas'], true);
    }
?>