<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>CRUD - ITV</title>
</head>
<body>
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
<?php
//CSS, Dtb a operace 
include "style.inc";
include "db_connect.inc";
require_once "process.php";
?>
<!--Zobrazení zprávy uživateli-->
<?php
if (isset($_SESSION['message'])):?>

<div class="alert alert-<?=$_SESSION['msg_type']?>">

<?php 
    echo $_SESSION['message'];
    unset($_SESSION['message']);
?>

</div>

<?php endif ?>
<div class="container">
<?php
$result = $conn->query("SELECT * FROM data");
//zobrazení všech záznamů na indexu  v čitelném stavu
//pre_r($result);
?>
<div class="row justify-content-center">
<table class="table">
<thead>
<tr>
<th>#</th>
<th>Name</th>
<th>Address</th>
<th colspan="2">Action</th>
</tr>
</thead>
<?php 
    while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?php echo $row['id']?></td>
        <td><?php echo $row['name']?></td>
        <td><?php echo $row['address']?></td>
        <td>
            <a href="index.php?edit=<?php echo $row['id'];?>"
            class="btn btn-info">Edit</a>
            <a href="index.php?delete=<?php echo $row['id'];?>"
            class="btn btn-danger">Delete</a>
        </td>


    </tr>
    <?php endwhile; ?>
</table>
</div>
<?php
// Funkce přes kterou lze číst zadaná data
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
    <input type="hidden" name="id" value="<?php echo $id?>">
    <div class="form-group">
    <label>Jméno a Příjmení</label>
    <input type="text" name="name" placeholder="Name" class="form-control" value=<?php echo $name;?> >
    </div>
    <div class="form-group">
    <label>Adresa</label>
    <input type="text" name="address" placeholder="Address" class="form-control" value=<?php echo $address;?> >
    </div>
    <div class="form-group">
    <?php
    if ($update == true):
    ?>
        <button type="submit" class="btn btn-secondary" name="update">Update</button>
<?php else: ?>
    <button type="submit" class="btn btn-primary" name="save">Save</button>
<?php endif; ?>
    </div>
</form>
</div> 
</body>
</html>