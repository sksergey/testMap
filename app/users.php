<?php
/**
 * Created by PhpStorm.
 * User: serg
 * Date: 13.05.2017
 * Time: 18:21
 */
    require_once ("autoload.php");
?>
<?= 'hello, its users.php'?>

<!DOCTYPE html>
<html>
<head>
    <link href="/css/style.css" rel="stylesheet">
</head>
<body>
<header>
   <a href="\index.php">Back</a> &nbsp; <a href="\app\adduser.php">Add new user</a>
</header>
<?
   $users = User::getUsers();
?>
<table>
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
    </thead>
<? foreach ($users as $user){ ?>
    <tr>
        <td><img src="<?= $user[image]?>" alt=""></td>
        <td><?= $user[name]?></td>
        <td><?= $user[address]?></td>
        <td><a href="\app\edit.php">Edit</a> &nbsp; <a href="\app\"></a></td>
    </tr>
    <? } ?>
</table>


</body>
</html>
