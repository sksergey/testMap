<?php
/**
 * Created by PhpStorm.
 * User: serg
 * Date: 15.05.2017
 * Time: 13:36
 */
// define variables and set to empty values
$nameErr = $addressErr = "";
$name = $address = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = false;
    if (empty($_POST["name"])) {
        $nameErr = "Error Name Field";
        $errors = true;
    }
    if (empty($_POST["address"])) {
        $addressErr = "Error Address Field";
        $errors = true;
    }

}
?>