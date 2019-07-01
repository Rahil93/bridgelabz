<?php 
require 'Stack.php';

$data;
$size;
// echo "Is Empty : ";
// var_dump(Stack::isEmpty())."\n";

echo "Enter the No. of Node u want in Stack : ";
fscanf(STDIN,"%s\n",$size);
echo "Add Element... \n";
for ($i = 0; $i < $size; $i++) { 
    fscanf(STDIN,"%s\n",$data);
    Stack::push($data);
}
Stack::display();
echo "Size of Stack : ".Stack::size()."\n";
// echo "Top element : ".Stack::peek()."\n";
echo "Removed element : ".Stack::pop()."\n";
// echo "Top element : ".Stack::peek()."\n";
// echo "Is Empty : ";
// var_dump(Stack::isEmpty())."\n";
echo "Size of Stack : ".Stack::size()."\n";
Stack::display();

?>