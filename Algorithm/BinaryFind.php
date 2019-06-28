<?php

  require 'Utility.php';

  $low = 0;
  $arr = [];
  $size;
  echo "Enter the Size of an Array : ";
  fscanf(STDIN,"%s\n",$size);
  echo "Enter $size Integer\n";
  for ($i = 0; $i < $size; $i++) {
    fscanf(STDIN,"%s\n",$arr[$i]);
  }
  Utility::binarySearch($arr,$size,$low);
 ?>
