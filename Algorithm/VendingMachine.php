<?php

  require 'Utility.php';

  $arr = array(0,0,0,0,0,0,0,0,0,0);
  $arrnote = array(2000,500,200,100,50,20,10,5,2,1);
  // $size = 9;
  $change;
  echo "Enter the Money : ";
  fscanf(STDIN,"%s\n",$change);
  $arr = Utility::vendingmachine($arr,$change,0);

  for ($i = 0; $i < sizeof($arr); $i++) {
    echo  $arrnote[$i]." notes : ".$arr[$i]."\n";
  }

 ?>
