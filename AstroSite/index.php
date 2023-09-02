<?php
    include ('header.php');
?>

<!Doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8"/>
	<meta name="author" content="Mehdi Calanducci"/>
	<meta name="description" content="site astronomie"/>
    <meta name="keywords" content="acceuil"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_projet.css" type="text/css" >
	<title>
		Acceuil
     </title>
</head>
<body>

<main>
    <h1>Bienvenu <?php echo $username; ?>, explorateur du ciel...</h1>
    <!--Slideshow-->
    <div class="slideshow-container">
        <!--Img & caption text-->
        <div class="mySlides fade">
            <img src="img/croissant_vénus.jpg" style="width: 100%;">
            <div class="text">Croissant de Vénus</div>
        </div>
        <div class="mySlides fade">
            <img src="img/galaxie_andromède.jpg" style="width: 100%;">
            <div class="text">La galaxie d'Andromède, la galaxie la plus proche de la voie Lactée</div>
        </div>
        <!--Buttons prev/next-->
        <a class="prev" onclick="plusSlides(-1)">&#10094;<!--"= <"--></a>
        <a class="next" onclick="plusSlides(1)">&#10095;<!--"= >"--></a>
        <br>
        <!--Current slide dots-->
        <div style="text-align: center;">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
        </div>
    </div>
    

    <section>
        <h3>Sources et autre liens:</h3>
        <center><a href="https://www.futura-sciences.com/sciences/actualites/astronomie-astronomie-selection-plus-belles-photos-ce-grand-concours-international-65696/">Grand concours photos futura science</a>
        <br>
        <a href="https://www.unige.ch/sciences/fr/larecherche/domainesderecherche/astronomie/">UNIGE Astronomie</a>
        <br>
        <a href="https://www.loisirs.ch/dossiers/18369/astronomie">Astronomie Loisirs Suisse Romande</a></center>
    </section>
</main>
<?php
    include ('footer.php');
?>
</body>
<script type="text/javascript" src="js/slide_function.js"></script>
</html>