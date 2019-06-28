<?php
  require 'Utility.php';

  $c;
  echo "Enter the no. : ";
  fscanf(STDIN,"%s\n",$c);
  echo "Square Root of $c : ".Utility::newsqrt($c);

 ?>
