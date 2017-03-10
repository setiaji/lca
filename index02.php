<?php
function isprima($bilprima)
{
    $sisa = $bilprima % 2;
    
    if ($bilprima == 2){
        $hasil = TRUE;        
    }
    elseif ($sisa == 1){        
            $hasil = TRUE;        
        }
        else{            
            $hasil = FALSE;
        }        
    echo $hasil ? 'true':'false';
        #return $hasil;
}

isprima(4)

?>
