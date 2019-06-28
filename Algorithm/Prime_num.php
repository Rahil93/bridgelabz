<?php

  require 'Utility.php';

  for ($i = 2; $i <= 1000; $i++) {
    if (Utility::isprime($i)) {
      echo "$i is a prime no.\n";
    }
  }

 ?>
