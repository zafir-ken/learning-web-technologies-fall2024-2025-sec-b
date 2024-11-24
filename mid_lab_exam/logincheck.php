<?php

session_start();

if($_SESSION["Lemail"]==$_SESSION['email'] )
{
    if($_SESSION["Lpassword"]==$_SESSION['password'])
    {
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
