<?php 
require 'Stack.php';

$data;
$size;
echo "Enter the No. of Node u want in Stack : ";
fscanf(STDIN,"%s\n",$size);
echo "Add Stack : \n";
for ($i = 0; $i < $size; $i++) { 
    fscanf(STDIN,"%s\n",$data);
    Stack::push($data);
}
Stack::display();

?>