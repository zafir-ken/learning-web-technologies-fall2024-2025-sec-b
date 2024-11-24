<?php
session_start();
    if(isset($_POST['submit']))
    {
        $_SESSION['Lemail']=$_POST['email'];
        $_SESSION['Lpassword']=$_POST['password'];
        header("Location: logincheck.php");
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
    <form action="" method='POST'>
    <label for="email" name="email">EMAIL</label><br>
    <input type="text" name="email"><br>
    <label for="password" name="password">PASSWORD</label><br>
    <input type="text" name="password"><br>
    <button tupe="submit" name="submit">LOG IN</button><br>
    </form>
    
</body>
</html>
