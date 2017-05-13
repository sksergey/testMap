<?php
/**
 * Created by PhpStorm.
 * User: serg
 * Date: 13.05.2017
 * Time: 18:00
 */
spl_autoload_register(function ($class_name) {
    include ("/$class_name.php");
});
