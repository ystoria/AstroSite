<?php
    //Démarrer la session
    session_start();

    $username = 'invité';
    include ('erreur.php');

    /*if (!isset($_SESSION['logged'])) {
        $_SESSION['logged'] = false;
    }
    else {
        //Verifier si l'utilisateur est connecté
        if ($_SESSION['logged'] == true) {
            $username = $_SESSION['username'];
            echo "<form action=\"#\" method=\"post\">
                        <input type=\"submit\" name=\"deconnexion\" value=\"Déconnexion\">
                  </form>";
        }
    }*/  //Déplacé

    if (isset($_POST['deconnexion'])) {
        if (ini_get("session.uses_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
        }
        $_SESSION = array();
        session_unset();
        session_destroy();
        header("Location: index.php");
    }    
?>

<header>
    <nav>
        <ul>
            <li><a href="index.php">Acceuil</a></li>
            <li><a href="inscription_connexion.php">Inscription/Connexion</a></li>
            <li><a href="donnees.php">Astres repértoriés</a></li>
            <li><a href="game.php">Game</a></li>
            <li><a href="admin.php">Administration</a></li>
        </ul>
        <?php
        if (!isset($_SESSION['logged'])) {
            $_SESSION['logged'] = false;
        }
        else {
            //Verifier si l'utilisateur est connecté
            if ($_SESSION['logged'] == true) {
                $username = $_SESSION['username'];
                echo "<form action=\"#\" method=\"post\">
                            <input type=\"submit\" name=\"deconnexion\" value=\"Déconnexion\">
                      </form>";
            }
        }
        ?>
    </nav>
</header>