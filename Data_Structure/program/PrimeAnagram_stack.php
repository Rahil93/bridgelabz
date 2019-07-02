<?php
require '../Stack/Stack.php';
require '../../Algorithm/Utility.php';

echo "Prime & Anagram Are..\n";
for ($i = 10; $i < 1000; $i++) {
  for ($j = $i + 1; $j < 1000; $j++) {
      if (Utility::isprime($i) && Utility::isprime($j) && Utility::Anagram($i,$j)) {
        Stack::push($i);
      }
  }
}
Stack::display();
 ?>
