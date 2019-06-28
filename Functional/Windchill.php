<?php

  echo windchill();

  function windchill()
  {
    $t;
    echo "Enter the Temperature in Farenheit : ";
    fscanf(STDIN,"%s\n",$t);
    $v;
    echo "Enter the Wind Speed in mph : ";
    fscanf(STDIN,"%s\n",$v);
    if ($t <=50 && $v <=120 && $v >=3) {
      $w = 35.74 + (0.62151 * $t) + (((0.4275 * $t) - 35.75) * pow($v,0.16));
      return $w;
    }
    else {
      echo "Enter the correct value";
    }
  }
 ?>
