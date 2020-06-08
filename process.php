<?php
session_start();
include "db_connect.inc";
$update = false;
$id = 0;
$name = '';
$address = '';
//Funkce pro vložení dat
if (isset($_POST['save']))
{
    $name = $_POST['name'];
    $address = $_POST['address'];
//INSERT INTO table (array1, array2) VALUES ('$array1', '$array2')
$conn ->query("INSERT INTO data (name, address) VALUES('$name', '$address')") or 
              die($conn->error());
    //Zpráva pro uživatele po zapsání dat
    $_SESSION['message'] = "Record has been saved";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");
          
}
// Funkce pro smazání dat
if (isset($_GET['delete']))
{
    $id = $_GET['delete'];
    $conn->query("DELETE FROM data WHERE id=$id") or die($conn->error());
    //Zpráva pro uživatele po smazání dat
    $_SESSION['message'] = "Record has been deleted";
    $_SESSION['msg_type'] = "danger";

}
// Funkce por uprávu záznamu
if(isset($_GET['edit']))
{
    $id = $_GET['edit'];
    $update = true;
    $result = $conn->query("SELECT * FROM data WHERE id=$id") or die($conn->error());
    //Metoda pro zjištění zda-li vůbec záznam existuje
    if (count($result)==1)
    {   
        $row = $result->fetch_array();
        $name = $row['name'];
        $address = $row['address'];
    }
}
if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    //UPDATE table SET value1='$value1', value2='$value2' WHERE id=$id
    $conn->query("UPDATE data SET name='$name', address ='$address' WHERE id=$id") or die($conn->error());

    $_SESSION['message'] = "Record has been updated";
    $_SESSION['msg_type'] = "warning";
    header("location: index.php");
}
?>