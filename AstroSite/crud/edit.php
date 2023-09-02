<?php
include ('admin.php');

$index = $_POST['index'];

$data = file_get_contents('user_data.json');
$data_array = json_decode($data);

$row = $data_array[$index];
?>
<!Doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8"/>
	<meta name="author" content="Mehdi Calanducci"/>
	<meta name="description" content="Edit"/>
    <meta name="keywords" content="edit"/>
    <link rel="stylesheet" href="../css/style_projet.css" type="text/css" >
    <title>Edit File</title>
</head>
<body>
<form method="POST">
    <a href="index.php">Back</a>
    <p>
        <label for="name">Username</label>
        <input type="text" id="name" name="name" value="<?php echo $row->$_SESSION['username']; ?>">
    </p>
    <p>
        <label for="email">Email</label>
        <input type="text" id="email" name="email" value="<?php echo $row->$_POST['mail']; ?>">
    </p>
    <p>
        <label for="password">Password</label>
        <input type="text" id="password" name="password" value="<?php echo $row->$_SESSION['password']; ?>">
    </p>
    <input type="submit" name="save" value="Save">
</form>
<?php
if (isset($_POST['save'])) {
    $input = array(
        'Name' => $_POST['username'],
        'Email' => $_POST['email'],
        'Hash' => $_SESSION['password']
    );

    $data_array[$index] = $input;

    $data = json_encode($data_array, JSON_PRETTY_PRINT);
    file_put_contents('user_data.json', $data);

    //header('location: index.php');
}
?>
</body>
</html>
