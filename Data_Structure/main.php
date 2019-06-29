<?php

require 'LinkedList.php';

$data;
$size;
echo "Enter the no. of node add in Linked list : ";
fscanf(STDIN,"%s\n",$size);
for ($i = 0; $i < $size; $i++) {
  fscanf(STDIN,"%s\n",$data);
  LinkedList::insert($data);
}

LinkedList::display();
echo "\nEnter the data : ";
fscanf(STDIN,"%s\n",$data);
// LinkedList::remove($data);
LinkedList::add($data);
LinkedList::display();


 ?>
