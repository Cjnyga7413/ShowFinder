<?php

$host = "localhost";
$dbuser = "root";
$dbpassword = "";
$db_name = "Showfinder";


if (!$conn = mysqli_connect($host, $dbuser, $dbpassword, $db_name)) {
    echo "Connection failed!";
}
