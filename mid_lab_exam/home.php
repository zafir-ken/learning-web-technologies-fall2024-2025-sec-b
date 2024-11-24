<?php
session_start();
if(!isset($_SESSION['flag']))
{
    header("Location: login.php");
}
if(isset($_POST['logout']))
{
    session_destroy();
    header("Location: login.php");
}
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <th>WELCOME <?php
         echo "  " .  $_SESSION['name'] ;
         ?></th>
    </table>
    <form action="" method="POST">
        <button type="submit" name="logout">LOGOUT</button>
    </form>
</body>
</html>
