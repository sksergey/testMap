<?php
/**
 * Created by PhpStorm.
 * User: serg
 * Date: 13.05.2017
 * Time: 18:21
 */
    require_once ("autoload.php");
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
   <a href="\index.php">Back</a> &nbsp; <a href="\app\createuser.php">Add new user</a>
</header>
<table>
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
    </thead>
<? $users = User::getUsers();
    foreach ($users as $user){ ?>
    <tr>
        <td class="table-image"><img src="<?= $user['image']?>" alt=""></td>
        <td><div><?= $user['name']?></div></td>
        <td><div><?= $user['address']?></div></td>
        <td><a href="\app\updateuser.php?id=<?= $user['id']?>">Edit</a> &nbsp; <a href="#" onclick="openModal(<?= $user['id']?>, '<?= $user['name']?>')" >Delete</a></td>
    </tr>
    <? } ?>
</table>

<div id="openModal" class="modalDialog">
    <div>
        <header class="modal-header">
            <p1>Question</p1>
            <div class="close" onclick="closeModal()">X</div>
        </header>
        <img src="/images/question.png" alt="" id="question">
        <div id="question-text">
            Delete <?= "any name here"?> user?
        </div>
        <div id="confirm">
            <button type="button" class="btn modal-btn" name="delete_ok" onclick="deleteUser()">Yes</button>
            <button type="button" class="btn modal-btn" onclick="closeModal()">No</button>
            <input type="hidden" name="user_id" value="" id="input_id">
        </div>
    </div>
</div>

<script>
    function openModal(id, name) {
        document.getElementById("input_id").value = id;
        document.getElementById("question-text").innerHTML = "Delete " + name + " user?";
        var modal = document.getElementById("openModal");
        modal.style.display = "block";
        modal.style.pointerEvents = "auto";
    }

    function closeModal() {
       var modal = document.getElementById("openModal");
        modal.style.display = "none";
        modal.style.pointerEvents = "none";
    }

    function deleteUser(){
            closeModal();
            var id = document.getElementById("input_id");
            var xrequest = new XMLHttpRequest();
            xrequest.open("GET", "deleteuser.php?id="+id.value, true);
            xrequest.send();

            xrequest.onload = function() {
                alert(this.responseText);
                window.location.href="users.php";
            };
    }
</script>

</body>
</html>
