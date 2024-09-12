<?php 

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "quran";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("the reason is". mysqli_connect_error());
}