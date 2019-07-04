<?php

require '../../Algorithm/Utility.php';

$num;
echo "Enter the no. of nodes to the tree: ";
fscanf(STDIN,"%s\n",$num);

$numerator = Utility::factorial(2 * $num);

$denominator = Utility::factorial($num + 1) * Utility::factorial($num);

$bst = floor($numerator/$denominator);
echo $bst."\n";

?>