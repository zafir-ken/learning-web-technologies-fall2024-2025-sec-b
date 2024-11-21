
<!DOCTYPE html>
<html>
<body>

<form action="" method="POST">
<label for="name">NAME:</label><br>
<input type="text" name='name'><br>
<button type="submit">Submit</button>
</form>

</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $s=($_POST['name']);
   // echo $s; 
   $c=$s[0];
    if(empty($s))
    {
        echo "Name can not be empty";
    }
    
   elseif(!ctype_alpha($c))
    {
        echo "Must start with a letter";
    }
   
   elseif (!preg_match('/^[a-zA-Z]+ [a-zA-Z]+$/', $s))
    {
        echo "msut conatin atlest 2 words";
       
    }
    else
    {
        echo"valid name";
    }
    
}


?>