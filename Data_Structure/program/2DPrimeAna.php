<?php

require '../../Algorithm/Utility.php';
function prime()
{
    $arr = [];
    $count = 0;
    for ($i=0; $i < 1000; $i++) {
        for ($j=$i + 1; $j < 1000; $j++) { 
            if (Utility::isprime($i) && Utility::isprime($j) && Utility::Anagram($i,$j)) {
                $arr[$count++] = $i;
                $arr[$count++] = $j;
            }    
        }
        
    }
    return $arr;
}

function clac()
{
    $arr = prime();
    $k = 0;
    $range = 100;
    $index = 0;
    while ($range < 1000) {
        for ($i=0; $i < 10; $i++) { 
            $temparr = [];
            $carr = [];
            for ($j=0; $j < 4; $j++) { 
                if ($arr[$k] < $range) {

                        $temparr[$j] = $arr[$k]; 
                        if ($k <= sizeof($arr) - 2) {
                            $k++;
                        
                    }
                }
                else {
                    $temparr[$j] = 0;
                    
                }
            }
            $carr = $temparr;
            darr($carr,$index);
            $range = $range + 100;
            $index++;
        }
    }
}



function darr($arr,$index)

{   
    $arr1 = array($index);
    $arr2 = array_fill_keys($arr1,$arr);
    print_r($arr2);
}

    clac();

?>