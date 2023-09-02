<?php
	include ('header.php');

	define('DATABASE_FILE', 'data/user_data.json');

	//Verifier la connexion
	if (isset($_POST['password']) && isset($_POST['mail'])) {
		$mail = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
		$password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);
		$_SESSION['password'] = $password;
		//$currentContent = json_decode(DATABASE_FILE, true); //
		$users_data = file_get_contents(DATABASE_FILE);
		$users_data = json_decode($users_data, true);
		foreach ($users_data as $value) {
			if ($value != "") {
				$data = explode(',', $value);
				$hash = password_hash($password, PASSWORD_BCRYPT, $users_data);
				//var_dump($value); //Debug
				if (password_verify($password, $hash)) {
					$_SESSION['logged'] = true;
					$_SESSION['username'] = $data[0];
					header("Location: index.php");
					//break;
				}
				else {
					$incorrect = "Le mot de passe ou l'email est incorrect.";
					echo "<script> alert( \"Le mot de passe ou l'email est incorrect.\" )</script>";
				}
			}
		}
	}

	//Recuperer les informations d'inscriptions dans un fichier json et verification des champs obligatoires
	if (isset($_POST['name']) && isset($_POST['mail']) && isset($_POST['password'])) {
		$name = filter_input(INPUT_POST, 'name', FILTER_UNSAFE_RAW);
		$firstName = filter_input(INPUT_POST, 'fname', FILTER_UNSAFE_RAW);
		$job = filter_input(INPUT_POST, 'job', FILTER_UNSAFE_RAW);
		$like = filter_input(INPUT_POST, 'objects', FILTER_UNSAFE_RAW);
		$mail = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
		$password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);
		$users_data = file_get_contents(DATABASE_FILE);
		$users_data = json_decode($users_data, true);
		//var_dump($users_data); // Debug
		$hash = password_hash($password, PASSWORD_BCRYPT, $users_data); //erreur users_data est null
		$_SESSION['hash'] = $hash;
		$message = "\r\n$name,$firstName,$mail,$hash,$job,$like";
		if (!file_exists(DATABASE_FILE)) {
			foreach ($datas as $key) {
				array_push($users_data, $key);
				$datas = json_encode($users_data);
				file_put_contents(DATABASE_FILE, $currentContent . $key);
			}
		}
		$currentContent = file_get_contents(DATABASE_FILE);
		
		/*if ($_POST['password'] == $_SESSION['password'] ) {
			$_SESSION['logged'] = true;
			$_SESSION['username'] = $name;
		}*/
	}
	
?>

<!Doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8"/>
	<meta name="author" content="Mehdi Calanducci"/>
	<meta name="description" content="site astronomie"/>
	<meta name="keywords" content="Inscription/Connexion form"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_projet.css" type="text/css" >
	<title>
		Inscription/Connexion
     </title>
</head>
<body>
<form action="#" method="post">
	<center>
		<!--Formulaire Inscription-->
		<fieldset id="inscriptions">
			<legend>Inscriptions</legend>
			<label>Nom: </label>
			<input type="text" name="name"><br>
			<label>Prénom: </label>
			<input type="text" name="fname"><br>
			<label>Email: </label>
			<input type="text" name="mail"><br>
			<label>Mot de passe: </label>
			<input type="text" name="password" ><br>
			<label>Métier: </label>
			<input type="text" name="job"><br>
			<label>Types d'astres préférés:</label>
			<input type="radio" name="objects" value="Planètes">
			<label for="planets">Planètes</label>
			<input type="radio" name="objects" value="Etoiles">
			<label for="stars">Etoiles</label><br>
			<input type="radio" name="objects" value="Nébuleuses">
			<label for="nebulas">Nébuleuses</label>
			<input type="radio" name="objects" value="Autres">
			<label for="others">Autres...</label><br>
			<input type="submit" name="submit" value="Envoyer">
		</fieldset>
	</center>
</form>
<h5>Vous vous êtes déjà inscrit ? Alors connectez-vous avec ce formulaire: </h5>
<form action="#" method="post">
	<center>
		<!--Formulaire Connexion-->
		<fieldset id="connexion">
			<legend>Connexion</legend>
			<label>Email: </label>
			<input type="text" name="mail"><br>
			<label>Mot de passe: </label>
			<input type="text" name="password"><br>
			<input type="submit" name="submit" value="Envoyer">
			<label></label>
			<!--<label>Hash : <?php if (isset($_POST['password'])) {
				var_dump($hash);
			} ?></label>-->
		</fieldset>
	</center>
</form>
<?php
	include ('footer.php');
?>
</body>
</html>