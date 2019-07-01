<?php 
require 'Queue.php';

$data;
$size;
echo "Enter the No. of element u want in Queue : ";
fscanf(STDIN,"%s\n",$size);
echo "Add Element... \n";
for ($i = 0; $i < $size; $i++) { 
    fscanf(STDIN,"%s\n",$data);
    Queue::enqueue($data);
}
Queue::display();

?>