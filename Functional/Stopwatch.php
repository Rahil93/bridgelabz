<?php

  function stopwatch()
  {
    $time_start = microtime(true);
    $a;
    echo "Enter value of a : ";
    fscanf(STDIN,"%s\n",$a);
    $b;
    echo "Enter value of b : ";
    fscanf(STDIN,"%s\n",$b);
    $c = $a + $b;
    echo "$a + $b = $c\n";
    $time_end = microtime(true);
    $time_elapsed = $time_end - $time_start;
    echo "Elapsed Time : $time_elapsed";
  }
  stopwatch();
 ?>
