<?php
//Layout pro urychlení trvorby dlší stránek
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>CRUD - ITV</title>
</head>
<body>
<?php
//CSS, Dtb a operace 
include "style.inc";
include "db_connect.inc";
require_once "process.php";
?>
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="index.php">CRUD ITV</a>
        </div>
        <div style="absolute">
        <a style="color:white" href="crud.php">Zápis dat</a> |
        <a style="color:white" href="login.php">Login</a>
        </div>
    </div>
</nav>
</body>
</html>
