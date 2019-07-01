<?php 
require 'Dequeue.php';

$data;
$size;
echo "Is Empty : ";
var_dump(Dequeue::isEmpty())."\n";
echo "Enter the No. of element u want in Queue : ";
fscanf(STDIN,"%s\n",$size);
$ch;

for ($i = 0; $i < $size; $i++) { 
    echo "1. Add from front...\n";
    echo "2. Add from rear...\n";
    echo "Choose : ";
    fscanf(STDIN,"%s\n",$ch);
    if ($ch == 1) {
        echo "Add Element... \n";
        fscanf(STDIN,"%s\n",$data);
        Dequeue::addFront($data);    
    }
    elseif ($ch == 2) {
        echo "Add Element... \n";
        fscanf(STDIN,"%s\n",$data);
        Dequeue::addRear($data);
    }
    else {
        echo "Please re-enter value";
        $i--;
    }  
}
Dequeue::display();
echo "Size : ".Dequeue::size()."\n";
echo "Removed first element : ".Dequeue::removeFront()."\n";
echo "Removed last element : ".Dequeue::removeRear()."\n";
echo "Is Empty : ";
var_dump(Dequeue::isEmpty())."\n";
echo "Size : ".Dequeue::size()."\n";
Dequeue::display();
// echo "Removed first element : ".Dequeue::removeFront()."\n";
// echo "Removed last element : ".Dequeue::removeRear()."\n";
// Dequeue::display();

?>