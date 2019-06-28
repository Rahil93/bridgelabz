<?php

  require 'Utility.php';

  $arr = [];
  $size;
  echo "Enter size of array : ";
  fscanf(STDIN,"%s\n",$size);
  echo "Enter the Value...\n";
  for ($i = 0; $i < $size; $i++) {
    fscanf(STDIN,"%s\n",$arr[$i]);
  }
  $arr = Utility::bubbleSort($arr);
  echo "Sorting Value Are...\n";
  for ($i = 0; $i < $size; $i++) {
    echo $arr[$i]."\n";
  }
  return $arr;
 ?>
