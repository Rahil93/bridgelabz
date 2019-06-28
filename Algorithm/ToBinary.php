<?php

  require 'Utility.php';
  $d;
  echo "Enter Decimal No. : ";
  fscanf(STDIN,"%s\n",$d);
  echo "Decimal to Binary Conversion : ".Utility::binary($d)."\n";
  return Utility::binary($d);
 ?>
