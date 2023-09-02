<?php
	include ('filemanager.php');

    /*if (!isset($_SESSION['role'])) {
        http_response_code(401);
        
    }*/
    //else {
        /*if ($_SESSION['role'] != "Administrateur") {
            http_response_code(401);
        }*/
        //else {
            if (isset($_SESSION['logged'])) {
                $datas = file_get_contents('data/user_data.json');
                $index = 0;
                foreach ($keys as $datas => $row) {
                    echo "<tr><td>".$row."-> Nom"."</td><td>".$row."-> Prenom"."</td><td>".$row."-> Email"."</td><td>".$row."-> Hash"."</td><td>".$row."-> Métier"."</td><td>".$row."-> Intérêt"."</td>";
                    echo "<td><a href=\"crud/edit.php?index=".$index."\">Edit</a></td>";
                    echo "<td><a href=\"crud/delete.php?index=".$index."\">Delete</a></td></tr>";
                $index++;
            }
            }
            
        //}
    //}
    
?>