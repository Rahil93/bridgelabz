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
// echo "\nEnter the data : ";
// fscanf(STDIN,"%s\n",$data);
$pos;
echo "\nEnter the position : ";
fscanf(STDIN,"%s\n",$pos);
// LinkedList::remove($data);
// LinkedList::add($data);
// echo LinkedList::search($data)."\n";
// echo "Size : ".LinkedList::size()."\n";
// echo "Index : ".LinkedList::index($data)."\n";
// LinkedList::insertAt($data,$pos);
// LinkedList::pop();
LinkedList::popAt($pos);
echo "\n";

LinkedList::display();


 ?>
