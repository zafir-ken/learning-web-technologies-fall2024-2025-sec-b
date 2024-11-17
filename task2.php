<?php

    $amount = 100; 
    $vatRate = 0.15;
    $vat = $amount * $vatRate;

    $totalAmount = $amount + $vat;

    echo "Original Amount: $$amount<br>";
    echo "VAT (15%): $$vat<br>";
    echo "Total Amount (including VAT): $$totalAmount<br>";
?>
