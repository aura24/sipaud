<?php
<<<<<<< HEAD
$host = "localhost";
$user = "root";
$pass = "";
$db = "paud4";
$konek = mysqli_connect($host,$user,$pass,$db);
session_start();
=======
try {
    $konek= pg_connect("host=localhost user=postgres dbname=paud password=admin");
} Catch (Exception $e) {
    Echo $e->getMessage();
}
>>>>>>> d1e06fa5d180dbfdad410ebb4b6756d947b70b40
?>

