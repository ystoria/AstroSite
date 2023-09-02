
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="author" content="Mehdi Calanducci" />
    <meta name="description" content="Space shooter" />
    <meta name="keywords" content="Space, js" />
    <link rel="stylesheet" href="css/spaceship.css">
    <title>
        Spaceships
    </title>
</head>
<body>
<?php
    include ('header.php');

    if (!$_SESSION['logged']) {
        //http_response_code(401);
        header("Location: index.php");
    }
?>
    <div>
        <p id="player">Player : <?php echo $username ?></p>
        <p id="score"></p>
    </div>
    <div id="board">
        <div id="spaceship"></div>
        <div class="weapons" style="visibility: hidden;"></div>
        <div class="enemies"></div>
    </div>
</div>
</body>
<script type="text/javascript" src="js/functions.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</html>