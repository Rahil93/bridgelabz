<?php

  $b = require 'ToBinary.php';
  echo "Binary Swapped : ".Utility::binaryswap($b)."\n";
  echo "Binary to Decimal Conversion : ".Utility::decimal(Utility::binaryswap($b));;
 ?>
