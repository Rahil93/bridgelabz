<?php

require '../Stack/Stack.php';

$exp = "(5+6)*(7+8)/(4+3)(5+6)*(7+8)/(4+3)";
for ($i=0; $i < strlen($exp); $i++) {
    if ($exp[$i] == ")" && Stack::isEmpty()) {
        echo "Parenthesis is not Balanced...\n";
        return false;        
    }
    elseif ($exp[$i] == "(") {
        Stack::push($exp[$i]);
    }
    elseif ($exp[$i] == ")") {
        $s = Stack::peek();
        if ($s == "(") {
            Stack::pop($s);
        }
        else {
            echo "Parenthesis is not Balanced...\n";
            return false;
        }
    }
}
if (Stack::isEmpty()) {
    echo "Parenthesis is Balanced...\n";
}
else {
    echo "Parenthesis is not Balanced...\n";
}

?>