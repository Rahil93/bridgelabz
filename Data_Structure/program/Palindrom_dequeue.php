<?php

require '../Dequeue/Dequeue.php';
require '../../Algorithm/Utility.php';

$str;
echo "Enter String : ";
fscanf(STDIN,"%s\n",$str);
for ($i = 0; $i < strlen($str); $i++) {
  Dequeue::addRear($str[$i]);
}
Dequeue::display();

$front;
$rear;
for ($i = 0; $i < strlen($str) / 2; $i++) {
  $front = Dequeue::removeFront();
  $rear = Dequeue::removeRear();
  if ($front != $rear) {
    echo "$str is not a Palindrome...\n";
    return false;
  }
  echo "$str is Palindrome\n";
  return true;
}

 ?>
