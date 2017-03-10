<?php
include 'index02.php';

function rataprima($bil1, $bil2) {
            
    if (isprima($bil1) == TRUE){
        $primbil1 = $bil1;
    }
    else {
        $primbil1 = 0;
    }
    
    if (isprima($bil2) == TRUE){
        $primbil2 = $bil2;
    }
    else{
        $primbil2 = 0;
    }
    
    $avgprima = ($primbil1 + $primbil2)/2;
    echo $avgprima;    
}

rataprima(3, 7)
?>

