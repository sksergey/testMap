<?php
/**
 * Created by PhpStorm.
 * User: serg
 * Date: 14.05.2017
 * Time: 20:21
 */
require_once ("autoload.php");
require_once ("formvalidation.php");
?>
<?
if(!empty($_GET)) {
    $user = User::getUser($_GET['id']);
}

if (isset($_POST) && !empty($_POST['name']) && !empty($_POST['address'])) {
    $saveuser = new User();
    echo $saveuser->editUser($_POST['id']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/modal.css" rel="stylesheet">
</head>
<body>
<header>
    <a href="\app\users.php">Back</a> &nbsp
</header>

<h1>Update user</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" class="user-form">
    <input type="hidden" name="id" value="<?= $_GET['id']?>">
    <h3>Image</h3>
    <input type="file" name="image" accept="image/*" value="<?= $user['image']?>"><br>

    <h3>Name</h3>
    <input type="text" name="name" value="<?= $user['name']?>" class="text-input"><br>

    <h3>Address Example: 12345 Украина Киев ул.Шевченка, 58/5</h3>
    <input type="text" name="address" value="<?= $user['address']?>" class="text-input"><br>

    <input type="submit" value="Submit" class="btn">
</form>


