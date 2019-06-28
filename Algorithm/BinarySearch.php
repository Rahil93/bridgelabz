<?php

  $arr = require 'bubbleSort.php';
  // echo "Sorting Value Are...\n";
  // for ($i = 0; $i < sizeof($arr); $i++) {
  //   echo $arr[$i]."\n";
  // }
  $num;
  echo "Enter the no. to be Search : ";
  fscanf(STDIN,"%s\n",$num);
  $mid = Utility::binarysrch($arr,0,sizeof($arr) - 1,$num);
  echo "$num found at location $mid";
 ?>
