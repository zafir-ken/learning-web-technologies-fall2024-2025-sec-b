<?php
    function isOddOrEven($number)
    {
        if ($number % 2 == 0) 
        {
            return "$number is even";
        } 
        else 
        {
            return "$number is odd";
        }
    }

    echo isOddOrEven(7); 
?>
