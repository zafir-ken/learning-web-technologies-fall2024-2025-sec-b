<?php
    function findLargest($a, $b, $c) 
    {
        if ($a >= $b && $a >= $c) 
        {
            return $a;
        } elseif ($b >= $a && $b >= $c) 
        {
            return $b;
        } 
        else 
        {
            return $c;
        }
    }

    echo "The largest number is: " . findLargest(10, 20, 15);
?>