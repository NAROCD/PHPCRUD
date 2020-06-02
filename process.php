<?php
include "db_connect.inc";
if (isset($_POST['save']))
{
    $name = $_POST['name'];
    $address = $_POST['address'];
}
$conn ->query("INSERT INTO data (name, address) VALUES('$name', '$address')") or 
              die($conn->error);
?>