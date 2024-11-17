<?php
    $array = [10, 20, 30, 40, 50];
    $element = 30;
    $found = false;

    for ($i = 0; $i < 5; $i++) 
    {
        if ($array[$i] == $element) 
        {
            $found = true;
            break;
        }
    }

    if ($found) 
    {
        echo "$element found in the array";
    } else 
    {
        echo "$element not found in the array";
    }
?>