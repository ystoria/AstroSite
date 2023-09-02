<?php
    include ('header.php');
?>
<!Doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8"/>
	<meta name="author" content="Mehdi Calanducci"/>
	<meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <link rel="stylesheet" href="css/style_projet.css" type="text/css" >
</head>
<body>
<?php
if ($_SESSION['logged'] == true) {
    echo "<div>";
    echo "<form action=\"#\" method=\"POST\">";
    echo "  <label>Nom de l'astre</label>";
    echo "  <input type=\"text\" name=\"nomAstre\" required>";
    echo "  <label>Distance Terre-astre</label>";
    echo "  <input type=\"text\" name=\"distance\">";
    echo "  <label>Type d'astre</label>";
    echo "  <input type=\"text\" name=\"type\">";
    //echo "  <input type=\"text\" name=\"imgAstre\">"; #Partie image non effectuée
    echo "  <input type=\"submit\" name=\"envoyer\" value=\"Envoyer\">";
    echo "</form>";
}
?>
</body>
</html>