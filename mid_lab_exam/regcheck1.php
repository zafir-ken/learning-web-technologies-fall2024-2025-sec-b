<?php
session_start();
 $f=1;
if(isset($_SESSION['name']) && !empty($_SESSION['name']))
{
    $f=0;
}
if(isset($_SESSION['email']) && !empty($_SESSION['email']))
{
    $f=0;
}
if(isset($_SESSION['password']) && !empty($_SESSION['password']))
{
    $f=0;
}
if(isset($_SESSION['phone']) && !empty($_SESSION['phone']))
{
    $f=0;
}
if(isset($_SESSION['gender']) && !empty($_SESSION['gender']))
{
    $f=0;
}
if($f==1)
{
    header("Location: reg.php");
}
if(isset($_POST['log_in']))
{
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
    <h2>registration Successful</h2><br>
    <form action="" method="POST">

    <button type="submit" name="log_in">LOG IN</button>
    </form>
</body>
</html>
