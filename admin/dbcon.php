<?php

$con = mysqli_connect("localhost", "root", "root", "phpcrud");

if (!$con) {
    die('Connection Failed' . mysqli_connect_error());
}

?>