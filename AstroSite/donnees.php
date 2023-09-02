<?php
	include ('formAjout_donnee.php');

	$currentContent = "";
	$handle = fopen('données/stockage_de_données.csv', 'w');
	$datas = explode(";\r\n", $currentContent);
	if (isset($_POST['nomAstre']) && isset($_POST['type']) && isset($_POST['distance'])) {
		$name = filter_input(INPUT_POST, 'nomAstre', FILTER_UNSAFE_RAW);
		$type = filter_input(INPUT_POST, 'type', FILTER_UNSAFE_RAW);
		$distance = filter_input(INPUT_POST, 'distance', FILTER_UNSAFE_RAW);
		//$img = filter_input(INPUT_POST, 'imgAstre', FILTER) #Partie image non effectué
		//$message = "\r\n$name,$type,$distance";
		//var_dump($handle); //Debug
		if (!file_exists('données/stockage_de_données.csv')) {
			if (!$handle) {
				foreach ($datas as $keys) {
					fputcsv($handle, $datas, ';');
				}
			}
			else {
				die("Unable to open file");
			}
		}
		else {
			detectDelimiter("données/stockage_de_données.csv");
			$currentContent = file('données/stockage_de_données.csv');
			fputcsv($handle, $datas, ';'); //N'accepte pas le premier argument
		}
		fclose($handle);
	}

	function detectDelimiter($csvFile) {
		$delimiters = array(
		   ';' => 0,
		   ',' => 0,
		   "\t" => 0,
		   "|" => 0
		);
		$handle = fopen($csvFile, "r");
		$firstLine = fgets($handle);
		fclose($handle);
		foreach($delimiters as $delimiter => & $count) {
		   $count = count(str_getcsv($firstLine, $delimiter));
		}
	 
		return array_search(max($delimiters), $delimiters);
	}
?>

<?php
 /* echo "<ul>";
 foreach($array as $arrkey){
     echo "<li>".$arrkey."</li>";   

 }
 echo "</ul>";*/
?>
<?php

  /* $cont=0;

      echo '<ul>';
     foreach($array as $arrkey){
         echo '<li class="yourclass-.$cont.">'.$arrkey.'</li>';   
        $cont++;
     }
     echo "</ul>";*/
?>
<?php
       /* echo "<html><body><center><table>\n\n";
  
        // Open a file
        $file = fopen("a.csv", "r");
  
        // Fetching data from csv file row by row
        while (($data = fgetcsv($file)) !== false) {
  
            // HTML tag for placing in row format
            echo "<tr>";
            foreach ($data as $i) {
                echo "<td>" . htmlspecialchars($i) 
                    . "</td>";
            }
            echo "</tr> \n";
        }
  
        // Closing the file
        fclose($file);
  
        echo "\n</table></center></body></html>";*/
        ?>

<!Doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8"/>
	<meta name="author" content="Mehdi Calanducci"/>
	<meta name="description" content="Liste des données récoltées"/>
	<meta name="keywords" content="donnes astres"/>
    <link rel="stylesheet" href="css/style_projet.css" type="text/css" >
	<title>
		Données des astres
     </title>
</head>
<body>
<?php
/*echo "<table>\n\n";
  
// Open a file
$file = fopen('données/stockage_de_données.csv', "r");

// Fetching data from csv file row by row
while (($data = fgetcsv($file)) !== false) {

	// HTML tag for placing in row format
	echo "<tr>";
	foreach ($data as $i) {
		echo "<td>" . htmlspecialchars($i) 
			. "</td>";
	}
	echo "</tr> \n";
}

// Closing the file
fclose($file);
echo "\n</table>";*/

/*$cont = 0;
echo "<ul>";
foreach ($datas as $key) {
	var_dump($datas);
	var_dump($key);
	echo "<li>".$key."</li>";
}
echo "</ul>";*/
?>
<?php
    //include ('footer.php');
?>
</body>
</html>