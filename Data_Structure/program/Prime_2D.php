<?php

require '../../Algorithm/Utility.php';
function prime()
{
    $arr = [];
    $count = 0;
    for ($i=0; $i < 1000; $i++) {
        if (Utility::isprime($i)) {
            $arr[$count++] = $i;
        }
    }
    return $arr;
}
$arr = prime();
// var_dump($arr);

$k = 0;
$range = 100;
$index = 0;
while ($range < 1000) {
    for ($i=0; $i < 10; $i++) { 
        $temparr = [];
        $carr = [];
        for ($j=0; $j < 25; $j++) { 
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
        echo $index++;
    }
}


function darr($arr,$index)

{
    $darr = [[]];
    // var_dump();

    // for ($i=$index; $i <= $index; $i++) { 
        for ($j=0; $j < 25; $j++) { 
              $darr[$index][$j] = $arr[$j]." ";
        }
        echo "\n";
    // }
    // var_dump($darr);

}

    function initArray()
    {
        $arr = [];
        for ($i = 0; $i < 6; $i++) {
            $array1 = array();
            for ($j = 0; $j < 7; $j++) {
                $array1[$j] = 0;
            }
            array_push($arr, $array1);
        }
        // var_dump($arr);
        return $arr;
    }

?>