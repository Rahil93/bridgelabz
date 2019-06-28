<?php

  echo distance();

  function distance()
  {
    $x;
    echo "Enter the value  of x : ";
    fscanf(STDIN,"%s\n",$x);
    $y;
    echo "Enter the value of y : ";
    fscanf(STDIN,"%s\n",$y);
    return sqrt((pow($x,2) + pow($y,2)));
  }
 ?>
