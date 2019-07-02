<?php

 require '../List/LinkedList.php';

$myfile = fopen("sample.txt","r");

$s =  fgets($myfile);
$str = explode(" ",$s);
for ($i=0; $i < sizeof($str); $i++) {
    // echo $str[$i]."\n";
    LinkedList::insert($str[$i])."\n";
}
LinkedList::sort();
LinkedList::display();
$data;
echo "Enter String : ";
fscanf(STDIN,"%s\n",$data);
LinkedList::add($data);
LinkedList::sort();
LinkedList::display();

fclose($myfile);

?>
