<?php
require '../Queue/Queue.php';
require '../../Algorithm/Utility.php';

echo "Prime & Anagram Are..\n";
for ($i = 10; $i < 1000; $i++) {
  for ($j = $i + 1; $j < 1000; $j++) {
      if (Utility::isprime($i) && Utility::isprime($j) && Utility::Anagram($i,$j)) {
        Queue::enqueue($i);
      }
  }
}
Queue::display();
 ?>
