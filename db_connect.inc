<?php
$server = "localhost";
$usr = "root";
$pwd = "root";
$dtb = "crud";


//Navázání spojení
$conn = mysqli_connect($server, $usr, $pwd, $dtb);

// Kotrola spojení
if(!$conn)
{
    die("Spojení selhalo: " . mysqli_connect_error());
}
?>