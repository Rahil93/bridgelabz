<?php 
require 'Queue.php';

$data;
$size;
echo "Is Empty : ";
var_dump(Queue::isEmpty())."\n";
echo "Enter the No. of element u want in Queue : ";
fscanf(STDIN,"%s\n",$size);
echo "Add Element... \n";
for ($i = 0; $i < $size; $i++) { 
    fscanf(STDIN,"%s\n",$data);
    Queue::enqueue($data);
}
Queue::display();
echo "Size : ".Queue::size()."\n";
echo "Removed element : ".Queue::dequeue()."\n";
echo "Is Empty : ";
var_dump(Queue::isEmpty())."\n";
echo "Size : ".Queue::size()."\n";
Queue::display();

?>