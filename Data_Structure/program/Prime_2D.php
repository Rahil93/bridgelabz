<?php

require '../../Algorithm/Utility.php';
$arr = [];
$count = 0;
for ($i=0; $i < 1000; $i++) {
    if (Utility::isprime($i)) {
        echo $arr[$count++] = $i." ";
    }
}

?>