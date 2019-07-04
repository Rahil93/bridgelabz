<?php

require '../List/LinkedList.php';

function hash_value($num)
{
    return (int)$num % 11;
}

function initList()
{
    $arr = [];

    for ($i=0; $i < 11; $i++) { 
        $arr[] = new LinkedList();
    }
    return $arr;
}

function readf()
{
    $myfile = fopen("sample.txt","r");
    $s = fgets($myfile);
    return $s;
    fclose();
          
}

function hashing()
{
    $list = initList();
    $num = explode(" ",readf());
    for ($i=0; $i < sizeof($num); $i++) { 
        $l = hash_value($num[$i]);
        $list[$l]->insert($num[$i]);

     }

     $srchnum;
     echo "List : ". showList($list)."\n";
     echo "Enter the no. to be search : ";
     fscanf(STDIN,"%s\n",$srchnum);

     $l = hash_value($srchnum);
     if ($list[$l]->search($srchnum)) {
         echo "Number found\nRemoving...\n";
         $list[$l]->remove($srchnum);
         echo "List : ". showList($list)."\n";
     }
     else {
         echo "Number not found\nAdding...\n";
         $list[$l]->add($srchnum);
         echo "List : ". showList($list)."\n";
     }

     writef($list);
}

function writef($list)
{
    $myfile = fopen("sample.txt","w");
    fwrite($myfile,showList($list));
    fclose($myfile);
}

function showList($list)
{
    $s = "";
    for ($i = 0; $i < 1; $i++) {
        $s .= $list[$i]->getString() . " ";
    }
    return substr($s , 0 , -1);
}
hashing();


?>