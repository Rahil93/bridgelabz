<?php

  require 'Utility.php';

  $arr;
  $size;
  echo "Enter the size of an array : ";
  fscanf(STDIN,"%s\n",$size);
  echo "Enter $size value...\n";
  for ($i = 0; $i < $size; $i++) {
    fscanf(STDIN,"%s\n",$arr[$i]);
  }

  $arr = Utility::mergeSort($arr,0,$size - 1);
  echo "Sorted Value are...\n";
  for ($i = 0; $i < $size; $i++) {
    echo $arr[$i]."\n";
  }
 ?>
