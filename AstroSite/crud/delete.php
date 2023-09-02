<?php
include ('admin.php');

$index = $_POST['index'];

$data = file_get_contents('user_data.json');
$data = json_decode($data);

unset($data[$index]);

$data = json_encode($data, JSON_PRETTY_PRINT);
file_put_contents('user_data.json', $data);

header('location : index.php');
?>
