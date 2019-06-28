<?php

  require ('Utility.php');

  $c;
  echo "Enter Temperature in Celsius : ";
  fscanf(STDIN,"%s\n",$c);
  $f;
  echo "Enter Temperature in Fahrenheit : ";
  fscanf(STDIN,"%s\n",$f);
  Utility::tempconv($c,$f);

 ?>
