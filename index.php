<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>CRUD - ITV</title>
</head>
<body>
<?php
//CSS, DTB a funkčnost 
include "style.inc";
require_once "process.php";
?>
<?php
$conn = mysqli_connect('localhost', 'root', 'root', 'crud'); 
$result = $conn->query("SELECT * FROM data");
//zobrazení všech záznamů na indexu  v čitelném stavu
//pre_r($result);
pre_r($result->fetch_assoc());
function pre_r($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
?>
<!--formulář-->
<div class="row justify-content-center">
<form action="process.php" method="POST">
    <div class="form-group">
    <label>Jméno a Příjmení</label>
    <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
    <label>Adresa</label>
    <input type="text" name="address" class="form-control">
    </div>
    <div class="form-group">
    <button type="submit" class="btn btn-primary" name="save">Uložit</button>
    </div>
</form>
</div>  
</body>
</html>