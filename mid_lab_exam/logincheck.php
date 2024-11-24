<?php

session_start();

$_SESSION['flag']="0";

if($_SESSION["Lemail"]==$_SESSION['email'] )
{
    if($_SESSION["Lpassword"]==$_SESSION['password'])
    {
        $_SESSION['flag']="1";
        header("Location: home.php");
        //echo "milse";
       
    }
    else
    {
        header("Location: login.php");
    }
}
else
{
    header("Location: login.php");
}



?>
