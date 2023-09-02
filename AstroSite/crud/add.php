<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add File</title>
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
include ('admin.php');

if (!isset($_POST['save'])) {
    http_response_code(401);
}
else {
    $input = array(
        'Name' => $_POST['username'],
        'Email' => $_POST['email'],
        'Hash' => $_SESSION['password']
    );

    $data[] = $input;
    $data = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents('user_data.json', $data);

    header('location: index.php');
}
?>